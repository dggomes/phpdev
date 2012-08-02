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

$walkTimeBus17 = 240; // 4 minutes in epoch (4*60)
$bus17Route = 1500; // 25 minutes in epoch (20*60)
$walkDistanceBus17 = 420; // 10 minutes in epoch (15*60)

$walkTimeBus153 = 600; // 10 minutes in epoch (15*60)
$bus153Route = 960; // 15 minutes in epoch (15*60)
$walkDistanceBus153 = 480; // 10 minutes in epoch (15*60)

$walkTimeBus91 = 240; // 10 minutes in epoch (15*60)
$bus91Route = 1200; // 15 minutes in epoch (15*60)
$walkDistanceBus91 = 1200; // 10 minutes in epoch (15*60)

$walkDistanceTube1 = 600; // 10 minutes in epoch
$tubeRoute = 1800; // 30 minutes in epoch (30*60)
$walkDistanceTube2 = 600; // 10 minutes in epoch
$tubeTime = $walkDistanceTube1+$tubeRoute+$walkDistanceTube2;

//******************************************************************************
// defining Bus Stop Arrival Time
//******************************************************************************

$arrivalatBusStopForBus17Epoch = $currentDateEpochms+$walkTimeBus17;
$arrivalatBusStopForBus153Epoch = $currentDateEpochms+$walkTimeBus153;
$arrivalatBusStopForBus91Epoch = $currentDateEpochms+$walkTimeBus91;

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

// BUS 91

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  
 )
);

$context = stream_context_create($opts);

$api91 = file_get_contents('http://countdown.api.tfl.gov.uk/interfaces/ura/instant_V1?StopCode1=71556&LineID=91&DirectionID=1&VisitNumber=1&ReturnList=EstimatedTime', false, $context);
//$api91 = file_get_contents('/Users/danielgomes/Development/phpdev/busChoice/data2.txt', false, $context);

preg_match_all('@\d\d\d\d\d\d\d\d\d\d\d\d\d@', $api91, $predictions91, PREG_PATTERN_ORDER);


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

$predictions91[0][1] = $predictions91[0][1] / 1000;
$predictions91[0][2] = $predictions91[0][2] / 1000;
$predictions91[0][3] = $predictions91[0][3] / 1000;
$predictions91[0][4] = $predictions91[0][4] / 1000;

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

// BUS 91

if ($predictions91[0][1] > $arrivalatBusStopForBus91Epoch)
{
	     	$prediction91_valid1 = $predictions91[0][1];

}
else {
$prediction91_valid1 = "0";

}

if ($predictions91[0][2] > $arrivalatBusStopForBus91Epoch)
{
	     	$prediction91_valid2 = $predictions91[0][2];

}
else {
$prediction91_valid2 = "0";

}

if ($predictions91[0][3] > $arrivalatBusStopForBus91Epoch)
{
	     	$prediction91_valid3 = $predictions91[0][3];

}
else {
$prediction91_valid3 = "0";

}

