<?php
error_reporting(0);
session_start();
$baglanti = @mysql_connect('localhost', 'root', '');
$veritabani = @mysql_select_db( 'sinema', $baglanti) or die(mysql_error());

?>