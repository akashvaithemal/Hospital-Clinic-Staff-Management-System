<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Receptionist</h1><br><br>

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

        <!--Add Receptionist Form Starts-->
            
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    
                    <td>
                        <input type="text" class="d_input" name="username" placeholder="Username">
                    </td>
                </tr>
               
                <tr>
            
                    <td>
                        <input type="email" class="username" name="email" placeholder="Email">
                    </td>
                </tr>
               
                <tr>
                    
                    <td>
                        <input type="text" class="username" name="mobile" placeholder="Mobile"><br><br>
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
                        <input type="submit" name="submit" value="Add Receptionist" class="btn-secondary">

                    </td>
                </tr>



                
            </table>
        </form>

         <!--Add Receptionist Form ends-->
         <?php 
         //check submit button is clicked or not
         if(isset($_POST['submit'])){
             //echo "clicked";
             //1get the value ffrom form
             $username=$_POST['username'];
             $email=$_POST['email'];
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
            

             //2. create sql query for insert data into database
             $sql="INSERT INTO add_receptionist SET
             username='$username',
             email='$email',
             mobile='$mobile',
             active='$active'
             ";
             //3. execute the query
             $res=mysqli_query($conn,$sql);
             if($res==TRUE){
                 //Query executed and doctor added
                 $_SESSION['add']="<div class='success'>Receptionist Added Successfully.</div>";
                 //redirect to manage Doctor page
                 header('location:'.SITEURL.'admin/appoint-receptionist.php');

             }
             else{
                 //failed to add receptionist
                 $_SESSION['add']="<div class='error'>Failed to Add Receptionist.</div>";
                 //redirect to manage Receptionist page
                 header('location:'.SITEURL.'admin/add-receptionist.php');
             }

         }
         ?>

    </div>
</div>

<?php include('partials/footer.php');?>