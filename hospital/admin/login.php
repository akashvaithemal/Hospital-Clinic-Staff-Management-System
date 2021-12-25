<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login-Hospital management system system</title>
        <link rel="stylesheet" href="css/admin.css">
        
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1><br>

            <?php 
               if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);

            }
            if(isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?><br><br>
            <!--Login form starts here-->
            <form action="" method="POST" class="text-center">
               
               <input type="text"class="user__name" name="username" placeholder="Enter User Name"> <br><br>

               
               <input type="password" class="pass__word" name="password" placeholder="Enter Password"><br><br>


               <input type="submit" name="submit" value="Login" class="submit__btn" class="btn-primary">

            </form><br><br>
                

             <!--Login form ends here-->
               
            <p class="text-center">Created By - <a href="https://www.facebook.com/m.ahmmedakash/">Sabbir Ahmmed Akash</a></p>
        </div>



    </body>
</html>
<?php
  //check whether the submit button is clicked or not
  if(isset($_POST['submit'])){
      //process the login
      //1.get the data from login form
        $username=($_POST['username']);
        $password=md5($_POST['password']);
        //2.check sql whether password exist or not
        $sql = "SELECT * FROM manage_admin WHERE username='$username' AND password='$password'";
        //execute the query
        $res=mysqli_query($conn,$sql);
        //count rows whether any users exist or not
        $count = mysqli_num_rows($res);
        
 if($count==1){
            $_SESSION['login']="<div class='success'>Login successfull</div>";
            $_SESSION['user']=$username;//checked whether the admin logged in or not and logged out will unset it
            header('location:'.SITEURL.'admin/');
        }
        else{
            $_SESSION['login']="<div class='error'>User name or password didnot match</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
        

  }
?>