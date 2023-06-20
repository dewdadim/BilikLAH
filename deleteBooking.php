<?php
    include('php/connect.php');
    session_start();

    $bookingID = $_POST['bookingID'];
    $sqlDel = "DELETE FROM Booking WHERE bookingID = $bookingID";

    $result = mysqli_query($connect, $sqlDel);

    echo $bookingID;
    if(isset($_POST['reject'])) {
        if ($result == true){
            echo "<script>alert('Reject Booking successful!')</script>";
            echo "<script>window.location='viewBooking.php'</script>";
        } 
        else{
            echo "<script>alert('Reject Booking not successful!')</script>";
            echo "<script>window.location='viewBooking.php'</script>";
        }
    }
    else {
        if ($result == true){
            echo "<script>alert('Delete Booking successful!')</script>";
            echo "<script>window.location='booking.php'</script>";
        } 
        else{
            echo "<script>alert('Delete Booking not successful!')</script>";
            echo "<script>window.location='booking.php'</script>";
        }
    }
    
        
?>