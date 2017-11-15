<!--
	Author:			Christian
	Created on:		2016 11 12
	Last modified:	2017 11 16
-->
<?php
//SYSTEM SETTINGS
$base_url = 'http://' . $_SERVER['SERVER_NAME'];
$signin_url = substr($base_url . $_SERVER['PHP_SELF'], 0, -(6 + strlen(basename($_SERVER['PHP_SELF']))));

//DO NOT CHANGE
$ip_address = $_SERVER['REMOTE_ADDR'];
