<?php
require_once('constants.php');
require_once('admin_constants.php');
require_once('functions.php');

//create admin by admin
$errors='';
if(isset($_POST['create_admin'])){
    $conn= db_get_conn();
    $roles_id = $_POST['roles_id'];
    $img="dummy.png";
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

 //check for valid password
  
  if (!empty($_POST['password'])) {
  $password = $_POST['password'];
 
   $pattern = "/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/";
// This is a regular expression that checks if the password is valid characters

      if (preg_match($pattern,$password)){
       
       $password = $_POST['password']; 

      }
       else{ 
        
         $errors .= "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit<br/>";
      // array_push($errors, "Your Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit");
      }
  } else {
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
            
            $query = "INSERT INTO tblusers (fullname,email,mobileno,address,password,img,reg_date,roles_id) 
                      VALUES('$fullname', 
                      '$email','$mobileno','$address','$password','$img',CURRENT_TIMESTAMP,'$roles_id')";
                      
                  if(mysqli_query($conn, $query)){
                  set_flash('success', 'Success', 'New administrator added successfully.');
                  header('Location:'.ADMIN_DETAIL_PAGE);
                }else{
                     set_flash('danger', 'danger', $errors);
                     header('Location:'.$_SERVER['HTTP_REFERER']);
                }
        }
}


//create owner by admin
if(isset($_POST['create_owner'])){
    $conn= db_get_conn();
    $roles_id = $_POST['roles_id'];
    $img="dummy.png";
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

 //check for valid password
  
  if (!empty($_POST['password'])) {
  $password = $_POST['password'];
 
   $pattern = "/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/";
// This is a regular expression that checks if the password is valid characters

      if (preg_match($pattern,$password)){
       
       $password = $_POST['password']; 

      }
       else{ 
        
         $errors .= "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit<br/>";
      // array_push($errors, "Your Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit");
      }
  } else {
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
            
            $query = "INSERT INTO tblusers (fullname,email,mobileno,address,password,img,reg_date,roles_id) 
                      VALUES('$fullname', 
                      '$email','$mobileno','$address','$password','$img',CURRENT_TIMESTAMP,'$roles_id')";
                      
                  if(mysqli_query($conn, $query)){
                  set_flash('success', 'Success', 'New owner added successfully.');
                   header('Location:'.OWNER_DETAIL_PAGE);
                }else{
                     set_flash('danger', 'danger', $errors);
                     header('Location:'.$_SERVER['HTTP_REFERER']);
                }
        }
}

//create customer by admin
if(isset($_POST['create_customer'])){

    $conn= db_get_conn();
    $roles_id = $_POST['roles_id'];
    $img="dummy.png";
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

 //check for valid password
  
  if (!empty($_POST['password'])) {
  $password = $_POST['password'];
 
   $pattern = "/^.*(?=.{6,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/";
// This is a regular expression that checks if the password is valid characters

      if (preg_match($pattern,$password)){
       
       $password = $_POST['password']; 

      }
       else{ 
        
         $errors .= "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit<br/>";
      // array_push($errors, "Your Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit");
      }
  } else {
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
            
            $query = "INSERT INTO tblusers (fullname,email,mobileno,address,password,img,reg_date,roles_id) 
                      VALUES('$fullname', 
                      '$email','$mobileno','$address','$password','$img',CURRENT_TIMESTAMP,'$roles_id')";
                      
                  if(mysqli_query($conn, $query)){
                  set_flash('success', 'Success', 'New customer added successfully.');
                   header('Location:'.CUSTOMER_DETAIL_PAGE);
                }else{
                     set_flash('danger', 'danger', $errors);
                     header('Location:'.$_SERVER['HTTP_REFERER']);
                }
        }
}

