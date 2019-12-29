<?php
require_once('./../core/constants.php');
require_once('./../core/customer_constants.php');
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
                            </div>
                        </div>
                    </div>


                             <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            
                                            <i class="fas fa-futbol text-primary"></i>
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
                            </div>
                        </div>
                    </div>
                    



                     <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            
                                            <i class="fas fa-futbol text-primary"></i>
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