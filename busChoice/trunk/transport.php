<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
date_default_timezone_set('Europe/London');
unset($GLOBALS);  

//******************************************************************************
// defining variables
//******************************************************************************

$currentDateEpoch = time();
$currentDateEpochms = $currentDateEpoch;

$walkTimeBus17 = 420; // 7 minutes in epoch (7*60)
$bus17Route = 1200; // 20 minutes in epoch (20*60)
$walkDistanceBus17 = 600; // 10 minutes in epoch (15*60)

$walkTimeBus153 = 900; // 15 minutes in epoch (15*60)
$bus153Route = 900; // 15 minutes in epoch (15*60)
$walkDistanceBus153 = 600; // 10 minutes in epoch (15*60)

//******************************************************************************
// defining Bus Stop Arrival Time
//******************************************************************************

$arrivalatBusStopForBus17Epoch = $currentDateEpochms+$walkTimeBus17;
$arrivalatBusStopForBus153Epoch = $currentDateEpochms+$walkTimeBus153;

//******************************************************************************
// retrieving Bus Arrival Time
//******************************************************************************

// BUS 17

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  
 )
);

$context = stream_context_create($opts);

$api17 = file_get_contents('http://countdown.api.tfl.gov.uk/interfaces/ura/instant_V1?StopCode1=71556&LineID=17&DirectionID=1&VisitNumber=1&ReturnList=EstimatedTime', false, $context);
//$api17 = file_get_contents('/Users/danielgomes/Development/phpdev/busChoice/data.txt', false, $context);

preg_match_all('@\d\d\d\d\d\d\d\d\d\d\d\d\d@', $api17, $predictions17, PREG_PATTERN_ORDER);

// print_r($predictions17[0]);

// BUS 153

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  
 )
);

$context = stream_context_create($opts);

$api153 = file_get_contents('http://countdown.api.tfl.gov.uk/interfaces/ura/instant_V1?StopCode1=71556&LineID=17&DirectionID=1&VisitNumber=1&ReturnList=EstimatedTime', false, $context);
//$api153 = file_get_contents('/Users/danielgomes/Development/phpdev/busChoice/data2.txt', false, $context);

preg_match_all('@\d\d\d\d\d\d\d\d\d\d\d\d\d@', $api153, $predictions153, PREG_PATTERN_ORDER);

//******************************************************************************
// converting from ms
//******************************************************************************

$predictions17[0][1] = $predictions17[0][1] / 1000;
$predictions17[0][2] = $predictions17[0][2] / 1000;
$predictions17[0][3] = $predictions17[0][3] / 1000;
$predictions17[0][4] = $predictions17[0][4] / 1000;

$predictions153[0][1] = $predictions153[0][1] / 1000;
$predictions153[0][2] = $predictions153[0][2] / 1000;
$predictions153[0][3] = $predictions153[0][3] / 1000;
$predictions153[0][4] = $predictions153[0][4] / 1000;

//******************************************************************************
// getting only Arrival Times bigger than current time + walktime
//******************************************************************************

// BUS 17

//echo "first prediction ".$predictions17[0][1]."<br>";
//echo "arrival bus stop ".$arrivalatBusStopForBus17Epoch."<br>";

if ($predictions17[0][1] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid1 = $predictions17[0][1];
	     	//echo $prediction17_valid1." is a valid prediction"."<br>";
}
else {
$prediction17_valid1 = "0";
//echo " the first is an invalid prediction"."<br>";
}

if ($predictions17[0][2] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid2 = $predictions17[0][2];
	     	//echo $prediction17_valid2." is a valid prediction"."<br>";
}
else {
$prediction17_valid2 = "0";
//echo $prediction17_valid2." the second is an invalid prediction"."<br>";
}

if ($predictions17[0][3] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid3 = $predictions17[0][3];
	     	//echo $prediction17_valid2." is a valid prediction"."<br>";
}
else {
$prediction17_valid3 = "0";
//echo $prediction17_valid2." the second is an invalid prediction"."<br>";
}

if ($predictions17[0][4] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid4 = $predictions17[0][4];
	     	//echo $prediction17_valid2." is a valid prediction"."<br>";
}
else {
$prediction17_valid4 = "0";
//echo $prediction17_valid2." the second is an invalid prediction"."<br>";
}


// BUS 153

//echo "first prediction153 ".$predictions153[0][1]."<br>";
//echo "arrival bus stop153 ".$arrivalatBusStopForBus153Epoch."<br>";

if ($predictions153[0][1] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid1 = $predictions153[0][1];
	     	//echo $prediction153_valid1."valid prediction";
}
else {
$prediction153_valid1 = "0";
//echo "invalid prediction";
}

if ($predictions153[0][2] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid2 = $predictions153[0][2];
	     	//echo $prediction153_valid2."valid prediction";
}
else {
$prediction153_valid2 = "0";
//echo $prediction153_valid2."invalid prediction";
}

