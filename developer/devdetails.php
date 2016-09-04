<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
     <link rel="icon" type="image/png" href="../images/playstore.png">
    <title>App</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->

    <link rel="stylesheet" href="../assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../assets/css/style_rating.css" >
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../assets/js/star-rating.js" type="text/javascript"></script>
    
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/carousl.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
        session_start();
        include '../config/db_connection.php';

        $varname=$_GET['detail_dev_id'];

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
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $first_name=$row["first_name"];
            }
        } else {
    
        }
    ?>




    <?php
                  $sql = "SELECT developer.*,dev_contact.*,dev_skill.* from developer inner join  dev_contact on  developer.dev_id=dev_contact.dev_id inner join dev_skill on developer.dev_id=dev_skill.dev_id where  developer.dev_id='$varname' and developer.status='approved' ;";

                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                  
                          $app_dev_id=$row['dev_id'];
                          $dev_name=$row['dev_name'];
                          $dev_img=$row['dev_img'];
                          $dev_description=$row['dev_description'];
                          $dev_fb_url=$row['dev_fb_url'];
                          $dev_go_url=$row['dev_go_url'];
                          $dev_in_url=$row['dev_lin_url'];
                          $mobile=$row['mobile'];
                         

                          $skill_1= $row['skill_1'];
                          $skill_2= $row['skill_2'];
                          $skill_3= $row['skill_3'];
                          $skill_4= $row['skill_4'];
                          $skill_5= $row['skill_5'];
                          $skill_6= $row['skill_6'];
                          $skill_6= $row['skill_6'];
                          $skill_7= $row['skill_7'];
                          $skill_8= $row['skill_8']; 

                          $lang_1= $row['lang_1']; 
                          $lang_2= $row['lang_2']; 
                          $lang_3= $row['lang_3']; 
                          $lang_4= $row['lang_4'];
                          $lang_5= $row['lang_5']; 
                          $lang_6= $row['lang_6']; 
                          $lang_7= $row['lang_7']; 
                          $lang_8= $row['lang_8']; 
                          $lang_9= $row['lang_9']; 
                          $lang_10= $row['lang_10']; 
                          $lang_11= $row['lang_11']; 
                          $lang_12= $row['lang_12']; 
                          $lang_13= $row['lang_13']; 
                          $lang_14= $row['lang_14']; 
                          $lang_15= $row['lang_15']; 
                          $lang_16= $row['lang_16']; 
                          $lang_17= $row['lang_17']; 
                          $lang_18= $row['lang_18']; 
                          $lang_19= $row['lang_19']; 
                          $lang_20= $row['lang_20']; 


                      }
                  } else {
                      echo "0 results";
                  }


    ?>


    <?php


                  $sql = "SELECT * FROM dev_rate WHERE dev_id=$varname";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {

                          $rate_1=$row['rate_1'];
                          $rate_2=$row['rate_2'];
                          $rate_3=$row['rate_3'];
                          $rate_4=$row['rate_4'];
                          $rate_5=$row['rate_5'];

                          

                      }
                  } else {
                      echo "0 results";
                  }

    ?>
    

    <?php



          $rate= isset($_POST['rate']) ? $_POST['rate'] : '0';
          

          if ($rate==5) {

            $rate5=$rate_5+1;

            $sql = "UPDATE dev_rate SET rate_5='$rate5' WHERE dev_id='$varname' ";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==4) {

            $rate4=$rate_4+1;

          $sql = "UPDATE dev_rate SET rate_4='$rate4' WHERE dev_id='$varname' ";

                if ($conn->query($sql) === TRUE) {
                    

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==3) {

            $rate3=$rate_3+1;

             $sql = "UPDATE dev_rate SET rate_3='$rate3' WHERE dev_id='$varname' ";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==2) {

            $rate2=$rate_2+1;

             $sql = "UPDATE dev_rate SET rate_2='$rate2' WHERE dev_id='$varname'";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==1) {

            $rate1=$rate_1+1;

             $sql = "UPDATE dev_rate SET rate_1='$rate1' WHERE dev_id='$varname'";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


           

    ?>





    <?php


                  $sql = "SELECT * FROM dev_rate WHERE dev_id=$varname";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {

                          $rate_1=$row['rate_1'];
                          $rate_2=$row['rate_2'];
                          $rate_3=$row['rate_3'];
                          $rate_4=$row['rate_4'];
                          $rate_5=$row['rate_5'];

                          

                      }
                  } else {
                      echo "0 results";
                  }

                          

                          $total_count=$rate_1+$rate_2+$rate_3+$rate_4+$rate_5;
                          $total_rate=0;

                          if($total_count!=0){
                             $total_rate=(($rate_1*1) + ($rate_2*2) + ($rate_3*3) + ($rate_4*4)  + ($rate_5*5))/($rate_1+$rate_2+$rate_3+$rate_4+$rate_5);
                          }

                 
 
    ?>


    <?php

        $sql = "UPDATE dev_rate SET dev_rate='$total_rate' WHERE dev_id='$varname' ";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

    ?>






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
          <section class="wrapper site-min-height">
          <div class="main_container">
            <div class="row mt">
              <div class="col-lg-12">

                  <div class="main-detail"> <!--main-detail-->
                    <div class="detail containe">
                      <div class="dev-basic form-panel-1">
                        <div class="dev-image">
                           <img src="<?php echo "..//".$dev_img; ?>"  class="images" width="175px" height="175px">
                        </div>
                        <div class="dev-name">
                           <h4><?php echo $dev_name; ?></h4>
                          <h5><?php echo $dev_description; ?></h5>
                        </div>
                        <div class="dev-contact">
                          <h5><i class="fa fa-phone"></i>&nbsp;Contact Developer</h5>
                            <a href="<?php echo $dev_fb_url; ?>"><img src="../images/facebook.png" width="50px" height="50px"></a>&nbsp;&nbsp;&nbsp; 
                            <a href="<?php echo $dev_go_url; ?>"><img src="../images/google+.png" width="50px" height="50px"></a>&nbsp;&nbsp;&nbsp; 
                            <a href="<?php echo $dev_lin_url; ?>"><img src="../images/in.png" width="50px" height="50px"></a>
                            <h6><i class="fa fa-envelope"></i>&nbsp;&nbsp;Email : <?php echo "sdsd" ?></h6>
                            <h6><i class="fa fa-mobile fa-2x"></i>&nbsp;&nbsp;Mobile : <?php echo $mobile; ?></h6>
                            
                        </div>                        
                      </div>
                      <div class="dev-skill form-panel-1">
                        <h4><i class="fa fa-angle-right"></i> Developing Skills</h4>
                        <h5>Skills : <?php

                                                                        if($skill_1!='null'){
                                                                          echo $skill_1;
                                                                        }
                                                                        if($skill_2!='null'){
                                                                          echo ", ".$skill_2;
                                                                        }
                                                                        if($skill_3!='null'){
                                                                          echo ", ".$skill_3;
                                                                        }
                                                                        if($skill_4!='null'){
                                                                          echo ", ".$skill_4;
                                                                        }
                                                                        if($skill_5!='null'){
                                                                          echo ", ".$skill_5;
                                                                        }
                                                                        if($skill_6!='null'){
                                                                          echo ", ".$skill_6;
                                                                        }
                                                                        if($skill_7!='null'){
                                                                          echo ", ".$skill_7;
                                                                        }
                                                                        if($skill_8!='null'){
                                                                          echo ", ".$skill_8;
                                                                        }

                                                                      ?></h5>

                    <h5>Languages : <?php

                                                                        if($lang_1!='null'){
                                                                          echo $lang_1;
                                                                        }
                                                                        if($lang_2!='null'){
                                                                          echo ", ".$lang_2;
                                                                        }
                                                                        if($lang_3!='null'){
                                                                          echo ", ".$lang_3;
                                                                        }
                                                                        if($lang_4!='null'){
                                                                          echo ", ".$lang_4;
                                                                        }
                                                                        if($lang_5!='null'){
                                                                          echo ", ".$lang_5;
                                                                        }
                                                                        if($lang_6!='null'){
                                                                          echo ", ".$lang_6;
                                                                        }
                                                                        if($lang_7!='null'){
                                                                          echo ", ".$lang_7;
                                                                        }
                                                                        if($lang_8!='null'){
                                                                          echo ", ".$lang_8;
                                                                        }
                                                                        if($lang_9!='null'){
                                                                          echo ", ".$lang_9;
                                                                        }
                                                                        if($lang_10!='null'){
                                                                          echo ", ".$lang_10;
                                                                        }
                                                                        if($lang_11!='null'){
                                                                          echo ", ".$lang_11;
                                                                        }
                                                                        if($lang_12!='null'){
                                                                          echo ", ".$lang_12;
                                                                        }
                                                                        if($lang_13!='null'){
                                                                          echo ", ".$lang_13;
                                                                        }
                                                                        if($lang_14!='null'){
                                                                          echo ", ".$lang_14;
                                                                        }
                                                                        if($lang_15!='null'){
                                                                          echo ", ".$lang_15;
                                                                        }
                                                                        if($lang_16!='null'){
                                                                          echo ", ".$lang_16;
                                                                        }
                                                                        if($lang_17!='null'){
                                                                          echo ", ".$lang_17;
                                                                        }
                                                                        if($lang_18!='null'){
                                                                          echo ", ".$lang_18;
                                                                        }
                                                                        if($lang_19!='null'){
                                                                          echo ", ".$lang_19;
                                                                        }
                                                                        if($lang_20!='null'){
                                                                          echo ", ".$lang_20;
                                                                        }
                                                                        

                                                                      ?></h5>

                      </div>

                      <div class="dev-portfilo">
                      <h4><i class="fa fa-angle-right"></i> Portfilo</h4>

                          <?php

                              $sql = "SELECT * FROM dev_portfilo WHERE dev_id='$varname' ORDER BY portfilo_id  DESC LIMIT 6";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($row = $result->fetch_assoc()) {

                                      $project_name=$row['project_name'];
                                      $project_description=$row['description'];
                                      $project_img=$row['img_url'];

                                      ?>

                                      <div id="portfilo">
                                        <div class="dev-portfilo-image">
                                          <img src="<?php echo "..//".$project_img; ?>"  class="images" width="267px" height="160px">
                                        </div>
                                        <div class="dev-portfilo-des">
                                          <h5><?php echo $project_name; ?></h5>
                                          <h6><?php echo $project_description; ?></h6>
                                        </div>
                                      </div>

                    
                          <?php
                    
                                  }
                              } else {
                                  echo "0 results";
                              }
                          ?>

                        
                         
                       
                      </div>

                      <div class="dev-review form-panel-1">
                        <h4><i class="fa fa-angle-right"></i> Reviews</h4><br>

                        <div class="container">
                          <div class="row">
                              <div class="col-xs-12 col-md-6">
                                  <div class="well well-sm">
                                      <div class="row">

                                          <div class="col-xs-12 col-md-6 text-center">
                                              <h1 class="rating-num">
                                                <?php echo substr($total_rate,0,3); ?>
                                              </h1>

                                              <div class="rating">
                                                  <?php
                                                    if ($total_rate>4) {
                                                      echo "<span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'>
                                                            </span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'>
                                                            </span><span class='glyphicon glyphicon-star'></span>";
                                                      
                                                    }
                                                     elseif ($total_rate>3) {
                                                      echo "<span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'>
                                                            </span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span>";
                                                      
                                                    }
                                                     elseif ($total_rate>2) {
                                                      echo "<span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span>";
                                                      
                                                    }
                                                     elseif ($total_rate>1) {
                                                      echo "<span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span>";
                                                      
                                                    }
                                                     elseif ($total_rate>0) {
                                                      echo "<span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star-empty'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span>";
                                                      
                                                    }
                                                    else{
                                                      echo "<span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span><span class='glyphicon glyphicon-star-empty'>
                                                            </span><span class='glyphicon glyphicon-star-empty'></span>";
                                                      
                                                    }

                                                  ?>
                                                  
                                              </div>

                                              <div>
                                                  <span class="glyphicon glyphicon-user"></span><?php echo $total_count; ?> total
                                              </div>

                                          </div>

                                          <div class="col-xs-12 col-md-6">

                                              <div class="row rating-desc">


                                                  <div class="col-xs-3 col-md-3 text-right">
                                                      <span class='glyphicon glyphicon-star'></span>5
                                                  </div>


                                                  <div class="col-xs-8 col-md-9">
                                                      <div class="progress progress-striped">
                                                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                              aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate_5; ?>%">
                                                              <span class="sr-only"><?php echo $rate_5; ?>%</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- end 5 -->


                                                  <div class="col-xs-3 col-md-3 text-right">
                                                      <span class='glyphicon glyphicon-star'></span>4
                                                  </div>



                                                  <div class="col-xs-8 col-md-9">
                                                      <div class="progress">
                                                          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                              aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate_4; ?>%">
                                                              <span class="sr-only"><?php echo $rate_4; ?>%</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- end 4 -->


                                                  <div class="col-xs-3 col-md-3 text-right">
                                                      <span class='glyphicon glyphicon-star'></span>3
                                                  </div>


                                                  <div class="col-xs-8 col-md-9">
                                                      <div class="progress">
                                                          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                                              aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate_3; ?>%">
                                                              <span class="sr-only"><?php echo $rate_3; ?>%</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- end 3 -->


                                                  <div class="col-xs-3 col-md-3 text-right">
                                                      <span class='glyphicon glyphicon-star'></span>2
                                                  </div>


                                                  <div class="col-xs-8 col-md-9">
                                                      <div class="progress">
                                                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                                              aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate_2; ?>%">
                                                              <span class="sr-only"><?php echo $rate_2; ?>%</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- end 2 -->



                                                  <div class="col-xs-3 col-md-3 text-right">
                                                      <span class='glyphicon glyphicon-star'></span>1
                                                  </div>

                                                  <div class="col-xs-8 col-md-9">
                                                      <div class="progress">
                                                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                                              aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rate_1; ?>%">
                                                              <span class="sr-only"><?php echo $rate_1; ?>%</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <!-- end 1 -->

                                              </div><!-- end desc -->

                                            </div>


                                        </div>
                                              <!-- end row -->
                                       <form action="devdetails.php?detail_dev_id=<?php echo $varname;?>" method="post" name="rating_form" >
                                             <section id="rate-1"><input id="input-21e" class="rating" name="rate" data-step="1" data-size="xs"/></section>
                                             <section id="rate-2" style="padding-top: 4px; margin-left:-40px;">&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Submit</button></section>
                                            
                                       </form>
                                </div>
                            </div>
                        </div>
                      </div>


                      </div>
                      <div class="dev-comment form-panel-1">
                        <div class="fb-comments" data-href="http://127.0.0.1/php_exercises/SL%20App%20Store%20-%20Final/developer/devdetails.php?detail_dev_id=15<?php echo $varname?>" data-width="840px" data-numposts="8"></div>
                      </div>
                    </div> <!--detail container-->

                    <div class="recapp containe">
                    <h4><i class="fa fa-angle-right"></i> Recomended Apps</h4>



                        <?php
                        $sql = "SELECT app_id,dev_id,app_name,os,price,app_url,app_img_url FROM application WHERE recomend='recomend' and status='approved' LIMIT 8";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {  ?>
                              <div class="rec form-panel-1">
                                <a href="../app/appdetails.php?app_id=<?php echo $row['app_id']; ?>">

                                    <div class="detail-other-3">
                                      <img src="<?php echo "..//".$row['app_img_url']; ?>" width="140px" height="140px" class="images">
                                    </div>
                                    <div class="detail-other-4">
                                      <h5><i class="fa fa-angle-right"></i> <?php echo $row['app_name']; ?></h5>
                                      <h6>Post by : <?php echo $row['dev_id']; ?></h6>
                                      <h6>Price : <?php 

                                             if ($row['price']==0) {
                                                echo 'free';
                                             }
                                             else{
                                                echo $row['price'];
                                             }

                                      ?>
                                      </h6>
                                      <a href="<?php echo $row['app_url']; ?>"><button class="btn btn-theme btn-xs" ><i class="fa fa-lock"></i> Download</button></a>
                                      &nbsp;&nbsp;&nbsp;<img width="20px" height="20px" src="

                                      <?php 

                                      if ($row['os']=='Android') {
                                        echo '../images/android.png';
                                      }
                                      elseif ($row['os']=='Windows') {
                                        echo '../images/windows.png';
                                      }
                                      elseif ($row['os']=='ios') {
                                        echo '../images/apple.png';
                                      }elseif ($row['os']=='Linux') {
                                        echo '../images/linux.png';
                                      }elseif ($row['os']=='Windows phone') {
                                        echo '../images/windows-phone.png';
                                      }
                                      else{
                                        echo 'images/other.png';
                                      }

                                      ?>

                                      "></i> <?php echo $row['os']; ?>
                                      <h6>rating</h6>
                                    </div>

                                </a>
                              </div>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>        






                        
                      
                      
                    
                  </div> <!--recapp container-->
                  </div>

              </div>
            </div> <!--row mt-->
          </div>
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php include '../include/footer.php'; ?>
      <!--footer end-->
  </section>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1767481896870290";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

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
    
  

  <script src='https://code.jquery.com/jquery-1.12.1.min.js'></script>
    <script src='../assets/js/hslider.min.js'></script>
    <script>
      //implementation code goes here
      $(document).ready(function () {
        $('.hslider').hslider({
           imagesArrayProvided: true,
           imagesArray: ['<?php echo "..//".$sc_img_1; ?>', '<?php echo "..//".$sc_img_2; ?>', '<?php echo "..//".$sc_img_3; ?>', '<?php echo "..//".$sc_img_4; ?>', '<?php echo "..//".$sc_img_5; ?>','<?php echo "..//".$sc_img_1; ?>', '<?php echo "..//".$sc_img_2; ?>', '<?php echo "..//".$sc_img_3; ?>', '<?php echo "..//".$sc_img_4; ?>'],
           slidesOnView: 1,
           autoSlide: true,
           pauseButtonNeeded: false,
           showThumbnails: true,
           captionNeeded: true,
           captionContentList: ['', '', '', '', '', 
                     '', '', '', '', ''],
        });
       });
    </script>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<script>
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg',
              showClear: false
           });
           
        $('#btn-rating-input').on('click', function() {
            $('#rating-input').rating('refresh', {
                showClear:true, 
                disabled: !$('#rating-input').attr('disabled')
            });
        });
        
        
        $('.btn-danger').on('click', function() {
            $("#kartik").rating('destroy');
        });
        
        $('.btn-success').on('click', function() {
            $("#kartik").rating('create');
        });
        
        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });
        
        
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script> 
  </body>
</html>
