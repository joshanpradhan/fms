
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
        <title>Hamrofutsal | Homepage</title>
    </head>
    <body style="font-family: 'Open Sans', sans-serif;">
      
    <?php 
        require_once('./inc/navbar.php');
        ?>
<!--carousel-->
  <div class="container-fluid mt-1" style="padding: 0">
<!--          <div class="row">
            <div class="col-lg-12 col-sm-8"> -->
               <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <img class="d-block w-100" src="assets\img\pexels-photo-94953.jpeg" alt="First slide"  width="1200" height="500">
                        <div class="carousel-caption d-none d-md-block">
              <h1>Enjoy the Game</h1>
              <h3>Football is our religion</h3>
              </div>
                     </div>
                     <div class="carousel-item">
                        <img class="d-block w-100" src="assets\img\pexels-photo-774321.jpeg" alt="Second slide" width="1200" height="500">
                        <div class="carousel-caption d-none d-md-block">
              <h1>Enjoy the Game</h1>
              <h3>Football is our religion</h3>
              </div>
                     </div>
                     <div class="carousel-item">
                        <img class="d-block w-100" src="assets\img\football-ball-sport-soccer-50713.jpeg" alt="Third slide"  width="1200" height="500">
                        <div class="carousel-caption d-none d-md-block">
              <h1>Enjoy the Game</h1>
              <h3>Football is our religion</h3>
              </div>
                     </div>
                     <div class="carousel-item">
                        <img class="d-block w-100" src="assets\img\pexels-photo-918798.jpeg" alt="Fourth slide" width="1200" height="500">
                        <div class="carousel-caption d-none d-md-block">
              <h1>Enjoy the Game</h1>
              <h3>Football is our religion</h3>
              </div>
                     </div>
                     <div class="carousel-item">
                        <img class="d-block w-100" src="assets\img\the-ball-stadion-football-the-pitch-46798.jpeg" alt="Fifth slide" width="1200" height="500">
                        <div class="carousel-caption d-none d-md-block">
              <h1>Enjoy the Game</h1>
              <h3>Football is our religion</h3>
              </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
<!--             </div>
        </div> -->
    </div>


  
   <div class="container">
        <div class="row mt-5">
          <div class="col-7">
         <h1 class="text-center" style="word-spacing: 5px; line-height:1.3;"><strong>How can you book futsal?</strong></h1>
            <p class="h4 mt-3 text-secondary" style="word-spacing: 5px; line-height:1.3;">A new way to share your travel experiences with others
Share your travel experience in a new visual form that helps readers understand what you’re trying to express better.</p>
 <p class="h4 mt-3" style="word-spacing: 5px; line-height: 1.3;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="col-5">
            <h3 class="mt-3 text-secondary"><strong>1. Login</strong></h3>
            <p class="text-dark h5 ml-5">Login into your account.</p>
            <h3 class="mt-4 text-secondary"><strong>2. Choose</strong></h3>
            <p class="text-dark h5 ml-5">Choose and select the futsal pitch</p>
            <h3 class="mt-4 text-secondary"><strong>3. Book</strong></h3>
            <p class="text-dark h5 ml-5">Book for your selected futsal pitch. Once done you are ready to play.</p>
            <h3 class="mt-4 text-secondary"><strong>4. Play the Game</strong></h3>
            <p class="text-dark h5 ml-5">Visit the Selected Futsal Pitch. Be friendly and safe.</p>  
        </div>
      </div>
      <hr>



     
        <div class="row p-5">
           <div class="col-12">
            <h1 class="text-center" style="word-spacing: 5px; line-height:1.3;"><strong>Community for futsal players</strong></h1>
          </div>
        </div>
        <div class="row">
          <div class="col-5">
              <img src="./assets/img/team1.jpg?>" class="img-fluid rounded mt-5" style="height:250px;width:350px">

              <img src="./assets/img/team.jpeg?>" class="img-fluid rounded mt-5" style="height:250px;width:350px">

          </div>
          <div class="col-7">
            <h4 style="word-spacing:5px; line-height:1.3" class="text-secondary"><strong>Play with other teams</strong></h4>
            <p class="h5 mt-3" style="word-spacing: 5px; line-height:1.3;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
 <h4 style="word-spacing:5px; line-height: 1.3;" class="text-secondary mt-4"><strong>Build your futsal team community</strong></h4>
            <p class="h5 mt-3" style="word-spacing: 5px; line-height:1.3;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
        </div>
      
        <hr>



        <div class="row p-5">
           <div class="col-12">
            <h1 class="text-center"><strong>Hamrofutsal</strong></h1>
          </div>
        </div>
        <div class="row pb-5">
          <div class="col-7">
            <h4 style="word-spacing:5px; line-height:1.3" class="text-secondary"><strong>Online booking</strong></h4>
            <p class="h5 mt-3" style="word-spacing: 5px; line-height:1.3;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
 <h4 style="word-spacing:5px; line-height: 1.3;" class="text-secondary mt-4"><strong>Host a game</strong></h4>
            <p class="h5 mt-3" style="word-spacing: 5px; line-height:1.3;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<h4 style="word-spacing:5px; line-height: 1.3;" class="text-secondary mt-4"><strong>Online payment for booking</strong></h4>
            <p class="h5 mt-3" style="word-spacing: 5px; line-height:1.3;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

          </div>
          <div class="col-5">

              <img src="./assets/img/booking1.png?>" class="img-fluid rounded " style="height:300px;width:300px">

              <img src="./assets/img/host.png?>" class="img-fluid rounded mt-5" style="height:300px;width:300px">
               <img src="./assets/img/payment.png?>" class="img-fluid rounded mt-5" style="height:300px;width:300px">

          </div>
            
          </div>
        </div>
        <hr>
      
</div>



<div class="container-fluid p-5">
        <div class="row">
           <div class="col-12 text-center">
               <h1 class="display-4 text-secondary"><i class="fas fa-futbol text-secondary">Hamrofutsal</i></h1>
          
            <h2 class="text-secondary" style="word-spacing: 5px;"><strong>Register for free</strong></h2>
            <p class="h5 text-secondary mt-3" style="word-spacing: 5px; line-height:1.3;">Create an account and you are ready to enjoy the game</p>
            <a class="btn btn-secondary w-25 p-3 my-2 my-sm-0" href="<?PHP echo REGISTER_PAGE ?>" role="button">Register</a>
             <p class="text-secondary mt-3" style="word-spacing: 5px; line-height:1.3;">Already have account? <a href="#" class="text-secondary">Login</a></p>
          </div>
        </div>
      </div>

<?php 
      require_once('inc/footer.php');
?>
   


     


