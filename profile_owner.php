<?php
include('php/connect.php');
session_start();

$ownerName = $_POST['ownerName'];
$ownerPhone = $_POST['ownerPhone'];
$ownerPassword = $_POST['ownerPassword'];

$id = $_SESSION['email'];

$updateName = "UPDATE Customer SET ownerName = '$ownerName'  WHERE customerEmail = '$id'";
$updatePhone = "UPDATE Customer SET  ownerPhone = '$ownerPhone' WHERE customerEmail = '$id'";
$updatePassword = "UPDATE Customer SET  ownerPassword = '$ownerPassword' WHERE customerEmail = '$id'";
$updateEmail = "UPDATE Customer SET ownerEmail = '$ownerEmail' WHERE customerEmail = '$id'";

 
if (isset($_POST['save-name'])){
    if (mysqli_query($connect,$updateName)) {
        echo " <script>alert('Update SuccessfuL!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($connect);
    }
 }

 if (isset($_POST['save-email'])){
    if (mysqli_query($connect,$updateEmail)) {
        echo " <script>alert('Update SuccessfuL!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($connect);
    }
 }


 if (isset($_POST['save-phone'])){
    if (mysqli_query($connect,$updatePhone)) {
        echo " <script>alert('Update SuccessfuL!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($connect);
    }
 }


 if (isset($_POST['save-password'])){
    if (mysqli_query($connect,$updatePassword)) {
        echo " <script>alert('Update SuccessfuL!');
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
    <link rel="stylesheet" href="styles/profile_customer.css">
    
    
    
    
    <link rel="icon" href="img/assets/house.png">
    <title>Customer Profile</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <a href="/index.html"><h1>BilikLAH</h1></a>
            </div>
            <div>
                <ul class="nav-links">
                    <li><a href="/index.html">Rooms</a></li>
                    <li><a href="/booking.html">My Booking</a></li>
                    <li><a href="/profile.html">Profile</a></li>
                </ul> 
            </div>
        </nav>
    </header>




<section class="container">
    <h1 class="profile" >Profile</h1>

    <div class="kedudukan">
        <form action="profile_customer.php" method="POST">
        <label for="customerName">Name :</label>
        <br>
        <input type="text" id="customerName" name="customerName">

     

        <button name="save-name">Save</button>  
        
    </form>   
    </div>
      
    <div class="kedudukan">
        <form action="profile_customer.php" method="POST">
        <label for="customerPhone">Phone :</label>
        <br>
        <input type="text" id="customerPhone" name="customerPhone" >
       
        <button name="save-email">Save</button>  
        </form>  
    </div>
    
    <div class="kedudukan">
        <form action="profile_customer.php" method="POST">
        <label for="customerEmail">Email :</label>
        <br>
        <input type="text" id="customerEmail" name="customerEmail" >
    
        <button name="save-phone">Save</button>  
        </form>  
    </div>
</section>



</body>
</html>