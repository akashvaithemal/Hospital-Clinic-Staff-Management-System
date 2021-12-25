<?php
   //authorization/ access control
   //checked whether is logged in or not
   if(!isset($_SESSION['user']))//if admin session not set
   {
       //admin is not logged in
        $_SESSION['no-login-message']="<div class='error' >PLease login to access admin pannel!</div>";
       //Redirect to login page with message
       header('location:'.SITEURL.'admin/login.php');

   }
?>
