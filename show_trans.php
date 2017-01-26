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

		$(".transaction_message").hide();
		$(".scale_setting").hide();
		$(".transaction").click(function(){
		     $(".welcome_message").hide("slow");
			 $(".scale_setting").hide("slow");
			  $(".transaction_message").slideDown(1000);
			  
			
		});
		$(".setscale").click(function(){
		   $(".welcome_message").hide("slow");
		   $(".transaction_message").hide("slow");
		   $(".scale_setting").slideDown(1000);
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
	
								   <a href="admin.php?page=1">Make Transaction </a>
								</li>
								<li class="transaction">
								
								   <a href="show_trans.php">Show Transaction </a>
								</li>
								<li class="taxe_setting">
								   <a href="#">Taxe</a>
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
    
       <div align="center" style="margin-top:0px; ">
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
