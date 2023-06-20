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
                <a href="rooms_owner.php"><h1>BilikLAH</h1></a>
            </div>
            <div>
                <ul class="nav-links">
                    <li><a href="rooms_owner.php">My Rooms</a></li>
                    <li><a href="addRoom.php">Add Rooms</a></li>
                    <li><a href="viewBooking.php">View Booking</a></li>
                    <li>
                        <?php
                            $name = $_SESSION['name'];
                            echo "<a href='owner_customer.php'>Hello, $name</a>";
                        ?>
                    </li>
                    <li><a href="php/logout.php">Logout</a></li>
                </ul> 
            </div>
        </nav>
    </header>

    <section class="booking-list__section">
        <h1 class="header-text">My Customer Bookings</h1>
        <div class="booking-list__booking">
            <?php

            $id = $_SESSION['email'];
            $sql = "SELECT * FROM Room, Booking, Customer WHERE 
                    Room.roomID = Booking.roomID AND Booking.customerEmail = Customer.customerEmail AND Room.ownerEmail = '$id'";

            $data = mysqli_query($connect, $sql);

                while ($bookingInfo = mysqli_fetch_assoc($data)) {

                    echo "<div class='booking-list__booking-card'>";
                        echo "<h1 id='card-header'>$bookingInfo[roomName]</h1>";
                        echo "<div class='booking-card__text'>";
                           
                            echo "<h1 class='bookinfo'>Room Name:</h1> <p class='data'>$bookingInfo[roomName]</p>";
                            echo "<h1 class='bookinfo'>Customer Name:</h1> <p class='data'>$bookingInfo[customerName]</p>";
                            echo "<h1 class='bookinfo'>Check In:</h1> <p class='data'>$bookingInfo[dateBegin]</p>";
                            echo "<h1 class='bookinfo'>Check Out:</h1> <p class='data'>$bookingInfo[dateEnd]</p>";
                            echo "<h1 class='bookinfo'>Customer Phone Number:</h1> <p class='data'>$bookingInfo[customerPhone]</p>";

                        echo "</div>";

                        echo "<form class='booking-card__button' action='deleteBooking.php' method='POST'>";
                            echo "<input type='text' value='$bookingInfo[bookingID]' name='bookingID' class='ID' hidden/>";
                            echo "<input type='submit' value='Reject' class='delete-button' name='reject'/>";
                        echo "</form>";             
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>