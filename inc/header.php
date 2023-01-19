<?php

include 'lib/Session.php';
Session::init();

include 'lib/Database.php';
require_once 'classes/Admin.php';
require_once 'classes/User.php';

$db = new Database();
$user = new User();
$admin = new Admin();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="icon" type="image/x-icon" href="/img/logo.png" />
    <title>NTFMUSK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/55ffce7a75.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css"/>

  </head>
  <body>

    <!-- Header -->
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="logo d-flex">
              <a href="/"><img src="/img/logo.png" class="img-fluid"></a><h3>NFTMUSK</h3>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="navigation" id="navigation">
              <div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                  <li><a href="/">Home</a></li>
                  <li><a href="about">About Us</a></li>
                  <li><a href="collection">NFT Collection</a></li>
                  <li><a href="referral">Referral Project</a></li>
                  <li><a href="join-us">Join our Team</a></li>
<!--                   <li><a href="live">Live Event</a></li> -->
                  <div class="login">
                    <a class="log" href="login">Login</a>
                    <a class="reg" href="register">Register</a>
                    <!-- <a target="_blank" href="https://uk.trustpilot.com/review/www.eufxp.com"><img src="/img/trustpilot.jpg" width="100" height="50" class="img-fluid" alt=""></a> -->
                  </div>
                </ul>
              </div>


            </div>
            <!-- Menu Toogle -->
            <div class="menu-toggle">
                <a href="#">
                    <i class="fa fa-bars"></i>
                    <!-- <span>Menu</span> -->
                </a>
            </div>
            <!-- /Menu Toogle -->
          </div>

        </div>
      </div>
    </header>
