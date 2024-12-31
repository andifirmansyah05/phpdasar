<?php 
require "functions.php";

// $username = "admin";
$result = mysqli_query($conn, "SELECT * FROM user");
$result2 = [];
while ($row = mysqli_fetch_assoc($result)) {
    $result2[] = $row;
}

var_dump($result2);

?>