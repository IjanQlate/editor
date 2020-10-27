<?php
session_start();
if (empty($_SESSION['name'])){
  header("Location: http://localhost/editor/login.php");
  die();
}
include 'db/dbconfig.php';
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

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

    <!-- CSS PRINT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <link rel="stylesheet" href="plugins/jasonday-printThis/assets/css/normalize.css">
  <link rel="stylesheet" href="plugins/jasonday-printThis/assets/css/skeleton.css"> -->


  <link href="plugins/jquery-steps/demo/css/jquery.steps.css" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    /* th { font-size: 14px; }
    td { font-size: 13px; } */

    .selected {
      background-color: #d1f9ff;
    }
  </style>
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
            <a href="search.php" class="nav-link active">
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
            <h1>Search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="#">E-Paperwork</a></li>
              <li class="breadcrumb-item active">Search</li>
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
                <h3 class="card-title"></h3>
                              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered nowrap" style="width:100%">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>View</th>
                    <?php if ($_SESSION['group_system'] == "Pengarah Program") { ?>
                    <th>Edit</th>
                    <?php } ?>
                    <?php if ($_SESSION['group_system'] == "Sokongan") { ?>
                    <th>Comment</th>
                    <?php } ?>
                    <!-- <th>Delete</th> -->
                    <?php if ($_SESSION['group_system'] == "Pengarah") { ?>
                    <th>Approval</th>           
                    <?php } ?>         
                    <th>Title</th>
                    <th>Owner</th>
                    <th>Status Approval</th>
                    <th>Comment</th>
                    <th>Created Date</th>
                    <th>Updated By</th>
                    <th>Last Updated</th>
                    <th>Comment By</th>
                    <th>Date Comment</th>
                    <th>Approve By</th>
                    <th>Date Approve</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM paperwork";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                      // output data of each row
                      $no = 1;
                      while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo "<button type=\"button\" class=\"btn btn-primary btn-xs\" onclick=\"view($id)\" >View</button>"; ?></td>
                        <?php if ($_SESSION['group_system'] == "Pengarah Program") { ?>
                          <?php if ($row['status'] == "Pending Approval") { ?>
                        <td><?php echo "<button type=\"button\" class=\"btn btn-warning btn-xs\" onclick=\"edit($id)\" >Edit</button>"; ?></td>
                          <?php } else { ?>
                            <td></td>
                          <?php } ?>
                        <?php } ?>
                        <?php if ($_SESSION['group_system'] == "Sokongan") { ?>
                          <?php if ($row['status'] == "Pending Approval") { ?>
                        <td><?php echo "<button type=\"button\" class=\"btn btn-success btn-xs\" onclick=\"comment($id)\" >Comment</button>"; ?></td>
                          <?php } else { ?>
                            <td></td>
                          <?php } ?>
                        <?php } ?>
                        <!-- <td><?php echo "<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"delete($id)\" >Delete</button>"; ?></td> -->
                        <?php if ($_SESSION['group_system'] == "Pengarah") { ?>
                          <?php if ($row['status'] == "Pending Approval") { ?>
                        <td><?php echo "<button type=\"button\" class=\"btn btn-info btn-xs\" onclick=\"approve($id)\" >Approve</button>"; ?></td>
                          <?php } else { ?>
                            <td></td>
                          <?php } ?>
                        <?php } ?>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['owner']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo $row['createddate']; ?></td>
                        <td><?php echo $row['updatedby']; ?></td>
                        <td><?php echo $row['lastupdate']; ?></td>
                        <td><?php echo $row['commentby']; ?></td>
                        <td><?php echo $row['datecomment']; ?></td>
                        <td><?php echo $row['approveby']; ?></td>
                        <td><?php echo $row['dateapprove']; ?></td>
                    </tr>
                    <?php
                        $no++;
                      }
                    }
                    $conn->close();
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->


    <div class="modal fade" id="modalview">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="paperworktitle"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="pages"></div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary" id="print">Print</button> -->
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="modalComment">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Comment</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" name="id_comment" id="id_comment" hidden>
            <textarea name="comment" id="comment" cols="30" rows="10" style="width:100%;"></textarea>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="CommentPage">Comment</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


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

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

  <!-- printThis -->
  <script type="text/javascript" src="plugins/jasonday-printThis/printThis.js"></script>
  <script src="https://raw.githubusercontent.com/erikzaadi/jQueryPlugins/master/jQuery.printElement/jquery.printElement.js"></script>

<script>
  $(function () {

    $("#print").on("click", function() {

      window.print();

    });


    var table = $("#example1").DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "scrollX": true,
      "select": true
    });

    $("#view").on("click", function() {
      alert ("View");
      console.log(table.row('.selected').data());
      var dataArr = [];
    $.each($("#example1 tr.selected"),function(){ //get each tr which has selected class
        dataArr.push($(this).find('td').eq(0).text()); //find its first td and push the value
        //dataArr.push($(this).find('td:first').text()); You can use this too
    });
    console.log(dataArr);      
    });

    $("#CommentPage").on("click", function() {

      if($("#comment").val()) {
        $.ajax({
          url: "paperwork/paperwork.php",
          dataType: "text",
          type: "POST",
          data: {
            "function": "comment",
            "id": $("#id_comment").val(),
            "comment_msg": $("#comment").val()
          },
          success: function(data) {
            alert (data);
            location.reload();
          }

        });
      } else {
        alert ("Comment is null");
      }

    });

    // $("#delete").on("click", function() {
    //   alert ("Delete");
    // });

    // $("#approve").on("click", function() {
    //   alert ("Approve");
    // });

    $('#example1 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

  });

  function view(id) {

    $("#pages").empty();

    $.ajax({
        url: "paperwork/paperwork.php",
        dataType: "json",
        type: "POST",
        data: {
          "function": "view",
          "id": id,
        },
        success: function(data) {

          console.log(data);
          console.log(data.paperwork.length);
          for (i=0; i<data.paperwork.length; i++) {
            var valuepage = i + 1;
            var template = '<div class="input-group input-group-sm" id="div_'+valuepage+'"><textarea class="textarea" id="page_'+valuepage+'" placeholder="Place some text here" style="width: 100%;  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" readonly>'+data.paperwork[i]+'</textarea></div>';
            $("#pages").append(template);
            summernote(valuepage);
            // $("#valuepage").val(valuepage);

          }
          $("#paperworktitle").text(data.title);




        }
      });
    $("#modalview").modal('show');

  }

  function edit(id) {
    window.location.replace("http://localhost/editor/editpaperwork.php?id="+id);
  }

  function comment(id) {

    $("#id_comment").val(id);
    $("#modalComment").modal("show");

  }

  function approve(id) {

    $.ajax({
        url: "paperwork/paperwork.php",
        dataType: "text",
        type: "POST",
        data: {
          "function": "approve",
          "id": id,
        },
        success: function(data) {

          alert (data);
          location.reload();

        }      
    })

  }

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
    }).summernote("disable");
  }
</script>
</body>
</html>
