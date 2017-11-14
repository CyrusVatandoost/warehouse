<!--
	Author:			Christian
	Created on:		2016 11 12
	Last modified:	2017 11 15
-->
<?php
    session_start();
    session_destroy();
    header("location:http://localhost/warehouse/");
