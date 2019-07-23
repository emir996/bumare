<?php
include_once '../config/config.php';

    $al = new Adminlogin();


	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_login'])){

		$loginChk = $al->adminLogin();
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../assets/css/adminstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    </head>
    <body>

<div class="container-fluid bg">
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <!--form start -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return Validate()" class="form-container" name="vform">
                        <h2 class="text-center">Admin Login</h2>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="tb_username" id="username" placeholder="Username...">
                            <div id="user_error" class="val_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="tb_password" id="password" placeholder="Password...">
                            <div id="pass_error" class="val_error"></div>
                        </div>
                        <button type="submit" name="btn_login" class="btn btn-block">Login</button>
                        <h5 class="text-center" style="margin-top:2vh; color:red">
                            <?php

                                if(isset($loginChk)){
                                    echo $loginChk;
                                }
                             ?>
                        </h5>

                    </form>
                <!--form end-->
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
          </div>
        </div>
    <script>
        var username = document.forms["vform"]["tb_username"];
        var password = document.forms["vform"]["tb_password"];

        var name_error = document.getElementById("user_error");
        var pass_error = document.getElementById("pass_error");

        username.addEventListener("blur", userVerify, true);
        password.addEventListener("blur", passVerify, true);

        function Validate(){
            if(username.value == ""){
                username.style.border = "1px solid red";
                name_error.textContent = "Username is required";
                username.focus();
                return false;
            }

            if(password.value == ""){
                password.style.border = "1px solid red";
                pass_error.textContent = "Password is required";
                password.focus();
                return false;
            }
        }

        function userVerify(){
            if(username.value != ""){
                username.style.border = "1px solid #33AEFF";
                name_error.innerHTML = "";
                return true;
            }
        }
        function passVerify(){
            if(password.value != ""){
                password.style.border = "1px solid #33AEFF";
                pass_error.innerHTML = "";
                return true;
            }
        }
    </script>
        

<?php include 'inc/footer.php';?>