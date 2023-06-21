<?php
    include('php/connect.php');
    include('dataSort.php');
    session_start();

    
    if(isset($_POST['sortPriceLH'])) {
        $_SESSION['sort'] = "SELECT * FROM Room ORDER BY roomPrice ASC";
    }

    else if(isset($_POST['sortPriceHL'])) {
        $_SESSION['sort'] = "SELECT * FROM Room ORDER BY roomPrice DESC";
    }

    else if(isset($_POST['sortCapacityLH'])) {
        $_SESSION['sort'] = "SELECT * FROM Room ORDER BY roomCapacity ASC";
    }

    else if(isset($_POST['sortCapacityHL'])) {
        $_SESSION['sort'] = "SELECT * FROM Room ORDER BY roomCapacity DESC";
    }

    else {
        $_SESSION['sort'] = "SELECT * FROM Room";
    }
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
    <script src="javascript/inputValidation.js"></script>

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
    <section class="room-list__section">
        <h1 class="header-text">Room List</h1>
        <form class="sorting-section" action="rooms.php" method="POST">
            <input type="submit" value="Sort Price: Low -> High" name="sortPriceLH" class="sorting-button"/>
            <input type="submit" value="Sort Price: High -> Low" name="sortPriceHL" class="sorting-button"/>
            <input type="submit" value="Sort Capacity: Low -> High" name="sortCapacityLH" class="sorting-button"/>
            <input type="submit" value="Sort Capacity: High -> Low" name="sortCapacityHL" class="sorting-button"/>
        </form>
        <div class="room-list__rooms">
            <?php
            
                $sql = $_SESSION['sort'];
                $data = mysqli_query($connect, $sql);

                if($data->num_rows > 0){
                    while ($room = mysqli_fetch_array($data)){
                        echo "<div class='room-list__room-card'>";
                            echo "<img src='$room[roomImg]'/>";
                            echo "<div class='room-card__text'>";
                                echo "<h1 class='room-name'>$room[roomName]</h1>";
                                echo "<h1 class='room-price'>RM$room[roomPrice] /night</h1>";
                                echo "<h1 class='room-capacity'>$room[roomCapacity] persons</h1>";
                            echo "</div>";
                        echo "</div>";  
                    }
                }
                else {
                    echo "<h1>There is no room available.</h1>";
                }
            ?>
        </div>
    </section>
    <section class="container">
        <div class="booking__section">
            <div class="form">
                <h1 id="h1">BOOK ROOM</h1>
                <form action="addBooking.php" method="POST" onSubmit = "return checkBookingTime(this)">
                    <div class="form-group">
                        <label for="beginDate">Check In:</label><br>
                        <input type="date" id="beginDate" name="beginDate" required>
                    </div>

                    <div class="form-group">
                        <label for="endDate">Check Out:</label><br>
                        <input type="date" id="endDate" name="endDate" required>
                    </div>

                    <div class="form-group">
                        <label for="roomID">Rooms:</label><br>
                        <select id="dropDown" name="roomID">
                        <?php
                            $sql = $_SESSION['sort'];
                            $data = mysqli_query($connect,$sql);

                            while ($room = mysqli_fetch_array($data)){
                                echo "<option value='$room[roomID]'>$room[roomName]</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>  
    </section>
</body>
</html>