<?php
include('php/connect.php');


$customerName = $_POST['customerName'];
$customerPhone = $_POST['customerPhone'];
$customerPassword = $_POST['customerPassword'];
$customerEmail = $_POST['customerEmail'];


$updateQuery = "UPDATE Customer SET customerName = '$customerName' WHERE customerId = 999";
 
 
if (mysqli_query($link,$updateQuery)) {
    echo "Name updated successfully.";
} else {
    echo "Error updating name: " . mysqli_error($link);
}

// Close the database connection
mysqli_close($link);
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
                <a href="biliklah/rooms.html"><h1>BilikLAH</h1></a>
            </div>
            <div>
                <ul class="nav-links">
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="booking.html">My Booking</a></li>
                    <li>
                        <?php

                            $sql = "SELECT substring_index(customerName,' ',1) AS firstName FROM Customer WHERE customerEmail = $customerEmail";
                            $data = mysqli_query($connect, $sql);

                            $customer = mysqli_fetch_array($data);
                            echo "<a href='profile_customer.php'>Hello, $customer[firstName]</a>";
                            
                        ?>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul> 
            </div>
        </nav>
    </header>





<div class="kedudukanAtas">
    <form action="profile_customer.php" method="post">
    <label for="customerName">Name :</label>
    <br>

    <?php
<<<<<<< Updated upstream
    echo '<input type="text" id="customerName" name="customerName" value=" $customer[customerName]" disabled>';
=======
    echo '<input type="text" id="customerName" name="customerName" value="' . $customer[customerName] . '" disabled>';
    echo '<input type="button" value="Edit" onclick="enableEdit("customerName")>';
    echo '<input type="button" value="Save" onclick="saveChanges("customerName")>'; 
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    echo '<input type="text" id="customerPhone" name="customerPhone" value=" $customer[customerPhone]" disabled>';
=======
    echo '<input type="text" id="customerEmail" name="customerEmail" value="' .  $customer[customerEmail] . '" disabled>';
    echo '<input type="button" value="Edit" onclick="enableEdit("customerPhone")>';
    echo '<input type="button" value="Save" onclick="saveChanges("customerPhone")>';
>>>>>>> Stashed changes
    ?>

    <button onclick='saveChanges("customerPhone")'>Save</button>
    <button onclick='enableEdit("customerPhone")'>Edit</button>

</form>  
</div>

<div class="kedudukan">
    <form action="profile_customer.php" method="post">
    <label for="customerPhone">Email :</label>
    <br>

    <?php
<<<<<<< Updated upstream
    echo '<input type="text" id="customerEmail" name="customerEmail" value=" $customer[customerEmail]" disabled>';
=======
    echo '<input type="text" id="customerPhone" name="customerPhone" value="' .  $customer[customerPhone] . '" disabled>';
    echo '<input type="button" value="Edit" onclick="enableEdit("customerPhone")">';
    echo '<input type="button" value="Save" onclick="saveChanges("customerPhone")">';
>>>>>>> Stashed changes
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