if ($predictions153[0][3] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid3 = $predictions153[0][3];
	     	//echo $prediction153_valid2."valid prediction";
}
else {
$prediction153_valid3 = "0";
//echo $prediction153_valid2."invalid prediction";
}

if ($predictions153[0][4] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid4 = $predictions153[0][4];
	     	//echo $prediction153_valid2."valid prediction";
}
else {
$prediction153_valid4 = "0";
//echo $prediction153_valid2."invalid prediction";
}

//******************************************************************************
// checking Earliest Arrival Time
//******************************************************************************

// BUS 17

if (!($prediction17_valid1=="0"))
{
	     	$bus17EarliestArrivalTime = $prediction17_valid1;
	     	//echo $prediction17_valid1."first one is the earliest";
}
elseif (!($prediction17_valid2=="0")){
			$bus17EarliestArrivalTime = $prediction17_valid2;
	     	//echo $prediction17_valid2."second one is the earliest";
}

elseif (!($prediction17_valid3=="0")){
			$bus17EarliestArrivalTime = $prediction17_valid3;
	     	//echo $prediction17_valid3."third one is the earliest";
}
else {
			$bus17EarliestArrivalTime = $prediction17_valid4;
	     	//echo $prediction17_valid4."fourth one is the earliest";
}

// BUS 153

if (!($prediction153_valid1=="0"))
{
	     	$bus153EarliestArrivalTime = $prediction153_valid1;
	     	//echo $prediction153_valid1."first one is the earliest";
}
elseif (!($prediction153_valid2=="0")){
			$bus153EarliestArrivalTime = $prediction153_valid2;
	     	//echo $prediction153_valid2."second one is the earliest";
}

elseif (!($prediction153_valid3=="0")){
			$bus153EarliestArrivalTime = $prediction153_valid3;
	     	//echo $prediction153_valid3."third one is the earliest";
}
else {
			$bus153EarliestArrivalTime = $prediction153_valid4;
	     	//echo $prediction153_valid4."fourth one is the earliest";
}

//******************************************************************************
// defining Office Arrival Time
//******************************************************************************

$bus17OfficeArrivalTime = $bus17EarliestArrivalTime+$bus17Route+$walkDistanceBus17;
$bus153OfficeArrivalTime = $bus153EarliestArrivalTime+$bus153Route+$walkDistanceBus153;

//echo "<br>".$arrivalatBusStopForBus17Epoch."+".$bus17EarliestArrivalTime."+".$bus17Route."+".$walkDistanceBus17;
//echo "<br>".$arrivalatBusStopForBus153Epoch."+".$bus153EarliestArrivalTime."+".$bus153Route."+".$walkDistanceBus153;
//echo "<br>".$bus17OfficeArrivalTime."<br>";
//echo "<br>".$bus153OfficeArrivalTime."<br>";

//******************************************************************************
// defining Better Option
//******************************************************************************

if ($bus17OfficeArrivalTime > $bus153OfficeArrivalTime)
{
	     	$bestChoice = "Bus 153";
}
else {
$bestChoice = "Bus 17";
}


?>

<!DOCTYPE html>
<html>
<head>
<title>A Transport script</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="writtencontent">

<h1>Today</h1>
<table border="1">
<tr>
<td>Epoch</td>
<td>Date</td>
</tr>
<tr>
<td><?php echo $currentDateEpochms; ?></td>
<td><?php echo date(DATE_RFC822); ?></td>
</tr>
</table>

<h1>Bus 17 - Average</h1>
<table border="1">
<tr>
<td>Current time</td>
<td>Walk BusStop</td>
<td>Arrival at Bus Stop</td>
<td>Arrival at Bus Stop</td>
<td>Route</td>
<td>Walk Office</td>
<td>Arrival Office</td>
<td>Arrival Office</td>
</tr>
<tr>
<td><?php echo $currentDateEpochms; ?></td>
<td><?php echo $walkTimeBus17; ?></td>
<td><?php echo $arrivalatBusStopForBus17Epoch; ?></td>
<td><?php echo date('r', $arrivalatBusStopForBus17Epoch); ?></td>
<td><?php echo $bus17Route; ?></td>
<td><?php echo $walkDistanceBus17; ?></td>
<td><?php echo $bus17OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus17OfficeArrivalTime); ?></td>
</tr>
</table>

<h1>Bus 153 - Average</h1>
<table border="1">
<tr>
<td>Current time</td>
<td>Walk BusStop</td>
<td>Arrival at Bus Stop</td>
<td>Arrival at Bus Stop</td>
<td>Route</td>
<td>Walk Office</td>
<td>Arrival Office</td>
<td>Arrival Office</td>
</tr>
<tr>
<td><?php echo $currentDateEpochms; ?></td>
<td><?php echo $walkTimeBus153; ?></td>
<td><?php echo $arrivalatBusStopForBus153Epoch; ?></td>
<td><?php echo date('r', $arrivalatBusStopForBus153Epoch); ?></td>
<td><?php echo $bus153Route; ?></td>
<td><?php echo $walkDistanceBus153; ?></td>
<td><?php echo $bus153OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus17OfficeArrivalTime); ?></td>
</tr>
</table>

