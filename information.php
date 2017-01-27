<?php
    $PageTitle = "User Information";
    include_once 'header.php' ;
    include_once './config/config.php';
    session_start();
    /*
     * File Name: information.php
     * Used For: Student Form creation assignment for mindfire training session
     * Created By: R S DEVI PRASAD
     * Description: information page of the student App for fetching all the student data inside the student table and showing the data to the admin.
  */

  if (!isset($_SESSION["user"]) && !isset($_SESSION["role"])) {
    $studentobj->redirectToURL("login.php");
  }

  $request = $studentobj->connection->newFindAllCommand('StudentForm');
  $request->addSortRule('studentName', 1);
  $result = $request->execute();
 ?>
   <!-- Start of the body part-->

   <div class="container">
    <div id="header">
      <div id="logo"><a href="home.php">Welcome</a></div>
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
            <thead>
              <th>Name</th>
              <th>admission</th>
              <th>email</th>
            </thead>
        <?php
            $records = $result->getRecords();
            foreach ($records as $record) {?>
           <tr>
             <td><?php echo $record->getField('studentName')?></td>
             <td><?php echo $record->getField('studentAdmn')?></td>
             <td><?php echo $record->getField('studentEmail')?></td>
           </tr>
        <?php } ?>
          </table>
        </div>
    <?php }?>
  </div>

   <!--End of Body-->
  <?php
    include_once 'footer.php' ;
   ?>