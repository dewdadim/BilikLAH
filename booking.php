<?php
    include('php/connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/booking.css">
    <link rel="stylesheet" href="styles/myBooking.css">
    <link rel="icon" href="img/assets/house.png">
    <title>bilikLAH</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <a href="rooms.php"><h1>BilikLAH</h1></a>
            </div>
            <div>
                <ul class="nav-links">
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="booking.php">My Booking</a></li>
                    <li>
                        <?php
                            $name = $_SESSION['name'];
                            echo "<a href='profile_customer.php'>Hello, $name</a>";
                        ?>
                    </li>
                    <li><a href="php/logout.php">Logout</a></li>
                </ul> 
            </div>
        </nav>
    </header>

    <section class="booking-list__section">
        <h1 class="header-text">My Bookings</h1>
        <div class="booking-list__booking">
            <?php

            $id = $_SESSION['email'];
            $sql = "SELECT * FROM Room, Booking, RoomOwner WHERE 
                    Room.roomID = Booking.roomID AND Room.OwnerEmail = RoomOwner.OwnerEmail AND Booking.customerEmail = '$id'";

            $data = mysqli_query($connect, $sql);

                while ($bookingInfo = mysqli_fetch_assoc($data)) {

                    echo "<div class='booking-list__booking-card'>";
                        echo "<h1 id='card-header'>$bookingInfo[roomName]</h1>";
                        echo "<div class='booking-card__text'>";
                           
                            echo "<h1 class='bookinfo'>Room Name:</h1> <p class='data'>$bookingInfo[roomName]</p>";
                            echo "<h1 class='bookinfo'>Room Price:</h1> <p class='data'>RM$bookingInfo[roomPrice]/night</p>";
                            echo "<h1 class='bookinfo'>Check In:</h1> <p class='data'>$bookingInfo[dateBegin]</p>";
                            echo "<h1 class='bookinfo'>Check Out:</h1> <p class='data'>$bookingInfo[dateEnd]</p>";
                            echo "<h1 class='bookinfo'>Owner Phone Number:</h1> <p class='data'>$bookingInfo[ownerPhone]</p>";

                        echo "</div>";

                        echo "<form class='booking-card__button' action='deleteBooking.php' method='POST'>";
                            echo "<input type='text' value='$bookingInfo[bookingID]' name='bookingID' class='ID' hidden/>";
                            echo "<input type='submit' value='Delete' class='delete-button' name='delete'/>";
                        echo "</form>";             
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>