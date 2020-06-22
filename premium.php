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
require 'config.php';
if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    ?>
    <div class="bg-img img1"></div>
    <div class="bg-img img2"></div>
    <div class="bg-text">Premium Content</div>

    <div id="main">
        <span style="font-size:30px" onclick="openNav()">&#9776; Menu</span>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" onclick="closeNav()" class="closebtn">&times</a>
        <a href="index.html">Home Page</a>
        <a href="consoles.html">Consoles</a>
        <a href="posts.php">Posts</a>
        <a href="../content_management/index.php">Blog Posts</a>
        <a href="premium.php">Premium Content</a>
    </div>

    
    <div class="data">
        <br><br>
        <h1 class="title">Premium Content</h1>
        <p class="desc">Welcome to the Premuim content where you had paid a good amount of money to have access to 
            this page that includes gaming rooms, gaming products and many more utilities thaat you may be needing 
            to improve your gaming experience at your homes comfort. We are quick in response as the emails are handled
            personally by our administrator and so you as the customers would get a very quick response time that would 
            vastly improve your experience in the world of gaming.
        </p>
        <br><br>
        <h1 class="title">Gaming Pool</h1>
        <p class="desc">For access to different gaming pools kindly contact us on this email: viheershah12@outlook.com for more info
            on the gaming pools. Gaming pools consist of many players all over the world and it would give you a platform to show off
            your skills in the market out there and make new friends and maybe even family. People have even got advantages by playing
            in these pools they have learnt many things about life and some have even got good day jobs by meeting employers or councellors
            in these pools making them a brilliant way to build and expand your thinking as a person.
        </p>
        <br><br>
        <h1 class="title">VIP Team</h1>
        <p class="desc">These are teams that include the biggest professionals in the world in all the games like fortnite and Pubg, these
            gamers give an chance of obtaining new knowledge of gaming making the participants of learning new tricks and tips of the particular
            and learning new things that you probably have never even thought of hence making you a better gamer in the gaming world.
        </p>
        <br><br>
    </div>
<?php
}
else
{
    header("Location: login.php");
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