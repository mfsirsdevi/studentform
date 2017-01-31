<?php
  session_start();
  $PageTitle = "Home";
  include_once 'header.php';
  include_once './config/config.php';
    /*
     * File Name: home.php
     * Used For: Student Form creation assignment for mindfire training session
     * Created By: R S DEVI PRASAD
     * Description: home page of the student App for showing to the users and admins.
  */

  if (!isset($_SESSION["user"]) && !isset($_SESSION["role"])) {
    $studentobj->redirectToURL("login.php");
  }

  $id = $_SESSION["user"];
  $fmId = $_SESSION["userId"];
  $request = $studentobj->connection->newFindCommand('StudentForm');
  $request->addFindCriterion('studentId','=='.$id);
  $result = $request->execute();
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
    <?php if (!(FileMaker::isError($result))) { ?>
        <div class="table-responsive">
          <table class="table table-bordered">
            <?php
                $records = $result->getRecords();
                foreach ($records as $record) { ?>
              <tr>
                <td>name</td>
                <td><?php echo $record->getField('studentName')?></td>
              </tr>
              <tr>
                <td>admn</td>
                <td><?php echo $record->getField('studentAdmn')?></td>
              </tr>
              <tr>
                <td>email</td>
                <td><?php echo $record->getField('studentEmail')?></td>
              </tr>
            <?php } ?>
          </table>
        </div>
    <?php } ?>
  </div>

 <?php
  include_once 'footer.php';
  ?>