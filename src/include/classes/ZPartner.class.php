<?php
//include 'xtemplate.class.php';
class ZPartner
{
	const SECRET_KEY = '@4!@#$%@';
	static public function GenPassword($p) {
		return md5($p . self::SECRET_KEY);
	}

	static public function Create($partner_row) {
	}
	static public function nl2br2($string) {
			//$string = str_replace(array("\r\n\r\n","\r\n\r\n\r\n","\r\n\r\n\r\n\r\n", "\r\r","\r\r\r","\r\r\r\r", "\n ","\n\n", "\n\n\n", "\n\n\n\n","<br>","<br/>","<br />"), "\n", $string);
			$string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
			return $string;
	}
	static public function nl2n($string) {
			$string = str_replace(array("\r\n", "\r", "\n"), "\\n", $string);
			return $string;
		}
	static public function GetPartner($partner_id) {
		if (!$partner_id) return array();
		Table::Fetch('partner', $partner_id);
	}

	static public function GetLogin($username, $password, $en=true) {
		if($en) $password = self::GenPassword($password);
		return DB::GetTableRow('partner', array(
					'username' => $username,
					'password' => $password,
		));
	}

	static public function GetLoginPartner() {
		if(isset($_SESSION['partner_id'])) {
			return self::GetPartner($_SESSION['partner_id']);
		}
		return array();
	}

	static public function Login($partner_id) {
		Session::Set('partner_id', $partner_id);
	}
}
