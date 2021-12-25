<?php include('partials/menu.php'); ?>
<!--main section starts--> 
<div class="main-content">
    <div class="wrapper">
    <h1>Appoint Doctor</h1>
    <br>
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    if(isset($_SESSION['remove'])){
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);

    }
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['unauthorize']))
    {
        echo $_SESSION['unauthorize'];
        unset($_SESSION['unauthorize']);
    }
    if(isset($_SESSION['no-doctor-found']))
    {
        echo $_SESSION['no-doctor-found'];
        unset($_SESSION['no-doctor-found']);
    }
    ?>
    <br><br>

    <!--Appoint Doctor section-->
    <a href="<?php echo SITEURL;?>admin/add-doctor.php" class="btn-primary">Appoint Doctor</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Doctor Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Actions</th>
                  
                </tr>
                <?php

                    $sql="SELECT * FROM add_doctor";

                    //Execute the query
                    $res=mysqli_query($conn,$sql);

                    //count rows
                    $count = mysqli_num_rows($res);
                    //check whether we have data in database or not

                    //create serial number variable
                    $sn=1;

                    if($count>0)
                    {
                        //we have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {

                            $id = $row['id'];
                            $username = $row['username'];
                            $email =$row['email'];
                            $degree =$row['degree'];
                            $mobile = $row['mobile'];
                            $image_name =$row['image_name'];
                            $active = $row['active'];

                            ?>
                              
                            <tr>
                                 <td><?php echo $sn++; ?></td>
                                 <td><?php echo $username; ?></td>
                                 <td><?php echo $email; ?></td>
                                <td><?php echo $mobile; ?></td>

                                 <td>
                                     <?php
                                      //check wheather image name is available or not
                                      if($image_name!="")
                                      {
                                          //display the image
                                          ?>
                                          <img src="<?php echo SITEURL; ?>images/add-doctor/<?php echo $image_name; ?>" width="100px">
                                          <?php
                                      }
                                      else{
                                          //display the message
                                          echo "<div class='error'>No Image Added</div>";
                                      }
                                     ?>
                                    
                                </td>

                                  <td><?php echo $active; ?></td>
                                 <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-doctor.php?id=<?php echo $id; ?>" class="btn-secondary">Update Doctor</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-doctor.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?> " class="btn-danger">Delete Doctor</a>
                                  </td>


                             </tr>
                

                            <?php

                        }

                    }
                    else
                    {
                        //we dont have data in database
                        //we will display mwssage inside table
                        ?>
                        <tr>
                            <td><div colspan="7" class="error">No Doctor Added</div></td>
                        </tr>

                        <?php

                    }

                
                ?>

            </table>

</div>
</div>


<?php include('partials/footer.php'); ?>