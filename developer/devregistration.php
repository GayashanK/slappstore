<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
     <link rel="icon" type="image/png" href="../images/playstore.png">
    <title>Developer Registration</title>

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
    include '../config/db_connection.php';

    $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    $dev_id='';

    $sql = "SELECT * FROM developer WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $dev_id=$row["dev_id"];
            
        }
    } else {
        
    }

    if(isset($_SESSION['user_id']) && ($dev_id==0 || $dev_id=='')){
        $user_id=$_SESSION['user_id'];
        $dev_name= isset($_POST['dev_name']) ? $_POST['dev_name'] : '';
        $dev_description= isset($_POST['dev_description']) ? $_POST['dev_description'] : '';
        $dev_fb_url= isset($_POST['dev_fb_url']) ? $_POST['dev_fb_url'] : '';
        $dev_go_url= isset($_POST['dev_go_url']) ? $_POST['dev_go_url'] : '';
        $dev_in_url= isset($_POST['dev_in_url']) ? $_POST['dev_in_url'] : '';
        $mobile= isset($_POST['mobile']) ? $_POST['mobile'] : '';


        $profile_image='';
            


            if(isset($_FILES['profile_img'])){
                $errors= array();
                $file_name = $_FILES['profile_img']['name'];
                $file_size =$_FILES['profile_img']['size'];
                $file_tmp =$_FILES['profile_img']['tmp_name'];
                $file_type=$_FILES['profile_img']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['profile_img']['name'])));

                $expensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$expensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }

                if($file_size > 2097152){
                    $errors[]='File size must be excately 2 MB';
                }

                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"../images/comimg/".$file_name);
                    
                }else{
                    print_r($errors);
                }

                $profile_img="images/comimg/".$file_name;



            }


        if(!empty($_POST['dev_description']) && !empty($_POST['dev_name']))
        {

            include '../config/db_connection.php';

            $sql = "INSERT INTO developer (dev_name,dev_description,user_id,dev_img) VALUES
                    ('$dev_name','$dev_description','$user_id','$profile_img')";

            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $sql = "SELECT * FROM developer WHERE user_id='$user_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $dev_id=$row["dev_id"];
                    
                }
            } else {
                
            }

            $sql = "INSERT INTO dev_contact (dev_id,dev_fb_url,dev_go_url,dev_lin_url,mobile) VALUES
                    ('$dev_id','$dev_fb_url','$dev_go_url','$dev_in_url','$mobile')";

            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }




        }

    }
    else{
        echo "register or sign in first";
        header("Location:../welcome.php");
    }

    ?>

  </head>

  <body>
  

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
        <?php include '../include/header_in.php'; ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
        <?php include '../include/slider_in.php'; ?>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h3><i class="fa fa-angle-right"></i> Registration</h3><br>
                      <form class="form-horizontal style-form" action="devregistration.php" method="post" enctype="multipart/form-data" name="devregister" onsubmit="return validateForm()">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name or Company</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="dev_name"><p></p>
                                  <p id="alert_name"></p>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label"> Profile Picture</label>
                            <div class="col-sm-10">
                              <span class="btn btn-default btn-file">
                                Browse <input type="file" name="profile_img">
                              </span>
                              <p></p><p id="alert_img"></p>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">About you</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="4" id="comment" name="dev_description" placeholder="enter ur description here"></textarea><p></p>
                                  <p id="alert_description"></p>
                              </div>
                          </div>
                           
                          <hr>
                          <h4><i class="fa fa-angle-right"></i> Contacts</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">facebook link</label>
                              <div class="col-sm-10">
                                  <input type="url" class="form-control" name="dev_fb_url" pattern="https?://.+">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">google+ link</label>
                              <div class="col-sm-10">
                                  <input type="url" class="form-control" name="dev_go_url" pattern="https?://.+">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >linked in link</label>
                              <div class="col-sm-10">
                                  <input type="url" class="form-control" name="dev_in_url" pattern="https?://.+">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="mobile">
                                  <p></p>
                                  <p id="alert_mobile"></p>
                              </div>
                          </div>
                           
               
						
          						<hr>
                      <div class="">
                        <button type="submit" class="btn btn-theme" style="float:right; margin-right:30px;">Register</button>
                      </div>
						
                </div>
                </form>
              </div>
            </div>

            
          	

          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php include '../include/footer.php'; ?>
      <!--footer end-->
  </section>
  
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    
 
  <script>
    function validateForm() {

          var x = document.forms["devregister"]["dev_name"].value;
          var y = document.forms["devregister"]["dev_description"].value;
          var c = y.length;
          var a = document.forms["devregister"]["mobile"].value;

          
          

          if (x == null || x == "") {
              document.getElementById("alert_name").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Name or Company must be filled out.</div>";
              return false;
          }

          if (x != null || x != "") {
              document.getElementById("alert_name").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
            
          }

           if (y == null || y == "") {
              document.getElementById("alert_description").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Description must be filled out.</div>";
             return false;
          }

          if (c<=200) {
              document.getElementById("alert_description").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Description must be at least 200 characters long.</div>";
             return false;
          }
          
          if (y !== null || y !== "") {
              document.getElementById("alert_description").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
        
          }

          if (/^\d{10}$/.test(a)) {
              
          }
          else{
            document.getElementById("alert_mobile").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Mobile number must be at least 10 numbers long.</div>";
              return false;
          }

        }
  </script>

  </body>
</html>
