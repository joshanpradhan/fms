<?php
require_once('./../../core/constants.php');
require_once('./../../core/admin_constants.php');

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
                                <h4 class="title"> Delete Reservation</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                     
                                            <div class="form-group">
                                                <input type="hidden" class="form-control border-input" name="reservations_id" value="<?php echo $row['reservations_id']?>">
                                            </div>
                                          
                                            <div class="form-group">
                                                <label>Customer</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['customername']?>" readonly="readonly">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Futsal</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['futsalname']?>" readonly="readonly">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Ground</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['groundname']?>" readonly="readonly">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Resquest Date</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['request_date']?>" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label>Resquest Time</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['request_time']?>" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label>Registration</label>
                                                <input type="text" class="form-control border-input"  value="<?php echo $row['reg_date']?>" readonly="readonly">
                                            </div>
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="num" class="form-control border-input" value="<?php echo $row['price']?>" readonly="readonly">
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