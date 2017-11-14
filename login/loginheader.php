<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();
if (!isset($_SESSION['email'])) {
    return header("location:login/main_login.php");
}
