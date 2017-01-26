
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="beaverslider.js"></script>         <!-- link to a framework -->
    <script src="beaverslider-effects.js"></script> <!-- link to a set of effects -->
  <script src="jquery-1.11.0-beta3.min.js"></script>

  <script>
    $(document).ready(function(){
    $("#show_transaction").hide();   
    $(".transaction_message").hide();
    $(".scale_setting").hide();

    $(".profile").animate({height:"340px"},1000);
    $(".profile").animate({width:"600px"},1000);
    $(".transaction").click(function(){
         $(".welcome_message").hide("slow");
       $(".scale_setting").hide("slow");
       $("#show_transaction").hide("slow");
        $(".transaction_message").slideDown(1000);
        
      
    });
    $(".setscale").click(function(){
       $(".welcome_message").hide("slow");
       $(".transaction_message").hide("slow");
       $("#show_transaction").hide("slow");
       $(".scale_setting").slideDown(1000);

    });
    $(".show").click(function(){
      $(".welcome_message").hide("slow");
       $(".transaction_message").hide("slow");
       $(".scale_setting").hide("slow"); 
       $("#show_transaction").slideDown(1000);
             
    });
    
  });
    
    </script>
    
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" /> 
<title>admin activity</title>
</head>

<body>
<div class="container">

    <div class="banner">
	    <div class="banner_text_icon">
           <h1>HRM</h1>
        </div>
        <div class="banner_text">
        <h1>Human Resource Manager</h1>
        </div>
		<div class="top_memu">
		     <div class="listitem_div" style="line-height:1.5em;" >
						    <ul class="menu">
                  
                  <li class="home">
                   
                   <a href="registration.php">registration</a>
                   
                </li>
                
                <li class="setscale">
                   <a href="admin.php">set scale </a>
                </li>
                
                <li class="transaction">
  
                   <a href="admin.php">Make Transaction </a>
                </li>
                <li class="show">
                
                   <a href="admin.php">Show Transaction </a>
                </li>
                <li class="taxe_setting">
                   <a href="admin.php">Taxe</a>
                </li>
                <li class="logout">
                   <a href="logout_action.php">Log Out</a>
                </li>
              </ul>
			 </div>
		</div>
    </div>
    
    <div class="right_menu">
        <div class="login">
        
        <div class="calender"> 
		    <?php include("calender.php");?>
		</div>
        </div>
    </div>
    
    <div class="center_contain" style="background-color:white;">
    
			   <div class="profile" style="width:30px;height:10px;"><h3>Add a New Employee  </h3> 
   

  <form name="myform" id="myform" method="post" action="emp_action.php" onSubmit="myformcheck();">
  <label style="color:00F;font-family:Arial;padding-right:5px;">Employee Name  </label> <input name="emp_name" id="emp_name" type="text" required>
  <br>
  <br>
  <label style="color:00F;font-family:Arial; padding-right:40px;">Designation  </label> <select name="designation">
   <option value="1">Lecturer</option>
   <option value="2">Assistant Professor</option>
   <option value="3">Professor</option>
   <option value="4">Assistant Programmer</option>
   <option value="5">Assistant Network Eng</option>
   <option value="6">Head</option>
  </select>
  <br>
  <br>
  <label style="color:00F;font-family:Arial; padding-right:75px;">Dept id  </label> <select name="dept_id">
    <option value="4">CSE
    </option>
    <option value="2">EEE
    </option>
   <option value="1">MCE
   </option>
    <option value="5">CEE
   </option>
   <option value="3">TVE
    </option>
</select>
  <br>
  <br>

  <label style="color:00F;font-family:Arial; padding-right:35px;">Salary Scale</label> 
  <select name="scale">
   <option value="1">scale 1</option>
   <option value="2">scale 2</option>
   <option value="3">scale 3</option>
   <option value="4">scale 4</option>
  </select>
  <br><br>
  <label style="color:00F;font-family:Arial; padding-right:90px;">Type</label> 
  <select name="type">
   <option value="1">AC</option>
   <option value="2">AD</option>
  </select>
  <br><br>
  <label style="color:00F;font-family:Arial; padding-right:50px;">Joing date</label>
  <input type="date" name="date">
  <br><br>
  <input type="submit" name="submit" value="submit" class ="mybutton">
  
  </form>
 
  </div>

    </div>
    
    <div class="footer">
            <p class="footer_text">
				   (c) 2015  developed by SOUALIHOU & ALAMINE "The Camer Boys" .
		    </p> 
        </div>
    
</div>    
</body>
</html>