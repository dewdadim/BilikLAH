<?php
    
    include ('php/create_db.php');
    include('php/connect.php');
    
    if(isset($_POST['email'])){
        $name = $_POST["name"]; 
        $email = $_POST["email"];
        $phone = $_POST["phone"]; 
        $password = $_POST["password"];
        $password_confirmation = $_POST["confirmpass"];

        if($password === $password_confirmation) {
            $sql = "INSERT INTO RoomOwner VALUES('$name', '$email', '$phone', '$password')";
            $result = mysqli_query($connect, $sql);

            if ($result) {
                echo "<script>alert('Register successful!')</script>";
                echo "<script>window.location='login.html'</script>";
            }   

            else {
                echo "<script>alert('Register not successful')</script>"; 
                echo "<script>window.location='login.php'</script>";
            }
                
        }
        
        else {
            echo "<script>alert('Password does not match!')</script>"; 
            echo "<script>window.location='registercustomer.html'</script>";
        }  
    }
    
?>