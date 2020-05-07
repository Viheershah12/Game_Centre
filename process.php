<?php
include 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$check = mysqli_query($con,"select id,username from users where
username='$username' and password='$password'");
if(mysqli_num_rows($check)==0)
{
    // for wrong username or password 
    header('location: login.php?ERR');
}
else
{
    // login was sucessfull
    $users = mysqli_fetch_array($check);
    $id = $users['id'];
    $username = $users['username'];
    setcookie('users', $username, time()+600, 'premium.php');
    header('location: premium.php');
}
?>