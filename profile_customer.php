<?php
include('php/connect.php');
session_start();

$customerName = $_POST['customerName'];
$customerPhone = $_POST['customerPhone'];
$customerPassword = $_POST['customerPassword'];

$id = $_SESSION['email'];

$updateName = "UPDATE Customer SET customerName = '$customerName'  WHERE customerEmail = '$id'";
$updatePhone = "UPDATE Customer SET  customerPhone = '$customerPhone' WHERE customerEmail = '$id'";
$updatePassword = "UPDATE Customer SET  customerPassword = '$customerPassword' WHERE customerEmail = '$id'";


 if (isset($_POST['save-name'])){
    if (mysqli_query($connect,$updateName)) {
        echo " <script>alert('Update Successful!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($connect);
    }
 }


 if (isset($_POST['save-phone'])){
    if (mysqli_query($connect,$updatePhone)) {
        echo " <script>alert('Update Successful!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($connect);
    }
 }


 if (isset($_POST['save-password'])){
    if (mysqli_query($connect,$updatePassword)) {
        echo " <script>alert('Update Successful!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($connect);
    }
}


$query = "SELECT * FROM Customer";
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
    <title>Customer Profile</title>
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




<section class="container">
    <h1 class="profile">Customer Profile</h1>

    <div class="kedudukan">
        <form action="profile_customer.php" method="POST">
            <div class="form-field">
                <label for="customerName">Name :</label>
                <input type="text" id="customerName" name="customerName" >
                <button name="save-name">Update</button>
            </div>

            <div class="form-field">
                <label for="customerPhone">Phone :</label>
                <input type="text" id="customerPhone" name="customerPhone" >
                <button name="save-phone">Update</button>  
            </div>
            <div class="form-field">
                <label for="customerPassword ">Password :</label>
                <input type="text" id="customerPassword" name="customerPassword" >
                <button name="save-password">Update</button> 
            </div> 
        </form>  
    </div>
</section>



</body>
</html>