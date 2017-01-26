<?php
session_start();
//echo "something";

// If the submit button has been pressed...
if (isset($_POST['set_scale']))
{
// Connect to the database
    $conn = @oci_connect('project', 'test', '//localhost/xe')
        or die("Could not connect to Oracle server");
// Retrieve the posted  information.
    $scale = $_POST['scale'];
    $amount = $_POST['amount'];
    $housing = $_POST['housing'];
    $transport = $_POST['transport'];

    //checking data
    echo $scale;
    echo "<br>";
    echo $amount;
    echo "<br>";
    echo $housing;
    echo "<br>";
    echo $transport;
    echo "<br>";

  
// Insert the location information into the LOCATIONS table
    $sql = oci_parse($conn, "insert into SCALES
values ('$scale','$amount','$housing','$transport')");
    $result = oci_execute($sql);
// Display an appropriate message on either success or failure
    if ($result)
    {
        echo "<p>Scale successfully inserted!</p>";
        oci_commit($conn);
    }
    else
    {
        echo "<p>There was a problem inserting the Scale!</p>";
        var_dump(oci_error($sql));
    }
    oci_close($conn);
}
// Include the insertion form
//include "form.html";
?>