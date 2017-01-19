<!--
  file-name: home.php
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: home page of the student App for showing to the users and admins.
-->
<?php
  $PageTitle = "Home";
  include_once 'header.php';
 ?>

  <div class="container">
    <div id="header">
      <div id="logo">Welcome</div>
      <div id="menu">
        <ul>
          <li><a href="#">Users</a></li>
          <li><a href="#">Account Info</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <?php
      include 'information.php';
     ?>
  </div>

 <?php
  include_once 'footer.php';
  ?>