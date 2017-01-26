<?php
 
  $thingOne = 1;
  $thingTwo = 0;
 
  // Open a connection.
  if(!$c = @oci_connect("project","test","localhost/xe"))
  {
    die;
  }
  else
  {
 
    // Parse a statement.  
    $s = oci_parse($c,"BEGIN
                         :returnValue := LIKE_BOOLEAN(:thingOne,:thingTwo);
                       END;");
 
    // Bind input and output values to the statement.
    oci_bind_by_name($s,":returnValue",$returnValue);
    oci_bind_by_name($s,":thingOne",$thingOne);
    oci_bind_by_name($s,":thingTwo",$thingTwo);
 
    // Execute the statement.
    if (@oci_execute($s))
    {
      // Print lead in string.
      print "[".$thingOne."] and [".$thingTwo."] ";  
      if ($returnValue)
        print "are equal.<br />";
      else
        print "aren't equal.<br />";
    echo $returnValue;
    }
 
    // Clean up resources.
    oci_close($c);
  }
?>