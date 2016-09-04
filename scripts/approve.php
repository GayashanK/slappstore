                    <?php
                    
                          $app_id=$_GET['app_id'];
                          
                          include '../config/db_connection.php';

                              $sql = "UPDATE application SET status='approved' WHERE app_id='$app_id'";

                              if ($conn->query($sql) === TRUE) {
                                 header("Location:../admin/dashboard.php");

                              } else { 

                                
                              }



			                $sql = "INSERT INTO app_rate (app_id) VALUES ('$app_id')";

			                if ($conn->query($sql) === TRUE) {
			                    
			                } else {
			                    
			                }

  
                    ?>