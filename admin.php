<?php
$targetpage = "admin.php";   //your file name  (the name of this file)
    if(isset($_GET['page']))   {                             //how many items to show per page
    $page = $_GET['page'];
    echo $page;
     $conn = @oci_connect('project', 'test', '//localhost/xe')
        or die("Could not connect to Oracle server");
        /* The call */
$sql = "CALL make_transaction(:parameter)";

/* Parse connection and sql */
$foo = oci_parse($conn, $sql);

/* Binding Parameters */
oci_bind_by_name($foo, ':parameter', $page) ;

/* Execute */
$res = oci_execute($foo);

/* Get the output on the screen */
print_r($res, true);
oci_free_statement($foo);
oci_close($conn);
}
if(isset($_GET['page2']))   {                             //how many items to show per page
    $page2 = $_GET['page2'];
    //echo $page;
     $conn = @oci_connect('project', 'test', '//localhost/xe')
        or die("Could not connect to Oracle server");
        /* The call */
$sql = "CALL check_for_transaction(:parameter)";

/* Parse connection and sql */
$foo = oci_parse($conn, $sql);

/* Binding Parameters */
oci_bind_by_name($foo, ':parameter', $page2) ;

/* Execute */
$res = oci_execute($foo);

/* Get the output on the screen */
print_r($res, true);
oci_free_statement($foo);
oci_close($conn);
}
?>
<?php

$conn = oci_connect('project', 'test', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$sql = 'SELECT * FROM transaction';
$stid = oci_parse($conn, $sql);
oci_execute($stid);


// Displays:
//   1000 is Roma
//   1100 is Venice

//oci_free_statement($stid);
//oci_close($conn);


?>
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
		$(".taxe_message").hide();
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

		$(".taxe_setting").click(function(){
			$(".welcome_message").hide("slow");
		   $(".transaction_message").hide("slow");
		   $(".scale_setting").hide("slow"); 
		   $("#show_transaction").hide("slow");
		    $(".taxe_message").slideDown(1000);
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
								   <a href="#">set scale </a>
								</li>
								
								<li class="transaction">
	
								   <a href="admin.php?page=1">Make Transaction </a>
								</li>
								<li class="show">
								
								   <a href="#">Show Transaction </a>
								</li>
								<li class="taxe_setting">
								   <a href="admin.php?page2=2">Taxe</a>
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
    
       <div align="center" style="margin-top:37px; ">
	       <fieldset class="welcome_message" width="500px"  style="background-color:rgb(222,2184,135); height:178px;border-radius:5px;">
	           <legend style="font-weight:bold;  font-size:20px;"> welcom sir
	           </legend>
			   <p style="font-weight:bold; line-height:30px; font-size:20px;">this is a human resouce manager that will help perform multiple task such as
			   diffent employees of your Organization (register them) , pay their monthly salary , and evaluate their taxes 
			   based on the Total yearly income easy to use apps</p>
		   </fieldset>
		   <fieldset class="transaction_message" width="500px"  style="background-color:rgb(222,2184,135); height:178px;border-radius:5px;">
	           <legend style="font-weight:bold;  font-size:20px;"> welcom sir
	           </legend>
			   <p style="font-weight:bold; line-height:30px; font-size:20px;">the monthly payment of the employees was succesfully completed</p>
		   </fieldset>
		   <fieldset class="taxe_message" width="500px"  style="background-color:rgb(222,2184,135); height:178px;border-radius:5px;">
	           <legend style="font-weight:bold;  font-size:20px;"> welcom sir
	           </legend>
			   <p style="font-weight:bold; line-height:30px; font-size:20px;">the taxe operation was succesful completed
	   </div>
	   <div  style="margin-top:37px; ">
		   <fieldset class="scale_setting" width="500px"  style="background-color:rgb(222,2184,135); height:178px;border-radius:5px;">
	           <legend style="font-weight:bold;  font-size:20px;">Employee Scales Setting
	           </legend>
			   <form action="scale_action.php" method="post">
			    <div style="margin-left:10px; margin-top:40px;">
				    <p name="salary"><b>Scales</b></p>
					<select name="scale">
					   <option value=1>SC1
					   </option>
					   <option value=2>SC2
					   </option>
					   <option value=3>SC3
					   </option>
					   <option value=4>SC4
					   </option>
					</select>
			    </div>
			    <div style="margin-left:75px; margin-top:-70px;">
				    <p name="salary"><b>Basic salary</b></p>
					<input type="text" name="amount" required/>
			    </div>
			    <div style="margin-left:262px; margin-top:-70px;">
				    <p name="housing"><b>Housing</b></p> 
					<input type="text" name="housing" required/>
				</div>
                <div style="margin-left:448px; margin-top:-70px;">	
                    <p name="transport"><b>Transport</b></p>				
					<input type="text" name="transport" required/>
			    </div>
				<div>
				   <input type="submit" name="set_scale" value="save" style="margin-left:575px; font-weight:bold;color:rgb(128,0,0); margin-top:40px;">
				</div>
				</form>
		   </fieldset>
		   </div>


		   <div align="center" id="show_transaction" style="margin-top:0px; ">
<table width="550" border="1" height="auto" align="center" style="text-align:center;">
    
                <th>Transaction Id</th>
                <th>Date</th>
                <th>Employee</th>
                <th>Salary</th>  
                               
<?php
while (oci_fetch($stid)) {
	?>
	 <tr>  
	 <td>
      <?php echo oci_result($stid, 'TID'); ?>
	 </td> 
	 <td>
      <?php echo oci_result($stid, 'TRANS_DATE'); ?>
	 </td> 
	 <td>
      <?php echo oci_result($stid, 'EMP_ID'); ?>
	 </td> 
	 <td>
      <?php echo oci_result($stid, 'SALARY'); ?>
	 </td>            
       </tr>
       <?php
}
oci_free_statement($stid);
oci_close($conn);
?>
</table>

	      
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
