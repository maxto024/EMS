<?php
session_start();
 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
 
 <script>
 $(document).ready(function() {
            $("#myform").validationEngine()
                    
        });
 </script>
 
<title>Online Examination</title>
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

        <img src="admin.jpg " align="middle" width="250px" height="200px"/>
        
        
        </div>
    </div>
    
    <div class="center_contain">
    <div class="profile"><h3>Add a New Employee  </h3> 
   

  <form name="myform" id="myform" method="post" action="emp_action.php" onSubmit="myformcheck();">
  <div class ="mylabel"><label>Employee Name  </label></div> <input name="ins_name" id="ins_name" type="text" class="validate[required,length[1,50],custom[onlyLetter]] text-input">
  <br>
  <br>
  <div class ="mylabel"><label>Designation  </label></div> <select name="designation">
   <option value="1">Lecturer</option>
   <option value="2">Assistant Professor</option>
   <option value="3">Professor</option>
   <option value="4">Assistant Programmer</option>
   <option value="5">Assistant Network Eng</option>
   <option value="6">Head</option>
  </select>
  <div class ="mylabel"><label>Dept id  </label></div> <select name="dept_id">
    <option value="cse">CSE
    </option>
    <option value="eee">EEE
    </option>
   <option value="mce">MCE
   </option>
    <option value="cee">CEE
   </option>
   <option value="tve">TVE
    </option>
</select>
  <br>
  <br>

  <div class ="mylabel"><label>Salary Scale</label></div> 
  <select name="scale">
   <option value="1">scale 1</option>
   <option value="2">scale 2</option>
   <option value="3">scale 3</option>
   <option value="4">scale 4</option>
  </select>
  <br><br>
  <div class ="mylabel"><label>Type</label></div> 
  <select name="type">
   <option value="1">AC</option>
   <option value="2">AD</option>
  </select>
  <br><br>
  <div class ="mylabel"><label>Joing date</label></div>
  <input type="date" name="date" value="Joing date">
  
  <input type="submit" name="submit" value="submit" class ="mybutton">
  
  </form>
 
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