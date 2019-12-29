<?php
require_once('./../../core/constants.php');
require_once('./../../core/customer_constants.php');
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
                                <h2 class="title">Futsals List</h2>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th><i class="fas fa-list-ol">ID</i></th>
                                        <th><i class="fas fa-user text-primary">Fullname</i></th>
                                        <th><i class="fas fa-map-marker-alt text-danger">Address</i></th>
                                        <th><i class="fas fa-phone-volume text-success">Mobile</i></th>
                                        <th><i class="fas fa-envelope text-primary">Email</i></th>
                                        <th><i class="fas fa-adjust text-success">Status</i></th>
                                        <th><i class="fas fa-notes-medical text-warning">Registration</i></th> 
                                        
                                    </thead>
                                <tbody>
            <?php
                $conn = db_get_conn();
                $query = "
                    SELECT
                        futsals_id,fullname,address,mobileno, email,status,reg_date
                        FROM tblfutsals";
                if ($result = $conn->query($query)){
                    $count = 1;
                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()){
                                    
                               
                                echo   "<tr>
                                        <td>{$count}</td>
                                        <td>{$row['fullname']}</td>
                                         <td>{$row['address']}</td>
                                        <td>{$row['mobileno']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['status']}</td>
                                        <td>{$row['reg_date']}</td>
                                        
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