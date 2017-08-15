<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_manager();

$action = strval($_GET['action']);
$id = $topic_id = abs(intval($_GET['id']));
$topic = Table::Fetch('ask', $id);
$pid = abs(intval($topic['parent_id']));

if (!$topic || !$id) {
	json('Topic does not exist', 'alert');
}
elseif ( $action == 'topicremove') {
	if ( $pid==0 ) {
		Table::Delete('topic', $id);
		Table::Delete('topic', $id, 'parent_id');
	} else {
		Table::Delete('topic', $id);
		Table::UpdateCache('topic', $pid, array(
			'reply_number' => Table::Count('topic', array('parent_id' => $pid) ),
		));
	}
	Session::Set('notice', 'Post Deleted');
	json(null, 'refresh');
}
elseif ( $action == 'topichead' ) {
	$head = ($topic['display']=='Y') ? 'N' : 'Y';
	Table::UpdateCache('ask', $id, array( 'display' => $head,));
	$tip = $head =='N' ? 'Set topic sticky success' : 'Cancel Topics Top success';
	Session::Set('notice', $tip);
	json(null, 'refresh');
}
