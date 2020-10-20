<?php
    require_once('database.php');

    $sql = "SELECT * FROM users";

    $db = new Database();

    var_dump($db->query($sql));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br>
    body html
</body>
</html>