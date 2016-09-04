					<?php
                    
                          $app_id=$_GET['app_id'];
                          
                          include '../config/db_connection.php';

                              $sql = "UPDATE application SET report='reported' WHERE app_id = '$app_id' ";

                              if ($conn->query($sql) === TRUE) {
                                 header("Location:../app/appdetails.php?app_id=$app_id");

                              } else { 

                                
                              }
                    ?>