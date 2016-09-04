<?php

session_start();

        include '../config/db_connection.php';

        $varname=$_GET['portfilo_id'];


        $user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $dev_id='';

        $sql = "SELECT * FROM developer WHERE user_id='$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $dev_id=$row["dev_id"];
                
            }
        } else {
           echo "register or sign in first";
           header("Location:../welcome.php");
        }




            $project_name= isset($_POST['project_name']) ? $_POST['project_name'] : '';
            $project_description= isset($_POST['project_description']) ? $_POST['project_description'] : '';
            
            
          

            if(!empty($_POST['project_name']) && !empty($_POST['project_description']) ){
                

                include '../config/db_connection.php';

                $sql = "UPDATE dev_portfilo SET project_name='$project_name',description='$project_description' WHERE portfilo_id='$varname'";
                    

                if ($conn->query($sql) === TRUE) {
                    echo "register or sign in first";
                    header("Location:mydetails.php?detail_dev_id=$dev_id");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
      

?>