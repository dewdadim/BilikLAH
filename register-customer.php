<?php
include('php/connect.php');

if(isset($_POST['email'])){
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $phone = $_POST["phone"]; 
    $password = $_POST["password"];
    $password_confirmation = $_POST["password2"];

    if($password === $password_confirmation){
        $sql = "INSERT INTO Customer VALUES('$name', '$email', '$phone', '$password')";
        $result = mysqli_query($connect, $sql);

        if ($result) 
            echo "<script>alert('Sign Up successful!')</script>";

        else 
            echo "<script>alert('Sign Up not successful')</script>"; 
            echo "<script>window.location='login.php'</script>";
    }
    else
    echo "<script>alert('Password does not match!')</script>"; 
}
?>