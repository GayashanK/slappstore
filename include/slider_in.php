<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <?php

                      $firstname='';
                      $user_img='';

                      $sql = "SELECT * FROM user WHERE user_id='$user_id'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              $firstname=$row["first_name"];
                              $user_img=$row['user_img_url'];
                          }
                      } else {
                          
                      }


                  ?>
                            
                  <?php
                      if(isset($_SESSION['user_id'])){
                  ?>

              	  <p class="centered"><a href="profile.html"><img src="<?php echo "..//".$user_img; ?>" class="img-circle" width="80" height="80" ></a></p>
              	  <h5 class="centered"><?php echo $firstname; ?></h5>

                  <?php
                }
                else{
                ?>

                  <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">User</h5>

                <?php
                    }
                ?>
              	  	
                  <li class="mt">
                      <a href="../welcome.php">
                          <i class="fa fa-home fa-lg"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <?php
                      if($dev_id!='' && $dev_id!=0){
                  ?>  

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                      </a>
                      <ul class="sub">
                          <li ><a  href="../developer/mydetails.php?detail_dev_id=<?php echo "$dev_id";?>">My profile</a></li>
                          <li><a  href="../developer/addskill.php">Add skills</a></li>
                          <li><a  href="../developer/addportfilo.php">Add portfilo</a></li>
                      </ul>
                  </li>

                  <?php

                  }

                  ?>


                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Apps</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="../app.php?app_name=Latest apps">Latest</a></li>
                          <li><a  href="../app.php?app_name=Popular apps">Popular</a></li>
                          <li><a  href="../appos.php?app_os=ios">ios</a></li>
                          <li><a  href="../appos.php?app_os=Windows">Windows</a></li>
                          <li><a  href="../appos.php?app_os=Windows Phone">Windows Phone</a></li>
                          <li><a  href="../appos.php?app_os=Android">Android</a></li>
                          <li><a  href="../appos.php?app_os=Linux">Linux</a></li>
                          <li><a  href="../appos.php?app_os=Other">Other</a></li>
                          <li><a  href="../appcategory.php?app_category=Games">Games</a></li>
                          <li><a  href="../appcategory.php?app_category=Finance">Finance</a></li>
                          <li><a  href="../appcategory.php?app_category=Music">Music</a></li>
                          <li><a  href="../appcategory.php?app_category=Sport">Sports</a></li>
                          <li><a  href="../appcategory.php?app_category=Business">Business</a></li>
                      </ul>
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-dribbble"></i>
                          <span>Developers</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="devskill.php?skill=Web Developer">Web</a></li>
                          <li><a  href="devskill.php?skill=Android Mobile Developer">Android Mobile</a></li>
                          <li><a  href="devskill.php?skill=Windows Mobile Developer">Windows Mobile</a></li>
                          <li><a  href="devskill.php?skill=iPhone Mobile Developer">iPhone</a></li>
                          <li><a  href="devskill.php?skill=Cloud Developer">Cloud</a></li>
                          <li><a  href="devskill.php?skill=Linux Developer">Linux</a></li>
                          <li><a  href="devskill.php?skill=Windows Developer">Windows</a></li>
                          <li><a  href="devskill.php?skill=ios Developer">ios</a></li>
                      </ul>
                  </li>

                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>