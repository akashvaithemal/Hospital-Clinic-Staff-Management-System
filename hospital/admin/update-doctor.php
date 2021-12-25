<?php include('partials/menu.php'); ?>
  <div class="main-content">
        <div class="wrapper">
            <h1>Update Doctor</h1>
            <br><br>
              <?php
                 
                 //check wheather id is set or not
                 if(isset($_GET['id']))
                 {
                     //get id and all details
                     //echo "Getting the data";
                     $id=$_GET['id'];
                     //Create SQL query to get all other details 
                     $sql = "SELECT * FROM add_doctor WHERE id=$id";
                     //execute the query

                     $res=mysqli_query($conn,$sql);
                     //count the rows to check wheather the id is valid or not
                     $count = mysqli_num_rows($res);
                     if($count==1)
                     {
                         //Get all the data
                         $row = mysqli_fetch_assoc($res);
                         $username = $row['username'];
                         $password = $row['password'];
                         $email = $row['email'];
                         $degree = $row['degree'];
                         $mobile = $row['mobile'];
                         $current_image = $row['image_name'];
                         $active = $row['active'];



                     }
                     else 
                     {
                         //redirect to appoint doctor page with session message
                         $_SESSION['no-doctor-found']="<div class='error'>Doctor not found</div>";
                         header('location:'.SITEURL.'admin/appoint-doctor.php');
                     }



                 }
                 else{
                     //redirect to appoint doctor page
                     $_SESSION['unauthorize']="<div class='error'>Unauthorize Access</div>";
                     header('location:'.SITEURL.'admin/appoint-doctor.php');
                 }

              ?>
                    <form action="" method="POST" enctype="multipart/form-data">

                            <table class="tbl-30">
                                <tr>
                                        
                                    <td>
                                        <input type="text" class="d_update" name="username" placeholder="Username" value="<?php echo $username; ?>">
                                    </td>
                                </tr>
                
                                <tr>
                            
                                    <td>
                                        <input type="email" class="d_update" name="email" placeholder="Email" value="<?php echo $email; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <input type="text" class="d_update" name="degree" placeholder="Degree" value="<?php echo $degree; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <input type="text" class="d_update" name="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>"><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Current Image</td> 
                                    <td>
                                        <?php
                                            if($current_image != "")
                                            {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/add-doctor/<?php echo $current_image; ?>" width="150px">

                                                <?php

                                            }
                                            else{
                                                echo "<div class='error'>No Image Added</div>";
                                            }

                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>New Image</td>
                                    <td>
                                        <input type="file" name="image">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Active</td>
                                    <td>
                                        <input type="radio" name="active" value="Yes">Yes
                                        <input type="radio" name="active" value="No">No
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" name="submit" value="Update Doctor" class="btn-secondary">
                                     </td>
                                </tr>


                            </table>
                    </form>


        </div>

  </div>

<?php include('partials/footer.php');?>