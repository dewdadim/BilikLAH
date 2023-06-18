<?php

include('create_db.php');
include('php/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'biliklah/img/room_img/'; // Change the directory path according to your folder structure
    $uploadFile = $uploadDir . basename($_FILES['RoomImage']['name']);

    if (move_uploaded_file($_FILES['RoomImage']['tmp_name'], $uploadFile)) {
        echo "Image uploaded and moved to: " . $uploadFile;
        $roomImg = $uploadFile; // Store image URL
    } else {
        echo "Error uploading image.";
        $roomImg = ""; // Set an empty value for the image URL if there's an error
    }

    $roomName = $_POST['roomName'];
    $roomPrice = $_POST['roomPrice'];
    $roomCapacity = $_POST['roomCapacity'];

    $insertQuery = "INSERT INTO Room (roomName, roomPrice, roomCapacity, roomImage) 
                   VALUES ('$roomName', '$roomPrice', '$roomCapacity', '$roomImg')";

    if (mysqli_query($link, $insertQuery)) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . mysqli_error($link);
    }
}

mysqli_close($link);
?>