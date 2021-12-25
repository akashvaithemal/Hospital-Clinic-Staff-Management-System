<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Appoint Receptionist</h1>
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
    if(isset($_SESSION['no-receptionist-found']))
    {
        echo $_SESSION['no-receptionist-found'];
        unset($_SESSION['no-receptionist-found']);
    }
    ?>
    <br><br>

    <!--Appoint Receptionist section-->
    
    <a href="<?php echo SITEURL;?>admin/add-receptionist.php" class="btn-primary">Appoint Receptionist</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Active</th>
                    <th>Actions</th>
                    
                </tr>
                <?php

                    $sql="SELECT * FROM add_receptionist";

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
                    $mobile = $row['mobile'];
                    $active = $row['active'];
                   

                ?>
                  <tr>
                                 <td><?php echo $sn++; ?></td>
                                 <td><?php echo $username; ?></td>
                                 <td><?php echo $email; ?></td>
                                <td><?php echo $mobile; ?></td>

                                 

                                  <td><?php echo $active; ?></td>
                                 <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-receptionist.php?id=<?php echo $id; ?>" class="btn-secondary">Update Receptionists</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-receptionist.php?id=<?php echo $id; ?>" class="btn-danger">Delete Receptionists</a>
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
                            <td><div colspan="7" class="error">No Receptionist Added</div></td>
                        </tr>

                        <?php

                    }

                
                ?>

            </table>

</div>
</div>


<?php include('partials/footer.php'); ?>

       