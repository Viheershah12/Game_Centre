<html>
<head>
    <title>Posts</title>
    <link rel="icon" href="img/icons/post.png">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body style="cursor:pointer">
        <div class="bg-img img1"></div>
        <div class="bg-img img2"></div>
        <div class="bg-img img3"></div>
        <div class="bg-img img4"></div>
        <div class="bg-text">Welcome to the Social Wall</div>
    
    <div id="main">
        <span style="font-size:30px;" onclick="openNav()">&#9776; Menu</span>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times</a>
        <a href="index.html">Home Page</a>
        <a href="consoles.html">Consoles</a>
        <a href="posts.php">Posts</a>
        <a href="premium.php">Premium Content</a>
    </div>

    <div class="table">
    <br><br>
    <h1 class="title">POSTS...</h1>
    <p class="desc">This is the wall for which people all over the world
    can upload their pictures on this website which could be about anything from
    about their victories to their experiences that they have had playing 
    the games that they love. All the pictures posted here are saved onto our
    database and the saved safely with out exposing your personal data.</p>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data" class="form" >
        <input type='file' name='file'  accept="image/*" name="myImg">
        <input type='submit' value='Save Name' name='but_upload' >
    </form>
    <h1 class="title">Images...</h1>



<?php 
include 'config.php';

if(isset($_POST['but_upload']))
{
    $name = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['file']['name']);

    // select file type 
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // valid file extension 
    $extensions_arr = array('jpg','jpeg','png','gif','jfif','webp');

    // check extension 
    if(in_array($imageFileType, $extensions_arr))
    {
        // insert record 
        $query = "insert into images(name) values('".$name."')";
        mysqli_query($con, $query);

        // uplaod file 
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$name);
    }
}

$imagesDirectory = "uploads/";

if(is_dir($imagesDirectory))
{
    $opendirectory = opendir($imagesDirectory);
    echo '<div class="pics">';
    while (($image = readdir($opendirectory)) != false) 
    {
        if (($image == '.') || ($image == '..')) {
            continue;
        }

        $imageFileType = pathinfo($image, PATHINFO_EXTENSION);

        if (($imageFileType == 'jpg') || ($imageFileType == 'png') || ($imageFileType == 'jfif') || ($imageFileType == 'webp'))
        {
            echo '<img src="uploads/'.$image.'">';
        }
    }
    closedir($opendirectory);
    echo '</div>';
}
?>

<br><br>
<form method="post" action="" enctype='multipart/form-data' class="form">
    <input type='file' name='file'>
    <input type='submit' value='Upload' name='upload_video'>
</form>
<h1 class="title">Videos...</h1>
<?php
if(isset($_POST['upload_video']))
{
    $max_size = 1e+8;
    
    $name1 = $_FILES['file']['name'];
    $target_dir1 = "upload_vidz/";
    $target_file1 = $target_dir1 .$_FILES['file']['name'];

    // select file type
    $videoFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

    $extensions_arr1 = array('mp4','avi','3gp','mov','mpeg');

    // check extension 
    if(in_array($videoFileType, $extensions_arr1))
    {
        // insert record 
        $query1 = "insert into videos(name,location) values('".$name1."','".$target_file1."')";
        mysqli_query($con, $query1);

        // uplaod file 
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir1.$name1);
    }
}


$fetchVideos = mysqli_query($con, "SELECT location FROM videos ORDER BY id DESC");
echo '<table class="video"><tr>';
while($row = mysqli_fetch_assoc($fetchVideos))
{
    $location = $row['location'];

    echo '<td>';
    echo '<video src="'.$location.'" controls>';
    echo '</td>';
}
echo '</tr></table>'
// echo '</div>';
// echo '</div>';
?>
</body>

<script>
alert("Welcome here you may post any image that you like");
function openNav() 
{
    document.getElementById("main").style.marginLeft = "400px"
    document.getElementById("mySidenav").style.width = "400px"
}

function closeNav() 
{
    document.getElementById("main").style.marginLeft = "0px";
    document.getElementById("mySidenav").style.width = "0px";
}
</script>

</html>