

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">

    
    <!--     Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
     -->

        <div class="sidebar-wrapper">
            <div>
                <h4 style="color:white; text-align:center;"><?php echo $_SESSION['session']['users']['fullname']; ?></h4>
                <h6 style="color:white; text-align:center;"><?php echo $_SESSION['session']['users']['roles']; ?></h6>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo ADMIN_PAGE?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
               
                <li>
                    <a href="<?php echo ADMIN_DETAIL_PAGE?>">
                        <i class='fas fa-users text-danger'></i>              
                        <p>Admin</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo OWNER_DETAIL_PAGE?>">
                       <i class='fas fa-users text-warning'></i>              
                        <p>Owner</p>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo CUSTOMER_DETAIL_PAGE?>">
                       <i class='fas fa-users text-primary'></i>              
                        <p>Customer</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo FUTSAL_DETAIL_PAGE?>">
                       <i class="fas fa-futbol text-success"></i>            
                        <p>Futsal</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo GROUND_DETAIL_PAGE?>">
                         <i class="fas fa-futbol text-success"></i>      
                        <p>Ground</p>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo RESERVATION_DETAIL_PAGE?>">
                      <i class="fas fa-book-open text-info"></i>
                        <p>Reservation</p>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo MESSAGE_DETAIL_PAGE?>">
                        <i class="fas fa-envelope text-muted"></i>
                        <p>Messages</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>

