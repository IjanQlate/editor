<?php

include '../db/dbconfig.php';

if ($_POST['function'] == "login") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            echo 'Password is valid!';
            session_start();
            $_SESSION['name'] = $row['name'];
            $_SESSION['group_system'] = $row['group_system'];
            $_SESSION['email'] = $row['email'];
        } else {
            echo 'Invalid password.';
        }      

    } else {
        echo "Invalid username";
    }

    $conn->close();



} else if ($_POST['function'] == "register") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $group = $_POST['group'];

    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows < 1) {

        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows < 1) {

            $sql = "INSERT INTO user (name, email, username, password, group_system)
            VALUES ('$name', '$email', '$username', '$password', '$group')";
            
            if ($conn->query($sql) === TRUE) {
              echo "Registration successfully";
            } else {
              echo "Failed to register. Please try again";
            }

        } else {
            echo "Username already used.";
        }

    } else {
        echo "Email address already used.";
    }    
    $conn->close();

} else if ($_POST['function'] == "myaccount"){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $group = $_POST['group'];

    $sql = "UPDATE user SET name = '$name', email = '$email', username = '$username', group_system='$group' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
      echo "Successfully changed your detail";
    } else {
      echo "Fail to update your data";
    }

} else if ($_POST['function'] == "changepassword"){
    
    $id = $_POST['id'];
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];

    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if (password_verify($currentpassword, $row['password'])) {

        $password = password_hash($newpassword, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET password='$password' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
          echo "Password has been changed";
        } else {
          echo "Error change password";
        }
    } else {
        echo "Mismatch your current password";
    }

    $conn->close();

}



?>