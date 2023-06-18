<?php
include('php/connect.php');
include('php/create_db.php');
session_start();

if (isset($_GET['customerName']) && isset($_GET['customerPhone'])) {
    $customerName = $_POST['customerName'];
    $customerPhone = $_POST['customerPhone'];

    echo $customerName;
} else {
    echo "Missing customerName or customerPhone parameter";
}

?>
