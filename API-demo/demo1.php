<?php
// A sample calculator API

// now chech whether the parameter have value or not
if (!empty($_GET["opr"]) && !empty($_GET["var2"]) && !empty($_GET["var1"]))
{
    // now that all parameters have value, do the operation

    $opr = $_GET["opr"];
    $var1 = $_GET["var1"];
    $var2 = $_GET["var2"];
    $result = 0;

    switch ( $opr )
    {
        case "add":
            $result = $var1 + $var2;
        break;

        // rest cases goes here 
    }

    echo $result;
}
else
{
    // if any of the parameter is empty, through an error
    echo "ERROR! Some of the values are empty";
}

?>
