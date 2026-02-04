<?php
$dt=new DateTime("now",new DateTimeZone(date_default_timezone_get()));
$DateTime=$dt->format("Y-m-dH:i:s");
echo $DateTime;
echo"<br>";
echo"<br>";
$DtOnly1=date("Y-m-d");
echo $DtOnly1;
echo"<br>";
$DtOnly1=date("Y-m-d");
echo $DtOnly1;
echo"<br>";
$DtOnly2=(new DateTime())->format("Y-m-d");
echo $DtOnly2;
echo"<br>";
echo"<br>";
$TimeOnly1=date("H:i:s");
echo $TimeOnly1;
echo"<br>";
$TimeOnly2=(new DateTime())->format("H:i:s");
echo $TimeOnly2;
?>

