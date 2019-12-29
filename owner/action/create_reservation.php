<?php
require_once('./../../core/constants.php');
require_once('./../../core/owner_constants.php');
require_once('./../../core/functions.php');
if(!isAuthenticated())
{
    header('Location: ' . LOGIN_PAGE);
}



$users_id = $_SESSION['session']['users']['users_id'];
$fullname = $_SESSION['session']['users']['fullname'];
$conn = db_get_conn();

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
require_once('../inc/navigation.php');
display_flash();
 

                if(!isset($_GET['reservations_id']))
                {
                    set_flash('danger', 'Error!', 'Unidentified futsal! Please make sure futsal is identified.');
                    display_flash();
                    die();
                }
                $futsals_id = $_GET['reservations_id'];
                $conn = db_get_conn();
                $query = "
                         SELECT
                        tblgrounds.grounds_id,tblgrounds.ground,tblgrounds.price,tblgrounds.status,tblgrounds.futsals_id,tblfutsals.futsals_id
                        FROM tblgrounds JOIN tblfutsals
                        WHERE tblgrounds.futsals_id=tblfutsals.futsals_id
                        AND tblfutsals.futsals_id = $futsals_id";
                        
                if($result = $conn->query($query)){

                    while($row = $result->fetch_assoc()){


                        
                      /* fetch associative array */
                  

?>
     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-danger">Create Reservation</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo OWNER_ACTION ?>">
                                    
                                            <div class="form-group">
                                                <input type="hidden" class="form-control border-input" 
                                                 name="users_id" value="<?php echo $users_id;?>">
                                            </div>
                                            <div class="form-group">
                                                
                                                <input type="hidden" class="form-control border-input" 
                                                 name="futsals_id" value="<?php echo $futsals_id;?>">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control border-input" 
                                                 value="<?php echo $fullname;?>" readonly="readonly">
                                            </div>

                                            <div class="form-group">
                                                <label>Ground</label>
                                                 <select name="grounds_id" class="form-control border-input">
                                                  <?php
                                                   if ($result = $conn->query($query)){
                                                while($ground = $result->fetch_assoc())
                                            {
                                                 echo "<option value=".$ground['grounds_id'].">".$ground['ground']."</option>";
                                            }
                                        }
                                        ?>       </select>
                                            </div>
                                             
                                            <div class="form-group">
                                                <label>Request Date</label>
                                                <input type="date" class="form-control border-input" name="request_date" placeholder="Date" required="required">
                                            </div>
                                           
                                    
                                            <div class="form-group">
                                                <label>Request Time</label>
                                                <input type="time" class="form-control border-input" name="request_time" placeholder="Time" required="required">
                                            </div>
                                         
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger" name="create_reservation">Create</button>
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