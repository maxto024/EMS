<?php
 
  $thingOne = 1;
  $thingTwo = 1;
  $thingThree = 4;
  // Open a connection.
  if(!$conn = @oci_connect("project","test","localhost/xe"))
  {
    die;
  }
  else
  {
 
       //sql query to calculate total tax that should be given by an employee
        $taxsql="select GENERATEID('$thingThree','$thingOne','$thingTwo') from dual";
          
        $rstax=oci_parse($conn,$taxsql);
        //echo $rs;
        $rtax=oci_execute($rstax);
        while ($row = oci_fetch_array($rstax, OCI_ASSOC+OCI_RETURN_NULLS)) {  
          foreach ($row as $item) {
            //echo ' '.$item.' ' ;
            //$tax=$item;
            echo $item;
          }
        }
 
    // Clean up resources.
    oci_close($conn);
  }
?>