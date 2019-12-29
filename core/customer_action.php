<?php
require_once('constants.php');
require_once('customer_constants.php');
require_once('functions.php');

$errors='';

//create reservation by customer
if(isset($_POST['create_reservation'])){
  
 
    $conn= db_get_conn();
    $request_date = $_POST['request_date'];
    $request_time = $_POST['request_time'];
    
    
    
   // Check for a proper Fullname

  if (!empty($_POST['users_id'])) {
  $users_id = $_POST['users_id'];
  $pattern = "/^[0-9\_]{1,}/";// This is a regular expression that checks if the number is valid characters
    if (preg_match($pattern,$users_id)){
       $users_id = $_POST['users_id'];


      }
       else{ 
        $errors .= "Invalid"."<br/>";
       //array_push($errors, "Your Name can only contain A-Z or a-z");
      }
  } else {
    $errors .= "Users_id is Required<br/>";
    //array_push($errors, "Fullname is Required");
  }

  if (!empty($_POST['futsals_id'])) {
  $futsals_id = $_POST['futsals_id'];
  $pattern = "/^[0-9\_]{1,}/";// This is a regular expression that checks if the number is valid characters
    if (preg_match($pattern,$futsals_id)){
       $futsals_id = $_POST['futsals_id'];


      }
       else{ 
        $errors .= "Invalid"."<br/>";
       //array_push($errors, "Your Name can only contain A-Z or a-z");
      }
  } else {
    $errors .= "Fullname name is Required<br/>";
    //array_push($errors, "Fullname is Required");
  }

if (!empty($_POST['grounds_id'])) {
  $grounds_id = $_POST['grounds_id'];
  $pattern = "/^[0-9\_]{1,}/";// This is a regular expression that checks if the number is valid characters
    if (preg_match($pattern,$grounds_id)){
       $grounds_id = $_POST['grounds_id'];


      }
       else{ 
        $errors .= "Invalid"."<br/>";
       //array_push($errors, "Your Name can only contain A-Z or a-z");
      }
  } else {
    $errors .= "Ground ID is Required<br/>";
    //array_push($errors, "Fullname is Required");
  }

 
  

 
      if(trim($errors) != ''){
          set_flash('danger', 'danger', $errors);
           header('Location:'.$_SERVER['HTTP_REFERER']);
        }

        if(trim($errors) == ''){
         //encrypt the password before saving in the database
           
            $query = "INSERT INTO tblreservations (request_date,request_time,reg_date,users_id,futsals_id,grounds_id) 
                      VALUES('$request_date','$request_time',
                      CURRENT_TIMESTAMP,'$users_id','$futsals_id','$grounds_id')";
                     
                if(mysqli_query($conn, $query)){
                  set_flash('success', 'Success', 'New reservation created successfully.');
                   header('Location:'.RESERVATION_DETAIL_PAGE);
                }else{
                     set_flash('danger', 'danger', $errors);
                     header('Location:'.$_SERVER['HTTP_REFERER']);
                }
        }
}




