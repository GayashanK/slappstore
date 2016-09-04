<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
     <link rel="icon" type="image/png" href="../images/playstore.png">
    <title>Add developing skills</title>

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
            echo "0 results";
        }

        if(isset($_SESSION['user_id'])&& $dev_id!='' && $dev_id!=0){

            $skill_1= isset($_POST['skill_1']) ? $_POST['skill_1'] : 'null';
            $skill_2= isset($_POST['skill_2']) ? $_POST['skill_2'] : 'null';
            $skill_3= isset($_POST['skill_3']) ? $_POST['skill_3'] : 'null';
            $skill_4= isset($_POST['skill_4']) ? $_POST['skill_4'] : 'null';
            $skill_5= isset($_POST['skill_5']) ? $_POST['skill_5'] : 'null';
            $skill_6= isset($_POST['skill_6']) ? $_POST['skill_6'] : 'null';
            $skill_6= isset($_POST['skill_6']) ? $_POST['skill_6'] : 'null';
            $skill_7= isset($_POST['skill_7']) ? $_POST['skill_7'] : 'null';
            $skill_8= isset($_POST['skill_8']) ? $_POST['skill_8'] : 'null'; 

            $lang_1= isset($_POST['lang_1']) ? $_POST['lang_1'] : 'null'; 
            $lang_2= isset($_POST['lang_2']) ? $_POST['lang_2'] : 'null'; 
            $lang_3= isset($_POST['lang_3']) ? $_POST['lang_3'] : 'null'; 
            $lang_4= isset($_POST['lang_4']) ? $_POST['lang_4'] : 'null';
            $lang_5= isset($_POST['lang_5']) ? $_POST['lang_5'] : 'null'; 
            $lang_6= isset($_POST['lang_6']) ? $_POST['lang_6'] : 'null'; 
            $lang_7= isset($_POST['lang_7']) ? $_POST['lang_7'] : 'null'; 
            $lang_8= isset($_POST['lang_8']) ? $_POST['lang_8'] : 'null'; 
            $lang_9= isset($_POST['lang_9']) ? $_POST['lang_9'] : 'null'; 
            $lang_10= isset($_POST['lang_10']) ? $_POST['lang_10'] : 'null'; 
            $lang_11= isset($_POST['lang_11']) ? $_POST['lang_11'] : 'null'; 
            $lang_12= isset($_POST['lang_12']) ? $_POST['lang_12'] : 'null'; 
            $lang_13= isset($_POST['lang_13']) ? $_POST['lang_13'] : 'null'; 
            $lang_14= isset($_POST['lang_14']) ? $_POST['lang_14'] : 'null'; 
            $lang_15= isset($_POST['lang_15']) ? $_POST['lang_15'] : 'null'; 
            $lang_16= isset($_POST['lang_16']) ? $_POST['lang_16'] : 'null'; 
            $lang_17= isset($_POST['lang_17']) ? $_POST['lang_17'] : 'null'; 
            $lang_18= isset($_POST['lang_18']) ? $_POST['lang_18'] : 'null'; 
            $lang_19= isset($_POST['lang_19']) ? $_POST['lang_19'] : 'null'; 
            $lang_20= isset($_POST['lang_20']) ? $_POST['lang_20'] : 'null'; 

        }
        else{
            echo "register or sign in first";
            header("Location:../welcome.php");
        }


        if(($skill_1!='null'|| $skill_2!='null'|| $skill_3!='null'|| $skill_4!='null' || $skill_5!='null' || $skill_6!='null' || $skill_7!='null' || $skill_8!='null' ) && ($lang_1!='null' || $lang_2!='null' || $lang_3!='null' || $lang_4!='null' || $lang_5!='null'  || $lang_6!='null'|| $lang_7!='null' || $lang_8!='null' || $lang_9!='null' || $lang_10!='null' || $lang_11!='null' || $lang_12!='null' || $lang_13!='null' || $lang_14!='null' || $lang_15!='null' || $lang_16!='null' || $lang_17!='null' || $lang_18!='null' || $lang_19!='null' || $lang_20!='null')){
                

                $sql = "UPDATE dev_skill SET skill_1='$skill_1',skill_2='$skill_2',skill_3='$skill_3',skill_4='$skill_4',skill_5='$skill_5',skill_6='$skill_6',skill_7='$skill_7',skill_8='$skill_8',lang_1='$lang_1',lang_2='$lang_2',lang_3='$lang_3',lang_4='$lang_4',lang_5='$lang_5',lang_6='$lang_6',lang_7='$lang_7',lang_8='$lang_8',lang_9='$lang_9',lang_10='$lang_10',lang_11='$lang_11',lang_12='$lang_12',lang_13='$lang_13',lang_14='$lang_14',lang_15='$lang_15',lang_16='$lang_16',lang_17='$lang_17',lang_18='$lang_18',lang_19='$lang_19',lang_20='$lang_20' WHERE dev_id='$dev_id'";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
        else{ 
            
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
          	
                	<!-- INPUT MESSAGES -->
                	<div class="row mt">
                		<div class="col-lg-12">
                			<div class="form-panel ">

                        <form class="form-horizontal style-form" action="addskill.php" method="post" enctype="multipart/form-data" name="addskill" onsubmit="return validateForm(this)">



                        	  <h4 class="mb"><i class="fa fa-angle-right"></i> Developer Skills</h4>
                						  <div class="checkbox">
                  						  <label>
                  						    <input type="checkbox" value="Web developer" name="skill_1"  id="skill_1">
                  						    Web developer
                  						  </label>
                						  </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Android Modile Developer" name="skill_2">
                                  Android Modile Developer
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="iPhone Modile Developer" name="skill_3">
                                  iPhone Modile Developer
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Windows Modile Developer" name="skill_4">
                                  Windows Modile Developer
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Cloud Developer" name="skill_5">
                                  Cloud Developer
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Windows Developer" name="skill_6">
                                  Windows Developer
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="ios Developer" name="skill_7">
                                  ios Developer
                                </label>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="Linux Developer" name="skill_8">
                                  Linux Developer
                                </label>
                              </div>

                              <p></p><p id="alert_skill"></p>
						
						
          						<hr>
                      <h5 class="mb"><i class="fa fa-angle-right"></i> Languages</h5>
          						<label class="checkbox-inline">
          						  <input type="checkbox" id="inlineCheckbox1" value="Java SE" name="lang_1"> Java SE
          						</label>
          						<label class="checkbox-inline">
          						  <input type="checkbox" id="inlineCheckbox2" value="java EE" name="lang_2"> java EE
          						</label>
          						<label class="checkbox-inline">
          						  <input type="checkbox" id="inlineCheckbox3" value="c#" name="lang_3"> c#
          						</label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value=".net" name="lang_4"> .net
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="c++" name="lang_5"> c++
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="cobolt" name="lang_6"> cobolt
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="Ruby" name="lang_7"> Ruby
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="Phython" name="lang_8"> Phython
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="Go" name="lang_9"> Go
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="node.js" name="lang_10"> node.js
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="Angular.js" name="lang_11"> Angular.js
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="PHP" name="lang_12"> PHP
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="css" name="lang_13"> css
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="HTML5" name="lang_14"> HTML5
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="JavaScript" name="lang_15"> JavaScript
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="c++" name="lang_16"> c++
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="wordpress" name="lang_17"> wordpress
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="xml" name="lang_18"> xml
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="MySQL" name="lang_19"> MySQL
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="MongoDB" name="lang_20"> MongoDB
                      </label>

                      <p></p><p id="alert_lang"></p>

                      <hr>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-theme" style="float:right; margin-right:30px;">Submit</button>
                      </div>



						    </form>
                </div>
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
      function validateForm(thisform) {

          var a = document.forms["addskill"]["skill_1"].checked;
          var b = document.forms["addskill"]["skill_2"].checked;
          var c = document.forms["addskill"]["skill_3"].checked;
          var d = document.forms["addskill"]["skill_4"].checked;
          var e = document.forms["addskill"]["skill_5"].checked;
          var f = document.forms["addskill"]["skill_6"].checked;
          var g = document.forms["addskill"]["skill_7"].checked;
          var h = document.forms["addskill"]["skill_8"].checked;



          if (a == false && b == false && c == false && d == false && e == false && f == false && g == false && h == false ) {
              document.getElementById("alert_skill").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; At least need to have one skill.</div>";
              return false;
          }

          else {
              document.getElementById("alert_skill").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
              
          }

          var i = document.forms["addskill"]["lang_1"].checked;
          var j = document.forms["addskill"]["lang_2"].checked;
          var k = document.forms["addskill"]["lang_3"].checked;
          var l = document.forms["addskill"]["lang_4"].checked;
          var m = document.forms["addskill"]["lang_5"].checked;
          var n = document.forms["addskill"]["lang_6"].checked;
          var o = document.forms["addskill"]["lang_7"].checked;
          var p = document.forms["addskill"]["lang_8"].checked;
          var q = document.forms["addskill"]["lang_8"].checked;
          var r = document.forms["addskill"]["lang_9"].checked;
          var s = document.forms["addskill"]["lang_10"].checked;
          var t = document.forms["addskill"]["lang_11"].checked;
          var u = document.forms["addskill"]["lang_12"].checked;
          var v = document.forms["addskill"]["lang_13"].checked;
          var w = document.forms["addskill"]["lang_14"].checked;
          var x = document.forms["addskill"]["lang_15"].checked;
          var y = document.forms["addskill"]["lang_16"].checked;
          var z = document.forms["addskill"]["lang_17"].checked;
          var aa = document.forms["addskill"]["lang_18"].checked;
          var ab = document.forms["addskill"]["lang_19"].checked;
          var ac = document.forms["addskill"]["lang_20"].checked;


          if (i == false && j == false && k == false && l == false && m == false && n == false && o == false && p == false && q == false && r == false && s == false && t == false && u == false && v == false && w == false && x == false && y == false && z == false && aa == false && ab == false && ac == false ) {
              document.getElementById("alert_lang").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; At least need to have one skill.</div>";
              return false;
          }

          else {
              document.getElementById("alert_lang").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
              
          }


          
        }
  </script>

  </body>
</html>
