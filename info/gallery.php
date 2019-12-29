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
   
    </head>
    <body style="font-family: 'Open Sans', sans-serif;">
      
    <?php 
        require_once('./../inc/navbar.php');
        ?>
<div class="container">
        <div class="row p-5">
           <div class="col-12">
            <h1 class="text-center display-4 text-primary" style="word-spacing: 5px; line-height:1.3;"><i class="fas fa-camera-retro"></i><strong> Gallery</strong></h1>
          </div>
        </div>
  <div class="row">
    <div class="col-4">
      <img src="./../assets/img/1.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    <div class="col-4">
      <img src="./../assets/img/2.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    <div class="col-4">
      <img src="./../assets/img/3.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    
  </div>
 <div class="row">
    <div class="col-4">
      <img src="./../assets/img/4.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    <div class="col-4">
      <img src="./../assets/img/5.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    <div class="col-4">
      <img src="./../assets/img/6.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    
  </div>
  <div class="row">
    <div class="col-4">
      <img src="./../assets/img/7.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    <div class="col-4">
      <img src="./../assets/img/8.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    <div class="col-4">
      <img src="./../assets/img/9.jpeg?>" class="img-fluid rounded" style="height:250px;width:350px">
    </div>
    
  </div>
</div>


   <?php 
        require_once('./../inc/footer.php');
        ?>    
      