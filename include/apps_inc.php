                              <div class="apps">

                                <div class="app_image">
                                  <img class="image" src="<?php echo $row['app_img_url']?>">
                                </div>

                                <div class="app_content">
                                  <div><a href="app/appdetails.php?app_id=<?php echo $row['app_id']; ?>"><?php echo $row['app_name']?></a>
                                      
                                  </div>
                                 
                                 <div class="app_type">
                                 <a href="appos.php?app_os=<?php echo $row['os']; ?>" >
                                   <img width=25px height=25px src="<?php 

                                      if ($row['os']=='Android') {
                                        echo 'images/android.png';
                                      }
                                      elseif ($row['os']=='Windows') {
                                        echo 'images/windows.png';
                                      }
                                      elseif ($row['os']=='ios') {
                                        echo 'images/apple.png';
                                      }elseif ($row['os']=='Linux') {
                                        echo 'images/linux.png';
                                      }elseif ($row['os']=='Windows phone') {
                                        echo 'images/windows-phone.png';
                                      }
                                      else{
                                        echo 'images/other.png';
                                      }

                                    ?>">                                   
                                 </a>                                    
                                 </div>
                                 <div class="app_review">

                                  <script>
                                  $(function() {

                                    // basic use comes with defaults values
                                    $(".<?php echo $row['app_id'];?>").starRating({
                                      initialRating: <?php echo $row['app_rate'];?> ,
                                      starSize: 15,
                                      readOnly: true
                                    });

                                  });
                                  </script>


                                  <div id="app_review_1">
                                    <div class="<?php echo $row['app_id'];?>"></div>
                                  </div>

                                  <div id="app_review_2" align="right">


                                    <small>Rs:<?php 

                                     if ($row['price']==0) {
                                        echo 'free';
                                     }
                                     else{
                                        echo $row['price'];
                                     }

                                     ?>
                                       
                                     </small>

                                   </div>
                                 </div>
                                </div>
                               
                            </div>
