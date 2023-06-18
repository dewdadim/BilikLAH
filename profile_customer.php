<?php
include('php/connect.php');


$customerName = $_POST['customerName'];
$customerPhone = $_POST['customerPhone'];
$customerPassword = $_POST['customerPassword'];
$customerEmail = $_POST['customerEmail'];


$updateQuery = "UPDATE Customer SET customerName = '$customerName', customerPhone = '$customerPhone', customerPassword = '$customerPassword', customerEmail = '$customerEmail' WHERE customerId = $customerId";
 
 
if (mysqli_query($connect,$updateQuery)) {
    echo "Fields updated successfully.";
} else {
    echo "Error updating fields: " . mysqli_error($link);
}

// Close the database connection
mysqli_close($connect);


$customerName="SELECT customerName FROM Customer WHERE Phone = '123456789'";









?>