//create futsal by admin
if(isset($_POST['create_futsal'])){
  
  
    $conn= db_get_conn();
    
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


if (!empty($_POST['users_id'])) {
  $users_id = $_POST['users_id'];
  $pattern = "/^[0-9\_]{7,20}/";// This is a regular expression that checks if the mobileno is valid characters
    if (preg_match($pattern,$users_id)){ 
      $users_id = $_POST['users_id'];

    }
    else{ 
      $errors .= "Your mobile number can only contain numbers<br/>";
       //array_push($errors, "Your mobile number can only contain numbers");
    }
  } else {
     $errors .= "Owner name is required<br/>";
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

 //check for valid password
  
  if (!empty($_POST['status'])) {
  $status = $_POST['status'];
// This is a regular expression that checks if the password is valid characters   
  } else {
    $errors .= "Password is Required <br/>";
    //array_push($errors, "Password is Required");
  }
 
  // first check the database to make sure 
  // a user does not already exist with the same mobileno and/or email
  $user_check_query = "SELECT * FROM tblfutsals WHERE mobileno='$mobileno' OR fullname='$fullname' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $futsal = mysqli_fetch_assoc($result);
  

if ($futsal) { // if user exists
      if ($futsal['fullname'] === $fullname) {
      $errors .= "This futsal already exists. <br/>";
      //array_push($errors, "Mobile Number already exists.");
      }
    if ($futsal['mobileno'] === $mobileno) {
      $errors .= "Mobile Number already exists. <br/>";
      //array_push($errors, "Mobile Number already exists.");
     }
  }

      if(trim($errors) != ''){
          set_flash('danger', 'danger', $errors);
           header('Location:'.$_SERVER['HTTP_REFERER']);
        }

        if(trim($errors) == ''){
         //encrypt the password before saving in the database
           
            $query = "INSERT INTO tblfutsals (fullname,address,mobileno,email,status,reg_date,users_id) 
                      VALUES('$fullname','$address',
                      '$mobileno','$email','$status',CURRENT_TIMESTAMP,'$users_id')";
                     
                if(mysqli_query($conn, $query)){
                  set_flash('success', 'Success', 'New futsal added successfully.');
                   header('Location:'.FUTSAL_DETAIL_PAGE);
                }else{
                     set_flash('danger', 'danger', $errors);
                     header('Location:'.$_SERVER['HTTP_REFERER']);
                }
        }
}

//create ground by admin
if(isset($_POST['create_ground'])){
  
 
    $conn= db_get_conn();
    
   // Check for a proper Fullname

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

  //Check for a valid address
  
   if (!empty($_POST['ground'])) {
     $ground = $_POST['ground'];
  // This is a regular expression that checks if the address is valid characters
      }
        else {
    $errors .= "Ground is Required <br/>";
    //array_push($errors, "Address is Required");
  }


  //Check for a valid mobileno number
  if (!empty($_POST['price'])) {
  $price = $_POST['price'];
  $pattern = "/^[0-9\_]{1,}/";// This is a regular expression that checks if the mobileno is valid characters
    if (preg_match($pattern,$price)){ 
      $price = $_POST['price'];

    }
    else{ 
      $errors .= "Price can only contain numbers<br/>";
       //array_push($errors, "Your mobile number can only contain numbers");
    }
  } else {
     $errors .= "Price is required<br/>";
    //array_push($errors, "Mobile number is required");
  }

 // Check for a proper email

  if (!empty($_POST['status'])) {
  $status = $_POST['status'];
  $pattern="/^[a-zA-Z\_]{2,50}/";// This is a regular expression that checks if the status is valid characters
      if (preg_match($pattern,$status)){
       $status = $_POST['status'];
       
      }
       else{ 
         $errors .= "Status Invalid<br/>";
       //array_push($errors, "Your email can only contain valid characters");
      }
  } else {
     $errors .= "Status is required<br/>";
    //array_push($errors, "Email is Required");
  }

  // first check the database to make sure 
  // a user does not already exist with the same mobileno and/or email
  $user_check_query = "SELECT * FROM tblgrounds WHERE ground='$ground' AND fulsals_id='$futsals_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $grounds = mysqli_fetch_assoc($result);
  

if ($ground) { // if user exists
      if ($grounds['ground'] === $ground && $grounds['futsals_id'] === $futsals_id) {
      
      $errors .= "Futsal with same ground already exists. <br/>";
      //array_push($errors, "Mobile Number already exists.");
     }
  }

      if(trim($errors) != ''){
          set_flash('danger', 'danger', $errors);
           header('Location:'.$_SERVER['HTTP_REFERER']);
        }

        if(trim($errors) == ''){
         //encrypt the password before saving in the database
           
            $query = "INSERT INTO tblgrounds (ground,price,status,reg_date,futsals_id) 
                      VALUES('$ground','$price',
                      '$status',CURRENT_TIMESTAMP,'$futsals_id')";
                     
                if(mysqli_query($conn, $query)){
                  set_flash('success', 'Success', 'New ground added successfully.');
                   header('Location:'.GROUND_DETAIL_PAGE);
                }else{
                     set_flash('danger', 'danger', $errors);
                     header('Location:'.$_SERVER['HTTP_REFERER']);
                }
        }
}

//create reservation by admin
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




//create Messages by admin
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
               header('Location:'.ADMIN_PROFILE_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to change profile');
               header('Location:'.ADMIN_PROFILE_PAGE);
            }

       }
    }
}

