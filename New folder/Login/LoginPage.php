<!DOCTYPE html>
<!--VERSION 1 - ELDZ-->
<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- for changing the website logo pic -->
    <link rel="icon" href="Loginassets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="Loginassets/images/favicon.png" type="image/x-icon" />
    <title>ExploreMIMAROPA || Login</title>
    <!--Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Fasthand&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="Loginassets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Loginassets/css/fontawesome.css">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="Loginassets/css/login.css">
    <!-- latest jquery-->
    <script src="Loginassets/js/jquery-3.5.1.min.js"></script>
    <!-- Theme js-->
    <script src="Loginassets/js/script.js"></script>
</head>

<body>
    <!-- 01 Preloader -->
    <div class="loader-wrapper" id="loader-wrapper">
        <div class="loader">
            <img src="../images/preloader.gif" alt="Preloader">
        </div>
    </div>
    <!-- Preloader end -->
    <!-- 02 Main page -->
    <section class="page-section login-page">
        <div class="full-width-screen">
            <div class="container-fluid">
                <div class="content-detail">
                    <div class="main-info">
                        <div class="hero-container">
                            <!-- Login form -->
                            <form class="login-form" method="post" action="loginpage.php">
                                <div class="imgcontainer">
                                    <img src="../images/logo/small-logo.png" class="avatar">
                                </div>
                                <div class="input-control">
                                    <input type="text" placeholder="Enter Username" name="username" required>
                                    <span class="password-field-show">
                                        <input type="password" placeholder="Enter Password" name="password"
                                            class="password-field" value="" required>
                                        <span data-toggle=".password-field"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </span>
                                    <label class="label-container">Remember me
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="psw"><a href="forgot.html" class="forgot-btn">Forgot
                                            password?</a>
                                    </span>
                                    <?php
                                        if (isset($_POST["login"])) {
                                        $usrName = $_POST["username"];
                                        $password = $_POST["password"];
                                            require_once "database.php";
                                            $sql = "SELECT * FROM users WHERE UserName = '$usrName'";
                                            $result = mysqli_query($conn, $sql);
                                            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                            if ($user) {
                                                if (password_verify($password, $user["password"])) {
                                                    session_start();
                                                    $_SESSION["user"] = "yes";
                                                    header("Location: index.php");  
                                                    die();
                                                }else{
                                                    echo "<div class='alert alert-danger'>Password does not match</div>";
                                                }
                                            }else{
                                                echo "<div class='alert alert-danger'>Username does not match</div>";
                                            }
                                        }
                                    ?>
                                    <div class="login-btns">
                                        <input type="submit" value="Login" name="login" class="btn btn-primary">
                                    </div>
                                    <div class="login-with-btns">
                                        <hr>   
							      		<span class="already-acc">Not registered yet? <a href="signup.php" class="login-btn">Sign Up</a></span>
									</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>