<?php
    include('php/connect.php');
    session_start();

    $roomID = $_POST['roomID'];
    $sqlDel = "DELETE FROM Room WHERE roomID = $roomID";

    $result = mysqli_query($connect, $sqlDel);

    echo $roomID;
    if ($result == true){
        echo "<script>alert('Remove Room successful!')</script>";
        echo "<script>window.location='rooms_owner.php'</script>";
    }
        
    else{
        echo "<script>alert('Remove Room not successful!')</script>";
        echo "<script>window.location='rooms_owner.php'</script>";
    }
        
?>