<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php
          if(isset($_SESSION['add'])){
            echo $_SESSION['add'];//Displaying session Message
            unset($_SESSION['add']);//Removing session Message
          }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    
                    <td><input  type="text" class="username" name="full_name" placeholder="Enter Your full name"></td>
                    
                </tr>

                <tr>
                    
                    <td>
                        <input type="text" class="password" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" class="password" name="password" placeholder="Your Password">
                    </td>
                        
                    
                </tr>

                <tr >
                    <td colspan="2" >
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>
            </table>
        </form>

    </div>

</div>
<?php include('partials/footer.php'); ?>

<?php
//process the from form and save into the database
//cheak whether the button is clicked or not
if(isset($_POST['submit']))
{
    //button clicked
    //echo "Button clicked";
    //Get data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    //SQL query to save data into the database
    $sql="INSERT INTO manage_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";
  
    //executing query and saving data into database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());
    if($res==TRUE)
    {
       // echo "data inserted";
       //create a session variable to dislay a message
       $_SESSION['add'] = "<div class='success'>Admin Added Successfully </div>";
       //Redirect page to manage-admin
       header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        //echo "not inserted";
               //create a session variable to dislay a message
       $_SESSION['add'] = "Sorry! Failed to add admin";
       //Redirect page to add-admin
       header("location:".SITEURL.'admin/add-admin.php');
    }
}

?>