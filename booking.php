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
                <a href="biliklah/rooms.html"><h1>BilikLAH</h1></a>
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

            $sql = "SELECT * FROM Room
                    INNER JOIN Booking ON Room.roomID = Booking.roomID";

            $data = mysqli_query($connect, $sql);

                while ($bookingInfo = mysqli_fetch_assoc($data)) {

                    echo "<form class='booking-list__booking-card' action='deleteBooking.php' method='POST'>";
                        echo "<h1 id='card-header'>$bookingInfo[roomName]</h1>";
                        echo "<div class='booking-card__text'>";
                           
                            echo "<input type='text' value='$bookingInfo[bookingID]' name='bookingID' class='ID' hidden/>";
                            echo "<h1 class='bookinfo'>Room Name:</h1> <p class='data'>$bookingInfo[roomName]</p>";
                            echo "<h1 class='bookinfo'>Room Price:</h1> <p class='data'>RM$bookingInfo[roomPrice]/night</p>";
                            echo "<h1 class='bookinfo'>Check In:</h1> <p class='data'>$bookingInfo[dateBegin]</p>";
                            echo "<h1 class='bookinfo'>Check Out:</h1> <p class='data'>$bookingInfo[dateEnd]</p>";

                        echo "</div>";

                        echo "<div class='booking-card__button'>";
                            echo "<input type='submit' value='Delete' class='delete-button' name='delete'/>";
                        echo "</div>";             
                    echo "</form>";
                }
            ?>
        </div>
    </section>
</body>
</html>