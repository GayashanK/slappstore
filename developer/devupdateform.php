<?php
		$varname=$_GET['dev_id'];

        $dev_name= isset($_POST['dev_name']) ? $_POST['dev_name'] :'';
        $dev_description= isset($_POST['dev_description']) ? $_POST['dev_description'] :'';
        $dev_fb_url= isset($_POST['dev_fb_url']) ? $_POST['dev_fb_url'] :'';
        $dev_go_url= isset($_POST['dev_go_url']) ? $_POST['dev_go_url'] :'';
        $dev_in_url= isset($_POST['dev_in_url']) ? $_POST['dev_in_url'] :'';
        $mobile= isset($_POST['mobile']) ? $_POST['mobile'] :'';





        

            include '../config/db_connection.php';

            $sql = "UPDATE developer SET dev_name='$dev_name',dev_description='$dev_description' WHERE dev_id='$varname'";

            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

          
            $sql = "UPDATE dev_contact SET dev_fb_url='$dev_fb_url',dev_go_url='$dev_go_url',dev_lin_url='$dev_in_url',mobile='$mobile' WHERE dev_id='$varname'";


            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            echo "register or sign in first";
        	header("Location:mydetails.php?detail_dev_id=$varname");


?>