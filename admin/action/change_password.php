<?php
require_once('./../../core/constants.php');
require_once('./../../core/admin_constants.php');
require_once('./../../core/functions.php');

if(!isAuthenticated())
{
    header('Location: ' . LOGIN_PAGE);
}



$users_id = $_SESSION['session']['users']['users_id'];
$conn = db_get_conn();

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
require_once('../inc/navigation.php');
display_flash();

$query = "
            SELECT
                users_id,fullname,email, mobileno,address,roles_id
                FROM tblusers 
                WHERE users_id={$users_id}
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
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-danger">Change Password</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <input type="password" class="form-control border-input" 
                                                name="currentpassword" placeholder="Current Password" required="required"
                                                autofocus>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control border-input"
                                                name="newpassword"  placeholder="New Password"
                                                required="required">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control border-input" name="confirmpassword" placeholder="Confirm Password" required="required">
                                            </div>
                                        
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger" name="change_password">Change</button>
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