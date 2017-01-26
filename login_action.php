<?php session_start();
ob_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" /> 
<title>Online Examination</title>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
 
 
 <script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
 
 <script>
 $(document).ready(function() {
			$("#mysignup").validationEngine()
					
		});
 </script>
</head>

<body>
<div class="container">

    <div class="banner">
        <div class="banner_text">
        <h1> Welcome To RPS </h1>
        </div>
    </div>
    
    <div class="right_menu">
        <div class="login">
  
     
        </div>
    </div>
    
    <div class="center_contain">
    <div class="profile"><h3>New User Signup  </h3>

  <?php
  $_SESSION["user_name"]=$_POST["user_name"];
  $_SESSION["password"]=$_POST["password"];
  $pass=123;
  if($_SESSION["password"]==$pass){
   header("location:admin.php");
 }else{
  header("location:index.php");
 }

  ?>
  </div>
    </div>
    
    <div class="footer">
            <p>
				© Alamine 124312, All right reserved.
			</p> 
    </div>
    
</div>    
</body>
</html>