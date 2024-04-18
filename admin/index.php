<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SUN RISE ADMIN</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">


      <div id="login">

        <form method="post">

        <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input type="text" name="user" placeholder="Username" required></p>
            <p><span class="fontawesome-lock"></span><input type="password" name="pass" placeholder="Password" required></p>
            <p><input type="submit" name="sub" value="Login"></p>
        </fieldset>


        </form>

       
      </div> <!-- end login -->

    </div>
    <div class="bottom">  <h3><a href="../index.php">SUN RISE HOMEPAGE</a></h3></div>
  
  
</body>
</html>

<?php
   include('db.php');
  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['user']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
      $sql = "SELECT id FROM login WHERE usname = 'Admin' and pass = '1234'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location:  C:\php-db\htdocs\DEC_WEB\Hotel\admin\home.php");
         exit();
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>
