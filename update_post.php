<?php

    $servername = "localhost";
    $username = "webadmin";
    $password = "1234";
    $dbname = "myDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE MyGuests SET firstname ='{$_POST['firstname']}', lastname='{$_POST['lastname']}', email = '{$_POST['email']}' WHERE id = '{$_POST['id']}'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

?>