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
$query ="   
    SELECT futsals_id,fullname,address, mobileno,email,status,reg_date 
    FROM tblfutsals";
if($result = $conn->query($query))
{
    if($result->num_rows >= 1)
    {
  
?>
     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-danger">Add New Ground</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                            
                                            <div class="form-group">
                                                <label>Futsal</label>
                                                <select name="futsals_id" class="form-control border-input">
                                                  <?php
                                            while($futsals = $result->fetch_assoc())
                                            {
                                                 echo "<option value=".$futsals['futsals_id'].">".$futsals['fullname']."</option>";
                                            }
                                        ?>
                                                </select>
                                            </div>
                                           <div class="form-group">
                                                <label>Ground</label>
                                                <select name="ground" class="form-control border-input">
                                                  <option value="Ground - A">Ground-A</option>
                                                  <option value="Ground - B">Ground-B</option>
                                                  <option value="Ground - C">Ground-C</option>
                                                  <option value="Ground - D">Ground-D</option>
                                                  <option value="Ground - E">Ground-E</option>
                                                
                                                </select>
                                            </div>
                                              
                                          <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" class="form-control border-input" name="price" placeholder="Price" required="required">
                                            </div>
                                           
                                    
                                           
                                          
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control border-input">
                                                  <option value="Available">Available</option>
                                                  <option value="Not Available">Not Available</option>
                                                </select>
                                            </div>
                                            
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger" name="create_ground">Add Ground</button>
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