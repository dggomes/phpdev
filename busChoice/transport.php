<?php

// defining variables

$currentDate = date(DATE_RFC822);
$currentDateEpoch = time();

$walkTimeBus17 = 420; // 7 minutes in epoch (7*60)
$walkTimeBus153 = 900; // 15 minutes in epoch (15*60)

$arrivalatBusStopForBus17Epoch = $currentDateEpoch+$walkTimeBus17;
$arrivalatBusStopForBus153Epoch = $currentDateEpoch+$walkTimeBus153;

?>

<!DOCTYPE html>
<html>
<head>
<title>A Transport script</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="writtencontent">
<h1>Now is <?php echo $currentDate; ?> in human-readable date format</h1>
<h1>Now is <?php echo $currentDateEpoch; ?> in epoch date format</h1>

<br></br>
<h1>Bus 17</h1>

<ul>
<li><h2>Walking distance to Bus Stop is <?php echo $walkTimeBus17; ?> in epoch date format</h2></li>
<li><h2>Bus Stop arrival time <?php echo $arrivalatBusStopForBus17Epoch; ?> in epoch date format</h2></li>
<li><h2>Bus Stop arrival time <?php echo date('r', $arrivalatBusStopForBus17Epoch); ?> in human-readable date format</h2> </li>
</ul>

<h1>Bus 153</h1>

<ul>
<li><h2>Walking distance to Bus Stop is <?php echo $walkTimeBus153; ?> in epoch date format</h2> </li>
<li><h2>Arrival time in the Bus Stop <?php echo $arrivalatBusStopForBus153Epoch; ?> in epoch date format</h2></li>
<li><h2>Bus Stop arrival time <?php echo date('r', $arrivalatBusStopForBus153Epoch); ?> in human-readable date format</h2> </li>
</div>
</ul>

</body>
</html>