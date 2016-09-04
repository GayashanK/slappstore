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
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
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

        $app_id=$_GET['app_id'];

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
                  $sql = "SELECT * FROM application WHERE app_id=$app_id";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                          $app_id=$row['app_id'];
                          $app_dev_id=$row['dev_id'];
                          $app_name=$row['app_name'];
                          $app_description=$row['app_description'];
                          $os=$row['os'];
                          $app_category=$row['category'];
                          $app_url=$row['app_url'];
                          $price=$row['price'];
                          $views=$row['views'];
                          $download_count=$row['download_count'];
                          $img_url=$row['app_img_url'];
                          $sc_img_1=$row['sc_img_1'];
                          $sc_img_2=$row['sc_img_2'];
                          $sc_img_3=$row['sc_img_3'];
                          $sc_img_4=$row['sc_img_4'];
                          $sc_img_5=$row['sc_img_5'];

                      }
                  } else {
                      echo "0 results";
                  }


    ?>

    <?php


              $sql = "SELECT * FROM developer WHERE dev_id=$app_dev_id";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                         
                          $dev_name=$row['dev_name'];

                      }
                  } else {
                      echo "0 results";
                  }

    ?>


    <?php


                  $sql = "SELECT * FROM app_rate WHERE app_id=$app_id";
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

            $sql = "UPDATE app_rate SET rate_5='$rate5' WHERE app_id='$app_id' ";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==4) {

            $rate4=$rate_4+1;

          $sql = "UPDATE app_rate SET rate_4='$rate4' WHERE app_id='$app_id' ";

                if ($conn->query($sql) === TRUE) {
                    

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==3) {

            $rate3=$rate_3+1;

             $sql = "UPDATE app_rate SET rate_3='$rate3' WHERE app_id='$app_id' ";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==2) {

            $rate2=$rate_2+1;

             $sql = "UPDATE app_rate SET rate_2='$rate2' WHERE app_id='$app_id'";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


          if ($rate==1) {

            $rate1=$rate_1+1;

             $sql = "UPDATE app_rate SET rate_1='$rate1' WHERE app_id='$app_id'";

                if ($conn->query($sql) === TRUE) {
                    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
          }


           

    ?>





    <?php


                  $sql = "SELECT * FROM app_rate WHERE app_id=$app_id";
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

        $sql = "UPDATE app_rate SET app_rate='$total_rate' WHERE app_id='$app_id' ";

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
                      <div class="detail-basic form-panel-1">

          
                        <div class="detail-other">
                          <div class="detail-other-1">
                            <img src="<?php echo "..//".$img_url; ?>"  class="images" width="175px" height="175px">
                          </div>
                          <div class="detail-other-2">
                            <h4><?php echo $app_name; ?></h4>
                            <h6>Post by : <?php echo $dev_name; ?></h6>
                            <h6>Price : 
                            <?php 

                                   if ($price==0) {
                                      echo 'free';
                                   }
                                   else{
                                      echo $price;
                                   }

                            ?>
                            </h6>

                            <a href="<?php echo $app_url; ?>"><button class="btn btn-theme"><i class="fa fa-lock"></i> Download </button></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="35px" height="30px" src="

                            <?php 

                                      if ($os=='Android') {
                                        echo '../images/android.png';
                                      }
                                      elseif ($os=='Windows') {
                                        echo '../images/windows.png';
                                      }
                                      elseif ($os=='ios') {
                                        echo '../images/apple.png';
                                      }elseif ($os=='Linux') {
                                        echo '../images/linux.png';
                                      }elseif ($os=='Windows phone') {
                                        echo '../images/windows-phone.png';
                                      }
                                      else{
                                        echo 'images/other.png';
                                      }

                            ?>

                            ">&nbsp;&nbsp;<?php echo $os; ?>
                          </div>
                          <div class="detail-other-2">
                            <h5>Share Application</h5>
                            <img src="../images/facebook.png" width="50px" height="50px">&nbsp;&nbsp;&nbsp; <img src="../images/google+.png" width="50px" height="50px">&nbsp;&nbsp;&nbsp; <img src="../images/twitter.png" width="50px" height="50px">
                            <h6><i class="fa fa-eye"></i>&nbsp;&nbsp;views : <?php echo $views; ?></h6>
                            <h6><i class="fa fa-download"></i>&nbsp;&nbsp;downloads : <?php echo $download_count; ?></h6>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../scripts/reportapp.php?app_id=<?php echo $app_id; ?>"><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;&nbsp;Report this app</a>
                            
                          </div>
                        </div><!--detail-other-->



                      </div><!--detail-basic-->
                      <div class="detail-description form-panel-1">

                        <div class='hslider'>
                          <!-- content for the slider will be loaded here -->
                          <ul class="hslider-parent-container" style="width: 3000px; height: 350px; left: -600px;">
                            <li class="hslide selected" style="width: 600px;"><div class="parent-container"><img src="<?php echo "..//".$sc_img_1; ?>"></div></li>
                            <li class="hslide" style="width: 600px;"><div class="parent-container"><img src="<?php echo "..//".$sc_img_2; ?>"></div></li>
                            <li class="hslide" style="width: 600px;"><div class="parent-container"><img src="<?php echo "..//".$sc_img_3; ?>"></div></li>
                          </ul>
                        </div>
                        <br/>
                        <h4><i class="fa fa-angle-right"></i> Description</h4><br>
                        
                          <?php echo $app_description; ?>
                      
                      </div><!--detail-description-->
                      <div class="detail-reviews form-panel-1">
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
                                       <form action="appdetails.php?app_id=<?php echo $app_id;?>" method="post" name="rating_form" >
                                             <section id="rate-1"><input id="input-21e" class="rating" name="rate" data-step="1" data-size="xs"/></section>
                                             <section id="rate-2" style="padding-top: 4px; margin-left:-40px;">&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Submit</button></section>
                                            
                                       </form>
                                </div>
                            </div>
                        </div>
                      </div>


                      </div><!--detail-reviews-->
                      <div class="detail-comment form-panel-1">

                        <div class="fb-comments" data-href="http://127.0.0.1/php_exercises/SL%20App%20Store%20-%20Final/app/appdetails.php?app_id=<?php echo $app_id?>" data-width="840px" data-numposts="8"></div>
                        
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

                                      

                                      <h6></h6>
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
    <script src="../assets/js/jquery.star-rating-svg.min.js"></script>
    
  

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
