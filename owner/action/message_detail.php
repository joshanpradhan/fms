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
                                <h2 class="title">Messages List <a href="<?php echo CREATE_MESSAGE_PAGE?>" class="btn btn-success">CREATE
                                    </a></h2>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        
                                        <th><i class="fas fa-list-ol">ID</i></th>
                                      
                                        <th><i class="fas fa-users text-primary">Name</i></th>
                                        <th><i class="fas fa-envelope text-info">Email</i></th>
                                        <th><i class="fas fa-clipboard text-success">Subject</i></th>
                                       
                                        <th><i class="fas fa-comments text-info">Messages</i></th>
                                       
                                        <th><i class="fas fa-user-circle text-info">Role</i></th>
                                        <th><i class="fas fa-info-circle text-danger">Action</i></th>
                                    </thead>
                                <tbody>
            <?php
                $conn = db_get_conn();
                $query = "
                    SELECT
                        tblmessages.messages_id, tblmessages.email,tblmessages.subject,tblmessages.message,tblmessages.users_id,tblmessages.roles_id,tblusers.fullname,tblroles.role
                        FROM tblmessages 
                        JOIN tblusers
                        ON tblmessages.users_id=tblusers.users_id
                        JOIN tblroles
                        ON tblmessages.roles_id=tblroles.roles_id";
           
                if ($result = $conn->query($query)){
                    $count = 1;
                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()){
                                    
                               
                                echo   "<tr>
                                        <td>{$count}</td>
                                        <td>{$row['fullname']}</td> 
                                        <td>{$row['email']}</td>
                                        <td>{$row['subject']}</td>
                                        <td>{$row['message']}</td>
                                        <td>{$row['role']}</td>

                                        <td>
                                            
                                            <a href='delete_message.php?messages_id={$row['messages_id']}'><i class='fas fa-trash text-danger h5'></i></a>
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