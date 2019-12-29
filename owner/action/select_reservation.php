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
 
                $conn = db_get_conn();
                $query ="   
                        SELECT futsals_id,fullname,address, mobileno,email,status,reg_date 
                        FROM tblfutsals";
                if($result = $conn->query($query)){
                    
                       

?>
     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-danger">Select Reservation</h4>
                            </div>
                            <div class="content">
                                <form method="GET" action="create_reservation.php">
                                   
                                            <div class="form-group">
                                                <label>Futsal Name</label>
                                                <select name="reservations_id"  class="form-control border-input">
                                            <?php
                                            while($futsals = $result->fetch_assoc())
                                            {
                                                 echo "<option value=".$futsals['futsals_id'].">".$futsals['fullname']."</option>";
                                            }
                                        ?>
                                        </select>
                                            </div> 
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-danger">Select</button>
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

?>
   
<!--     main panel

 --><?php
require_once('../inc/footer.php');

?>