<h1>TFL</h1>
<table border="1">
<tr>
<td></td>
<td>1st Prediction</td>
<td>Valid</td>
<td>2nd Prediction</td>
<td>Valid</td>
<td>3rd Prediction</td>
<td>Valid</td>
<td>4th Prediction</td>
<td>Valid</td>
</tr>
<tr>
<td>Bus 17</td>
<td><?php echo $predictions17[0][1]; ?></td>
<td><?php echo $prediction17_valid1; ?></td>
<td><?php echo $predictions17[0][2]; ?></td>
<td><?php echo $prediction17_valid2; ?></td>
<td><?php echo $predictions17[0][3]; ?></td>
<td><?php echo $prediction17_valid3; ?></td>
<td><?php echo $predictions17[0][4]; ?></td>
<td><?php echo $prediction17_valid4; ?></td>
</tr>
<tr>
<td>Bus 153</td>
<td><?php echo $predictions153[0][1]; ?></td>
<td><?php echo $prediction153_valid1; ?></td>
<td><?php echo $predictions153[0][2]; ?></td>
<td><?php echo $prediction153_valid2; ?></td>
<td><?php echo $predictions153[0][3]; ?></td>
<td><?php echo $prediction153_valid3; ?></td>
<td><?php echo $predictions153[0][4]; ?></td>
<td><?php echo $prediction153_valid4; ?></td>
</tr>
</table>

<h1>Conclusion</h1>
<table border="1">
<tr>
<td>Bus</td>
<td>ArrivalTime</td>
<td>ArrivalDate</td>
<td>OfficeTime</td>
<td>OfficeDate</td>
</tr>
<tr>
<td>Bus 17</td>
<td><?php echo $bus17EarliestArrivalTime; ?></td>
<td><?php echo date('r', $bus17EarliestArrivalTime); ?></td>
<td><?php echo $bus17OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus17OfficeArrivalTime); ?></td>
</tr>
<tr>
<td>Bus 153</td>
<td><?php echo $bus153EarliestArrivalTime; ?></td>
<td><?php echo date('r', $bus153EarliestArrivalTime); ?></td>
<td><?php echo $bus153OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus153OfficeArrivalTime); ?></td>
</tr>
</table>

<h1>The Best Choice is <?php echo $bestChoice; ?></h1>

<!--

<h1>Now is <?php echo date(DATE_RFC822); ?> in human-readable date format</h1>
<h1>Now is <?php echo $currentDateEpochms; ?> in epoch date format</h1>
<h1><?php echo $predictions17[0][1]; ?></h1>
<h1><?php echo $predictions17[0][2]; ?></h1>
<h1><?php echo $predictions17[0][3]; ?></h1>
<br></br>
<h1>Bus 17</h1>

<ul>
<li><h2>Walking distance to Bus Stop is <?php echo $walkTimeBus17; ?> in epoch date format</h2></li>
<li><h2>Bus Stop arrival time <?php echo $arrivalatBusStopForBus17Epoch; ?> in epoch date format</h2></li>
<li><h2>Bus Stop arrival time <?php echo date('r', $arrivalatBusStopForBus17Epoch); ?> in human-readable date format</h2> </li>
<li><h2>Office arrival time <?php echo date('r', $bus17OfficeArrivalTime); ?> in human-readable date format</h2> </li>
<br></br>
<li><h2>First bus will arrive in <?php echo $result[4]; ?> in epoch date format</h2></li>
<li><h2>First bus will arrive in <?php echo date('r', $result[4]); ?> in human-readable date format</h2></li>

<li><h2>Second bus will arrive in <?php echo $result[6]; ?> in epoch date format</h2></li>
<li><h2>Second bus will arrive in <?php echo date('r', $result[6]); ?> in human-readable date format</h2></li>

<li><h2>Third bus will arrive in <?php echo $result[8]; ?> in epoch date format</h2></li>
<li><h2>Third bus will arrive in <?php echo date('r', $result[8]); ?> in human-readable date format</h2></li>

<li><h2>Fourth bus will arrive in <?php echo $result[10]; ?> in epoch date format</h2></li>
<li><h2>Fourth bus will arrive in <?php echo date('r', $result[10]); ?> in human-readable date format</h2></li>
</ul>	

<h1>Bus 153</h1>

<ul>
<li><h2>Walking distance to Bus Stop is <?php echo $walkTimeBus153; ?> in epoch date format</h2> </li>
<li><h2>Arrival time in the Bus Stop <?php echo $arrivalatBusStopForBus153Epoch; ?> in epoch date format</h2></li>
<li><h2>Bus Stop arrival time <?php echo date('r', $arrivalatBusStopForBus153Epoch); ?> in human-readable date format</h2> </li>
<li><h2>Office arrival time <?php echo date('r', $bus153OfficeArrivalTime); ?> in human-readable date format</h2> </li>
</ul>

-->

</div>
</body>
</html>