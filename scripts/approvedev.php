 					<?php
                    
                          $dev_id=$_GET['dev_id'];
                          
                          include '../config/db_connection.php';

                              $sql = "UPDATE developer SET status='approved' WHERE dev_id='$dev_id'";

                              if ($conn->query($sql) === TRUE) {
                                 header("Location:../admin/dashboard.php");

                              } else { 

                                
                              }

                              $sql = "INSERT INTO dev_rate (dev_id) VALUES ('$dev_id')";

      				                if ($conn->query($sql) === TRUE) {
      				                    
      				                } else {
      				                    
      				                }

                              $sql = "INSERT INTO dev_skill (dev_id) VALUES ('$dev_id')";

                              if ($conn->query($sql) === TRUE) {
                                  
                              } else {
                                  
                              }

                    ?>