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
                            <h4><i class="fa fa-angle-right"></i> Pending Developers</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> id</th>
                                  <th><i class="fa fa-question-circle"></i> developer/company</th>
                                  <th><i class="fa fa-question-circle"></i> description</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Approvement</th>
                              </tr>
                              </thead>
                              <tbody>
                               <?php
                                $array_dev1 = array(array());
                                $j=0;
                                $sql = "SELECT * FROM developer WHERE status='pending'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                             $array_dev1[$j][0]=$row['dev_id'];
                                             $array_dev1[$j][1]=$row['dev_name'];
                                             $array_dev1[$j][2]=$row['dev_description'];
                                             $array_dev1[$j][3]=$row['status'];
                                             
                                          $j++;
                                      
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>

                                
                                <?php

                                      if (isset($array_dev1[0][0])) {
                                        
                                ?>
                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[0][0]; ?></a></td>
                                          <td><?php echo $array_dev1[0][1]; ?></td>
                                          <td><?php echo substr($array_dev1[0][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[0][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[0][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[1][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[1][1]; ?></a></td>
                                          <td><?php echo $array_dev1[1][1]; ?></td>
                                          <td><?php echo substr($array_dev1[1][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[1][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[1][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[1][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[2][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[2][1]; ?></a></td>
                                          <td><?php echo $array_dev1[2][1]; ?></td>
                                          <td><?php echo substr($array_dev1[2][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[2][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[2][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[2][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[3][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[3][1]; ?></a></td>
                                          <td><?php echo $array_dev1[3][1]; ?></td>
                                          <td><?php echo substr($array_dev1[3][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[3][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[3][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[3][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[4][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[4][1]; ?></a></td>
                                          <td><?php echo $array_dev1[4][1]; ?></td>
                                          <td><?php echo substr($array_dev1[4][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[4][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[4][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[4][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[5][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[5][1]; ?></a></td>
                                          <td><?php echo $array_dev1[5][1]; ?></td>
                                          <td><?php echo substr($array_dev1[5][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[5][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[5][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[5][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[6][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[6][1]; ?></a></td>
                                          <td><?php echo $array_dev1[6][1]; ?></td>
                                          <td><?php echo substr($array_dev1[6][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[6][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[6][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[6][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[7][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[7][1]; ?></a></td>
                                          <td><?php echo $array_dev1[7][1]; ?></td>
                                          <td><?php echo substr($array_dev1[7][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[7][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[7][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[7][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[8][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[8][1]; ?></a></td>
                                          <td><?php echo $array_dev1[8][1]; ?></td>
                                          <td><?php echo substr($array_dev1[8][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[8][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[8][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[8][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                                              </form>

                                          </td>
                                      </tr>

                                      <?php

                                      }

                                      if (isset($array_dev1[9][0])) {
                                        
                                      ?>

                                      <tr>
                                          <td><a href="basic_table.html#"><?php echo $array_dev1[9][1]; ?></a></td>
                                          <td><?php echo $array_dev1[9][1]; ?></td>
                                          <td><?php echo substr($array_dev1[9][2],0,80); ?></td>
                                          
                                          <td><span class="label label-info label-mini"><?php echo $array_dev1[9][3]; ?></span></td>
                                          <td>

                                              <form action="../scripts/approvedev.php?dev_id=<?php echo $array_dev1[9][0]; ?>" method="post" style="display: inline; float:left;">
                                                <button type="submit" class="btn btn-success btn-xs" ><i class="fa fa-check"></i></button>&nbsp;&nbsp;&nbsp;
                                              </form>

                                              <form action="../scripts/deletedev.php?dev_id=<?php echo $array_dev1[9][0]; ?>" method="post" style="display: inline; float:left;">
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
