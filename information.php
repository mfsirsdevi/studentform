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
  $fmId = $_SESSION["userId"];
  $parentId = $_SESSION["user"];

  $request = $studentobj->connection->newFindAllCommand('StudentForm');
  $request->addSortRule('studentName', 1);
  $result = $request->execute();
 ?>
   <!-- Start of the body part-->
  <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="information.php">Users</a></li>
        <li><a href="home.php">Account Info</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
  <div class="container">
    <div id="secondary-nav">
        <a class="btn btn-success pull-right" data-toggle="modal" data-target="#add_new_record_modal" href="#">Add New Student</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
              <th>Name</th>
              <th>Admission Number</th>
              <th>Email</th>
              <th>Role</th>
              <th>Update</th>
              <th>Delete</th>
              <th>View</th>
            </thead>
    <?php if (!(FileMaker::isError($result))) {
            $records = $result->getRecords();
            $recordsCount = 0;
            foreach ($records as $record) {
                if ($record->getRecordId() !== $fmId && $record->getField('parentUserId') === $parentId) {
                    $recordsCount = 1;
                  ?>
                    <tr>
                      <td><?php echo $record->getField('studentName') ?></td>
                      <td><?php echo $record->getField('studentAdmn') ?></td>
                      <td><?php echo $record->getField('studentEmail') ?></td>
                      <td><?php echo $record->getField('userRole') ?></td>
                      <?php
                         echo '<td><button id="upd'.$record->getRecordId().'" class="btn btn-warning updatebt">Update</button></td><td><button id="del'.$record->getRecordId().'" class="btn btn-danger delete-btn">Delete</button></td><td><button id="view'.$record->getRecordId().'" type="button" class="btn btn-default view-details"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></td>';
                      ?>
                    </tr>
                <?php } ?>
        <?php }
            if ($recordsCount === 0) { ?>
              <tr>No users to show</tr>
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
            <h4 class="modal-title" id="myModalLabel">Add New Student</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Name </label>
              <input type="text" id="name" class="form-control" />
              <span></span>
            </div>

            <div class="form-group">
              <label for="admn">Admission Number </label>
              <input type="text" id="admn" class="form-control" />
              <span></span>
            </div>

            <div class="form-group">
              <label for="email">Email Address </label>
              <input type="text" id="email" class="form-control" />
              <span></span>
            </div>
            <div class="form-group">
              <label >Role:  </label>
              <div>
                <select class="form-control" name="role" id="role">
                  <option value="general">admin</option>
                  <option value="others">user</option>
                </select><br/>
              </div>
            </div>
            <input type="hidden" id="hidden_parent_id" value="<?php echo "$parentId"; ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="record-btn" type="button" class="btn btn-primary">Add User</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal - Update User details -->
    <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="update-name">First Name</label>
              <input type="text" id="update-name" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="update-admn">Admission Number</label>
              <input type="text" id="update-admn" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="update-email">Email Address</label>
              <input type="text" id="update-email" class="form-control"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary save-btn">Save Changes</button>
            <input type="hidden" id="hidden_user_id">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Delete User</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete user? &hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary deletebt">Yes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="user_details_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">User Details</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
              <tr>
                <td><strong>Name</strong></td>
                <td id="name-details"></td>
              </tr>
              <tr>
                <td ><strong>Admission Number</strong></td>
                <td id="admn-details"></td>
              </tr>
              <tr>
                <td ><strong>Email</strong></td>
                <td id="email-details"></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- // Modal -->
  </div>

   <!--End of Body-->
  <?php
    function customPageFooter()
    { ?>
      <script type="text/javascript" src="assets/js/information.js"></script>
  <?php }
    include_once 'footer.php' ;
   ?>