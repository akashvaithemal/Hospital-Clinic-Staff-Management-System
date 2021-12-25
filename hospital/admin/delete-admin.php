<?php
//include constant.php file
include('../config/constants.php');
//1.get the id of the admin to be deleted
$id = $_GET['id'];
//2. SQL query to delete admin
$sql = "DELETE FROM manage_admin WHERE id = $id";
//execute query
$res = mysqli_query($conn,$sql);
//check whether query execute successfully or not
if($res==TRUE)
{
    //echo "Query executed and deleted admin";
    //create a session variable to display message
    $_SESSION['delete']="<div class='success'>Admin Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
    //echo "failed to delete";
    $_SESSION['delete']="<div class='error'>Failed to Delete Admin</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}

//3. redirect to manage admin page with message

?>