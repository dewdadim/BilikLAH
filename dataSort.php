<?php
    include('php/connect.php');
    session_start();

    if(isset($_POST['sortPriceLH'])) {
        $sql = "SELECT * FROM Room ORDER BY roomPrice ASC";
        echo "<script>window.location='rooms.php'</script>";
    }

    if(isset($_POST['sortPriceHL'])) {
        $sql = "SELECT * FROM Room ORDER BY roomPrice DESC";
        echo "<script>window.location='rooms.php'</script>";
    }
?>