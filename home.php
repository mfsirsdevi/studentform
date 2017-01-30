<!--
  file-name: home.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: home page of the student App for showing to the users and admins.
-->

<?php
  session_start();
  $PageTitle = "Home";
  include_once 'header.php';
  include_once './config/config.php';

  if (!isset($_SESSION["user"]) && !isset($_SESSION["role"])) {
    $studentobj->redirectToURL("login.php");
  }

  $id = $_SESSION["user"];
  $sql = "SELECT * FROM studentdata WHERE studentId=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->execute();
  $result = $stmt->fetchAll();
 ?>


  <div class="container">
    <div id="header">
      <div id="logo"><a href="home.php" >Welcome</a></div>
      <div id="menu">
        <ul>
          <li><a href="information.php">Users</a></li>
          <li><a href="home.php">Account Info</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <?php if (count($result) > 0) { ?>
        <div class="table-responsive">
          <table class="table table-bordered">
            <?php foreach ($result as $row) { ?>
              <tr>
                <td>name</td>
                <td><?php echo $row['studentName']?></td>
              </tr>
              <tr>
                <td>admn</td>
                <td><?php echo $row['studentAdmn']?></td>
              </tr>
              <tr>
                <td>email</td>
                <td><?php echo $row['studentEmail']?></td>
              </tr>
              <tr>
                <td>Id</td>
                <td><?php echo $row['studentId']?></td>
              </tr>
            <?php } ?>
          </table>
        </div>
    <?php } ?>
  </div>

 <?php
  include_once 'footer.php';
  ?>