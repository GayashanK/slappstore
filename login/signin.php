<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php

    session_start();

    if(isset($_SESSION['user_id'])){
        header("Location:../welcome.php");
    }

    $email= isset($_POST['email']) ? $_POST['email'] : '';
    $password= isset($_POST['password']) ? $_POST['password'] : '';
    $h_password=hash('ripemd160',$password);

    
    ?>
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="containers">
	  	
		      <form class="form-login" action="signin.php" method="post" enctype="multipart/form-data" name="signin" onsubmit="return validateForm()">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="email" class="form-control" name="email" value="<?php echo $email ?>" placeholder="Email" autofocus>
		            <br>
                    <p id="alert_email">
                        <?php
                            if(!empty($_POST['email']) && !empty($_POST['password'])){
                                
                                include '../config/db_connection.php';

                                $sql = "SELECT * FROM user WHERE email='$email'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                
                                        
                                } else {
                                        echo "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Wrong email.</div>";
                    
                                }
                            }
                        ?>

                    </p>

		            <input type="password" class="form-control" name="password" value="<?php echo $password ?>" placeholder="Password" autofocus>

                    <p id="alert_password">
                        <?php
                            if(!empty($_POST['email']) && !empty($_POST['password'])){
                                
                                include '../config/db_connection.php';

                                $sql = "SELECT * FROM user WHERE email='$email'AND password='$h_password'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo $row["user_id"]. "<br>".$row["first_name"]."<br/>".$row["last_name"]."<br>";
                                        echo "login successfully";

                                        $_SESSION['user_id']=$row['user_id'];
                                        header("Location:../welcome.php");

                                    }
                                } else {
                                    echo "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Wrong password.</div>";
                                }
                            }
                        ?>
                    </p>

		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="signup.php">
		                    Create an account
		                </a>
		            </div>
		
		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../assets/img/login-bg.jpg", {speed: 500});
    </script>
    <script>
        $.backstretch("../assets/img/login-bg.jpg", {speed: 500});

        function validateForm() {

          var x = document.forms["signin"]["email"].value;
          var y = document.forms["signin"]["password"].value;

          if (x == null || x == "") {
              document.getElementById("alert_email").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Email must be filled out.</div>";
              return false;
          }

          if (x != null || x != "") {
              document.getElementById("alert_email").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
            
          }

           if (y == null || y == "") {
              document.getElementById("alert_password").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Password must be filled out.</div>";
             return false;
          }
          
          if (y !== null || y !== "") {
              document.getElementById("alert_password").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
        
          }

        }

    </script>


  </body>
</html>
