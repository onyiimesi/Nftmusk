<?php

include "../lib/Session.php";
Session::checkSession();

include '../lib/Database.php';
include_once "../format/helper.php";

$db = new Database();
$format = new Format();

require_once '../classes/User.php';
$user = new User();

?>

<?php

  include '../classes/Admin.php';

  $admin = new Admin();

  $id = Session::get("UserId");
  $getUsers = $admin->getUserById($id);

  if($getUsers){

    while($result = $getUsers->fetch_assoc()){
      $user_unique_id = $result['user_unique_id'];
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Musknft Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../img/logo.png" />

  <style>
    .i a{
      text-decoration: none;
      color: #222;
    }
    .i i{
      font-size: 40px;
      color: #4099FF;
    }
     {
      display: flex;
      flex-direction: row;
      height: auto;
      width: 100%;
      align-items: center;
      justify-content: center;
      margin: auto;
    }
     #inviteCode.invite-page {
      box-sizing: border-box;
      display: flex;
      flex-direction: row;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      justify-content: space-between;
      width: 100%;
      box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.07);
    }
     #inviteCode.invite-page #link,#link2,#link3,#link4,#link5,#link6 {
      align-self: center;
      font-size: 1.2em;
      color: #333;
      font-weight: bold;
      flex-grow: 2;
      background-color: #fff;
      border: none;
    }
     #inviteCode.invite-page #copy {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }


     #inviteCode.invite-page #copy2 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy2 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy2 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy2 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy2:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }


     #inviteCode.invite-page #copy3 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy3 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy3 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy3 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy3:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }


     #inviteCode.invite-page #copy4 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy4 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy4 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy4 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy4:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }

     #inviteCode.invite-page #copy5 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy5 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy5 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy5 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy5:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }

     #inviteCode.invite-page #copy6 {
      width: 30px;
      height: 30px;
      margin-left: 20px;
      border: 1px solid black;
      border-radius: 5px;
      background-color: #f8f8f8;
    }
     #inviteCode.invite-page #copy6 i {
      display: block;
      line-height: 30px;
      position: relative;
    }
     #inviteCode.invite-page #copy6 i::before {
      display: block;
      width: 15px;
      margin: 0 auto;
    }
     #inviteCode.invite-page #copy6 i.copied::after {
      position: absolute;
      top: 0px;
      right: 35px;
      height: 30px;
      line-height: 25px;
      display: block;
      content: "copied";
      font-size: 1.5em;
      padding: 2px 10px;
      color: #fff;
      background-color: #4099FF;
      border-radius: 3px;
      opacity: 1;
      will-change: opacity, transform;
      -webkit-animation: showcopied 1.5s ease;
              animation: showcopied 1.5s ease;
    }
     #inviteCode.invite-page #copy6:hover {
      cursor: pointer;
      background-color: #dfdfdf;
      transition: background-color 0.3s ease-in;
    }

    @-webkit-keyframes showcopied {
      0% {
        opacity: 0;
        transform: translateX(100%);
    }
    70% {
      opacity: 1;
      transform: translateX(0);
    }
    100% {
      opacity: 0;
    }
    }

    @keyframes showcopied {
    0% {
      opacity: 0;
      transform: translateX(100%);
    }
    70% {
      opacity: 1;
      transform: translateX(0);
    }
    100% {
      opacity: 0;
    }
    }

    .amount{
      padding: 0;
      margin: 0;
    }
    .amount h4{
      padding: 30px 0 5px 0;
      font-size: 35px;
    }
    .pending h4{
      text-transform: uppercase !important;
      font-weight: normal !important;
    }
    .pending h5{
      letter-spacing: 0.1em;
      line-height: 1.6rem;
      font-weight: 600;
    }
    .pending p{
      font-size: 15px;
      letter-spacing: 0.1em;
      line-height: 1.6rem;
    }
    .img img{
      width: 50px;
      height: 50px;
      margin: -10px 0;
    }
    

  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center d-flex align-items-center">
        <div class="me-3">
          <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <div class="img">
            <a class="navbar-brand brand-logo" href="/dashboard/pending">
              <img src="../img/logo.png" alt="logo" />
            </a>
          </div>
      
       
        <!-- <ul class="navbar-nav">
          <li class="nav-item d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
        </ul> -->
        <!-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button> -->
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          
          
        </ul>
      </nav>