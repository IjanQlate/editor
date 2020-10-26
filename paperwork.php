<?php
session_start();
if (empty($_SESSION['name'])){
  header("Location: http://localhost/editor/login.php");
  die();
}
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
            <a href="paperwork.php" class="nav-link active">
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
            <a href="myaccount.php" class="nav-link">
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
            <h1>Create E-Paperwork</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create E-Paperwork</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Create E-Paperwork
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button> | 
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <!-- <p>Page <code>1</code></p> -->
                <div class="input-group input-group-sm mb-3">
                  <input type="text" class="form-control" id="titlepaperwork" value="" placeholder="Title Paperwork"> 	&nbsp;	&nbsp;
                  <input type="text" class="form-control" id="createdby" value="<?php echo $_SESSION['name']; ?>" placeholder="Created By" readonly> 	&nbsp;	&nbsp;
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat" id="SavePaperwork">Save Paperwork</button>
                  </span>
                </div>
                <div class="input-group input-group-sm mb-3">
                  <input type="number" class="form-control" id="valuepage" value="1" readonly> 	&nbsp;	&nbsp;
                  <span class="input-group-append">
                    <button type="button" class="btn btn-success btn-flat" id="AddPage">Add Page</button> 	&nbsp;	&nbsp;
                    <button type="button" class="btn btn-danger btn-flat" id="DeletePage">Delete Page</button>
                  </span>
                </div>
                <div class="input-group input-group-sm" id="div_1">
<!--                   <h4>PAGE 1</h4> -->
                  <textarea class="textarea" id="page_1" placeholder="Place some text here" style="width: 100%;  line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div id="pages"></div>
          </div>
        </div>
        <!-- /.col-->
      </div>
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
<script>
  $(function () {

    summernote(1);

    $("#AddPage").on("click", function() {

      var valuepage = parseInt($("#valuepage").val()) + 1;
      var template = '<div class="input-group input-group-sm" id="div_'+valuepage+'"><textarea class="textarea" id="page_'+valuepage+'" placeholder="Place some text here" style="width: 100%;  line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></div>';
      $("#pages").append(template);
      summernote(valuepage);
      $("#valuepage").val(valuepage);

    });



    $("#DeletePage").on("click", function() {

      if ($("#valuepage").val() > 1) {
        var valuepage = parseInt($("#valuepage").val()) - 1;
        $("#div_"+valuepage).remove();
        $("#valuepage").val(valuepage);
      }

    });


    $("#SavePaperwork").on("click", function() {

        var valuepage = $("#valuepage").val();
        var datapage = [];

        for (i=1; i<=valuepage; i++) {

          console.log($("#page_"+i).val());
          datapage.push($("#page_"+i).val())

        }

        console.log(datapage);
        $.ajax({
          url: "paperwork/paperwork.php",
          dataType: "text",
          type: "POST",
          data: {
            "function": "save",
            "titlepage": $("#titlepaperwork").val(),
            "createdby": $("#createdby").val(),
            "noofpage": $("#valuepage").val(),
            "datapage": datapage
          },
          success: function(data) {

            console.log(data);
            alert (data);
            location.reload();

          }
        });




    });

  });

  function summernote(no){

    // Summernote
    $('#page_'+no).summernote({
        height: 400,
        minHeight: 400,              
        maxHeight: 600,
        codemirror: { // codemirror options
          theme: 'monokai'
        },
        toolbar: [
          ['misc', ['print']],
          // ['style', ['bold', 'italic', 'underline', 'clear']],
          // ['font', ['strikethrough', 'superscript', 'subscript']],
          // ['fontsize', ['fontsize']],
          // ['color', ['color']],
          // ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']],
          

          ['style', ['style']],
          ['font-style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
          ['font', ['fontname']],
          ['font-size',['fontsize']],
          ['font-color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video', 'hr']],
          ['misc', ['fullscreen', 'codeview', 'help']]
        ],
    });
  }
</script>
</body>
</html>
