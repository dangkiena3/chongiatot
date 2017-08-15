<?php
function mcurrent_vote($selector='index'){
	$a = array(
		'/manage/vote/index.php' => 'Trang chính',
		'/manage/vote/feedback.php' => 'Phản hồi',
		'/manage/vote/question.php' => 'Câu hỏi',
	);
	$l = "/manage/vote/{$selector}.php";
	return current_link($l,$a,true);
}
