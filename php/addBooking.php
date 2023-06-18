<?php
// $link = mysqli_connect("localhost", "root", "", "biliklah_db");
// if (!$link) {
//     die('Could not connect: ' . mysqli_connect_error());
// }

include('php/connect.php');

$roomName = $_POST['roomName'];
$roomDesc = $_POST['roomDesc'];
$roomPrice = $_POST['roomPrice'];
$roomCapacity = $_POST['roomCapacity'];

$insertQuery = "INSERT INTO Room (roomName, roomDesc, roomPrice, roomCapacity) 
               VALUES ('$roomName', '$roomDesc', '$roomPrice', '$roomCapacity')";

if (mysqli_query($link, $insertQuery)) {
    echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . mysqli_error($link);
}

mysqli_close($link);
?>