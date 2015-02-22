<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}
$db = mysql_select_db('code', $link);
if (!$db) {
    die ('Can\'t use code : ' . mysql_error());
}
?>