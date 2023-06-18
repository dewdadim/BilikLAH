<?php
include('php/connect.php');


$customerName = $_POST['customerName'];
$customerPhone = $_POST['customerPhone'];
$customerPassword = $_POST['customerPassword'];
$customerEmail = $_POST['customerEmail'];


$updateName = "UPDATE Customer SET customerName = '$customerName' WHERE customerId = $customerId";
$updatePhone = "UPDATE Customer SET  customerPhone = '$customerPhone' WHERE customerId = $customerId";
$updatePassword = "UPDATE Customer SET  customerPassword = '$customerPassword'WHERE customerId = $customerId";
$updateEmail = "UPDATE Customer SET customerEmail = '$customerEmail' WHERE customerId = $customerId";
 
 if (isset($_POST['customerName'])){
    if (mysqli_query($connect,$updateName)) {
        echo " <script>alert('Update SuccessfuL!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($link);
    }
 }

 if (isset($_POST['customerPhone'])){
    if (mysqli_query($connect,$updatePhone)) {
        echo " <script>alert('Update SuccessfuL!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($link);
    }
 }


 if (isset($_POST['customerPassword'])){
    if (mysqli_query($connect,$updatePassword)) {
        echo " <script>alert('Update SuccessfuL!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($link);
    }
 }


 if (isset($_POST['customerEmail'])){
    if (mysqli_query($connect,$updateEmail)) {
        echo " <script>alert('Update SuccessfuL!');
                window.location='profile_customer.php'</script> ";
    } else {
        echo "Error updating fields: " . mysqli_error($link);
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
                <a href="/index.html"><h1>Customer</h1></a>
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





<div class="kedudukanAtas">
    <form action="profile_customer.php" method="post">
    <label for="customerName">Name :</label>
    <br>

    <?php
    echo '<input type="text" id="customerName" name="customerName" value=" $customer[customerName]" disabled>';
    ?>

    <button onclick='saveChanges("customerName")'>Save</button>
    <button onclick='enableEdit("customerName")'>Edit</button>

</form>   
</div>
  
<div class="kedudukan">
    <form action="profile_customer.php" method="post">
    <label for="customerPhone">Phone :</label>
    <br>

    <?php
    echo '<input type="text" id="customerPhone" name="customerPhone" value=" $customer[customerPhone]" disabled>';
    ?>

    <button onclick='saveChanges("customerPhone")'>Save</button>
    <button onclick='enableEdit("customerPhone")'>Edit</button>

</form>  
</div>

<div class="kedudukan">
    <form action="profile_customer.php" method="post">
    <label for="customerEmail">Email :</label>
    <br>

    <?php
    echo '<input type="text" id="customerEmail" name="customerEmail" value=" $customer[customerEmail]" disabled>';
    ?>
    <button onclick='saveChanges("customerEmail")'>Save</button>
    <button onclick='enableEdit("customerEmail")'>Edit</button>
    
    
</form>  
</div>





<script>
    function enableEdit(elementId) {
      var inputElement = document.getElementById(elementId);
      inputElement.disabled = false;
    }
  
    function saveChanges(elementId) {
      var inputElement = document.getElementById(elementId);
      inputElement.disabled = true;
    }
  </script>

</body>
</html>
