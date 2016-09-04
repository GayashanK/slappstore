					<?php
                    
                          $dev_id=$_GET['dev_id'];
                          
                          include '../config/db_connection.php';

                              $sql = "UPDATE developer SET recomend='recomend' WHERE dev_id='$dev_id'";

                              if ($conn->query($sql) === TRUE) {
                                 header("Location:../admin/alldevelopers.php");

                              } else { 

                                
                              }
                    ?>