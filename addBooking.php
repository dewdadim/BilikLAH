<?php
include('php/connect.php');
session_start();

if(isset($_POST['beginDate'])){

        $checkin = date('Y-m-d', strtotime($_POST["beginDate"]));
        $checkout = date('Y-m-d', strtotime($_POST["endDate"]));
        $customerEmail = $_SESSION["email"];
        $room = $_POST["roomID"];

        $sql = "INSERT INTO Booking (dateBegin, dateEnd, customerEmail, roomID)
        VALUES ('$checkin', '$checkout', '$customerEmail', '$room')";
        
        $result = mysqli_query($connect, $sql);
        if ($result) 
            echo "<script>alert('Thank you for Booking!')</script>";
        else 
            echo "<script>alert('Error to Book')</script>"; 
        echo "<script>window.location='rooms.php'</script>";
}
?>