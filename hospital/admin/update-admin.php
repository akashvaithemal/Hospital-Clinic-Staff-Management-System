<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php 
           //1.Get the id of the selected admin
           $id = $_GET['id'];
           //create sql query to get the details
           $sql = "SELECT * FROM manage_admin WHERE id=$id";

           //Execute the query
           $res = mysqli_query($conn,$sql);

           //cheak whether the query is executed or not
           if($res==true){
               $count = mysqli_num_rows($res);
               if($count==1){
                   //echo "Admin avialable"
                    $row = mysqli_fetch_assoc($res);
                    $full_name=$row['full_name'];
                    $username=$row['username'];
               }
               else{
                   header('location:'.SITEURL.'admin/manage-admin.php');
               }
           }
        ?>


        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                </td>
                
            </tr>

            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>

            <tr>
                <td  colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input class="btn-secondary" type="submit" name="submit" value="Update Admin">
                </td>
            </tr>
        </table>

        </form>
    </div>

</div>
<?php
   //check whether the sub,it button is clicked or not

   if(isset($_POST['submit'])){
       //echo "Button clicked";
       //get all the values from form to update

       $id = $_POST['id'];
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];

       //create sql query to update admin
       $sql = "UPDATE manage_admin SET
       full_name='$full_name',
       username='$username' 
       WHERE id = '$id'
       ";

       //execute the query
       $res = mysqli_query($conn,$sql);
      //check whether query executed successfully or not

      if($res==TRUE)
      {
         //query executed and admin updated
          $_SESSION['update'] = "<div class ='success'> Admin updated Succesfully</div>";
          header('location:'.SITEURL.'admin/manage-admin.php');
      }
      else
      {

        $_SESSION['update'] = "<div class ='error'> Failed to updated admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
      }

   }

?>


<?php include('partials/footer.php'); ?>
