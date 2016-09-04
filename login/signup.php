<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sign Up</title>

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

    $f_name= isset($_POST['f_name']) ? $_POST['f_name'] : '';
    $l_name= isset($_POST['l_name']) ? $_POST['l_name'] : '';
    $email= isset($_POST['email']) ? $_POST['email'] : '';
    $password= isset($_POST['password']) ? $_POST['password'] : '';
    $re_password= isset($_POST['re_password']) ? $_POST['re_password'] : '';
    $h_password=hash('ripemd160',$password);
    $project_img='';


    if(isset($_FILES['project_img'])){
                $errors= array();
                $file_name = $_FILES['project_img']['name'];
                $file_size =$_FILES['project_img']['size'];
                $file_tmp =$_FILES['project_img']['tmp_name'];
                $file_type=$_FILES['project_img']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['project_img']['name'])));

                $expensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$expensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }

                if($file_size > 2097152){
                    $errors[]='File size must be excately 2 MB';
                }

                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"../images/portimg/".$file_name);
                    
                }else{
                    print_r($errors);
                }

                $project_img="images/portimg/".$file_name;


            }


  ?>
</head>
<body>

  <div id="login-page">
      <div class="containers">
      
          <form class="form-signup" action="signup.php" method="post" enctype="multipart/form-data" name="signup" onsubmit="return validateForm()" >
            <h2 class="form-login-heading">sign up now</h2>
            <div class="login-wrap">

                <label>Profile Picture: </label><br>        
                    <span class="btn btn-default btn-file">
                        Browse <input type="file" name="project_img">
                    </span>
                 <p></p><p id="alert_img"></p><br>
                           


                <label>First Name: </label>
                <input type="text" class="form-control"  name="f_name" value="<?php echo $f_name?>" placeholder="" autofocus>
                <br>
                <p id="alert_f_name"></p>

                <label>Last Name: </label>
                <input type="text" class="form-control" name="l_name" value="<?php echo $l_name ?>" placeholder="" autofocus>
                <br>
                <p id="alert_l_name"></p>

            

                <label>Email: </label>
                <input type="email" class="form-control" name="email" value="<?php echo $email ?>" placeholder="" autofocus>
                <br>
                <p id="alert_email">

                    <?php
                      if(!empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['email']) && !empty($_POST['password'])
                        && !empty($_POST['re_password'])){
                          echo "All data entered<br/>";

                          include '../config/db_connection.php';

                              

                              $sql = "INSERT INTO user (first_name, last_name, email,password,user_img_url) VALUES
                                  ('$f_name', '$l_name', '$email','$h_password','$project_img')";

                              if ($conn->query($sql) === TRUE) {
                                echo "New record created successfully<br/>";
                              } else { 

                              
                              }

                              $sql = "SELECT user_id FROM user WHERE email='$email'AND password='$h_password'";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {

                                  $_SESSION['user_id']=$row['user_id'];
                                  header("Location:../welcome.php");

                                }
                              } else {
                                echo "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Use diffrent email.</div>";
                              }

                      }
                    ?>

                </p>

                <label>Password: </label>
                <input type="password" class="form-control" name="password" value="<?php echo $password ?>" placeholder="">
                <br>
                <p id="alert_password"></p>

                <label>Confirm password: </label>
                <input type="password" class="form-control" name="re_password" value="<?php echo $re_password ?>" placeholder="">
                <br>
                <p id="alert_repassword"></p>

                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN UP</button>
                <hr>

                   
              
           
                
                <div class="login-social-link centered">
                <p>or you can sign up via your social network</p>
                    <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                </div>
    
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

        function validateForm() {
          var d = document.forms["signup"]["project_img"].value;
          var x = document.forms["signup"]["f_name"].value;
          var y = document.forms["signup"]["l_name"].value;
          var z = document.forms["signup"]["email"].value;
          var a = document.forms["signup"]["password"].value;
          var b = document.forms["signup"]["re_password"].value;
          var c=a.length;

          if (d == null || d == "") {
              document.getElementById("alert_img").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; choose profile picture.</div>";
              return false;
          }

          if (d != null || d != "") {
              document.getElementById("alert_f_name").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
            
          }

          if (x == null || x == "") {
              document.getElementById("alert_f_name").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; First Name must be filled out.</div>";
              return false;
          }

          if (x != null || x != "") {
              document.getElementById("alert_f_name").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
            
          }

          if (y == null || y == "") {
              document.getElementById("alert_l_name").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Last Name must be filled out.</div>";
             return false;
          }
          
          if (y !== null || y !== "") {
              document.getElementById("alert_l_name").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
        
          }
          
          if (z == null || z == "") {
              document.getElementById("alert_email").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Email must be filled out.</div>";
             return false;
          }

          if (z != null || z != "") {
              document.getElementById("alert_email").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
             
          }

          
          if (a == null || a == "") {
              document.getElementById("alert_password").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Password must be filled out.</div>";
             return false;
          }

          

          if (c<=7) {
              document.getElementById("alert_password").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Password must be 8 characters long.</div>";
             return false;
          }

          if (a != null || a != "" || c>=8) {
              document.getElementById("alert_password").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
             
          }

          
          if (b == null || b == "") {
              document.getElementById("alert_repassword").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Confirm password must be filled out.</div>";
             return false;
          }
          if (a !== b) {
              document.getElementById("alert_repassword").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; The password and confirm password fields do not match.</div>";
             return false;
          }

          if (a ==b) {
              document.getElementById("alert_repassword").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
             
          }


        }

    </script>

</body>
</html>