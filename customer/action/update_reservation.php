<?php
require_once('./../../core/constants.php');
require_once('./../../core/customer_constants.php');
require_once('./../../core/functions.php');


    if(!isAuthenticated())
    {
        header('Location: ' . LOGIN_PAGE);
    }
   
    /*
        For multiple role check use OR operation
            if(!isAuthorized('admin') || !isAuthorized('some-role'))
            {
                header('Location: ' . ADMIN_URL);
            }
    */

    
    require_once('../inc/header.php');
    require_once('../inc/sidebar.php');
    require_once('../inc/navigation.php');

    display_flash();
    if(isset($_GET['reservations_id']))
    {   
        if(is_numeric($_GET['reservations_id']))
        {

                $conn = db_get_conn();
                $query = 
                        " SELECT
                           tblusers.fullname AS customername,tblfutsals.fullname AS futsalname,tblgrounds.ground AS groundname, tblreservations.request_date,tblreservations.request_time, tblreservations.reg_date,tblgrounds.price, tblreservations.reservations_id
                        FROM tblreservations 

                        JOIN tblfutsals
                        ON  tblreservations.futsals_id=tblfutsals.futsals_id
                           

                        JOIN tblusers
                        ON  tblreservations.users_id=tblusers.users_id 

                        JOIN tblgrounds
                        ON  tblreservations.grounds_id=tblgrounds.grounds_id
                        WHERE tblreservations.reservations_id={$_GET['reservations_id']}";
                          
                               
                if ($result = $conn->query($query)){
                    
                    /* fetch associative array */
                    if($row = $result->fetch_assoc()){
                                 
                            
            ?> 
         <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Update Reservation</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo CUSTOMER_ACTION?>">
                                     
                                            <div class="form-group">
                                                <input type="hidden" class="form-control border-input" name="reservations_id" value="<?php echo $row['reservations_id']?>">
                                            </div>
                                          
                                            <div class="form-group">
                                                <label>Customer</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['customername']?>" name="">
                                            </div>
                                        
                                             <div class="form-group">
                                                <label>Futsal Name</label>
                                                <select name="reservations_id"  class="form-control border-input">
                                            <?php
                                             $query ="   
                                                        SELECT futsals_id,fullname,address, mobileno,email,status,reg_date 
                                                        FROM tblfutsals";
                                            while($futsals = $result->fetch_assoc())
                                            {
                                                 echo "<option value=".$futsals['futsals_id'].">".$futsals['fullname']."</option>";
                                            }
                                        ?>
                                        </select>
                                            </div> 
                                        
                                            <div class="form-group">
                                                <label>Ground</label>
                                                 <select name="grounds_id" class="form-control border-input">
                                                  <?php
                                                  $sql = "
                                                     SELECT
                                                    tblgrounds.grounds_id,tblgrounds.ground,tblgrounds.price,tblgrounds.status,tblgrounds.futsals_id,tblfutsals.futsals_id
                                                    FROM tblgrounds JOIN tblfutsals
                                                    WHERE tblgrounds.futsals_id=tblfutsals.futsals_id
                                                    AND tblfutsals.futsals_id = $futsals_id";
                                                   if ($result = $conn->query($sql)){
                                                while($ground = $result->fetch_assoc())
                                            {
                                                 echo "<option value=".$ground['grounds_id'].">".$ground['ground']."</option>";
                                            }
                                        }
                                        ?>       </select>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Request Date</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['request_date']?>" name="request_date">
                                            </div>
                                            <div class="form-group">
                                                <label>Request Time</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['request_time']?>" name="request_time">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="num" class="form-control border-input" value="<?php echo $row['price']?>" name="price">
                                            </div>
                                    <div class="text-center">

                                         <button type="submit" class="btn btn-danger" name="delete_reservation">Delete</button>
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
}
}
?>
<!--     main panel

 --><?php
require_once('../inc/footer.php');

?>