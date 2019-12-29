<?php
//Form Submission actions
require_once('constants.php');
require_once('admin_constants.php');
require_once('owner_constants.php');
require_once('customer_constants.php');
require_once('functions.php');


//Create new user action


$errors = '';
if(isset($_POST['register_users'])){
    $conn= db_get_conn();
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $roles=$_POST['roles'];
    $img = 'dummy.jpg';
 
 
   // Check for a proper Fullname

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

 //check for valid password
  
  if (!empty($_POST['password'])) {
  $password = $_POST['password'];
 
   $pattern = "/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/";
// This is a regular expression that checks if the password is valid characters

      if (preg_match($pattern,$password)){  
       $password = $_POST['password']; 
     }
       else{ 
        
         $errors .= "Password must be at least 6 characters and must contain at least one lower case letter, one upper case letter and one digit<br/>";
      // array_push($errors, "Your Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit");
      }
  }else {
    $errors .= "Password is Required <br/>";
    //array_push($errors, "Password is Required");
  }

  //Check for two passwords
  if (!empty($_POST['confirmpassword'])) {
    $confirmpassword=$_POST['confirmpassword'];
      if($password!= $confirmpassword) {
        $errors .= "Two Password doesn't match <br/>";
     //array_push($errors, " Two Password doesn't match");

      }
  } else {
     $errors .= "Confirm Password is Required. <br/>";
    //array_push($errors, "Confirm Password is Required");
  }
  // first check the database to make sure 
  // a user does not already exist with the same mobileno and/or email
  $user_check_query = "SELECT * FROM tblusers WHERE mobileno='$mobileno' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $users = mysqli_fetch_assoc($result);
  

if ($users) { // if user exists
    if ($users['mobileno'] === $mobileno) {
      $errors .= "Mobile Number already exists. <br/>";
      //array_push($errors, "Mobile Number already exists.");
    }

    if ($users['email'] === $email) {
      $errors .= "Email already exists. <br/>";
       //array_push($errors, "Email already exists.");
    }
  
  }
     if(trim($errors) != ''){
          set_flash('danger', 'danger', $errors);
           header('Location:'.$_SERVER['HTTP_REFERER']);
        }

        if(trim($errors) == ''){
            $password = md5($confirmpassword);//encrypt the password before saving in the database
            
            $query = "INSERT INTO tblusers (fullname, email, mobileno,password,roles_id,img,reg_date) 
                      VALUES('$fullname', 
                      '$email','$mobileno','$password','$roles','$img',CURRENT_TIMESTAMP)";
            if(mysqli_query($conn, $query)){
            set_flash('success', 'Success', 'New account created successfully.');
            header('Location:../../fms/login.php');
          }
          else{
             set_flash('danger', 'danger', mysqli_error($conn));
               header('Location:'.$_SERVER['HTTP_REFERER']);
          }
        }
}


   

//LOGIN ACTION
if(isset($_POST['login_users'])){

    $conn = db_get_conn();
    $mobileno = mysqli_real_escape_string($conn,$_POST['mobileno']);
    $password = md5($_POST['password']);
   
  

  $query = "
           SELECT
                tblusers.users_id, tblusers.fullname, tblusers.email,tblusers.mobileno,tblusers.address, tblusers.password,tblusers.img, tblusers.reg_date, tblroles.roles_id,tblroles.role, tblroles.slug
                FROM tblusers JOIN tblroles
                ON tblusers.roles_id = tblroles.roles_id
                WHERE tblusers.mobileno='".$mobileno."'";
                

    $result = $conn->query($query);
    $conn->close();
    
    if($result->num_rows == 1){

        $row =$result->fetch_assoc();
       

        if($row['password'] == $password){  
                if($row['roles_id']==1){
                setSession($row);
                // Redirect back to previous page
                header('Location: ' . ADMIN_PAGE);
              }
                if($row['roles_id']==2){
                setSession($row);
                // Redirect back to previous page
                header('Location: ' . OWNER_PAGE);
              }
                if($row['roles_id']==3){
                setSession($row);
                // Redirect back to previous page
                header('Location: ' . CUSTOMER_PAGE);
            }
          }
            else
            {
                set_flash('danger', 'Error', 'Incorrect username or password!');
                // Redirect back to previous page
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            set_flash('danger', 'Error', 'Incorrect username or password!');
            // Redirect back to previous page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        
    }
//CONTACT US MESSAGES
if(isset($_POST['users_messages'])){
    
    $conn= db_get_conn();
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

  //Check for a valid subject
  if (!empty($_POST['subject'])) {
  $subject = $_POST['subject'];
  
  } else {
     $errors .= "Subject is required<br/>";
    //array_push($errors, "Mobile number is required");
  }

//Check for a valid address
  
   if (!empty($_POST['message'])) {
  $message = $_POST['message'];
  
     
  } else {
    $errors .= "Messages is Required <br/>";
    //array_push($errors, "Address is Required");
  }

 
  if(trim($errors) != ''){
      set_flash('danger', 'danger', $errors);
       header('Location:'.$_SERVER['HTTP_REFERER']);
    }

if(trim($errors) == ''){
    
    $query = "INSERT INTO users_messages (email,subject,message) 
              VALUES('$email','$subject','$message')";
           
    mysqli_query($conn, $query);
    set_flash('success', 'Success', 'Messages sent successfully.');
    header('Location:'.$_SERVER['HTTP_REFERER']);
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
            SELECT users_id, password FROM users
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
              UPDATE users
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




