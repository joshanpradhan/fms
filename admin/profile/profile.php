<?php
require_once('./../../core/constants.php');
require_once('./../../core/admin_constants.php');
require_once('./../../core/functions.php');

if(!isAuthenticated())
{
    header('Location: ' . LOGIN_PAGE);
}



$users_id = $_SESSION['session']['users']['users_id'];
$users_roles= $_SESSION['session']['users']['roles'];
$conn = db_get_conn();

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
require_once('../inc/navigation.php');
display_flash();

$query = "
              SELECT
                users_id,fullname,email, mobileno,address,img
                FROM tblusers 
                WHERE  users_id= '$users_id'
        ";
       
if($result = $conn->query($query))
{
    if($result->num_rows == 1)
    {  

        $users = $result->fetch_assoc();
        
        ?>

     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <h4 class="title text-center">Profile Picture
                                     
                                  </h4>
                            </div>

                            <div class="content">
                               <div class="content">
                                <div class="author">
                                  <img src="<?php echo FACES_IMG.$users['img'];?>" alt="<?php echo $users['fullname']; ?>" style="height: 200px; width: 200px;" />
                                  
                                <h4 class="title"><?php echo $users[
                                    'fullname']?><br/>
                                     <span>Admin</span>
                                  </h4>
                                </div>
                            </div>
                            
                             <form method="POST" action="<?php echo ADMIN_ACTION?>" enctype="multipart/form-data">  
                   <input type="hidden" name="users_id" value="<?php echo $users['users_id']?>"/>        
                    <input type="file" class="form-control border-input" name="image" required="required">
                    <hr>
                    <button type="submit" class="btn btn-danger" name="upload">Change Profile Picture</button>
                </form>
                        </div>
                     </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> My Profile</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                     <input type="hidden" name="users_id" value="<?php echo $users['users_id']?>"/> 
                                            <div class="form-group">
                                                <label>Role</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" name ="roles" value="Administrator" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label>Fullname</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" name="fullname" value="<?php echo $users['fullname']?>">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="Email" name="email" value="<?php echo $users['email']?>">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Mobile No</label>
                                                <input type="tel" class="form-control border-input" placeholder="Mobileno" name="mobileno" value="<?php echo $users['mobileno']?>">
                                            </div>
                                           
                                    
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address" name="address" value="<?php echo $users['address']?>">
                                            </div>

                                    <div class="text-center">
                                         <button type="submit" class="btn btn-danger" name="update_profile">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php
}
}
?>
<!--     main panel

 --><?php
require_once('../inc/footer.php');

?>