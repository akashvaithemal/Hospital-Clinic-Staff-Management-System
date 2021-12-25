<?php
   include('../config/constants.php');
   //check wheather the id and image value is set or not 
   if(isset($_GET['id']) AND isset($_GET['image_name']))
   {
       //get the value and delete
      // echo "Get value and delete";
      $id = $_GET['id'];
      $image_name = $_GET['image_name'];

      //remove the physical file is availabe
      if($image_name !="")
      {
        $path = "../images/add-doctor/".$image_name;
        //remove the image
        $remove=unlink($path);

        if($remove==false)
        {
            
        $_SESSION['remove'] = "<div class='error'>Failed to remove images </div>";
        //redirect to Appoint admin page
        header('location:'.SITEURL.'admin/appoint-doctor.php');
        //stop the process
        die();
        }
         
     
      }


      // remove data from database
      //sql query to delete data from database
      $sql = "DELETE FROM add_doctor WHERE id=$id";
      //execute the query
      $res = mysqli_query($conn,$sql);

      //check whather the data is delete from database or not
      if($res==TRUE)
      {
          //see the success message and redirect
          $_SESSION['delete'] = "<div class='success'>Doctor Deleted Successfully</div>";
          header('location:'.SITEURL.'admin/appoint-doctor.php');
      }
      else{
          //send failed message and redirect
          $_SESSION['delete'] = "<div class='error'>Failed to delete Doctor</div>";
          header('location:'.SITEURL.'admin/appoint-doctor.php');
      }

      

   }
   else{
       //redirect in appoint admin page
       header('location:'.SITEURL.'admin/appoint-doctor.php');
   }

?>