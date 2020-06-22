<?php
include("config.php");
include("handlers/register_handler.php");
include("handlers/login_handler.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login!</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="js/jquery.Jcrop.js"></script>
        <script src="js/jcrop_bits.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/register.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/jquery.Jcrop.css">
        <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <?php
        if(isset($_POST['register_button'])){
        echo '
        <script>
        $(document).ready(function(){
        $("#first").hide();
        $("#second").show();
        });
        </script>
        ';
        }
        ?>
        <div class="wrapper">
            <div class="login_box">
                <div class="login_header">
                    <h1>Game Center</h1>
                    Login or Signup Below
                </div>
                
                <br>
                <div id="first">
                    <form action="login.php" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="margin-top: 0;">
                                <span class="input-group-text" id="basic-addon1" style="height: 38px;">@</span>
                            </div>
                            <input type="email" class="form-control" name="log_email" placeholder="Email" aria-label="Email"
                            aria-describedby="basic-addon1" value="<?php if(isset($_SESSION['log_email'])) echo $_SESSION['log_email']; ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" aria-label="Password"
                            aria-describedby="basic-addon2" name="log_password" placeholder="Password" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2" style="height: 38px;">Password</span>
                            </div>
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary" name="login_button"><br>
                        <a href="javascript:void(0)" id="signup" class="signup">Need an Account, Register Here!</a>
                        
                    </form>
                    
                </div>
                
                <div id="second">
                    <form action="login.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="reg_fname" placeholder="First Name" aria-label="First Name"
                            aria-describedby="basic-addon2" value="<?php if(isset($_SESSION['reg_fname'])) echo $_SESSION['reg_fname']; ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2" style="height: 38px;">First Name</span>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="reg_lname" placeholder="Last Name" aria-label="Last Name"
                            aria-describedby="basic-addon2" value="<?php if(isset($_SESSION['reg_lname'])) echo $_SESSION['reg_lname']; ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2" style="height: 38px;">Last Name</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="margin-top: 0;">
                                <span class="input-group-text" id="basic-addon1" style="height: 38px;">@</span>
                            </div>
                            <input type="email" class="form-control" name="reg_email" placeholder="Email" aria-label="Email"
                            aria-describedby="basic-addon1" value="<?php if(isset($_SESSION['reg_email'])) echo $_SESSION['reg_email']; ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="margin-top: 0;">
                                <span class="input-group-text" id="basic-addon1" style="height: 38px;">@</span>
                            </div>
                            <input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email"
                            aria-label="Confirm Email" aria-describedby="basic-addon1" value="<?php if(isset($_SESSION['reg_email2'])) echo $_SESSION['reg_email2']; ?>" required>
                        </div>
                        <?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>" ?>
                        <?php if(in_array("Emails Dont Match <br>", $error_array)) echo "Emails Dont Match <br>" ?>
                        <?php if(in_array("Invalid Format <br>", $error_array)) echo "Invalid Format <br>" ?>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="reg_password" placeholder="Password" aria-label="Password"
                            aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2" style="height: 38px;">Password</span>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" onclick="diplayUsername()" value="Register" name="register_button"><br>
                        
                        <?php if(in_array("<span></span>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
                        <a href="#" class="signin" id="signin">Already Have a Account? Sign in!</a>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>