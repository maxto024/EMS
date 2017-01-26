<html>
<head>
   
</head>
<body>
  <?php
		$day=date("j");
		$month=date("m");
	    $year=date("y");
	//this code store the day,month,year variable in timestamp
	$currentTimeStamp=strtotime("$year-$month-$day");
	
	//get current month name
	$monthName=date("F",$currentTimeStamp);
	
	//get how may day are there in current month
	$numDays=date("t",$currentTimeStamp);
	
	//we need to set a variable to count cell in the loop later
	$counter=0;
  ?>
  <table border="1" cellspacing="0" width="100%" height="45%" style="font-weight:bold;">
   <tr>
      <td align="center" colspan="7" style='background-color:#FDF; color:rgb(128,0,0);'> <?php echo $monthName;?> </td>
   </tr>
    <tr>
      <td width="32px" style='background-color:#FDF; color:rgb(128,0,0);'> sun</td>
	  <td  width="32px" style='background-color:#FDF; color:rgb(128,0,0);'> mon </td>
	  <td  width="32px" style='background-color:#FDF; color:rgb(128,0,0);'> tue</td>
	  <td  width="32px" style='background-color:#FDF; color:rgb(128,0,0);'> wed</td>
	  <td  width="32px" style='background-color:#FDF; color:rgb(128,0,0);'> thu</td>
	  <td  width="32px" style='background-color:#FDF; color:rgb(128,0,0);'> fri</td>
	  <td  width="32px" style='background-color:#FDF; color:rgb(128,0,0);'> sat</td>
   </tr>
   <?php
      echo " <tr>";
	  $counter=0;
	    for($i=1;$i<$numDays+1;$i++,$counter++){
		   //make timestamp for each day in the loop
		   $timeStamp=strtotime("$year-$month-$i");
		   //make check if it is day 1
		   if($i==1){
		      $firstDay=date("w",$timeStamp);
			  for($j=0;$j<$firstDay;$j++,$counter++){
			    //blank space
				echo"<td>&nbsp;</td>";
			  }
		   }
		   //make a check if the day is on the last column
		   if($counter%7==0){
		       echo "<tr ></tr>";
		   }
		   if($i==$day){
		       echo'<td align="center" style="background-color:rgb(128,0,0);color:#FDF;">'.$i.'</td>';
		   }
		   else{
			echo"<td align='center' style='background-color:#FDF; color:rgb(128,0,0);'>".$i."</td>";
		   }
		}
	  echo "</tr>";
   ?>
  </table>
</body>
</html>