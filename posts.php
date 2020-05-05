<html>
<head>
    <title>Posts</title>
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
        <div class="bg-text">Welcome to the Social Board</div>
    
    <div id="main">
        <span style="font-size:30px;" onclick="openNav()">&#9776; Menu</span>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times</a>
        <a href="index.html">Home Page</a>
        <a href="consoles.html">Consoles</a>
        <a href="posts.php">Posts</a>
        <a href="premium.html">Premium Content</a>
    </div>

    <div class="table">
    <br><br>
    <form action="" method="post" enctype="multipart/form-data" class="form" >
        <input type='file' name='file'  accept="image/*" name="myImg">
        <input type='submit' value='Save Name' name='but_upload' >
    </form>


</body>

<script>
function openNav() 
{
    document.getElementById("main").style.marginLeft = "350px"
    document.getElementById("mySidenav").style.width = "350px"
}

function closeNav() 
{
    document.getElementById("main").style.marginLeft = "0px";
    document.getElementById("mySidenav").style.width = "0px";
}
</script>
</html>

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
    $extensions_arr = array('jpg','jpeg','png','gif');

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

        if (($imageFileType == 'jpg') || ($imageFileType == 'png')) {
            echo '<img src="uploads/'.$image.'">';
        }
    }
    closedir($opendirectory);
    echo '</div></div>';
}
?>