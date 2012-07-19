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

if ($predictions17[0][1] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid1 = $predictions17[0][1];
	     	
}

else {
$prediction17_valid1 = "0";
}

if ($predictions17[0][2] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid2 = $predictions17[0][2];
}

else {
$prediction17_valid2 = "0";
}

if ($predictions17[0][3] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid3 = $predictions17[0][3];
}

else {
$prediction17_valid3 = "0";
}

if ($predictions17[0][4] > $arrivalatBusStopForBus17Epoch)
{
	     	$prediction17_valid4 = $predictions17[0][4];

}

else {
$prediction17_valid4 = "0";
}


// BUS 153

if ($predictions153[0][1] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid1 = $predictions153[0][1];

}
else {
$prediction153_valid1 = "0";

}

if ($predictions153[0][2] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid2 = $predictions153[0][2];

}
else {
$prediction153_valid2 = "0";

}

if ($predictions153[0][3] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid3 = $predictions153[0][3];

}
else {
$prediction153_valid3 = "0";

}

if ($predictions153[0][4] > $arrivalatBusStopForBus153Epoch)
{
	     	$prediction153_valid4 = $predictions153[0][4];

}
else {
$prediction153_valid4 = "0";

}

//******************************************************************************
// checking Earliest Arrival Time
//******************************************************************************

// BUS 17

if (!($prediction17_valid1=="0"))
{
	     	$bus17EarliestArrivalTime = $prediction17_valid1;

}
elseif (!($prediction17_valid2=="0")){
			$bus17EarliestArrivalTime = $prediction17_valid2;

}

elseif (!($prediction17_valid3=="0")){
			$bus17EarliestArrivalTime = $prediction17_valid3;

}
else {
			$bus17EarliestArrivalTime = $prediction17_valid4;

}

// BUS 153

if (!($prediction153_valid1=="0"))
{
	     	$bus153EarliestArrivalTime = $prediction153_valid1;

}
elseif (!($prediction153_valid2=="0")){
			$bus153EarliestArrivalTime = $prediction153_valid2;

}

elseif (!($prediction153_valid3=="0")){
			$bus153EarliestArrivalTime = $prediction153_valid3;

}
else {
			$bus153EarliestArrivalTime = $prediction153_valid4;

}

//******************************************************************************
// defining Office Arrival Time
//******************************************************************************

$bus17OfficeArrivalTime = $bus17EarliestArrivalTime+$bus17Route+$walkDistanceBus17;
$bus153OfficeArrivalTime = $bus153EarliestArrivalTime+$bus153Route+$walkDistanceBus153;

//******************************************************************************
// defining Better Option
//******************************************************************************

// Which Bus?

if ($bus17OfficeArrivalTime > $bus153OfficeArrivalTime)
{
	     	$bestChoice = "Bus 153";
	     	$officeArrivalTime = date("H:i:s", $bus153OfficeArrivalTime);
}
else {
			$bestChoice = "Bus 17";
			$officeArrivalTime = date("H:i:s", $bus17OfficeArrivalTime);
}

// When?

if ($bestChoice == "Bus 17")
{
	     	$nextBusWhen = $bus17EarliestArrivalTime-$currentDateEpoch;
	     	$nextBusWhenMin = $nextBusWhen/60;
	     	settype($nextBusWhenMin, "integer");
}
else {
	     	$nextBusWhen = $bus153EarliestArrivalTime-$currentDateEpoch;
	     	$nextBusWhenMin = $nextBusWhen/60;
	     	settype($nextBusWhenMin, "integer");
}

// Where?

if ($bestChoice == "Bus 17")
{
	     	$walkTime = $walkTimeBus17/60;
}
else {
$walkTime = $walkTimeBus153/60;
}

// Wait?
$waitTime = $nextBusWhenMin-$walkTime;

?>

<!DOCTYPE html>
<html>
<head>
<title>A Transport script</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="writtencontent">

<h1>Now is <?php echo date("H:i:s"); ?></h1>
<h1>The Best Choice is <?php echo $bestChoice; ?></h1>
<h1>The Next Bus will arrive in <?php echo $nextBusWhenMin; ?> minutes</h1> 
<h1>You usually take <?php echo $walkTime; ?> minutes to arrive in the bus stop, so you will have to wait <?php echo $waitTime; ?>  minutes for the bus</h1>
<h1>You should arrive in the office at  <?php echo $officeArrivalTime; ?></h1>

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

<!--

-->

</div>
</body>
</html>