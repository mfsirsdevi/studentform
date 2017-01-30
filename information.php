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
    <div id="secondary-nav">
        <a class="btn btn-success pull-right" data-toggle="modal" data-target="#add_new_record_modal" href="#">Add New Student</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <th>Name</th>
              <th>admission</th>
              <th>email</th>
              <th>Update</th>
              <th>Delete</th>
            </thead>
    <?php if (!(FileMaker::isError($result))) {
            $records = $result->getRecords();
            foreach ($records as $record) { ?>
           <tr>
             <td><?php echo $record->getField('studentName') ?></td>
             <td><?php echo $record->getField('studentAdmn') ?></td>
             <td><?php echo $record->getField('studentEmail') ?></td>
             <?php
                 echo '<td><button id="upd'.$record->getRecordId().'" class="btn btn-warning updatebt">Update</button></td>
             <td><button id="del'.$record->getRecordId().'" class="btn btn-danger deletebt">Delete</button></td>';
              ?>
           </tr>
        <?php } ?>
    <?php } ?>
        </table>
    </div>

    <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
    <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Name: </label>
              <input type="text" id="name" class="form-control" />
              <span></span>
            </div>

            <div class="form-group">
              <label for="admn">Admission Number: </label>
              <input type="text" id="admn" class="form-control" />
              <span></span>
            </div>

            <div class="form-group">
              <label for="email">Email Address: </label>
              <input type="text" id="email" class="form-control" />
              <span></span>
            </div>
            <div class="form-group">
              <label for="pass">Password: </label>
              <input type="password" id="pass" class="form-control" />
              <span></span>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="record-btn" type="button" class="btn btn-primary">Add Record</button>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!--End of Body-->
  <?php
    function customPageFooter()
    { ?>
      <script type="text/javascript" src="assets/js/information.js"></script>
  <?php }
    include_once 'footer.php' ;
   ?>