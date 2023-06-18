<?php
// $link = mysqli_connect("localhost", "root", "", "biliklah_db");
// if (!$link) {
//     die('Could not connect: ' . mysqli_connect_error());
// }

include('php/connect.php');

$roomName = $_POST['roomName'];
$roomPrice = $_POST['roomPrice'];
$roomCapacity = $_POST['roomCapacity'];
$roomImg = $_POST['roomImage'];


$insertQuery = "INSERT INTO Room (roomName, roomPrice, roomCapacity, roomImage) 
               VALUES ('$roomName', '$roomPrice', '$roomCapacity', '$roomImg')";

if (mysqli_query($connect, $insertQuery)) {
    // echo "Data inserted successfully";
} else {
    echo "Error inserting data: " . mysqli_error($connect);
}


if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: addRoom.html?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO room(roomImg) 
				        VALUES('$new_img_name')";
				mysqli_query($connect, $sql);
				header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: addRoom.html?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: addRoom.html?error=$em");
	}

}else {
	header("Location: addRoom.html");
}
?>