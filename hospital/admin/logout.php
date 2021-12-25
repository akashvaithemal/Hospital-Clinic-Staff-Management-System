<?php
include('../config/constants.php');
//1.Destroy the session
session_destroy();
//unset the login session


//redirect into the login page
header('location:'.SITEURL.'admin/login.php');
?>