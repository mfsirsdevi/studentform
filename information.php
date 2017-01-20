<?php
  $PageTitle = "Entered Data";
  include_once 'header.php' ;
  include_once './config/dbconnect.php';

  $sql = "SELECT * FROM studentdata WHERE 1 ORDER BY studentName ";
  $stmt = $conn->query($sql);
  $res = $stmt->fetchAll();
 ?>
   <!-- Start of the body part-->

   <div class="container">
    <div id="header">
      <div id="logo">Welcome</div>
      <div id="menu">
        <ul>
          <li><a href="information.php">Users</a></li>
          <li><a href="#">Account Info</a></li>
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
            </tr>
        <?php foreach ($res as $row) {?>
           <tr>
             <td><?php echo $row["studentName"]?></td>
             <td><?php echo $row["studentAdmn"]?></td>
             <td><?php echo $row["studentEmail"]?></td>
             <td><?php echo $row["studentId"]?></td>
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