<html>
<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="body">
    <form action="process.php" method="POST">
        <div class="imgcontainer" style="margin-left:500px;">
            <img src="img/img_avatar2.png" alt="avatar" class="avatar" 
            style="width:253px;height:253px;border-radius:50%;">
        </div>
        <br>
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
        

            <label for="psw">Password</label>
            <input type="password" placeholder="Enter password" name="password" required>
        
            <button type="submit">Login</button>
        </div>
    </form>
</div>

<?php
if(isset($_GET['ERR']))
{
    echo 'incorrect username or password';
}
?>
</body>
</html>