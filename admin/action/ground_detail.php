<?php
require_once('./../../core/constants.php');
require_once('./../../core/admin_constants.php');

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
                                <h2 class="title">Grounds List  <a href="<?php echo CREATE_GROUND_PAGE?>" class="btn btn-success">Add Ground
                                    </a></h2>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>

                                       
                                        <th><i class="fas fa-list-ol">ID</i></th>
                                        <th><i class="fas fa-futbol text-success">Futsal</i></th>
                                        <th><i class="fas fa-futbol text-success">Ground</i></th>
                                         <th><i class="fas fa-adjust text-success">Status</i></th>
                                         <th><i class="fas fa-money-bill-alt text-primary">Price</i></th>
                                        
                                        <th><i class="fas fa-notes-medical text-warning">Registration</i></th>
                                      
                                        <th><i class="fas fa-info-circle text-danger">Action</i></th>
                                    </thead>
                                <tbody>
            <?php
                $conn = db_get_conn();
                $query = "
                    SELECT
                        tblgrounds.grounds_id,tblfutsals.fullname AS futsalname, tblgrounds.ground,tblgrounds.status,tblgrounds.price,tblgrounds.reg_date
                        FROM tblgrounds JOIN tblfutsals 
                        ON tblgrounds.futsals_id=tblfutsals.futsals_id ";
                           
                if ($result = $conn->query($query)){
                    $count = 1;
                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()){
                                    
                               
                                echo   "<tr>
                                        <td>{$count}</td>  
                                        <td>{$row['futsalname']}</td>
                                        <td>{$row['ground']}</td>
                                        <td>{$row['status']}</td>
                                        <td>{$row['price']}</td>
                                        <td>{$row['reg_date']}</td>
                                         <td>
                                            <a href='update_ground.php?grounds_id={$row['grounds_id']}' ><i class='fas fa-futbol text-success h5'></i></a>
                                            <a href='delete_ground.php?grounds_id={$row['grounds_id']}'><i class='fas fa-trash text-danger h5'></i></a>
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