//update owner

   
if(isset($_POST['update_owner'])){

        $fullname = $_POST['fullname'];
        $email = $_POST['email']; 
        $mobileno = $_POST['mobileno']; 
        $address = $_POST['address'];               
        $users_id = $_POST['users_id'];
       
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

              header('Location:'.OWNER_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to change profile');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}

//update customer

   
if(isset($_POST['update_customer'])){

        $fullname = $_POST['fullname'];
        $email = $_POST['email']; 
        $mobileno = $_POST['mobileno']; 
        $address = $_POST['address'];               
        $users_id = $_POST['users_id'];
       
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

              header('Location:'.CUSTOMER_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to change profile');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}



//update futsal

   
if(isset($_POST['update_futsal'])){

        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $mobileno = $_POST['mobileno'];
        $email = $_POST['email'];  
        $status= $_POST['status'];
        $futsals_id = $_POST['futsals_id'];
       
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

 //check for valid password
  
  if (!empty($_POST['status'])) {
  $status = $_POST['status'];
// This is a regular expression that checks if the password is valid characters   
  } else {
    $errors .= "Password is Required <br/>";
    //array_push($errors, "Password is Required");
  }
 
        $conn = db_get_conn();
        $query = "
            SELECT futsals_id,fullname,address,mobileno,email,status FROM tblfutsals
            WHERE futsals_id='{$futsals_id}'
                ";

        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();            
                $sql = "
                        UPDATE tblfutsals
                        SET fullname='{$fullname}',address='{$address}',mobileno='{$mobileno}',email='{$email}',status='{$status}'
                        WHERE futsals_id = {$futsals_id}";
                         
              if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Futsals Detail Changed Successfuly');

              header('Location:'.FUTSAL_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to change futsals details');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}


//DELETE 
//delete customer

   
if(isset($_POST['delete_customer'])){

        $users_id = $_POST['users_id'];
        $conn = db_get_conn();
        $query = "
            SELECT users_id,fullname,address,mobileno,email FROM tblusers
            WHERE users_id='{$users_id}'
                ";

        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();            
                $sql = "
                        DELETE FROM tblusers
                       
                        WHERE users_id = {$users_id}";
                         
              if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Customer deleted Successfuly');

              header('Location:'.CUSTOMER_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to delete customer');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}

//delete owner

   
if(isset($_POST['delete_owner'])){

        $users_id = $_POST['users_id'];
        $conn = db_get_conn();
        $query = "
            SELECT users_id,fullname,address,mobileno,email FROM tblusers
            WHERE users_id='{$users_id}'
                ";

        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();            
                $sql = "
                        DELETE FROM tblusers
                       
                        WHERE users_id = {$users_id}";
                         
              if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Owner deleted Successfuly');

              header('Location:'.OWNER_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to delete owner');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}

//delete futsals

   
if(isset($_POST['delete_futsal'])){

        $futsals_id = $_POST['futsals_id'];
        $conn = db_get_conn();
        $query = "
            SELECT futsals_id,fullname,address,mobileno,email,status FROM tblfutsals
            WHERE futsals_id='{$futsals_id}'
                ";

        if ($result = $conn->query($query))
        {
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();            
                $sql = "
                        DELETE FROM tblfutsals
                       
                        WHERE futsals_id = {$futsals_id}";
                         
              if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Futsal deleted Successfuly');

              header('Location:'.FUTSAL_DETAIL_PAGE);
            }else{
               set_flash('danger', 'Error', 'Failed to delete futsal');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}

//delete ground

   
if(isset($_POST['delete_ground'])){


        $grounds_id = $_POST['grounds_id'];
        $conn = db_get_conn();
        $query = "
            SELECT grounds_id,ground,price,status FROM tblgrounds
            WHERE grounds_id=$grounds_id";
                

        if ($result = $conn->query($query))
        {

            if($result->num_rows == 1)
            {
                $sql= "
                        DELETE FROM tblgrounds
                       
                        WHERE grounds_id = $grounds_id";
                         
            if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Ground deleted Successfuly');
              header('Location:'.GROUND_DETAIL_PAGE);
            }else{
            set_flash('danger', 'Error', 'Failed to delete ground');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}

//update ground

   
if(isset($_POST['update_ground'])){


        $grounds_id = $_POST['grounds_id'];
        $conn = db_get_conn();
        $ground=$_POST['ground'];
        $price=$_POST['price'];
        $status=$_POST['status'];
        
        $query = "
            SELECT grounds_id,ground,price,status FROM tblgrounds
            WHERE grounds_id=$grounds_id";
                

        if ($result = $conn->query($query))
        {

            if($result->num_rows == 1)
            {
                $sql= "
                        UPDATE tblgrounds
                        SET ground='$ground',price='$price',status='$status' 
                        WHERE grounds_id = $grounds_id";
                         
            if(mysqli_query($conn, $sql)){

              set_flash('success', 'Success', 'Ground updated Successfuly');
              header('Location:'.GROUND_DETAIL_PAGE);
            }else{
            set_flash('danger', 'Error', 'Failed to update ground');
             header('Location:'.$_SERVER['HTTP_REFERER']);
            }

       }
    }
}

//delete reservation by admin
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


//delete messages

   
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




//update

    if(isset($_POST['update_reservation'])){
  
 
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

