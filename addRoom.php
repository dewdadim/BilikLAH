<?php
    include('php/connect.php');
    session_start();

    if(isset($_POST['roomName'])) {
        $roomName = $_POST['roomName'];
        $roomPrice = $_POST['roomPrice'];
        $roomCapacity = $_POST['roomCapacity'];
        $ownerEmail = $_SESSION['email'];

        if($_FILES["image"]["error"] === 4){
            echo
            "<script> alert('Image Does Not Exist'); </script>"
            ;
          }
          else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];
        
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if ( !in_array($imageExtension, $validImageExtension) ){
              echo
              "
              <script>
                alert('Invalid Image Extension');
              </script>
              ";
            }
            else if($fileSize > 1000000){
              echo
              "
              <script>
                alert('Image Size Is Too Large');
              </script>
              ";
            }
            else{
              $newImageName = uniqid();
              $newImageName .= '.' . $imageExtension;
        
              move_uploaded_file($tmpName, 'img/room_img/' . $newImageName);

              $sql = "INSERT INTO Room (roomName, roomPrice, roomCapacity, roomImg, ownerEmail)
                VALUE ('$roomName', $roomPrice, $roomCapacity, 'img/room_img/$newImageName', '$ownerEmail')";

              $data = mysqli_query($connect, $sql);

              echo mysqli_error($connect);
              if ($data) 
                      echo "<script>alert('Add Room Successful!')</script>";
              else 
                  echo "<script>alert('Error to add new room')</script>"; 
              echo "<script>window.location='rooms_owner.php'</script>";
            }
        }

    }
    
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
                <a href="rooms_owner.php"><h1>BilikLAH</h1></a>
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

    <section class="container add-room__section">
        <div class="add-room__form">
            <h1 id="h1">ADD ROOM</h1>
            <form action="addRoom.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="roomName">Room Name:</label>
                    <input type="text" id="roomName" name="roomName" required>
                </div>

                <div class="form-group">
                    <label for="roomPrice">Room Price:</label>
                    <input type="number" id="roomPrice" name="roomPrice" min="0" required>
                </div>

                <div class="form-group">
                    <label for="roomCapacity">Room Capacity:</label>
                    <input type="number" id="roomCapacity" name="roomCapacity" min="0" required>
                </div>

                <div class="form-group">
                    <label for="image">Room Image:</label><br>
                    <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" value="" required>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>
    </section>
</body>
</html>