<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>
        <?php 
           if(isset($_GET['id'])){
               $id=$_GET['id'];
           }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                   <td>Current Password</td>
                   <td>
                       <input type="password" name="current_password" placeholder="Current password">
                   </td>

                </tr>
                <tr>
                    <td>New password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Passwprd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php
  //clicked whether submit button is clicked or not
  if(isset($_POST['submit'])){
     // echo "Clicked";
     //get the data from form
     $id=$_POST['id'];
     $current_password = md5($_POST['current_password']);
     $new_password = md5($_POST['new_password']);
     $confirm_password = md5($_POST['confirm_password']);

     //check whether the user with current ID and Current password Exists or not
     $sql="SELECT * FROM manage_admin WHERE id=$id AND password ='$current_password'";
     //execute the query
     $res = mysqli_query($conn,$sql);
     if($res==TRUE)
     {
         $count=mysqli_num_rows($res);
         if($count==1){
             //user exist and password can be changed

            // echo "User Found";
            //check whether the new pass and confirm pass match or not
            if($new_password==$confirm_password){
                //update password
                //echo "Password Match";
                $sql2="UPDATE manage_admin Set
                     password='$new_password'
                     WHERE id=$id ";

                     //Execute the Query
                     $res2 =  mysqli_query($conn,$sql2);
                     if($res2==TRUE){
                         //Display message
                         $_SESSION['change-pwd']="<div class='success'>Password Changed Successfully </div>";
                         header('location:'.SITEURL.'admin/manage-admin.php');
                     }
                     else{
                         //Display error message
                         $_SESSION['change-pwd']="<div class='error'>Failed to change password!</div>";
                         header('location:'.SITEURL.'admin/manage-admin.php');

                     }


            }
            else{
                //redirect to manage admin with error message
                $_SESSION['pwd-not-match']="<div class='error'>Password didnot match!</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
         }
         else{
             //user doesnot exist and set the message and redirect
            $_SESSION['user-not-found']="<div class='error'>User not found!</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
            }
     }

     //check whether the new pass and confirm password match or not
     //change pass if all above is rue
  }


?>

<?php include('partials/footer.php') ?>