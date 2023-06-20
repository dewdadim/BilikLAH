<?php
    include('php/connect.php');
    session_start();

    
    if(isset($_POST['sortPriceLH'])) {
        $sql = "SELECT * FROM Room ORDER BY roomPrice ASC";
    }

    else if(isset($_POST['sortPriceHL'])) {
        $sql = "SELECT * FROM Room ORDER BY roomPrice DESC";
    }

    else {
        $sql = "SELECT * FROM Room";
    }
?>