<div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo OWNER_PAGE?>"><?php echo $_SESSION['session']['users']['roles']; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    
                                    <p><i class="fas fa-user-cog"></i><?php echo $_SESSION['session']['users']['fullname'];?></p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo OWNER_CHANGE_PASSWORD_PAGE?>">Change Password</a></li>
                                <li><a href="<?php echo OWNER_PROFILE_PAGE?>">Profile</a></li>
                                <li>
                                <a href="<?php echo LOGOUT_PAGE?>">
                                <p>Log Out</p>
                                 </a>
                                 </li>     
                        </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
