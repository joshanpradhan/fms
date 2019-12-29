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
                                  <img src="<?php echo FACES_IMG.$users['img'];?>" alt="<?php echo $users['fullname']; ?>" style="height: 200px; width: 200px;"/>
                                  
                                <h4 class="title"><?php echo $users[
                                    'fullname']?><br/>
                                     <span>Admin</span>
                                  </h4>
                                </div>
                            </div>

                    <form method="POST" action="<?php echo ADMIN_ACTION?>" enctype="multipart/form-data">  
                    <input type="file" class="form-control border-input" name="image" required="required">
                    <hr>
                    <button type="submit" class="btn btn-danger" name="upload">Change Profile Picture</button>
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