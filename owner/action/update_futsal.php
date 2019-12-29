<?php
require_once('./../../core/constants.php');
require_once('./../../core/owner_constants.php');
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


 if(isset($_GET['futsals_id']))
    {   
        if(is_numeric($_GET['futsals_id']))
        {
            $conn = db_get_conn();
            $query = "
                    SELECT
                        futsals_id, fullname,address, mobileno, email,status 
                        FROM tblfutsals 
                        WHERE futsals_id={$_GET['futsals_id']}";
            if($result = $conn->query($query))
            {
                if($result->num_rows == 1)
                { 
                        $futsal = $result->fetch_assoc();
                    ?>
     <div class="content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-danger">Update Futsal</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                    <input type="hidden" name="futsals_id" value="<?php echo $futsals['futsals_id']?>"/> 
                                           
                                            <div class="form-group">
                                                <label>Fullname</label>
                                                <input type="text" class="form-control border-input" 
                                                name="fullname" value="<?php echo $futsal['fullname']?>" placeholder="Fullname" required="required"
                                                autofocus>
                                            </div>
                                              <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" name="address" value="<?php echo $futsal['address']?>"placeholder="Address" required="required">
                                            </div>

                                          <div class="form-group">
                                                <label>Mobile No</label>
                                                <input type="tel" class="form-control border-input" name="mobileno" value="<?php echo $futsal['mobileno']?>"placeholder="Mobileno" required="required">
                                            </div>
                                           
                                    
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input"
                                                name="email" value="<?php echo $futsal['email']?>"  placeholder="Email"
                                                required="required">
                                            </div>
                                                          
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control border-input">
                                                  <option value="Active">Active</option>
                                                  <option value="Not Active">Not Active</option>
                                                </select>
                                            </div>

                                     <div class="text-center">
                                        <button type="submit" class="btn btn-danger" name="update_futsal">Update</button>
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