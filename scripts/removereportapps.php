					<?php
                    
                          $app_id=$_GET['app_id'];
                          
                          include '../config/db_connection.php';

                              $sql = "DELETE FROM application WHERE app_id = '$app_id' ";

                              if ($conn->query($sql) === TRUE) {
                                 header("Location:../admin/reportedapps.php");

                              } else { 

                                
                              }
                    ?>