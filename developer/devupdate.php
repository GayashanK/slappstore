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

    $varname=$_GET['dev_id'];

    $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    $dev_id='';

    $sql = "SELECT * FROM developer WHERE dev_id='$varname'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $dev_id=$row["dev_id"];
            $dev_name=$row["dev_name"];
            $dev_description=$row["dev_description"];
          

            
        }
    } else {
        
    }

    $sql = "SELECT * FROM dev_contact WHERE dev_id='$varname'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $dev_fb_url=$row["dev_fb_url"];
            $dev_go_url=$row["dev_go_url"];
            $dev_in_url=$row["dev_lin_url"];     
            $mobile=$row['mobile'];       
        }
    } else {
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
                      <form class="form-horizontal style-form" action="devupdateform.php?dev_id=<?php echo $dev_id;?>" method="post" enctype="multipart/form-data" name="devregister" onsubmit="return validateForm()">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name or Company</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="dev_name" value="<?php echo $dev_name;?>"><p></p>
                                  <p id="alert_name"></p>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">About you</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="4" id="comment" name="dev_description" placeholder="enter ur description here"><?php echo $dev_description;?></textarea><p></p>
                                  <p id="alert_description"></p>
                              </div>
                          </div>
                           
                          <hr>
                          <h4><i class="fa fa-angle-right"></i> Contacts</h4>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">facebook link</label>
                              <div class="col-sm-10">
                                  <input type="url" class="form-control" name="dev_fb_url" value="<?php echo $dev_fb_url;?>" pattern="https?://.+">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">google+ link</label>
                              <div class="col-sm-10">
                                  <input type="url" class="form-control" name="dev_go_url" value="<?php echo $dev_go_url;?>" pattern="https?://.+">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" >linked in link</label>
                              <div class="col-sm-10">
                                  <input type="url" class="form-control" name="dev_in_url" value="<?php echo $dev_in_url;?>" pattern="https?://.+">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mobile</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="mobile" value="<?php echo '0'.$mobile;?>">
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
