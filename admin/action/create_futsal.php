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

?>
     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-danger">Add New Futsal</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                    
                                            <div class="form-group">
                                                <label>Futsal name</label>
                                                <input type="text" class="form-control border-input" 
                                                name="futsalname" placeholder="Fullname" required="required"
                                                autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label>Select Owner</label>
                                                 <select name="users_id" class="form-control border-input">
                                                  <?php
                                                  $query="SELECT users_id,fullname,roles_id 
                                                  FROM tblusers WHERE roles_id=2";
                                                   if ($result = $conn->query($query)){
                                                while($users = $result->fetch_assoc())
                                            {
                                                 echo "<option value=".$ground['users_id'].">".$users['fullname']."</option>";
                                            }
                                        }
                                        ?>       </select>
                                            </div>
                                              <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" name="address" placeholder="Address" required="required">
                                            </div>

                                          <div class="form-group">
                                                <label>Mobile No</label>
                                                <input type="tel" class="form-control border-input" name="mobileno" placeholder="Mobileno" required="required">
                                            </div>
                                           
                                    
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input"
                                                name="email"  placeholder="Email"
                                                required="required">
                                            </div>
                                                          
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control border-input">
                                                  <option value="Active">Active</option>
                                                  <option value="Not Active">Not Active</option>
                                                </select>
                                            </div>
                                            
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger" name="create_futsal">Add Futsal</button>
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
   
<!--     main panel

 --><?php
require_once('../inc/footer.php');

?>