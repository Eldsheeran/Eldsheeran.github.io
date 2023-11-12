<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>ExploreMIMAROPA || Register</title>
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
                            <!-- Signup form -->
							<form class="signup-form" method="post" action="signup.php">
							    <div class="imgcontainer">
									<img src="../images/logo/small-logo.png" alt="logo" class="avatar">
								</div>
							    <div class="input-control">
							    	<div class="row p-l-5 p-r-5">
									    <div class="col-md-6 p-l-10 p-r-10">
											<input type="text" placeholder="Enter First Name" name="fname" required>
										</div>
                                        <div class="col-md-6 p-l-10 p-r-10">
											<input type="text" placeholder="Enter Last Name" name="lname" required>
										</div>
                                        <div class="col-md-6 p-l-10 p-r-10">
                                            <input type="text" placeholder="Enter Username" name="username" required>
										</div>
										<div class="col-md-6 p-l-10 p-r-10">
											<input type="email" placeholder="Enter Email" name="email" required>
										</div>
										<div class="col-md-6 p-l-10 p-r-10">
											<input type="password" placeholder="Enter Password" name="psw" class="input-checkmark" required>
										</div>
										<div class="col-md-6 p-l-10 p-r-10">
											<span class="password-field-show">
												<input class="password-field input-checkmark" type="password" placeholder="Re-enter Password" name="psw" required>
												<span data-toggle=".password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
											</span>
										</div>
									</div>
									<label class="label-container">I agree with <a href="#"> Terms and Condition</a>	
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
                                    <?php
                                        if (isset($_POST["submit"])) {
                                        $fName = $_POST["fname"];
                                        $lName = $_POST["lname"];
                                        $usrName = $_POST["username"];
                                        $email = $_POST["email"];
                                        $password = $_POST["psw"];
                                        $passwordRepeat = $_POST["psw"];
                                        
                                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                                        $errors = array();

                                        require_once "database.php";
                                        $sql = "SELECT * FROM users WHERE email = '$email'";
                                        $result = mysqli_query($conn, $sql);
                                        $rowCount = mysqli_num_rows($result);
                                        if ($rowCount>0) {
                                            array_push($errors,"Email already exists!");
                                        }
                                        if (count($errors)>0) {
                                            foreach ($errors as  $error) {
                                                echo "<div class='alert alert-danger'>$error</div>";
                                            }
                                        }else{
                                            
                                            $sql = "INSERT INTO users (FirstName, LastName, UserName, Email, Password) VALUES ( ?, ?, ?, ?, ?)";
                                            $stmt = mysqli_stmt_init($conn);
                                            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                                            if ($prepareStmt) {
                                                mysqli_stmt_bind_param($stmt,"sssss",$fName, $lName, $usrName, $email, $passwordHash);
                                                mysqli_stmt_execute($stmt);
                                                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                                            }else{
                                                die("Something went wrong");
                                            }
                                        }
                                        }
                                    ?>
							        <div class="login-btns">
                                        <input type="submit" class="btn btn-primary" value="Sign Up" name="submit">
									</div>
							      	<div class="login-with-btns">
                                        <hr>
							      		<span class="already-acc">Already you have an account? <a href="LoginPage.php" class="login-btn">Login</a></span>
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