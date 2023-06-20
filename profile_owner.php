<?php
    include('php/connect.php');
    session_start();

    $ownerName = $_POST['ownerName'];
    $ownerPhone = $_POST['ownerPhone'];
    $ownerPassword = $_POST['ownerPassword'];

    $id = $_SESSION['email'];

    $updateName = "UPDATE RoomOwner SET ownerName = '$ownerName'  WHERE ownerEmail = '$id'";
    $updatePhone = "UPDATE RoomOwner SET  ownerPhone = '$ownerPhone' WHERE ownerEmail = '$id'";
    $updatePassword = "UPDATE RoomOwner SET  ownerPassword = '$ownerPassword' WHERE ownerEmail = '$id'";


    
    if (isset($_POST['save-name'])){
        if (mysqli_query($connect,$updateName)) {
            echo " <script>alert('Update Successful!');
            window.location='profile_owner.php'</script> ";
        } else {
            echo "Error updating fields: " . mysqli_error($connect);
        }
    }

    if (isset($_POST['save-phone'])){
        if (mysqli_query($connect,$updatePhone)) {
            echo " <script>alert('Update Successful!');
            window.location='profile_owner.php'</script> ";
        } else {
            echo "Error updating fields: " . mysqli_error($connect);
        }
    }


    if (isset($_POST['save-password'])){
        if (mysqli_query($connect,$updatePassword)) {
            echo " <script>alert('Update Successful!');
            window.location='profile_owner.php'</script> ";
        } else {
            echo "Error updating fields: " . mysqli_error($connect);
        }
    }

    $query = "SELECT * FROM RoomOwner";
    $data = mysqli_query($connect, $query);
    $customer = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/profile.css">
    
    <link rel="icon" href="img/assets/house.png">
    <title>Owner Profile</title>
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

    <section class="container">
    <h1 class="profile">Owner Profile</h1>

    <div class="kedudukan">
        <form action="profile_owner.php" method="POST">
            <div class="form-field">
                <label for="ownerName">Name :</label>
                <input type="text" id="ownerName" name="ownerName" >
                <button name="save-name">Update</button>
            </div>

            <div class="form-field">
                <label for="pwnerPhone">Phone :</label>
                <input type="text" id="customerPhone" name="ownerPhone" >
                <button name="save-phone">Update</button>  
            </div>
            <div class="form-field">
                <label for="ownerPassword ">Password :</label>
                <input type="text" id="customerPassword" name="ownerPassword" >
                <button name="save-password">Update</button> 
            </div> 
        </form>   
    </div>
</section>



</body>
</html>