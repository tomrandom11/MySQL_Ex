<?php

    $servername = "localhost";
    $username = "webadmin";
    $password = "1234";
    $dbname = "myDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, firstname, lastname, email FROM MyGuests WHERE id = '{$_GET['id']}'";
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
    

    <button><a href="table.php" style="text-decoration:none">ย้อนกลับ</a></button>
    <hr>

    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
            <form action="update_post.php" method="POST">
                ชื่อ : <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" /> <br/>
                นามสกุล : <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" /> <br/>
                Email : <input type="text" name="email" value="<?php echo $row['email']; ?>" /> <br/>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

                <input type="submit" value="บันทึก" name="submit_btn">
            </form>
        <?php
            }
        } else {
            echo "0 results";
        }
    ?>

</body>
</html>