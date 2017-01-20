<?php
  $PageTitle = "Home";
  include_once 'header.php';
  include_once './config/dbconnect.php';
 ?>

<div class="container">
    <div id="header">
      <div id="logo">Welcome</div>
      <div id="menu">
        <ul>
          <li><a href="accinfo.php">Account Info</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>

 <?php
  include_once 'footer.php';
  ?>