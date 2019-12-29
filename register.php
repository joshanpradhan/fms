 
<?php
require_once('./core/constants.php');
require_once('./core/functions.php');

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <title>Register | Hamrofutsal</title>
    </head>
    <body style="font-family: 'Open Sans', sans-serif;" class="bg-light">

    <?php 
            require_once('inc/navbar.php');
          ?>

       <div class="container mt-4">
            <div class="row">
                <div class="col-8 mt-5">
                    <h1 class="text-center text-secondary"><strong>Join Hamrofutsal</strong></h1>
                    <div class="row mt-5">

                       <div class="col-3">
                            <img src="assets/img/booking1.png" class="img-fluid " alt="Responsive image">
                             <h3 class="text-center text-warning"><strong>Book</strong></h3>
                        </div>
                         <div class="col-3">
                            <img src="assets/img/fieldSport.png" class="img-fluid" alt="Responsive image">
                             <h3 class="text-center text-success"><strong>Choose</strong></h3>
                        </div>
                         <div class="col-3">
                          <img src="assets/img/pay3.png" class="img-fluid" alt="Responsive image">
                           <h3 class="text-center text-danger"><strong>Pay</strong></h3>
                        </div>
                        <div class="col-3">
                           <img src="assets/img/play.png" class="img-fluid" alt="Responsive image">
                            <h3 class="text-center"><strong>Play</strong></h3>
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                          <h3 class=" text-secondary"><strong>Be friendly & play safe.</strong></h3>
                         
                    </div>
                        
               </div>
             
                <div class="col-4">
                    
                    <div class="rounded">
                         <?php display_flash();?>
                      </div>
                     
                     
              
               
                <h3 class="text-center text-secondary p-2"><i class="fas fa-futbol text-secondary">Hamrofutsal</i></h3>
                 <h6 class="form-signin-heading text-secondary text-center">Enter your credentials</h6>
                <form method="POST" action="<?PHP echo CORE_ACTION ?>">


                  <div class="form-group">
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                          </div>
                     <input type="text" class="form-control" name="fullname" placeholder="Fullname">
                   </div>
                  </div>
                 

                  <div class="form-group">
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                          </div>
                     <input type="email" class="form-control" name="email" placeholder="example@mail.com">
                   </div>
                  </div>

                   <div class="form-group">
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square"></i></span>
                          </div>
                     <input type="tel" class="form-control" name="mobileno"  placeholder="98********">
                   </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                          </div>
                     <input type="password" class="form-control" name="password"  placeholder="Password">
                   </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                          </div>
                     <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                  </div>
                </div>

                  <div class="form-group">
                     <input type="hidden" class="form-control" name="roles" value="3">
                  </div>
                  
                  <button type="submit" class="btn w-100 btn-secondary mb-1" name="register_users">Register</button>
                </form>
                  <span class="text-secondary">Already have an account?</span><a href="<?php echo LOGIN_PAGE?>" class="text-secondary ml-2">Login</a>
              </div>
          </div>
        </div>
      </div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>

