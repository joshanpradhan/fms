<?php
    if(!defined('LEGAL_URL'))
    {
        die("Direct file access is diabled.");
    }
?>	

<nav class="navbar shadow-sm navbar-expand-lg bg-white position-sticky fixed-top">
    <a class="navbar-brand ml-5" href="<?php echo INDEX_PAGE?>"><i class="fas fa-futbol text-secondary">Hamrofutsal</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <i class="fas fa-bars text-secondary"></i>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-secondary" href="<?php echo BLOG_PAGE?>">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="<?php echo GALLERY_PAGE?>">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="<?php echo MAPS_PAGE?>">Maps</a>
            </li>
            <li class="nav-item">
                <form class="form-inline">
                    <input class="form-control mr-sm-1"placeholder="Search" aria-label="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </li>
        </ul>
        <a class="btn btn-outline-secondary mr-5 my-2 my-sm-0" href="<?PHP echo LOGIN_PAGE ?>" role="button">Login</a>
        
        </div>
</nav>