<?php

    // Session init method call
    session_start();

    // Legal url constant
    define('LEGAL_URL', TRUE);

    // Project folder root
    // Site url. example: localhost/fms/
    // Document root. example: C:/xampp/htdocs/fms/
    // Administration panel url. Example: localhost/fms/admin/
    define('ROOT_FOLDER', '/fms/');
    define('SITE_URL', $_SERVER['HTTP_HOST'].'/fms/');
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/fms/');
    // define('ADMIN_URL', ROOT_FOLDER.'admin/');
    define('ADMIN_URL', '/fms/admin/');
    // define('LOGIN_PAGE', ROOT_FOLDER.'login.php');
    define('LOGIN_PAGE', '/fms/login.php');
    define('LOGOUT_PAGE','/fms/logout.php');
    define('INDEX_PAGE','/fms/index.php');
    define('REGISTER_PAGE','/fms/register.php');

    define('ABOUT_PAGE', '/fms/info/about.php');
    define('BLOG_PAGE', '/fms/info/blog.php');
    define('CONTACT_PAGE', '/fms/info/contact.php');
    define('FAQ_PAGE', '/fms/info/faq.php');
    define('FEEDBACK_PAGE', '/fms/info/feedback.php');
    define('GALLERY_PAGE', '/fms/info/gallery.php');
    define('MAPS_PAGE', '/fms/info/maps.php');
    define('PRIVACY_PAGE', '/fms/info/privacy.php');
    define('TEAM_PAGE', '/fms/info/team.php');

    // Assets folder url. example: localhost/fms/assets/
    // CSS folder url. example: localhost/fms/assets/css/
    // Fonts folder url. example: localhost/fms/assets/fonts/
    // Image folder url. example: localhost/fms/assets/img/
    // Javascript folder url. example: localhost/fms/assets/
    define('ASSETS_URL', '/fms/assets/');
    define('CSS_URL', ASSETS_URL.'css/');
    define('FONTS_URL', ASSETS_URL.'fonts/');
    define('IMG_URL', ASSETS_URL.'img/');
    define('FACES_IMG', IMG_URL.'faces/');
    define('JS_URL', ASSETS_URL.'js/');
    

    // DB connection variables
    // DB_HOST: MySQL Host name example 'localhost'
    // DB_USER: MySQL User name example 'root'
    // DB_PASS: MySQL Password example ''
    // DB_NAME: MySQL DB name example 'fms'
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'futsal');

    define('CORE_FUNCTIONS', DOCUMENT_ROOT.'/core/functions.php');
    define('CORE_ACTION', '/fms/core/action.php');
?>