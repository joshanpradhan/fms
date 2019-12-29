<?php
require_once('./../../core/constants.php');
require_once('./../../core/owner_constants.php');
require_once('./../../core/functions.php');
if(!isAuthenticated())
{
    header('Location: '.LOGIN_PAGE);
}

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
require_once('../inc/navigation.php');
 display_flash();
?>



 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="title">Reservation List<a href="<?php echo SELECT_RESERVATION_PAGE?>" class="btn btn-success">Add Reservation
                                    </a></h2>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>

                                       
                                        <th><i class="fas fa-users text-primary">Customer</i></th>
                                        <th><i class="fas fa-futbol text-success">Futsal</i></th>
                                         <th><i class="fas fa-adjust text-success">Ground</i></th>
                                         <th><i class="fas fa-money-bill-alt text-primary">Date</i></th>
                                        
                                        <th><i class="fas fa-clock text-primary">Time</i></th>
                                       <th><i class="fas fa-notes-medical text-warning">Registration</i></th>
                                       <th><i class="fas fa-money-bill-alt text-primary">Price</i></th>
                                      
                                        <th><i class="fas fa-info-circle text-danger">Action</i></th>

                                    </thead>
                                <tbody>
            <?php
                $conn = db_get_conn();
                $query = 
                        "SELECT
                           tblusers.fullname AS customername,tblfutsals.fullname AS futsalname,tblgrounds.ground AS groundname, tblreservations.request_date,tblreservations.request_time, tblreservations.reg_date,tblgrounds.price, tblreservations.reservations_id
                        FROM tblreservations 

                        JOIN tblfutsals
                        ON  tblreservations.futsals_id=tblfutsals.futsals_id
                           

                        JOIN tblusers
                        ON  tblreservations.users_id=tblusers.users_id 

                        JOIN tblgrounds
                        ON  tblreservations.grounds_id=tblgrounds.grounds_id ";
                          
                               
                if ($result = $conn->query($query)){
                    $count = 1;
                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()){
                                    
                               
                                echo   "<tr>
                                        <td>{$row['customername']}</td>  
                                        <td>{$row['futsalname']}</td>
                                        <td>{$row['groundname']}</td>
                                        <td>{$row['request_date']}</td>
                                        <td>{$row['request_time']}</td>
                                        <td>{$row['reg_date']}</td>
                                        <td>{$row['price']}</td>
                                         <td>
                                            <a href='update_reservation.php?reservations_id={$row['reservations_id']}'><i class='fas fa-futbol text-success h5'></i></a>
                                            <a href='delete_reservation.php?reservations_id={$row['reservations_id']}'><i class='fas fa-trash text-danger h5'></i></a>
                                        </td>
                                        </tr>
                                        ";
                                     $count++;
                            }
                                
                        }
                        ?>
                                </tbody>

                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- main panel --> 

<?php
require_once('./../inc/footer.php');
?>