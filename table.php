<?php

    $servername = "localhost";
    $username = "webadmin";
    $password = "1234";
    $dbname = "myDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <style>table, th, td {
  border: 1px solid black;
}</style>
</head>
<body>
    

    <button><a href="insert_form.php" style="text-decoration:none">เพิ่มสมาชิก</a></button>
    <hr>

    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Tool</th>
        </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["firstname"]; ?></td>
            <td><?php echo $row["lastname"]; ?></td>
            <th>
                <button><a href="update_form.php?id=<?php echo $row["id"]; ?>" style="text-decoration:none">แก้ไข</a></button>
                <button><a href="delete_post.php?id=<?php echo $row["id"]; ?>" style="text-decoration:none">ลบ</a></button>
            </th>
        </tr>
    <?php
        }
    } else {
        echo "0 results";
    }
    ?>
    </table>

</body>
</html>