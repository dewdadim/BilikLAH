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
    <link rel="icon" href="img/assets/house.png">
    <title>bilikLAH</title>
</head>
<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <a href=""><h1>BilikLAH</h1></a>
            </div>
            <div>
                <ul class="nav-links">
                    <li><a href="rooms_owner.php">My Rooms</a></li>
                    <li><a href="addRoom.php">Add Room</a></li>
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
    
    <script>
        function showSuccessMessage() {
            alert("Data inserted successfully!");
        }
    </script>

<!-- <script>
    function handleImageUpload(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const imageURLInput = document.getElementById('imageURL');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imageURLInput.value = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            imageURLInput.value = '';
        }
    }
</script> -->

    <main class="container">
        <div class="form">
            <h1 id="h1">ADD ROOM</h1>
            <form action="addRoom.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="roomName">Room Name:</label>
                    <input type="text" id="roomName" name="roomName" required>
                </div>

                <div class="form-group">
                    <label for="roomPrice">Room Price:</label>
                    <input type="text" id="roomPrice" name="roomPrice" required>
                </div>

                <div class="form-group">
                    <label for="roomCapacity">Room Capacity:</label>
                    <input type="text" id="roomCapacity" name="roomCapacity" required>
                </div>

                <div class="form-group">
                    <label for="RoomImage">Room Image:</label>
                    <input type="file" id="RoomImage" name="RoomImage" accept="image/*">
                </div>

                <button type="submit" onclick="showSuccessMessage()">Submit</button>
            </form>
        </div>
    </main>
</body>
</html>
