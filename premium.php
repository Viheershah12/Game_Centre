<html>
<head>
    <title>Premium Content</title>
    <link rel="icon" href="img/icons/premium.png">
    <link rel="stylesheet" href="css/premium.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body style="cursor:pointer">
<?php
if (isset($_COOKIE['users'])) {
    ?>
    <div class="bg-img img1"></div>
    <div class="bg-img img2"></div>
    <div class="bg-img img3"></div>
    <div class="bg-img img4"></div>
    <div class="bg-text">Premium Content</div>

    <div id="main">
        <span style="font-size:30px" onclick="openNav()">&#9776; Menu</span>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" onclick="closeNav()" class="closebtn">&times</a>
        <a href="index.html">Home Page</a>
        <a href="consoles.html">Consoles</a>
        <a href="posts.php">Posts</a>
        <a href="premium.php">Premium Content</a>
    </div>

    
    <div class="data">
        <br><br>
        <h1 class="title">Premium Content</h1>
        <p class="desc">Welcome to the Premuim content where you had paid a good amount of money to have access to 
            this page that includes gaming rooms, gaming products and many more utilities thaat you may be needing 
            to improve your gaming experience at your homes comfort.
        </p>
    </div>
<?php
}
else
{
    include 'login.php';
}
?>

</body>
<script>
function openNav()
{
    document.getElementById("main").style.marginLeft = "400px"
    document.getElementById("mySidenav").style.width = "400px"
}

function closeNav()
{
    document.getElementById("main").style.marginLeft = "0"
    document.getElementById("mySidenav").style.width = "0"
}
</script>
</html>