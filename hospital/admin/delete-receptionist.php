<?php
//include constant.php file
include('../config/constants.php');
//1.get the id of the receptionist to be deleted
if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    //2. SQL query to delete receptionist
    $sql = "DELETE FROM add_receptionist WHERE id = $id";
    //execute query
    $res = mysqli_query($conn,$sql);
    //check whether query execute successfully or not
   if($res==TRUE)
   {
    //echo "Query executed and deleted admin";
    //create a session variable to display message
    $_SESSION['delete']="<div class='success'>Receptionist Deleted Successfully</div>";
    header('location:'.SITEURL.'admin/appoint-receptionist.php');
   }
   else{
    //echo "failed to delete";
    $_SESSION['delete']="<div class='error'>Failed to Delete Receptionist</div>";
    header('location:'.SITEURL.'admin/appoint-receptionist.php');

  }
}
else{
    //redirect in appoint admin page
    header('location:'.SITEURL.'admin/appoint-receptionist.php');
}

//3. redirect to manage admin page with message

?>