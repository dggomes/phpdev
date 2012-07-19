<?php
include("transport.php");
// BUS 17

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  
 )
);

$context = stream_context_create($opts);

//$api17 = file_get_contents('http://countdown.api.tfl.gov.uk/interfaces/ura/instant_V1?StopCode1=71556&LineID=17&DirectionID=1&VisitNumber=1&ReturnList=EstimatedTime', false, $context);
$api17 = file_get_contents('data.txt', false, $context);

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

//$api153 = file_get_contents('http://countdown.api.tfl.gov.uk/interfaces/ura/instant_V1?StopCode1=71556&LineID=17&DirectionID=1&VisitNumber=1&ReturnList=EstimatedTime', false, $context);
$api153 = file_get_contents('data2.txt', false, $context);

preg_match_all('@\d\d\d\d\d\d\d\d\d\d\d\d\d@', $api153, $predictions153, PREG_PATTERN_ORDER);

//echo $arrivalatBusStopForBus17Epoch;

// print_r($predictions153[0]);

?>

<!--
<html>
<head>
<title>PHP</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="writtencontent">
<h1><?php echo $predictions17[0][1]; ?></h1>
<h1><?php echo $predictions17[0][2]; ?></h1>
<h1><?php echo $predictions17[0][3]; ?></h1>
<h1><?php echo $predictions153[0][1]; ?></h1>
<h1><?php echo $predictions153[0][2]; ?></h1>
<h1><?php echo $predictions153[0][3]; ?></h1>

</body>
</html>
-->