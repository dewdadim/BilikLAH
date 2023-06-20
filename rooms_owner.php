<?php
    include('php/connect.php');
    include('dataSort.php');
    session_start();

    $id = $_SESSION['email'];
    
    if(isset($_POST['sortPriceLH'])) {
        $_SESSION['sort'] = "SELECT * FROM Room WHERE ownerEmail = '$id' ORDER BY roomPrice ASC";
    }

    else if(isset($_POST['sortPriceHL'])) {
        $_SESSION['sort'] = "SELECT * FROM Room WHERE ownerEmail = '$id' ORDER BY roomPrice DESC";
    }

    else if(isset($_POST['sortCapacityLH'])) {
        $_SESSION['sort'] = "SELECT * FROM Room WHERE ownerEmail = '$id' ORDER BY roomCapacity ASC";
    }

    else if(isset($_POST['sortCapacityHL'])) {
        $_SESSION['sort'] = "SELECT * FROM Room WHERE ownerEmail = '$id' ORDER BY roomCapacity DESC";
    }

    else {
        $_SESSION['sort'] = "SELECT * FROM Room WHERE ownerEmail = '$id'";
    }
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/rooms.css">
    <link rel="stylesheet" href="styles/booking.css">

    <link rel="icon" href="img/assets/house.png">
    <title>bilikLAH</title>
</head>
<body>
<header>
        <nav class="nav-bar">
            <div class="logo">
                <a href="rooms_owner.php"><h1>BilikLAH</h1></a>
            </div>
            <div>
                <ul class="nav-links">
                    <li><a href="rooms_owner.php">My Rooms</a></li>
                    <li><a href="addRoom.php">Add Room</a></li>
                    <li><a href="viewBooking.php">View Bookings</a></li>
                    <li>
                        <?php
                            $name = $_SESSION['name'];
                            echo "<a href='profile_owner.php'>Hello, $name</a>";
                        ?>
                    </li>
                    <li><a href="php/logout.php">Logout</a></li>
                </ul> 
            </div>
        </nav>
    </header>
    <section class="room-list__section">
        <h1 class="header-text">My Room List</h1>
        <form class="sorting-section" action="rooms_owner.php" method="POST">
            <input type="submit" value="Sort Price: Low -> High" name="sortPriceLH" class="sorting-button"/>
            <input type="submit" value="Sort Price: High -> Low" name="sortPriceHL" class="sorting-button"/>
            <input type="submit" value="Sort Capacity: Low -> High" name="sortCapacityLH" class="sorting-button"/>
            <input type="submit" value="Sort Capacity: High -> Low" name="sortCapacityHL" class="sorting-button"/>
        </form>
        <div class="room-list__rooms">
            <?php

                $sql = $_SESSION['sort'];
                $data = mysqli_query($connect, $sql);
                
                while ($room = mysqli_fetch_array($data)){
                    echo "<form class='room-list__room-card' action='deleteRoom.php' method='POST'>";
                        echo "<img src='$room[roomImg]'/>";
                        echo "<div class='room-card__text'>";

                            echo "<input type='text' value='$room[roomID]' name='roomID' class='ID' hidden/>";
                            echo "<h1 class='room-name'>$room[roomName]</h1>";
                            echo "<h1 class='room-price'>RM$room[roomPrice] /night</h1>";
                            echo "<h1 class='room-capacity'>$room[roomCapacity] persons</h1>";

                            echo "<input type='submit' value='Delete' class='delete-button' name='delete'/>"; 
                        echo "</form>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>