<?php
require_once('./../core/constants.php');
require_once('./../core/owner_constants.php');
require_once('./../core/functions.php');
if(!isAuthenticated())
{
    header('Location: '.LOGIN_PAGE);
}
require_once('inc/header.php');
require_once('inc/sidebar.php');
require_once('inc/navigation.php');

display_flash();


?>



 <div class="content">
            <div class="container-fluid">
            	
                <div class="row">


                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big  text-center">
                                            <i class='fas fa-users text-warning'></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                             
                                            <p>Owner</p>
                                           <?php
                                                    $conn = db_get_conn();
                                                    $query = "
                                                        SELECT
                                                    users_id, fullname, email,mobileno,address, password,img, reg_date
                                                    FROM tblusers 
                                                    WHERE roles_id= '2'";

                                                        if ($result = $conn->query($query)){
                                                        $count = 0;
                                                        /* fetch associative array */
                                                        while ($row = $result->fetch_assoc()){
                                                            $count++;}}
                                                            echo $count?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <a href="<?php echo OWNER_DETAIL_PAGE?>" class="btn btn-warning">View Owner 
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                           <i class='fas fa-users text-primary'></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Customer</p>
                                            
                                            <?php
                                                    $conn = db_get_conn();
                                                    $query = "
                                                        SELECT
                                                    users_id, fullname, email,mobileno,address, password,img, reg_date
                                                    FROM tblusers 
                                                    WHERE roles_id= '3'";

                                                        if ($result = $conn->query($query)){
                                                        $count = 0;
                                                        /* fetch associative array */
                                                        while ($row = $result->fetch_assoc()){
                                                            $count++;}}
                                                            echo $count?>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <a href="<?php echo CREATE_CUSTOMER_PAGE?>" class="btn btn-primary">Add Customer 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                       <div class="icon-big icon-success text-center">
                                            <i class="fas fa-futbol text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Futsal</p>
                                           <?php
                                                    $conn = db_get_conn();
                                                    $query = "
                                                        SELECT
                                                    futsals_id, fullname, email,mobileno,address
                                                    FROM tblfutsals";
                                                    

                                                        if ($result = $conn->query($query)){
                                                        $count = 0;
                                                        /* fetch associative array */
                                                        while ($row = $result->fetch_assoc()){
                                                            $count++;}}
                                                            echo $count?>


                                        </div>
                                    </div>
                                </div>
                                 <div class="footer">
                                    <hr />
                                    <a href="<?php echo FUTSAL_DETAIL_PAGE?>" class="btn btn-success">View Futsal  
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>




                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            
                                            <i class="fas fa-futbol text-info"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Ground</p>
                                            
                                            <?php
                                                    $conn = db_get_conn();
                                                    $query = "
                                                        SELECT
                                                    grounds_id, ground, price, status
                                                    FROM tblgrounds ";
                                                    

                                                        if ($result = $conn->query($query)){
                                                        $count = 0;
                                                        /* fetch associative array */
                                                        while ($row = $result->fetch_assoc()){
                                                            $count++;}}
                                                            echo $count?>
                                        </div>
                                    </div>
                                </div>
                                 <div class="footer">
                                    <hr />
                                    <a href="<?php echo GROUND_DETAIL_PAGE?>" class="btn btn-info">View Ground  
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                 

                </div>
       		 </div>
      </div>
    </div> <!-- main panel --> 

<?php
require_once('inc/footer.php');
?>