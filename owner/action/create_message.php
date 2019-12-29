<?php
require_once('./../../core/constants.php');
require_once('./../../core/owner_constants.php');
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

$query ="   
    SELECT users_id,email,roles_id
    FROM tblusers 
    WHERE users_id=$users_id";
if($result = $conn->query($query))
{
    if($result->num_rows >= 1)
    {
         while($users = $result->fetch_assoc()){


?>
     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-danger">Create new message for owners users.</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo OWNER_ACTION?>">

                                           <div class="form-group">  
                                              <input type="hidden" name="users_id" 
                                              value="<?php echo $users['users_id'];?>">
                                            </div>
                                            <div class="form-group">  
                                              <input type="hidden" name="roles_id" 
                                              value="<?php echo $users['roles_id'];?>">
                                            </div>
                                           <div class="form-group">
                                              <label for="exampleFormControlInput1">Email address</label>
                                              <input type="email" class="form-control border-input" name="email" value="<?php echo $users['email'];?>" readonly>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleFormControlSelect1">Subject</label>
                                              <input type="text" class="form-control border-input" id="exampleFormControlInput1" placeholder="Subject" name="subject">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleFormControlTextarea1">Message</label>
                                              <textarea class="form-control border-input" id="exampleFormControlTextarea1" rows="6" placeholder="Your message" name="message"></textarea> 
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-danger" name="create_messages">Send</button>
                                             </div>
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
   ?> 
<!--     main panel

 --><?php
require_once('../inc/footer.php');

?>