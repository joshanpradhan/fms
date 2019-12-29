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
        <link href="./assets/css/gallery-clean.css" rel="stylesheet">
        <title>Gallery | Hamrofutsal</title>
        <style>
        .row{
            padding:15px;
        }
    </style>
    <script type="text/javascript">
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
    </script>
    </head>
    <body style="font-family: 'Open Sans', sans-serif;">
      
    <?php 
        require_once('./../inc/navbar.php');
        ?>
<div class="container">
        <div class="row p-5">
           <div class="col-12">
            <h1 class="text-center text-secondary" style="word-spacing: 5px; line-height:1.3;"><i class="fas fa-futbol text-secondary">Hamrofutsal</i><strong> Blog</strong></h1>
          </div>
        </div>
        <div class="row p-5">
           <div class="col-12">
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
           Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
        </div>
  
  </div>



   <footer class="footer">
     <div class="container-fluid fixed-bottom bg-light text-secondary">
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

