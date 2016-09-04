<header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="../welcome.php" class="logo"><img src="../images/logo.png"></a>
            <!--logo end-->
            
           <?php
                if($dev_id!='' && $dev_id!=0){
            ?>

            


                <div class="top-menu">
                  <ul class="nav pull-right top-menu">
                        <li><a class="login" href="../login/signout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Sign Out</a></li>
                        <li><a class="login" href="../app/postapp.php" style="background-color:rgb(255,165,0);"><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp;Post App</a></li>
                  </ul>
                </div>
            <?php
                }
                elseif(isset($_SESSION['user_id'])){
    
            ?>
                 <div class="top-menu">
                  <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="../login/signout.php">Sign Out</a></li>
                        <li><a class="login" href="../developer/devregistration.php" style="background-color:rgb(255,165,0);">Upgrade Pro</a></li>
                  </ul>
                </div>
            <?php
                }
                else{
      
            ?>
                <div class="top-menu">
                  <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="../login/signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Sign In</a></li>
                        <li><a class="login" href="../login/signup.php" style="background-color:rgb(255,165,0);">Register</a></li>
                  </ul>
                </div>
            <?php
                }
            ?>

        </header>