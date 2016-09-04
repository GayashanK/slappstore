<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="icon" type="image/png" href="../images/playstore.png">
    <title>Add Portfilo</title>

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

            $project_name= isset($_POST['project_name']) ? $_POST['project_name'] : '';
            $project_description= isset($_POST['project_description']) ? $_POST['project_description'] : '';
            
            $project_image='';
            


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

          

            if(!empty($_POST['project_name']) && !empty($_POST['project_description']) && !empty($_FILES['project_img'])){
                

                include '../config/db_connection.php';

                $sql = "INSERT INTO dev_portfilo (dev_id,project_name,description,img_url) VALUES
                    ('$dev_id','$project_name', '$project_description', '$project_img')";

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
                      <form class="form-horizontal style-form" action="addportfilo.php" method="post" enctype="multipart/form-data" name="addportfilo" onsubmit="return validateForm(this)">
                      <h4><i class="fa fa-angle-right"></i> Portfilo</h4><br>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Project name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="project_name">
                                  <p></p><p id="alert_project_name"></p>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="4" id="comment" name="project_description"></textarea>
                                  <p></p><p id="alert_project_description"></p>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                              <span class="btn btn-default btn-file">
                                Browse <input type="file" name="project_img">
                              </span>
                              <p></p><p id="alert_img"></p>
                            </div>
                          </div>
                          
                           <div class="form-group">
                              <button type="submit" class="btn btn-theme" style="float:right; margin-right:30px;">Submit</button>
                          </div>
                    </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
          	

          	
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

          var x = document.forms["addportfilo"]["project_name"].value;
          var y = document.forms["addportfilo"]["project_description"].value;
          
          var c=y.length;

          if (x == null || x == "") {
              document.getElementById("alert_project_name").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Project Name must be filled out.</div>";
              return false;
          }

          if (x != null || x != "") {
              document.getElementById("alert_project_name").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
            
          }

          if (y == null || y == "") {
              document.getElementById("alert_project_description").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Project description must be filled out.</div>";
             return false;
          }

           if (c<=100) {
              document.getElementById("alert_project_description").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Description at least 100 characters long.</div>";
             return false;
          }
          
          if (y !== null || y !== "") {
              document.getElementById("alert_project_description").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
        
          }

          if(document.addportfilo.project_img.value.length == 0){
              document.getElementById("alert_img").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Need to upload project image.</div>";
             return false;
          }

          if(document.addportfilo.project_img.value.length !== 0){
              document.getElementById("alert_img").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
             
          }

          
          
          {
           with(thisform)
           {
              if(validateFileExtension(project_img, "alert_img", "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Select image file ex :- jpg, jpeg, bmp, gif, png</div>",
              new Array("jpg","jpeg","gif","png")) == false)
              {
                 return false;
              }
              if(validateFileSize(project_img,1048576, "alert_img", "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Select image file size less than 1mb")==false)
              {
                 return false;
              }
           }
        }

        function validateFileExtension(component,msg_id,msg,extns)
            {
               var flag=0;
               with(component)
               {
                  var ext=value.substring(value.lastIndexOf('.')+1);
                  for(i=0;i<extns.length;i++)
                  {
                     if(ext==extns[i])
                     {
                        flag=0;
                        break;
                     }
                     else
                     {
                        flag=1;
                     }
                  }
                  if(flag!=0)
                  {
                     document.getElementById(msg_id).innerHTML=msg;
                     component.value="";
                     component.style.backgroundColor="#eab1b1";
                     component.style.border="thin solid #000000";
                     component.focus();
                     return false;
                  }
                  else
                  {
                     return true;
                  }
               }
            }


            function validateFileSize(component,maxSize,msg_id,msg)
            {
               if(navigator.appName=="Microsoft Internet Explorer")
               {
                  if(component.value)
                  {
                     var oas=new ActiveXObject("Scripting.FileSystemObject");
                     var e=oas.getFile(component.value);
                     var size=e.size;
                  }
               }
               else
               {
                  if(component.files[0]!=undefined)
                  {
                     size = component.files[0].size;
                  }
               }
               if(size!=undefined && size>maxSize)
               {
                  document.getElementById(msg_id).innerHTML=msg;
                  component.value="";
                  component.style.backgroundColor="#eab1b1";
                  component.style.border="thin solid #000000";
                  component.focus();
                  return false;
               }
               else
               {
                  return true;
               }
            }


        }
  </script>

  </body>
</html>
