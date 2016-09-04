<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="icon" type="image/png" href="../images/playstore.png">
    <title>Admin dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php

      session_start();
      include '../config/db_connection.php';

      if(!isset($_SESSION['admin_id'])){
        header("Location:index.php");
      }

    ?>
    
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
          <?php include 'include/header.php'; ?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
          <?php include 'include/slider.php'; ?>
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">

                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> New Applications</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> app name</th>
                                  <th><i class="fa fa-question-circle"></i> dev id</th>
                                  <th><i class=" fa fa-edit"></i> os</th>
                                  <th><i class=" fa fa-edit"></i> price</th>
                                  <th><i class=" fa fa-edit"></i> url</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Approvement</th>
                              </tr>
                              </thead>
                              <tbody>

                                <?php
                                $array = array(array());
                                $i=0;
                                $sql = "SELECT * FROM application WHERE status='pending'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                             $array[$i][0]=$row['app_id'];
                                             $array[$i][1]=$row['app_name'];
                                             $array[$i][2]=$row['dev_id'];
                                             $array[$i][3]=$row['os'];
                                             $array[$i][4]=$row['price'];
                                             $array[$i][5]=$row['app_url'];
                                             $array[$i][6]=$row['status'];
                                          
                                          $i++;
                                      
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                                
                                <?php

                                      if (isset($array[0][0])) {
                                        
                                ?>
                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[0][1]; ?></a></td>
                                          <td><?php echo $array[0][2]; ?></td>
                                          <td><?php echo $array[0][3]; ?></td>
                                          <td><?php echo $array[0][4]; ?></td>
                                          <td><?php echo $array[0][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[0][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                  <?php

                                      }

                                      if (isset($array[1][0])) {
                                        
                                  ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[1][1]; ?></a></td>
                                          <td><?php echo $array[1][2]; ?></td>
                                          <td><?php echo $array[1][3]; ?></td>
                                          <td><?php echo $array[1][4]; ?></td>
                                          <td><?php echo $array[1][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[1][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[1][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array[2][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[0][1]; ?></a></td>
                                          <td><?php echo $array[2][2]; ?></td>
                                          <td><?php echo $array[2][3]; ?></td>
                                          <td><?php echo $array[2][4]; ?></td>
                                          <td><?php echo $array[2][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[2][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[2][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array[3][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[3][1]; ?></a></td>
                                          <td><?php echo $array[3][2]; ?></td>
                                          <td><?php echo $array[3][3]; ?></td>
                                          <td><?php echo $array[3][4]; ?></td>
                                          <td><?php echo $array[3][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[3][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[3][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>


                                      <?php

                                      }

                                      if (isset($array[4][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[0][1]; ?></a></td>
                                          <td><?php echo $array[4][2]; ?></td>
                                          <td><?php echo $array[4][3]; ?></td>
                                          <td><?php echo $array[4][4]; ?></td>
                                          <td><?php echo $array[4][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[4][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[4][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array[5][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[5][1]; ?></a></td>
                                          <td><?php echo $array[5][2]; ?></td>
                                          <td><?php echo $array[5][3]; ?></td>
                                          <td><?php echo $array[5][4]; ?></td>
                                          <td><?php echo $array[5][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[5][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[5][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array[6][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[6][1]; ?></a></td>
                                          <td><?php echo $array[6][2]; ?></td>
                                          <td><?php echo $array[6][3]; ?></td>
                                          <td><?php echo $array[6][4]; ?></td>
                                          <td><?php echo $array[6][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[6][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[6][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>
                                      <?php

                                      }

                                      if (isset($array[7][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[7][1]; ?></a></td>
                                          <td><?php echo $array[7][2]; ?></td>
                                          <td><?php echo $array[7][3]; ?></td>
                                          <td><?php echo $array[7][4]; ?></td>
                                          <td><?php echo $array[7][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[7][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[7][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array[8][0])) {
                                        
                                      ?>
                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[8][1]; ?></a></td>
                                          <td><?php echo $array[8][2]; ?></td>
                                          <td><?php echo $array[8][3]; ?></td>
                                          <td><?php echo $array[8][4]; ?></td>
                                          <td><?php echo $array[8][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[8][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[8][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array[9][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array[9][1]; ?></a></td>
                                          <td><?php echo $array[9][2]; ?></td>
                                          <td><?php echo $array[9][3]; ?></td>
                                          <td><?php echo $array[9][4]; ?></td>
                                          <td><?php echo $array[9][5]; ?></td>
                                          <td><span class="label label-info label-mini"><?php echo $array[9][6]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approve.php?app_id=<?php echo $array[9][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/delete.php?app_id=<?php echo $array[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>


                                      <?php

                                      }

                                      ?>
                              
                              </tbody>
                          </table>


                      </div><!-- /content-panel -->



                  </div><!-- /col-md-12 -->
              
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php include 'include/footer.php'; ?>
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
    <script src="../assets/js/chart-master/Chart.js"></script>
    <script src="../assets/js/chartjs-conf.js"></script>
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
