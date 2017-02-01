<?php
    session_start();
    $PageTitle = "Home";
    include_once 'header.php';
    include_once './config/config.php';

    /*
     * File Name: userhome.php
     * Used For: Student Form creation assignment for mindfire training session
     * Created By: R S DEVI PRASAD
     * Description: user home page containing all the data about the user and logout button.
    */

    if (!isset($_SESSION["user"]) && !isset($_SESSION["role"])) {
      $studentobj->redirectToURL("login.php");
    }
    $id = $_SESSION["user"];
    $request = $studentobj->connection->newFindCommand('StudentForm');
    $request->addFindCriterion('studentId','=='.$id);
    $result = $request->execute();
 ?>

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
        <a class="navbar-brand" href="userhome.php">Brand</a>
      </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="userhome.php">Account Info</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>

<div class="container">
    <?php if (!(FileMaker::isError($result))) {
        $records = $result->getRecords();
        $firstName = explode(' ', trim($records[0]->getField('studentName')))[0]
      ?>
        <div id="secondary-nav">
          <h2 class="pull-left">Welcome <strong><?php echo $firstName ?>!</strong></h2>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <?php foreach ($records as $record) { ?>
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
        <?php echo '<button id="upd'.$record->getRecordId().'" class="btn btn-warning updatebt">Update</button>' ?>
    <?php } ?>

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
<!-- // Modal -->
  </div>

 <?php
    function customPageFooter()
    { ?>
      <script type="text/javascript" src="assets/js/information.js"></script>
  <?php }
    include_once 'footer.php' ;
   ?>