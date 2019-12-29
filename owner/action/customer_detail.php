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
                                <h2 class="title">Customers List<a href="<?php echo CREATE_CUSTOMER_PAGE?>" class="btn btn-danger">Add Customer Users
                                </a></h2>
                            </div>
                               
                          
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        
                                           <th><i class="fas fa-list-ol">ID</i></th>
                                        <th><i class="fas fa-user text-primary">Fullname</i></th>
                                        <th><i class="fas fa-envelope text-info">Email</i></th>
                                        <th><i class="fas fa-phone-volume text-success">Mobile</i></th>
                                        
                                        <th><i class="fas fa-map-marker-alt text-danger">Address</i></th> 
                                        <th><i class="fas fa-notes-medical text-warning">Registration</i></th> 
                                        <th><i class="fas fa-exclamation-triangle text-danger">Action</i></th>

                                    </thead>
                                <tbody>
            <?php
                $conn = db_get_conn();
                $query = "
                    SELECT
                users_id, fullname, email,mobileno,address, password,img, reg_date
                FROM tblusers 
                WHERE roles_id= '3'";

                    if ($result = $conn->query($query)){
                    $count = 1;
                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()){
                                 
                          
                                echo   "<tr>
                                        <td>{$count}</td>
                                        <td>{$row['fullname']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['mobileno']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['reg_date']}</td>
                                        <td>
                                        <a href='update_customer.php?users_id={$row['users_id']}'><i class='fas fa-user-edit text-warning h5'></i></a>
                                        <a href='delete_customer.php?users_id={$row['users_id']}'><i class='fas fa-trash text-danger h5'></i></a>
                                         </td>
                                        </tr>
                                        ";
                                     $count++;
                            
                                
                            }
                        } ?>
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