<?php
include ('php/create_db.php');
include ('php/connect.php');
session_start();

if (isset($_POST['email']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM RoomOwner";
    $result = mysqli_query($connect, $sql);
    $found = FALSE;


    while($owner = mysqli_fetch_array($result))
    {
        if ($owner['ownerEmail'] == $email && $owner["ownerPassword"] == $password)
        {
            $found = TRUE;
            $_SESSION['email'] = $owner['ownerEmail'];
            $_SESSION['name'] = substr($owner['ownerName'], 0);
            $_SESSION['status'] = 'owner';
            break;
        }
    }
    
    if ($found == FALSE)
    {
        $sql = "SELECT * FROM Customer";
        $result = mysqli_query($connect, $sql);
        while($customer = mysqli_fetch_array($result))
        {
            if ($customer['customerEmail'] == $email && $customer["customerPassword"] == $password)
            {
                $found = TRUE;
                $_SESSION['email'] = $customer['customerEmail'];
                $_SESSION['name'] = $customer['customerName'];
                $_SESSION['status'] = 'customer';
                break;
            }
        }
    }
    
    if ($found == TRUE)
    {
        if($_SESSION['status'] == 'customer')
            header("Location: rooms.php");
        else
            header("Location: rooms_owner.php");
    }
    else
        echo " <script>alert('Incorrect Email or Password');
               window.location='login.html'</script> ";
}
?>