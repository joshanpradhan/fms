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

if(isset($_GET['grounds_id']))
    {   
        if(is_numeric($_GET['grounds_id']))
        {
            $conn = db_get_conn();
            $query = "
                    SELECT
                        grounds_id,ground,price,status
                        FROM tblgrounds 
                        WHERE grounds_id={$_GET['grounds_id']}";
            if($result = $conn->query($query))
            {
                if($result->num_rows == 1)
                { 
                        $grounds = $result->fetch_assoc();
                    ?>
 
         <div class="content">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Update Ground</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                     <input type="hidden" name="grounds_id" value="<?php echo $grounds['grounds_id']?>"/> 
                                           
                                            <div class="form-group">
                                                <label>Ground</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" name="ground" value="<?php echo $grounds['ground']?>">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" class="form-control border-input" placeholder="Email" name="price" value="<?php echo $grounds['price']?>">
                                            </div>
                                        
                                           
                                             <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control border-input" placeholder="Mobileno" name="status" value="<?php echo $grounds['status']?>">
                                            </div>
                                   
                                    
                                           
                                    <div class="text-center">

                                         <button type="submit" class="btn btn-danger" name="update_ground">Update Ground</button>
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