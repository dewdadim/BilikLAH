<?php
    include('php/connect.php');
    session_start();

    $bookingID = $_POST['bookingID'];
    $sqlDel = "DELETE FROM Booking WHERE bookingID = $bookingID";

    $result = mysqli_query($connect, $sqlDel);

    echo $bookingID;
    if ($result == true){
        echo "<script>alert('Remove Booking successful!')</script>";
        echo "<script>window.location='booking.php'</script>";
    }
        
    else{
        echo "<script>alert('Remove Booking not successful!')</script>";
        echo "<script>window.location='booking.php'</script>";
    }
        
?>