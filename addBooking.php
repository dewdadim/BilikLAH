<?php
// $link = mysqli_connect("localhost", "root", "", "biliklah_db");
// if (!$link) {
//     die('Could not connect: ' . mysqli_connect_error());
// }

include('php/connect.php');

$roomName = $_POST['roomName'];
$roomPrice = $_POST['roomPrice'];
$roomCapacity = $_POST['roomCapacity'];
$roomImg = $_POST['roomImage'];


$insertQuery = "INSERT INTO Room (roomName, roomPrice, roomCapacity, roomImage) 
               VALUES ('$roomName', '$roomPrice', '$roomCapacity', '$roomImg')";

if (mysqli_query($connect, $insertQuery)) {
    // echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . mysqli_error($connect);
}

mysqli_close($connect);
?>