//create Messages by owner
if(isset($_POST['create_messages'])){
  
 
    $conn= db_get_conn();

   // Check for a proper Fullname

  if (!empty($_POST['users_id'])) {
  $users_id = $_POST['users_id'];
  $pattern = "/^[0-9\_]{1,}/";// This is a regular expression that checks if the number is valid characters
    if (preg_match($pattern,$users_id)){
       $users_id = $_POST['users_id'];
      }
       else{ 
        $errors .= "Invalid"."<br/>";
       //array_push($errors, "Your Name can only contain A-Z or a-z");
      }
  } else {
    $errors .= "Users_id is Required<br/>";
    //array_push($errors, "Fullname is Required");
  }
  if (!empty($_POST['roles_id'])) {
  $roles_id = $_POST['roles_id'];
  $pattern = "/^[0-9\_]{1,}/";// This is a regular expression that checks if the number is valid characters
    if (preg_match($pattern,$roles_id)){
       $roles_id = $_POST['roles_id'];
      }
       else{ 
        $errors .= "Invalid"."<br/>";
       //array_push($errors, "Your Name can only contain A-Z or a-z");
      }
  } else {
    $errors .= "roles_id is Required<br/>";
    //array_push($errors, "Fullname is Required");
  }

   // Check for a proper email

  if (!empty($_POST['email'])) {
  $email = $_POST['email'];
  $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";// This is a regular expression that checks if the email is valid characters
      if (preg_match($pattern,$email)){
       $email = $_POST['email'];
       
      }
       else{ 
         $errors .= "Your email can only contain valid characters<br/>";
       //array_push($errors, "Your email can only contain valid characters");
      }
  } else {
     $errors .= "Email is required<br/>";
    //array_push($errors, "Email is Required");
  }


  //Check for a valid address
  
   if (!empty($_POST['subject'])) {
     $subject = $_POST['subject'];
  // This is a regular expression that checks if the address is valid characters
      }
        else {
    $errors .= "subject is Required <br/>";
    //array_push($errors, "Address is Required");
  }

//check for messages
  if (!empty($_POST['message'])) {
     $message = $_POST['message'];
  // This is a regular expression that checks if the address is valid characters
      }
        else {
    $errors .= "message is Required <br/>";
    //array_push($errors, "Address is Required");
  }
 
      if(trim($errors) != ''){
          set_flash('danger', 'danger', $errors);
           header('Location:'.$_SERVER['HTTP_REFERER']);
        }

        if(trim($errors) == ''){
         //encrypt the password before saving in the database
           
            $query = "INSERT INTO tblmessages (email,subject,message,reg_date,users_id,roles_id) 
                      VALUES('$email','$subject',
                      '$message',CURRENT_TIMESTAMP,'$users_id','$roles_id')";
                     
                if(mysqli_query($conn, $query)){
                  set_flash('success', 'Success', 'Message send to owner successfully.');
                   header('Location:'.MESSAGE_DETAIL_PAGE);
                }else{
                     set_flash('danger', 'danger', $errors);
                     header('Location:'.$_SERVER['HTTP_REFERER']);
                }
        }
}





//update profile

   
if(isset($_POST['update_profile'])){

        $fullname = $_POST['fullname'];
        $email = $_POST['email']; 
        $mobileno = $_POST['mobileno']; 
        $address = $_POST['address'];               
        $users_id = $_SESSION['session']['users']['users_id'];
       
if (!empty($_POST['fullname'])) {
  $fullname = $_POST['fullname'];
  $pattern = "/^[a-zA-Z\_]{2,50}/";// This is a regular expression that checks if the name is valid characters
    if (preg_match($pattern,$fullname)){
       $fullname = $_POST['fullname'];

      }
       else{ 
        $errors .= "Your Name can only contain A-Z or a-z<br/>";
       //array_push($errors, "Your Name can only contain A-Z or a-z");
      }
  } else {
    $errors .= "Fullname is Required<br/>";
    //array_push($errors, "Fullname is Required");
  }
 // Check for a proper email

  if (!empty($_POST['email'])) {
  $email = $_POST['email'];
  $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";// This is a regular expression that checks if the email is valid characters
      if (preg_match($pattern,$email)){
       $email = $_POST['email'];
       
      }
       else{ 
         $errors .= "Your email can only contain valid characters<br/>";
       //array_push($errors, "Your email can only contain valid characters");
      }
  } else {
     $errors .= "Email is required<br/>";
    //array_push($errors, "Email is Required");
  }

  //Check for a valid mobileno number
  if (!empty($_POST['mobileno'])) {
  $mobileno = $_POST['mobileno'];
  $pattern = "/^[0-9\_]{7,20}/";// This is a regular expression that checks if the mobileno is valid characters
    if (preg_match($pattern,$mobileno)){ 
      $mobileno = $_POST['mobileno'];

    }
    else{ 
      $errors .= "Your mobile number can only contain numbers<br/>";
       //array_push($errors, "Your mobile number can only contain numbers");
    }
  } else {
     $errors .= "Mobile number is required<br/>";
    //array_push($errors, "Mobile number is required");
  }

//Check for a valid address
  
   if (!empty($_POST['address'])) {
  $address = $_POST['address'];
  $pattern = "/^[a-zA-Z\_]{2,50}/";// This is a regular expression that checks if the address is valid characters
      if (preg_match($pattern,$address)){
       $address = $_POST['address'];

      }
       else{ 
        $errors .= "Your Address can only contain A-Z or a-z<br/>";
       //array_push($errors, "Your Address can only contain A-Z or a-z");
      }
  } else {
    $errors .= "Address is Required <br/>";
    //array_push($errors, "Address is Required");
  }
        $conn = db_get_conn();
        $query = "
            SELECT users_id,fullname,email,mobileno,address FROM tblusers
            WHERE users_id='{$users_id}'
                ";

        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();            
                $sql = "
                        UPDATE tblusers
                        SET fullname='{$fullname}',email='{$email}',mobileno='{$mobileno}',address='{$address}'
                        WHERE users_id = {$users_id}";
                         
              if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Profile Changed Successfuly');
               header('Location:'.CUSTOMER_PROFILE_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to change profile');
               header('Location:'.CUSTOMER_PROFILE_PAGE);
            }

       }
    }
}


