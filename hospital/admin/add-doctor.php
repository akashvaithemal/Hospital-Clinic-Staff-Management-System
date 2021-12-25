<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Doctor</h1><br><br>

        <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>
    <br><br>

        <!--Add Doctor Form Starts-->
            
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    
                    <td>
                        <input type="text" class="d_input" name="username" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <input type="password" class="username" name="password" placeholder="Password">
                    </td>
                </tr>
                <tr>
            
                    <td>
                        <input type="email" class="username" name="email" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <input type="text" class="username" name="degree" placeholder="Degree">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                        <input type="text" class="username" name="mobile" placeholder="Mobile"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>Upload Image</td> 
                    <td>
                        <input type="file" name="image"><br><br>
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
                        <input type="submit" name="submit" value="Add Doctor" class="btn-secondary">

                    </td>
                </tr>



                
            </table>
        </form>

         <!--Add Doctor Form ends-->
         <?php 
         //check submit button is clicked or not
         if(isset($_POST['submit'])){
             //echo "clicked";
             //1get the value ffrom form
             $username=$_POST['username'];
             $password=$_POST['password'];
             $email=$_POST['email'];
             $degree=$_POST['degree'];
             $mobile=$_POST['mobile'];
             //for radio input type need to check button in selected or not
             if(isset($_POST['active'])){
                 //get the value from form 
                 $active=$_POST['active'];
             }
             else{  
                 //set the default value
                 $active="No";
             }
             //check whether the image is selected or not and set the value for image name accordingly
             //print_r($_FILES['image']);
             //die();//break the code
             if(isset($_FILES['image']['name'])){
                 //upload the image
                 $image_name=$_FILES['image']['name'];
                 if($image_name != "")
                       {
                        //Auto rename our Image
                        //to get the extension of our image(jpg,jpeg,png,gif)
                        $ext = end(explode('.',$image_name));

                        //rename the image
                        $image_name="appointed_doctor_".rand(000,999).".".$ext;


                        //to upload image we need image name ,source path and destinaiton path
                        $source_path=$_FILES['image']['tmp_name'];
                        $destination_path="../images/add-doctor/".$image_name;

                        //upload the image
                        $upload =move_uploaded_file($source_path,$destination_path);
                        //check whether the image is uploaded or not
                        //if the file uploaded we will stop the process and redirect with error message
                        if($upload==false){
                            //set message
                            $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                            header('location:'.SITEURL.'admin/add-doctor.php');
                            //stop the process
                            die();

                        }
            }

            }
             else{
                 //dont upload image and set the image name value blank
                 $image_name="";
             }

             //2. create sql query for insert data into database
             $sql="INSERT INTO add_doctor SET
             username='$username',
             password='$password',
             email='$email',
             degree='$degree',
             mobile='$mobile',
             image_name='$image_name',
             active='$active'
             ";
             //3. execute the query
             $res=mysqli_query($conn,$sql);
             if($res==TRUE){
                 //Query executed and doctor added
                 $_SESSION['add']="<div class='success'>Doctor Added Successfully.</div>";
                 //redirect to manage Doctor page
                 header('location:'.SITEURL.'admin/appoint-doctor.php');

             }
             else{
                 //failed to add doctor
                 $_SESSION['add']="<div class='error'>Failed to Add Doctor.</div>";
                 //redirect to manage Doctor page
                 header('location:'.SITEURL.'admin/add-doctor.php');
             }

         }
         ?>

    </div>
</div>

<?php include('partials/footer.php');?>

