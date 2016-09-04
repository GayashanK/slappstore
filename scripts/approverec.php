					<?php
                    
                          $app_id=$_GET['app_id'];
                          
                          include '../config/db_connection.php';

                              $sql = "UPDATE application SET recomend='recomend' WHERE app_id='$app_id'";

                              if ($conn->query($sql) === TRUE) {
                                 header("Location:../admin/allapps.php");

                              } else { 

                                
                              }
                    ?>