<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="icon" type="image/png" href="../images/playstore.png">
    <title>Post app</title>

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

            $os= isset($_POST['os']) ? $_POST['os'] : '';
            $category= isset($_POST['category']) ? $_POST['category'] : '';
            $app_name= isset($_POST['app_name']) ? $_POST['app_name'] : '';
            $description= isset($_POST['description']) ? $_POST['description'] : '';
            $price= isset($_POST['price']) ? $_POST['price'] : '';
            $url= isset($_POST['url']) ? $_POST['url'] : '';
            $appimg_path='';
            $sc_img_1='';
            $sc_img_2='';
            $sc_img_3='';
            $sc_img_4='';
            $sc_img_5='';


            if(isset($_FILES['app_img'])){
                $errors= array();
                $file_name = $_FILES['app_img']['name'];
                $file_size =$_FILES['app_img']['size'];
                $file_tmp =$_FILES['app_img']['tmp_name'];
                $file_type=$_FILES['app_img']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['app_img']['name'])));

                $expensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$expensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }

                if($file_size > 2097152){
                    $errors[]='File size must be excately 2 MB';
                }

                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"../images/appimg/".$file_name);
                }else{
                    print_r($errors);
                }

                $appimg_path="images/appimg/".$file_name;
            }
            

            extract($_POST);
            $error=array();
            $extension=array("jpeg","jpg","png","gif");
                

            if(isset($_FILES['files'])){

            
                    
            
                        $file_name0=$_FILES["files"]["name"][0];
                        $file_tmp0=$_FILES["files"]["tmp_name"][0];
                        $ext0=pathinfo($file_name0,PATHINFO_EXTENSION);
                        if(in_array($ext0,$extension))
                        {
                            
                                $filename0=basename($file_name0,$ext0);
                                $newFileName0=$filename0.time().".".$ext0;
                                move_uploaded_file($file_tmp0=$_FILES["files"]["tmp_name"][0],"../images/screenshots/".$newFileName0);
                                $sc_img_1="images/screenshots/".$newFileName0;
                            
                        }
                        else
                        {
                            array_push($error,"$file_name, ");
                        }

                        $file_name1=$_FILES["files"]["name"][1];
                        $file_tmp1=$_FILES["files"]["tmp_name"][1];
                        $ext1=pathinfo($file_name1,PATHINFO_EXTENSION);
                        if(in_array($ext1,$extension))
                        {
                            
                                $filename1=basename($file_name1,$ext1);
                                $newFileName1=$filename1.time().".".$ext1;
                                move_uploaded_file($file_tmp1=$_FILES["files"]["tmp_name"][1],"../images/screenshots/".$newFileName1);
                                $sc_img_2="images/screenshots/".$newFileName1;
                            
                        }
                        else
                        {
                            array_push($error,"$file_name, ");
                        }

                        $file_name2=$_FILES["files"]["name"][2];
                        $file_tmp2=$_FILES["files"]["tmp_name"][2];
                        $ext2=pathinfo($file_name2,PATHINFO_EXTENSION);
                        if(in_array($ext2,$extension))
                        {
                            
                                $filename2=basename($file_name2,$ext2);
                                $newFileName2=$filename2.time().".".$ext2;
                                move_uploaded_file($file_tmp2=$_FILES["files"]["tmp_name"][2],"../images/screenshots/".$newFileName2);
                                $sc_img_3="images/screenshots/".$newFileName2;
                        }
                        else
                        {
                            array_push($error,"$file_name, ");
                        }

                        $file_name3=$_FILES["files"]["name"][3];
                        $file_tmp3=$_FILES["files"]["tmp_name"][3];
                        $ext3=pathinfo($file_name3,PATHINFO_EXTENSION);
                        if(in_array($ext3,$extension))
                        {
                            
                                $filename3=basename($file_name3,$ext3);
                                $newFileName3=$filename3.time().".".$ext3;
                                move_uploaded_file($file_tmp3=$_FILES["files"]["tmp_name"][3],"../images/screenshots/".$newFileName3);
                                $sc_img_4="images/screenshots/".$newFileName3;
                        }
                        else
                        {
                            array_push($error,"$file_name, ");
                        }

                        $file_name4=$_FILES["files"]["name"][4];
                        $file_tmp4=$_FILES["files"]["tmp_name"][4];
                        $ext4=pathinfo($file_name4,PATHINFO_EXTENSION);
                        if(in_array($ext4,$extension))
                        {
                            
                                $filename4=basename($file_name4,$ext4);
                                $newFileName4=$filename4.time().".".$ext4;
                                move_uploaded_file($file_tmp4=$_FILES["files"]["tmp_name"][4],"../images/screenshots/".$newFileName4);
                                $sc_img_5="images/screenshots/".$newFileName4;
                        }
                        else
                        {
                            array_push($error,"$file_name, ");
                        }

            }



            if(!empty($_POST['app_name']) && !empty($_POST['description']) && !empty($_POST['os']) && !empty($_POST['price'])
                && !empty($_POST['url']) && !empty($_FILES['app_img']) && !empty($_FILES['files'])){
                

                include '../config/db_connection.php';

                $sql = "INSERT INTO application (dev_id,app_name,app_description,os,category,app_url, price,app_img_url,sc_img_1,sc_img_2,sc_img_3,sc_img_4,sc_img_5) VALUES
                    ('$dev_id','$app_name', '$description', '$os','$category','$url','$price','$appimg_path','$sc_img_1','$sc_img_2','$sc_img_3','$sc_img_4','$sc_img_5')";

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
                   <h4><i class="fa fa-angle-right"></i> Post App</h4><br>
                      <form class="form-horizontal style-form" action="postapp.php" method="post" enctype="multipart/form-data" name="postapp" onsubmit="return validateForm()">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Operaing System</label>
                              <div class="col-sm-10">
                                  <select class="form-control" name="os">
                                    <option>Android</option>
                                    <option>Windows phone</option>
                                    <option>ios</option>
                                    <option>Linux</option>
                                    <option>Windows</option>
                                    <option>Other</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Operaing System</label>
                              <div class="col-sm-10">
                                  <select class="form-control" name="category">
                                    <option>Games</option>
                                    <option>Business</option>
                                    <option>Finance</option>
                                    <option>Music</option>
                                    <option>Sport</option>
                                    <option>Tools</option>
                                  </select>
                              </div>
                          </div>
                           
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">App name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="app_name">
                                  <p></p><p id="alert_app_name"></p>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" rows="4" id="comment" name="description"></textarea>
                                  <p></p><p id="alert_description"></p>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                              <span class="btn btn-default btn-file">
                                Browse <input type="file" name="app_img">
                              </span>
                              <p></p><p id="alert_app_img"></p>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Price</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="price">
                                  <p></p><p id="alert_price"></p>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Download url</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="url" pattern="https?://.+" >
                                  <p></p><p id="alert_url"></p>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Screen shots</label>
                            <div class="col-sm-10">
                              <span class="btn btn-default btn-file">
                                Browse <input type="file" id="sc_shots" name="files[]" multiple>
                              </span>
                              <p></p><p id="alert_sc_shots"></p>
                            </div>
                          </div>
                          
                           <div class="form-group">
                              <button type="submit" class="btn btn-theme" style="float:right; margin-right:30px;">Post Application</button>
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
      function validateForm() {

          var x = document.forms["postapp"]["app_name"].value;
          var y = document.forms["postapp"]["description"].value;
          
          var c=y.length;

          var a = document.forms["postapp"]["price"].value;
          var b = document.forms["postapp"]["url"].value;


            
            

          if (x == null || x == "") {
              document.getElementById("alert_app_name").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; App Name must be filled out.</div>";
              return false;
          }

          if (x != null || x != "") {
              document.getElementById("alert_app_name").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
            
          }

          if (y == null || y == "") {
              document.getElementById("alert_description").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; App description must be filled out.</div>";
             return false;
          }
          
          if (c<=100) {
              document.getElementById("alert_description").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Description at least 100 characters long.</div>";
             return false;
          }


          if (y !== null || y !== "") {
              document.getElementById("alert_description").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
        
          }

          if(document.postapp.app_img.value.length == 0){
              document.getElementById("alert_app_img").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Need to upload application image.</div>";
             return false;
          }

          if(document.postapp.app_img.value.length !== 0){
              document.getElementById("alert_app_img").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
             
          }

          if (isNaN(a)){

               document.getElementById("alert_price").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Enter value of application.</div>";
                return false;
          }

          else{
                document.getElementById("alert_price").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
             
          }
          if (b == null || b == "") {
              document.getElementById("alert_url").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; URL must be filled out.</div>";
              return false;
          }

          else{
             document.getElementById("alert_url").innerHTML = "<div class='alert alert-success' class='close' data-dismiss='alert' aria-label='close'><b><b>Well done!</b> success.</div>";
          }

          if(document.getElementById("sc_shots").files.length  !==5 ){
               document.getElementById("alert_sc_shots").innerHTML = "<div class='alert alert-danger' class='close' data-dismiss='alert' aria-label='close'><b>Oh snap &nbsp; !</b>&nbsp;&nbsp; Must select 5 images.</div>";
              return false;
          }
    }
  </script>


  </body>
</html>
