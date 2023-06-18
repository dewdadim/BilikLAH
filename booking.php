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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/rooms.css">

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
</body>
</html>