//delete reservation by customer
if(isset($_POST['delete_reservation'])){
 

        $reservations_id = $_POST['reservations_id'];

        $conn = db_get_conn();
        $query = "
            SELECT reservations_id
            FROM tblreservations
            WHERE reservations_id=$reservations_id ";
    
        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();            
                $sql = "
                        DELETE FROM tblreservations
                       
                        WHERE reservations_id = {$reservations_id}";
                         
            if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Reservations deleted Successfuly');

              header('Location:'.RESERVATION_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to delete reservations');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
  }


//delete messages by customer

   
if(isset($_POST['delete_message'])){

        $messages_id = $_POST['messages_id'];

        $conn = db_get_conn();
        $query = "
            SELECT messages_id,email,subject,message
            FROM tblmessages
            WHERE messages_id=$messages_id ";
    
        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();            
                $sql = "
                        DELETE FROM tblmessages
                       
                        WHERE messages_id = {$messages_id}";
                         
            if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Message deleted Successfuly');

              header('Location:'.MESSAGE_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to delete message');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}




/**
    * ======================================================================================================
    * User password change
    */
    if(isset($_POST['change_password']))
    {
        $currentpassword = md5($_POST['currentpassword']);
        $newpassword = $_POST['newpassword']; 
        $confirmpassword = $_POST['confirmpassword'];              
        $users_id = $_SESSION['session']['users']['users_id'];
        $conn = db_get_conn();
        $query = "
            SELECT users_id, password FROM tblusers
            WHERE users_id='{$users_id}'
                ";

        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();

                if($row['password'] == $currentpassword){
                  if(!empty($newpassword) && !empty($confirmpassword)){
                       $pattern = "/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/";
                       if (preg_match($pattern,$newpassword) && preg_match($pattern,$confirmpassword)){
                        $newpassword=md5($_POST['newpassword']);
                        $confirmpassword=md5($_POST['confirmpassword']);
                        if(!($newpassword===$confirmpassword)){
                          $errors .= "Confirm Password doesn't match with new password<br/>";

                        }

                       }else{
                         $errors .= "Password must be at least 6 characters and must contain at least one lower case letter, one upper case letter and one digit<br/>";
                       }

       


                  }else{
                   $errors .= "New and confirm password is required.<br/>"; 
                  }
                }else{
                   $errors .= "Current Password is incorrect<br/>";
                } 


           if(trim($errors) != ''){
                set_flash('danger', 'danger', $errors);
                 header('Location:'.$_SERVER['HTTP_REFERER']);
              }

          if(trim($errors) == ''){
            
              
               $cupq = "
                        UPDATE tblusers
                        SET password = '{$newpassword}'
                        WHERE users_id = {$users_id};
                              ";
              mysqli_query($conn, $cupq);
              set_flash('success', 'Success', 'Password Changed Successfuly');
               header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}

   /**
    * ======================================================================================================
    * Change user image
    */
    if(isset($_POST['upload']))

    {  
        $errors= array();
        $users_id = $_POST['users_id'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];

        $file_ext = explode('.',$_FILES['image']['name']);
        $file_ext = end($file_ext);
        $file_ext = strtolower($file_ext);

        $extarr= array("jpeg","jpg","png");

        if(in_array($file_ext,$extarr)=== false)
        {
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($_FILES['image']['size'] > 2097152)
        {
            $errors[]='File size must be less than 2 MB';
        }


        if(empty($errors)==true)
        {
            $filename = date('Ymd').'-'.uniqid('').uniqid('').'.'.$file_ext;
            move_uploaded_file($file_tmp,DOCUMENT_ROOT.'assets/img/faces/'.$filename);
            $conn = db_get_conn();
            $query = "
                UPDATE tblusers
                SET img = '{$filename}'
                WHERE users_id = {$users_id};
            ";
            if($conn->query($query) === TRUE)
            {
                set_flash('success', 'Success', 'User Profile picture changed successfully.');
                $_SESSION['session']['users']['img'] = $filename;
            }
            else
            {
                set_flash('danger', 'Error', $conn->error);
            }
        }
        else
        {
            set_flash('danger', 'Error', implode(". ",$errors));
        }
        
        // Redirect back to previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
