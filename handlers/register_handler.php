<?php 
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$username = "";
$error_array = array();

if(isset($_POST['register_button'])){
    
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ','',$fname);
    $fname = ucfirst(strtolower($fname));
    $_SESSION['reg_fname'] = $fname;
    
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ','',$lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;
    
    $em = strip_tags($_POST['reg_email']);
    $em = str_replace(' ','',$em);
    $em = ucfirst(strtolower($em));
    $_SESSION['reg_email'] = $em;
    
    $em2 = strip_tags($_POST['reg_email2']);
    $em2 = str_replace(' ','',$em2);
    $em2 = ucfirst(strtolower($em2));
    $_SESSION['reg_email2'] = $em2;
    
    $password = ($_POST['reg_password']);

    if($em == $em2){

        if(filter_var($em, FILTER_VALIDATE_EMAIL)){
			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			//Check if email already exists 
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				array_push($error_array, "Email already in use<br>");
			}
        }
        else{
            array_push($error, "Invalid Format <br>");
        }
    }
    else{
        array_push($error_array, "Emails Dont Match <br>");
    }

    if(empty($error_array)){
        $password = md5($password);

        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
    
        $i = 0;

        while(mysqli_num_rows($check_username_query) != 0){
            $i++;
            $username = $username . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        }

        $query = mysqli_query($con, "INSERT INTO users VALUES('','$fname','$lname','$username','$em','$password')");
    
        array_push($error_array, "<span></span>");

        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";
        
        
    }
}

?>