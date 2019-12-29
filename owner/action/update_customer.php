<?php
require_once('./../../core/constants.php');
require_once('./../../core/owner_constants.php');
require_once('./../../core/functions.php');
    if(!isAuthenticated())
    {
        header('Location: ' . LOGIN_PAGE);
    }
   
    /*
        For multiple role check use OR operation
            if(!isAuthorized('admin') || !isAuthorized('some-role'))
            {
                header('Location: ' . ADMIN_URL);
            }
    */
    require_once('../inc/header.php');
    require_once('../inc/sidebar.php');
    require_once('../inc/navigation.php');

    display_flash();

if(isset($_GET['users_id']))
    {   
        if(is_numeric($_GET['users_id']))
        {
            $conn = db_get_conn();
            $query = "
                    SELECT
                        users_id, fullname, email, mobileno, address,img
                        FROM tblusers 
                        WHERE users_id={$_GET['users_id']}";
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
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>

                            <div class="content">
                               <div class="content">
                                <div class="author">
                                 <img src="<?php echo FACES_IMG.$users['img'];?>" alt="<?php echo $users['fullname']; ?>" style="height: 200px; width: 200px;" />
                                  <hr>
                                <h4 class="title"><?php echo $users[
                                    'fullname']?><br/>
                                     <span>Customer</span>
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
                                <h4 class="title"> Customer Profile</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo OWNER_ACTION?>">
                                     <input type="hidden" name="users_id" value="<?php echo $users['users_id']?>"/> 
                                            <div class="form-group">
                                                <label>Role</label>
                                                <input type="text" class="form-control border-input" value="Customer" readonly>
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

                                         <button type="submit" class="btn btn-danger" name="update_customer">Update Profile</button>
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
}
}
?>
<!--     main panel

 --><?php
require_once('../inc/footer.php');

?>