
<!DOCTYPE html>
<html>

<head>
<title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mirror Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<link href="css/styleadmin.css" rel="stylesheet" type="text/css" media="all" />


      <?php

       session_start();

       if(isset($_SESSION['admin_id'])){
           header("Location:dashboard.php");
       }

       $admin_name= isset($_POST['username']) ? $_POST['username'] : '';
       $admin_password= isset($_POST['password']) ? $_POST['password'] : '';
       $h_password=hash('ripemd160',$admin_password);

       if(!empty($_POST['username']) && !empty($_POST['password'])){
           echo "All data entered<br/>";

           include '../config/db_connection.php';

           $sql = "SELECT * FROM admin WHERE admin_name='$admin_name'AND admin_password='$h_password'";
           $result = $conn->query($sql);

           if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                  
                   $_SESSION['admin_id']=$row['admin_id'];
                   header("Location:dashboard.php");

               }
           } else {
               echo "0 results";
           }

           die();

       }

       ?>
      
   </head>
  
   <body>

  <div class="header">
    <h1>ADMIN SIGN IN</h1>
  </div>

    <div class="design-w3l">
    <div class="mail-form-agile">
      <form action="#" method="post">
        <input type="text" name="username" placeholder="Enter your name...." required=""/>
        <input type="password"  name="password" class="padding" placeholder="Password" required=""/>
        <input type="submit" value="Sign In">
      </form>
    </div>
    </div>
  
  <div class="footer-w3agile">
  <p>© Kasun Apps  <a href="https://w3layouts.com/" target="_blank"> </a></p>
  </div>

</body>
</html>