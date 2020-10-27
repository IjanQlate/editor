<?php
include '../db/dbconfig.php';
// print_r($_POST);
session_start();

if ($_POST['function'] == "save") {

    $titlepage = $_POST['titlepage'];
    $createdby = $_POST['createdby'];
    $noofpage = $_POST['noofpage'];
    $datapage = serialize($_POST['datapage']);
    
    $sql = "INSERT INTO paperwork (title, owner, paperwork, status, createddate)
    VALUES ('$titlepage', '$createdby', '$datapage', 'Pending Approval', NOW())";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
else if ($_POST['function'] == "view") {

  // $array = unserialize( $string );
  $id = $_POST['id'];
  $sql = "SELECT * FROM paperwork WHERE id = '$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
    $row = $result->fetch_assoc();
      
      $datajson = unserialize($row['paperwork']);
      $title = $row['title'];

    echo json_encode(array("title"=>$title, "paperwork"=>$datajson));

  } else {
  echo "0 results";
  }
  $conn->close();

}
else if ($_POST['function'] == "edit") {

  $id = $_POST['id'];
  $titlepage = $_POST['titlepage'];
  $createdby = $_POST['createdby'];
  $noofpage = $_POST['noofpage'];
  $datapage = serialize($_POST['datapage']);
  $updatedby = $_SESSION['name'];

  $sql = "UPDATE paperwork SET title='$titlepage',owner='$createdby',updatedby='$updatedby',paperwork='$datapage',lastupdate=NOW() WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();

}
else if ($_POST['function'] == "comment") {

  $id = $_POST['id'];
  $comment = "Date Comment: ".date("Y-m-d H:m:s A") .", Comment: ".$_POST['comment_msg'];
  $commentby = $_SESSION['name'];
  
  $sql = "SELECT * FROM paperwork WHERE id = '$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($row['comment'] == "") {
    $sql = "UPDATE paperwork SET comment='$comment' ,commentby='$commentby',datecomment=NOW() WHERE id='$id'";
  } else {
    $sql = "UPDATE paperwork SET comment=IF(comment='', '$comment', CONCAT(comment, ',$comment')),commentby='$commentby',datecomment=NOW() WHERE id='$id'";
  }

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();

}
else if ($_POST['function'] == "approve") {

  $id = $_POST['id'];
  $status = "Approved";
  $approveby = $_SESSION['name'];

  $sql = "UPDATE paperwork SET status='$status',approveby='$approveby',dateapprove=NOW() WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();

}





?>