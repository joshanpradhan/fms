<?php

require_once('constants.php');
/*
        $conn = db_get_conn();
        $query = "query goes here";
        $result = $conn->query($query);
        $row = $res->fetch_assoc();
        echo $row['_msg'];
    */
function db_get_conn(){
    $conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if($conn->connect_error){
        echo "Failed to Create Connection" .$mysqli->connect_error;
        die();
    }
    return $conn;
}

function setSession($detail){
    $session = array(
        'loggedin' => true,
        'users' => [
            'users_id' => $detail['users_id'],
            'fullname' => $detail['fullname'],
            'email' => $detail['email'],          
            'mobileno' => $detail['mobileno'],
            'roles' => $detail['role'],
            'img' => $detail['img']
        ],

         'futsals' => [
            'futsals_id' => $detail['futsals_id'],
            'fullname' => $detail['fullname'],
            'address' => $detail['address'],
            'mobileno' => $detail['mobileno'],
            'email' => $detail['email'],          
            'status' => $detail['status'],
            'reg_date' => $detail['reg_date'], 
        ],

        'grounds' => [
            'grounds_id' => $detail['grounds_id'],
            'ground' => $detail['ground'],
            'price' => $detail['address'],
            'status' => $detail['mobileno'],
            'reg_date' => $detail['email'],              
        ]
    );
    $_SESSION['session'] = $session;
}

function isAuthenticated(){
    if(isset($_SESSION['session']['loggedin']) && $_SESSION['session']['loggedin']==true){
        return true;
    }
    return false;
}

function isAuthorized($slug)
    {
        if(isset($_SESSION['session']['loggedin']) && $_SESSION['session']['user']['slug'] == $slug)
        {
            return true;
        }
        return false;
    }

 
function unsetSession(){
    $_SESSION['session']='';
    header('Location:'.ROOT_FOLDER.'login.php');
}

function dd($param)
{
    print_r($param);
    exit();
}

    
    // Session based flash message structure
    // A flash message consists of 3 different attributes
    // 1. type: message type. success, warning, info, danger

function set_flash($type, $title, $body)
    {
        $flashtypes = array('success', 'warning', 'info', 'danger');

        if(in_array($type, $flashtypes))
        {
            $_SESSION['flash']['hasmessage'] = true;
            $_SESSION['flash']['type'] = $type;
            $_SESSION['flash']['title'] = $title;
            $_SESSION['flash']['body'] = $body;
        }
        else
        {
            echo "Message type error";
        }
    }

    function unset_flash()
    {
        if($_SESSION['flash']['hasmessage'])
        {
            $_SESSION['flash']['hasmessage'] = false;
            $_SESSION['flash']['type'] = '';
            $_SESSION['flash']['title'] = '';
            $_SESSION['flash']['body'] = '';
        }
    }

    function display_flash()
    {
        if(isset($_SESSION['flash']))
        {
            if($_SESSION['flash']['hasmessage'])
            {
                // echo $_SESSION['flash']['type']."<br>";
                // echo $_SESSION['flash']['title']."<br>";
                // echo $_SESSION['flash']['body'];
                
                $type= 'alert-'.$_SESSION['flash']['type'];
                $title= $_SESSION['flash']['title'];
                $body= $_SESSION['flash']['body'];
                ?>
                <div class="row justify-content-center">
                      <div class="col rounded p-2">
                        <?php 
                        echo'<h5 class="alert '.$type.'">'.$body.'</h5>';
                        ?>
                    </div>
                </div>
                <?php
                unset_flash();
            }
        }
    }
?>