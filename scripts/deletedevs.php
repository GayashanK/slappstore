					<?php
                    
                          $dev_id=$_GET['dev_id'];
                          
                          include '../config/db_connection.php';

                              $sql = "DELETE FROM developer WHERE dev_id = '$dev_id' ";

                              if ($conn->query($sql) === TRUE) {
                                 header("Location:../admin/deletedevelopers.php");

                              } else { 

                                
                              }
                    ?>