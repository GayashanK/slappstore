                            <div class="apps">

                                <div class="app_image">
                                  <img class="image" src="<?php echo $row['dev_img']; ?>">
                                </div>

                                <div class="app_content">
                                  <div><a href="developer/devdetails.php?detail_dev_id=<?php echo $row['dev_id']; ?>"><?php echo $row['dev_name']; ?></a></br>
                                      <small>
                                        Mobile : <?php echo $row['mobile'];?>
                                      </small>
                                  </div>
                                 
                                 <div class="app_type" style="text-align:center;">
                                 <a href="<?php echo $row['dev_lin_url'];?>" >
                                   <img width=25px height=25px src="images/incircle.png"> &nbsp;&nbsp;                                
                                 </a>
                                 <a href="<?php echo $row['dev_go_url']; ?>" >
                                   <img width=25px height=25px src="images/g+circle.png"> &nbsp;&nbsp;                                
                                 </a>  
                                 <a href="<?php echo $row['dev_fb_url']; ?>" >
                                   <img width=25px height=25px src="images/fbcircle.png"> &nbsp;&nbsp;                                
                                 </a>                                     
                                 </div>
                                 
                                </div>
                               
                            </div>