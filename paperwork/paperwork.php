<?php
include '../db/dbconfig.php';
// print_r($_POST);

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
else if ($_POST['function'] == "edit") {

    // $array = unserialize( $string );
    $sql = "SELECT * FROM paperwork WHERE id = 6";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $datajson = unserialize($row['paperwork']);

    }

    print_r($datajson);

    } else {
    echo "0 results";
    }
    $conn->close();

}





?>