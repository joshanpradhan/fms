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

if(isset($_GET['messages_id']))
    {   
        if(is_numeric($_GET['messages_id']))
        {
            $conn = db_get_conn();
            $query = "
                    


                         SELECT
                        tblmessages.messages_id, tblmessages.email,tblmessages.subject,tblmessages.message,tblmessages.roles_id,tblusers.fullname
                        FROM tblmessages 

                        JOIN tblusers
                        ON tblmessages.messages_id={$_GET['messages_id']}
                        AND tblmessages.users_id=tblusers.users_id";
            if($result = $conn->query($query))
            {
                if($result->num_rows >= 1)
                { 
                        $messages = $result->fetch_assoc();
                        // dd($messages);
                    ?>
 
         <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Delete Messages</h4>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo OWNER_ACTION?>">
                                     <input type="hidden" name="messages_id" value="<?php echo $messages['messages_id']?>"/> 


                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control border-input"  name="name" value="<?php echo $messages['fullname']?>" readonly="readonly">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control border-input" name="email" value="<?php echo $messages['email']?>" readonly="readonly">
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control border-input"  name="subject" value="<?php echo $messages['subject']?>" readonly="readonly">
                                            </div>
                                        
                                           
                                             <div class="form-group">
                                              <label for="exampleFormControlTextarea1">Message</label>
                                              <textarea class="form-control border-input" id="exampleFormControlTextarea1" rows="6" name="message" readonly="readonly"><?php echo $messages['message']; ?></textarea> 
                                                </div>
                                            </div>
                                   
                                    
                                           
                                    <div class="text-center">

                                         <button type="submit" class="btn btn-danger" name="delete_message">Delete Message</button>
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