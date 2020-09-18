<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION)){
      session_destroy();
    }

    if(!isset($_SESSION['role'])){
        header("Location:/");
        exit;
    }
    $is_admin = true;
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'){
        $is_admin = false;
    }

?>

<div class="container">


<div ng-controller="sidebarController">
<nav class="navbar navbar-expand navbar-dark bg-dark menu">
  <a class="navbar-brand" href="#">
    <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav"><span class="welcome">Welcome, {{user_name}}</span></li>
      <li class="nav"><input type="button" value="Menu" ng-click="menuDisplay()" class="btn btn-primary" />
</li>
    </ul>
    <form class="form-inline" method="get" action="files/functions/search.php">
      <input class="form-control text-color" type="text" name="query" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary" type="submit" name="search">Search</button>
    </form>
  </div>
</nav>

<!--Header END--***************************-->

<!--Sidebar--><div>
<div class="sidebar" ng-show="showMenu">
  <ul class="sidebar-nav" >
  <input type="button" ng-click="menuHide()" value="Hide Menu" class="btn btn-success hidemenu"/>
  <li><a href="#/dashboard">Dashboard</a></li>
  <li><a href="#/home">Messages</a></li>
  <li><a href="#/changepassword">Change Password</a></li>
      <?php if($is_admin):?>
  <li><a href="#/report">Report</a></li>

    <li>
      <a href="#/signup">Add User</a></li>
      <?php endif;?>
  <li><a href="" ng-click="logout()">Logout</a></li>

  </ul>
</div>
</div>
</div>









<!-- <div class="Message-Content" >
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
</div> -->
</div>
