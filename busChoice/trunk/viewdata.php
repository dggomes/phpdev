<!DOCTYPE html>
<html>
<head>
<title>Which Bus?</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include("transport.php"); ?>

<div id="writtencontent">

<h1>Now is <?php echo date("H:i:s"); ?></h1>
<h1><?php echo $bestChoiceCopy; ?></h1> 
<h1><?php echo $walkAndWaitCopy; ?></h1>
<h1><?php echo $journeyTimeCopy; ?></h1>

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

<h1>Bus 91 - Average</h1>
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
<td><?php echo $walkTimeBus91; ?></td>
<td><?php echo $arrivalatBusStopForBus91Epoch; ?></td>
<td><?php echo date('r', $arrivalatBusStopForBus91Epoch); ?></td>
<td><?php echo $bus91Route; ?></td>
<td><?php echo $walkDistanceBus91; ?></td>
<td><?php echo $bus91OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus91OfficeArrivalTime); ?></td>
</tr>
</table>

<h1>Tube</h1>
<table border="1">
<tr>
<td>Current time</td>
<td>Walk Caledonian Road</td>
<td>Route</td>
<td>Walk Farringdon</td>
<td>Arrival Office</td>
<td>Arrival Office</td>
</tr>
<tr>
<td><?php echo $currentDateEpochms; ?></td>
<td><?php echo $walkDistanceTube1; ?></td>
<td><?php echo $tubeRoute; ?></td>
<td><?php echo $walkDistanceTube2; ?></td>
<td><?php echo $tubeOfficeArrivalTime; ?></td>
<td><?php echo date('r', $tubeOfficeArrivalTime); ?></td>
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
<tr>
<td>Bus 91</td>
<td><?php echo $predictions91[0][1]; ?></td>
<td><?php echo $prediction91_valid1; ?></td>
<td><?php echo $predictions91[0][2]; ?></td>
<td><?php echo $prediction91_valid2; ?></td>
<td><?php echo $predictions91[0][3]; ?></td>
<td><?php echo $prediction91_valid3; ?></td>
<td><?php echo $predictions91[0][4]; ?></td>
<td><?php echo $prediction91_valid4; ?></td>
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
<td>JourneyTime</td>
</tr>
<tr>
<td>Bus 17</td>
<td><?php echo $bus17EarliestArrivalTime; ?></td>
<td><?php echo date('r', $bus17EarliestArrivalTime); ?></td>
<td><?php echo $bus17OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus17OfficeArrivalTime); ?></td>
<td><?php echo $routeMin17; ?> min</td>
</tr>
<tr>
<td>Bus 153</td>
<td><?php echo $bus153EarliestArrivalTime; ?></td>
<td><?php echo date('r', $bus153EarliestArrivalTime); ?></td>
<td><?php echo $bus153OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus153OfficeArrivalTime); ?></td>
<td><?php echo $routeMin153; ?> min</td>
</tr>
<tr>
<td>Bus 91</td>
<td><?php echo $bus91EarliestArrivalTime; ?></td>
<td><?php echo date('r', $bus91EarliestArrivalTime); ?></td>
<td><?php echo $bus91OfficeArrivalTime; ?></td>
<td><?php echo date('r', $bus91OfficeArrivalTime); ?></td>
<td><?php echo $routeMin91; ?> min</td>
<tr>
<td>Tube</td>
<td></td>
<td></td>
<td><?php echo $tubeOfficeArrivalTime; ?></td>
<td><?php echo date('r', $tubeOfficeArrivalTime); ?></td>
<td><?php echo $routeMinTube; ?> min</td>
</tr>
</table>

</body>
</html>