if ($predictions91[0][4] > $arrivalatBusStopForBus91Epoch)
{
	     	$prediction91_valid4 = $predictions91[0][4];

}
else {
$prediction91_valid4 = "0";

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

// BUS 91

if (!($prediction91_valid1=="0"))
{
	     	$bus91EarliestArrivalTime = $prediction91_valid1;

}
elseif (!($prediction91_valid2=="0")){
			$bus91EarliestArrivalTime = $prediction91_valid2;

}

elseif (!($prediction91_valid3=="0")){
			$bus91EarliestArrivalTime = $prediction91_valid3;

}
else {
			$bus91EarliestArrivalTime = $prediction91_valid4;

}

//******************************************************************************
// defining Office Arrival Time
//******************************************************************************

$bus17OfficeArrivalTime = $bus17EarliestArrivalTime+$bus17Route+$walkDistanceBus17;
$bus153OfficeArrivalTime = $bus153EarliestArrivalTime+$bus153Route+$walkDistanceBus153;
$bus91OfficeArrivalTime = $bus91EarliestArrivalTime+$bus91Route+$walkDistanceBus91;
$tubeOfficeArrivalTime = $currentDateEpoch+$walkDistanceTube1+$tubeRoute+$walkDistanceTube2;

//******************************************************************************
// validating Office Arrival Time (to avoid nil)
//******************************************************************************

if ($bus17OfficeArrivalTime < $currentDateEpoch)
{
	     	$bus17OfficeArrivalTime = $bus17OfficeArrivalTime+$currentDateEpoch+$currentDateEpoch;
//	     	echo "Bus17 ".$bus17OfficeArrivalTime." invalid";

}

if ($bus91OfficeArrivalTime < $currentDateEpoch)
{
	     	$bus91OfficeArrivalTime = $bus91OfficeArrivalTime+$currentDateEpoch+$currentDateEpoch;
//	     	echo "Bus19 ".$bus91OfficeArrivalTime." invalid";
}

if ($bus153OfficeArrivalTime < $currentDateEpoch)

{
	     	$bus153OfficeArrivalTime = $bus153OfficeArrivalTime+$currentDateEpoch+$currentDateEpoch;
//	     	echo "Bus153 ".$bus153OfficeArrivalTime." invalid";

}

//******************************************************************************
// defining Better Option
//******************************************************************************

// Which Bus?

if (
	($bus153EarliestArrivalTime > $arrivalatBusStopForBus153Epoch)
	&&
	($bus153OfficeArrivalTime < $bus17OfficeArrivalTime)
	&&
	($bus153OfficeArrivalTime < $bus91OfficeArrivalTime)
	&&
	($bus153OfficeArrivalTime < $tubeOfficeArrivalTime)
	)
{
//			echo "153";
	     	$bestChoice = "Bus 153";
	     	$officeArrivalTime = date("H:i:s", $bus153OfficeArrivalTime);
	     	$routeTime = $bus153OfficeArrivalTime;
}

elseif (
	($bus17EarliestArrivalTime > $arrivalatBusStopForBus17Epoch)
	&&
	($bus17OfficeArrivalTime < $bus153OfficeArrivalTime)
	&&
	($bus17OfficeArrivalTime < $bus91OfficeArrivalTime)
	&&
	($bus17OfficeArrivalTime < $tubeOfficeArrivalTime)
	)
{
//			echo "17";
	     	$bestChoice = "Bus 17";
	     	$officeArrivalTime = date("H:i:s", $bus17OfficeArrivalTime);
	     	$routeTime = $bus17OfficeArrivalTime;
}

elseif (
	($bus91EarliestArrivalTime > $arrivalatBusStopForBus91Epoch)
	&&
	($bus91OfficeArrivalTime < $bus17OfficeArrivalTime)
	&&
	($bus91OfficeArrivalTime < $bus153OfficeArrivalTime)
	&&
	($bus91OfficeArrivalTime < $tubeOfficeArrivalTime)
	)
{
//			echo "91";
	     	$bestChoice = "Bus 91";
	     	$officeArrivalTime = date("H:i:s", $bus91OfficeArrivalTime);
	     	$routeTime = $bus91OfficeArrivalTime;
}

elseif (
	($tubeOfficeArrivalTime < $bus17OfficeArrivalTime)
	&&
	($tubeOfficeArrivalTime < $bus153OfficeArrivalTime)
	&&
	($tubeOfficeArrivalTime < $bus91OfficeArrivalTime)
	)
{
//			echo "Tube";
			$bestChoice = "TUBE";
			$officeArrivalTime = date("H:i:s", ($currentDateEpoch+$tubeRoute));
	     	$routeTime = $tubeRoute/60;
}

else {
	//		echo "WRONG";
			$bestChoice = "OOPZ, TRY AGAIN";
			$officeArrivalTime = date("H:i:s", ($currentDateEpoch+$tubeRoute));
	     	$routeTime = $tubeRoute/60;
}

// When?

if ($bestChoice == "Bus 17")
{
			$nextBus = $bus17EarliestArrivalTime;
	     	$nextBusWhen = $bus17EarliestArrivalTime-$currentDateEpoch;
	     	$nextBusWhenMin = $nextBusWhen/60;
	     	settype($nextBusWhenMin, "integer");
}
elseif ($bestChoice == "Bus 153")
{
			$nextBus = $bus153EarliestArrivalTime;
	     	$nextBusWhen = $bus153EarliestArrivalTime-$currentDateEpoch;
	     	$nextBusWhenMin = $nextBusWhen/60;
	     	settype($nextBusWhenMin, "integer");
}

elseif ($bestChoice == "Bus 91")
{
			$nextBus = $bus91EarliestArrivalTime;
	     	$nextBusWhen = $bus91EarliestArrivalTime-$currentDateEpoch;
	     	$nextBusWhenMin = $nextBusWhen/60;
	     	settype($nextBusWhenMin, "integer");
}

else {
	     	$nextBusWhenMin = "NOTSURE";

}


// Where?

if ($bestChoice == "Bus 153")
{
	     	$walkTime = $walkTimeBus153/60;
}
else {
$walkTime = $walkTimeBus17/60;
}

// Wait?
$waitTime = $nextBusWhenMin-$walkTime;

// Calculating Route Time

$routeMin153 = ($bus153OfficeArrivalTime-$currentDateEpoch)/60;
	     	settype($routeMin153, "integer");
$routeMin17 = ($bus17OfficeArrivalTime-$currentDateEpoch)/60;
	     	settype($routeMin17, "integer");
$routeMin91 = ($bus91OfficeArrivalTime-$currentDateEpoch)/60;
	     	settype($routeMin91, "integer");
$routeMinTube = $tubeTime/60;
	     	settype($routeMinTube, "integer");


if ($bestChoice == "TUBE")
{
	     	$nextBusWhenMin = "NOTSURE";
	     	$routeMin = $tubeTime/60;
	     	settype($routeMin, "integer");
}

else {
	     	$nextBusWhen = $bus17EarliestArrivalTime-$currentDateEpoch;
	     	$nextBusWhenMin = $nextBusWhen/60;
	     	settype($nextBusWhenMin, "integer");


	     	$routeEpoch = $routeTime-$currentDateEpochms;
	     	$routeMin = $routeEpoch/60;
	     	settype($routeMin, "integer");

}

// BUS or TUBE copy

if ($bestChoice == "TUBE")
{
			$bestChoiceCopy = "No luck today, better getting the tube!";
			$waitTimeCopy = "No luck today, better getting the tube!";
			$journeyTimeCopy = "The journey takes ".$routeMin." minutes in average so you should arrive in the office at ".$officeArrivalTime.".";
}

else {
			$bestChoiceCopy = "The best Choice is ".$bestChoice.", it will arrive in ".$nextBusWhenMin." minutes (".date("H:i:s", $nextBus).")";
			$walkAndWaitCopy = "You usually take ".$walkTime." minutes to arrive in the bus stop, so you will have to wait ".$waitTime." minutes for the bus";
			$journeyTimeCopy = "The journey will takes ".$routeMin." minutes so you should arrive in the office at ".$officeArrivalTime.".";
}

?>

<!--
-->