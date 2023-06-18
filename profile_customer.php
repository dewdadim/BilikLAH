<?php
include('php/connect.php');

$customerName = $_POST['customerName'];
$customerPhone = $_POST['customerPhone'];
$customerPassword = $_POST['customerPassword'];
$customerEmail = $_POST['customerEmail'];


$updateQuery = "UPDATE Customer SET customerName = '$customerName' WHERE customerId = 999";
 
 
if (mysqli_query($link,$updateQuery)) {
    echo "Name updated successfully.";
} else {
    echo "Error updating name: " . mysqli_error($link);
}

// Close the database connection
mysqli_close($link);
?>









 