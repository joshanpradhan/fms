<?php
require_once('./../core/constants.php');
require_once('./../core/functions.php');

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
        <title>Contact | Hamrofutsal</title>
    </head>
    <body style="font-family: 'Open Sans', sans-serif;">

    <?php require_once('./../inc/navbar.php');
     ?>
     <div class="container mt-5">
        <div class="row">
           <div class="col-12">
            <h2 class="text-center text-secondary" style="word-spacing: 5px; line-height:1.3;"><strong>Your feedback</strong></h2>
          </div>
        </div>
      </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 rounded">
                    <?php display_flash();?>
                </div>
            </div>
              <div class="row justify-content-center">

                <div class="col-6 rounded">
                <form>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Email address</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@mail.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Subject</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Message</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Your message"></textarea>
                    </div>
                    <button type="submit" class="btn w-100 btn-secondary" name="login_users">Send</button>
                  </form>
            </div>
        </div>   
    </div>


<footer class="footer">
     <div class="container-fluid fixed-bottom bg-light text-secondary pt-2">
      <div class="row">
        <div class="col-3">
            <h5  style="word-spacing: 5px;"><strong>Follow Us</strong></h5>
            <a href="#" class="mr-3" style="color:#1DA1F2;"><i class="fab fa-twitter"></i></a>
            <a href="#" class="mr-3" style="color:#3B5998;"><i class="fab fa-facebook"></i></a>
            <a href="#" class="mr-3" style="color:#fb3958;"><i class="fab fa-instagram"></i></a>  
        </div>
        <div class="col-6 text-center">             
             <a class="text-secondary ml-3" href="<?php echo ABOUT_PAGE?>"><small>About</small></a>
              <a class="text-secondary ml-3" href="<?php echo CONTACT_PAGE?>"><small>Contact</small></a>
              <a class="text-secondary ml-3" href="<?php echo PRIVACY_PAGE?>"><small>Privacy</small></a> 
              <a class="text-secondary ml-3" href="<?php echo FEEDBACK_PAGE?>"><small>Feedback</small></a> 
              <a class="text-secondary ml-3" href="<?php echo TEAM_PAGE?>"><small>Team</small></a>    
              <a class="text-secondary ml-3" href="<?php echo FAQ_PAGE?>"><small>FAQ</small></a>   
        </div>
        <div class="col-3">
          <p>&copy; Copyright <strong>Hamrofutsal,</strong>2018.</p>
        </div>
    </div>
  </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>

