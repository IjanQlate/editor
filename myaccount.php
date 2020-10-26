<?php
session_start();
if (empty($_SESSION['name'])){
  header("Location: http://localhost/editor/login.php");
  die();
}

include 'db/dbconfig.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-PAPERWORK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

  <link href="plugins/jquery-steps/demo/css/jquery.steps.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-primary text-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="contact.php" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="logo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-PAPERWORK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="paperwork.php" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>E-Paperwork</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="search.php" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Search</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="myaccount.php" class="nav-link active">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>My Account</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="feedback.php" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Feedback</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="help.php" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Help</p>
            </a>
          </li>
          <li class="nav-header">AUTH</li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">E-Paperwork</a></li>
              <li class="breadcrumb-item active">My Account</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">MY ACCOUNT</a></li>
                  <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">CHANGE PASSWORD</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" action="auth/auth.php" method="POST" id="myaccount">
                      <input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" readonly hidden>
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Name" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="group" class="col-sm-2 col-form-label">Group</label>
                        <div class="col-sm-10">
                          <!-- <input type="text" class="form-control" name="group" id="group" value="<?php echo $row['group_system']; ?>" placeholder="Group System"> -->
                          <select name="group" id="group" class="form-control" required>
                            <option <?php if ($row['group_system'] == "Pengarah Program") { echo ' selected="selected"'; } ?> value="Pengarah Program">Pengarah Program</option>
                            <option <?php if ($row['group_system'] == "Sokongan") { echo ' selected="selected"'; } ?> value="Sokongan">Sokongan</option>
                            <option <?php if ($row['group_system'] == "Pengarah") { echo ' selected="selected"'; } ?> value="Pengarah">Pengarah</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" name="saveprofile" id="saveprofile" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="changepassword">
                    <form class="form-horizontal" action="auth/auth.php" method="POST" id="changepasswordform">
                      <input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" readonly hidden>
                      <div class="form-group row">
                        <label for="currentpassword" class="col-sm-4 col-form-label">Current Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" name="currentpassword" id="currentpassword" placeholder="Current Password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="newpassword" class="col-sm-4 col-form-label">New Password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="newpassword" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                          <small id="message" style="color:red"></small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8">
                          <button type="button" id="changepasswordbtn" class="btn btn-danger">Change Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">E-PAPERWORK TEAM</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script src="plugins/summernote/summernote-ext-print.js"></script>

<script src="plugins/jquery-steps/build/jquery.steps.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
<script>
$(function() {

  var myaccount = $("#myaccount");
  var changepassword = $("#changepasswordform");

  myaccount.validate();
  changepassword.validate();

  $("#saveprofile").on("click", function() {

    if (myaccount.valid()) {

      $.ajax({
          url: myaccount.attr("action"),
          method: myaccount.attr("method"),
          dataType: "text",
          data: myaccount.serialize() + "&function=myaccount",
          success: function (data){

              console.log(data);
              if (data == "Successfully changed your detail") {
                alert ("Successful, please relogin");
                window.location.replace("http://localhost/editor/login.php");
              } else {
                alert (data);
              }
          }
      });

    }


  });

  $("#changepasswordbtn").on("click", function() {

    if (changepassword.valid()) {

      $.ajax({
          url: changepassword.attr("action"),
          method: changepassword.attr("method"),
          dataType: "text",
          data: changepassword.serialize() + "&function=changepassword",
          success: function (data){

              console.log(data);
              $("#message").html(data);
              if (data == "Password has been changed") {
                changepassword[0].reset();
              }
          }
      });

    }


  });

});
</script>
</body>
</html>
