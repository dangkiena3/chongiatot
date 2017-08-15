<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
print_r($INI);

header('Content-Type: text/html; charset=ISO-8859-1');

define('TOKEN', $INI['pagseguro']['mid']);

class PagSeguroNpi {
	
	private $timeout = 20; // Timeout em segundos
	
	public function notificationPost() {
		$postdata = 'Comando=validar&Token='.TOKEN;
		foreach ($_POST as $key => $value) {
			$valued    = $this->clearStr($value);
			$postdata .= "&$key=$valued";
		}
		return $this->verify($postdata);
	}
	
	private function clearStr($str) {
		if (!get_magic_quotes_gpc()) {
			$str = addslashes($str);
		}
		return $str;
	}
	
	private function verify($data) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://pagseguro.uol.com.br/pagseguro-ws/checkout/NPI.jhtml");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = trim(curl_exec($curl));
		curl_close($curl);
		return $result;
	}

}





if (count($_POST) > 0) {
	

	
	
	// POST recebido, indica que é a requisição do NPI.
	$npi = new PagSeguroNpi();
	$result = $npi->notificationPost();
	
	$transacaoID = isset($_POST['TransacaoID']) ? $_POST['TransacaoID'] : '';
	
	if ($result == "VERIFICADO") {

			//VERIFICANDO PAGAMENTO
			//---------------------------------------------------------------------	
			if( $_POST['StatusTransacao'] == 'Aprovado') {
		
				//echo retorno de pagamento";
				$order = Table::Fetch('order', $_POST['ProdID_1']);
				
				if ( $order['state'] == 'unpay' ) {
					//1
					$table = new Table('order');
					$table->SetPk('id', $_POST['ProdID_1']);
					$table->pay_id = $_POST['TransacaoID'];
					$table->money = $_POST['ProdValor_1'];
					$table->state = 'pay';
					$flag = $table->update(array('state', 'pay_id', 'money'));
		
					
					if ( $flag ) {
						$table = new Table('pay');
						$table->id = $_POST['TransacaoID'];
						$table->order_id = $_POST['ProdID_1'];
						$table->money = $_POST['ProdValor_1'];
						$table->currency = 'BRL';
						$table->bank = $_POST['TipoPagamento'];
						$table->service = 'pagseguro';
						$table->create_time = time();
						$table->insert( array('id', 'order_id', 'money', 'currency', 'service', 'create_time', 'bank') );
						
						//update team,user,order,flow state//
						ZTeam::BuyOne($order);
					}
				}
				//Utility::Redirect( WEB_ROOT . "/order/pay.php?id={$_POST['Referencia']}");
			}
			else {
			// do nothing
			//echo 'Não foi pago ainda'; 
			}
			//---------------------------------------------------------------------	

			
		/*O post foi validado pelo PagSeguro.
		 $to = "YOUR e-MAIL FOR DEBUG";
		 $subject = "POST foi Validado";
		  
		 $query_string = "";
	 	 	if ($_POST) {
		  	$kv = array();
			  	foreach ($_POST as $key => $value) {
			    	$kv[] = "$key=$value";
			 	}

		 		$query_string = join("&", $kv);
		 	}
		
			$body = $query_string;
			mail($to, $subject, $body);
		*/		
	
	
	} else if ($result == "FALSO") {
		//O post não foi validado pelo PagSeguro.
		
	} else {
		//Erro na integração com o PagSeguro.
	}	
	
} else {

	// POST não recebido, indica que a requisição é o retorno do Checkout PagSeguro.
	// No término do checkout o usuário é redirecionado para este bloco.
	Utility::Redirect( WEB_ROOT );
	
}
?>