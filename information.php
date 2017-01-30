<?php
  /*
  file-name: information.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: form for collecting student and admin additonal information.
  */

  session_start();

  if (!isset($_SESSION["user"]) && !isset($_SESSION["role"])) {
    $studentobj->redirectToURL("login.php");
  }

  $PageTitle = "Users Data";
  include_once 'header.php' ;
  include_once './config/config.php';

  $sql = "SELECT * FROM studentdata WHERE 1 ORDER BY studentName ";
  $stmt = $conn->query($sql);
  $res = $stmt->fetchAll();
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
    <?php if (count($res) > 0) { ?>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>Name</td>
              <td>admission</td>
              <td>email</td>
              <td>Id</td>
              <td>Update</td>
              <td>Delete</td>
            </tr>
        <?php foreach ($res as $row) {?>
           <tr>
             <td id="studentName"><?php echo $row["studentName"]?></td>
             <td id="studentAdmn"><?php echo $row["studentAdmn"]?></td>
             <td id="studentEmail"><?php echo $row["studentEmail"]?></td>
             <td id="student<?php echo $row["studentId"]?>"><?php echo $row["studentId"]?></td>
             <?php
                 echo '<td id="update'.$row["studentId"].'"><button class="btn btn-default update-bt">Update</button></td>';
                 echo '<td id="delete'.$row["studentId"].'"><button class="btn btn-default delete-bt">Delete</button></td>';
             ?>
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