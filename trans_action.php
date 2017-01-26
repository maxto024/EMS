<?php
session_start();
//echo "something";

// If the submit button has been pressed...
if (isset($_POST['submit']))
{
// Connect to the database
    $conn = @oci_connect('project', 'test', '//localhost/xe')
        or die("Could not connect to Oracle server");
// Retrieve the posted  information.
    $emp_name = $_POST['emp_name'];
    $designation = $_POST['designation'];
    $dept_id = $_POST['dept_id'];
    $scale = $_POST['scale'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $salary=0;
    $taxe=0;
    
   
   //GET THE DATE FORMAT
      $datesql="select DATEFORMAT('$date') from dual";
          
        $rsdate=oci_parse($conn,$datesql);
        //echo $rs;
        $execdate=oci_execute($rsdate);
        while ($row = oci_fetch_array($rsdate, OCI_ASSOC+OCI_RETURN_NULLS)) {  
          foreach ($row as $item) {
            //echo $item;
            $newdate=$item;
          }
        }
     //GET THE EMPLOYEE ID
             $idsql="select GENERATEID('$dept_id','$designation','$type') from dual";
          
        $rsid=oci_parse($conn,$idsql);
        //echo $rs;
        $execid=oci_execute($rsid);
        while ($row = oci_fetch_array($rsid, OCI_ASSOC+OCI_RETURN_NULLS)) {  
          foreach ($row as $empid) {
            //echo $empid;
            $newid=$empid;
          }
        }


// Insert the location information into the LOCATIONS table
    $sql = oci_parse($conn, "insert into TABLE_TEST
values ('$newid','$emp_name','$designation','$scale','$type','$newdate','$dept_id','$salary','$taxe')");
    $result = oci_execute($sql);
// Display an appropriate message on either success or failure
    if ($result)
    {
        echo "<p>Employee successfully inserted!</p>";
        oci_commit($conn);
    }
    else
    {
        echo "<p>There was a problem inserting the Employee!</p>";
        var_dump(oci_error($sql));
    }
    oci_close($conn);
}
// Include the insertion form
//include "form.html";
?>