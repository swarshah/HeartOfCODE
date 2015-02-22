<?php
function connect(){
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db('code', $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	return $link;
}

function close_db(){
	mysql_close($link);
}
?>