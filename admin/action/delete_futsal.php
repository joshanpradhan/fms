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

if(isset($_GET['futsals_id']))
    {   
        if(is_numeric($_GET['futsals_id']))
        {
            $conn = db_get_conn();
            $query = "
                    SELECT
                        futsals_id, fullname, email, mobileno, address,status
                        FROM tblfutsals 
                        WHERE futsals_id={$_GET['futsals_id']}";
            if($result = $conn->query($query))
            {
                if($result->num_rows == 1)
                { 
                        $futsals = $result->fetch_assoc();
                    ?>
 
         <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>

                            <div class="content">
                               <div class="content">
                                <div class="author">
                                  <img src="<?php echo FACES_IMG.$futsals['img'];?>" alt="<?php echo $futsals['fullname'];?>"/>
                                  <hr>
                                <h4 class="title"><?php echo $futsals[
                                    'fullname']?><br/>
                                     <span>Futsal</span>
                                  </h4>
                                </div>
                            </div>
                        </div>
                     </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Delete Futsal</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo ADMIN_ACTION?>">
                                     <input type="hidden" name="futsals_id" value="<?php echo $futsals['futsals_id']?>"/> 
                                           
                                            <div class="form-group">
                                                <label>Futsal</label>
                                                <input type="text" class="form-control border-input" placeholder="Username" name="fullname" value="<?php echo $futsals['fullname']?>">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="Email" name="email" value="<?php echo $futsals['email']?>">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Mobile No</label>
                                                <input type="tel" class="form-control border-input" placeholder="Mobileno" name="mobileno" value="<?php echo $futsals['mobileno']?>">
                                            </div>
                                             <div class="form-group">
                                                <label>Status</label>
                                                <input type="tel" class="form-control border-input" placeholder="Mobileno" name="mobileno" value="<?php echo $futsals['status']?>">
                                            </div>
                                   
                                    
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" name="address" value="<?php echo $futsals['address']?>">
                                            </div>
                                    <div class="text-center">

                                         <button type="submit" class="btn btn-danger" name="delete_futsal">Delete Futsal</button>
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