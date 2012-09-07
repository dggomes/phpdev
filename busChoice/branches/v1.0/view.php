<!DOCTYPE html>
<html>
<head>
<title>Which Bus?</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, user-scalable=no" />
</head>
<body>
<?php include("transport.php"); ?>

<!--

-->

<div id="menuContainer" class="menuContainer">

<ul id="menu" >
		<li><a id="displayBus17">Bus 17</a></li>
		<li><a id="displayBus153">Bus 153</a></li>
		<li><a id="displayBus91">Bus 91</a></li>
		<li><a id="displayTube">Predic</a></li>
		<li><a id="displayTFL">TFL</a></li>
</ul>

</div>


<div id="bestChoice" class="roundedcorner">

		<h2><?php echo $bestChoice; ?></h2>

</div>

<div id="bus17" class="data roundedcorner" style="display: none">

		<h1>Bus 17 - Arrival at the Office: <?php echo date("H:i:s", $bus17OfficeArrivalTime); ?></h1>
		<h2>1st Bus: <?php echo $tflArrival17_1; ?> min    |    2nd Bus: <?php echo $tflArrival17_2; ?> min    |    3rd Bus: <?php echo $tflArrival17_3; ?> min</h2>
		<h2>Bus Arrival: <?php echo $saferArrival17; ?> min</h2>
		<h2>Route: <?php echo ($bus17Route/60); ?> min</h2>
		<h2>Walk Office: <?php echo ($walkDistanceBus17/60); ?> min</h2>

</div>

<div id="bus153" class="data roundedcorner" style="display: none">

		<h1>Bus 153 - Arrival at the Office: <?php echo date("H:i:s", $bus153OfficeArrivalTime); ?></h1>
		<h2>1st Bus: <?php echo $tflArrival153_1; ?> min    |    2nd Bus: <?php echo $tflArrival153_2; ?> min    |    3rd Bus: <?php echo $tflArrival153_3; ?> min</h2>
		<h2>Bus Arrival: <?php echo $saferArrival153; ?> min</h2>
		<h2>Route: <?php echo ($bus153Route/60); ?> min</h2>
		<h2>Walk Office: <?php echo ($walkDistanceBus153/60); ?> min</h2>

</div>

<div id="bus91" class="data roundedcorner" style="display: none">

		<h1>Bus 91 - Arrival at the Office: <?php echo date("H:i:s", $bus91OfficeArrivalTime); ?></h1>
		<h2>1st Bus: <?php echo $tflArrival91_1; ?> min    |    2nd Bus: <?php echo $tflArrival91_2; ?> min    |    3rd Bus: <?php echo $tflArrival91_3; ?> min</h2>
		<h2>Bus Arrival: <?php echo $saferArrival91; ?> min</h2>
		<h2>Route: <?php echo ($bus91Route/60); ?> min</h2>
		<h2>Walk Office: <?php echo ($walkDistanceBus91/60); ?> min</h2>

</div>

<div id="tube" class="data roundedcorner" style="display: none">

		<h1>Conclusion</h1>
		<h2>Bus 17: <?php echo date("H:i:s", $bus17EarliestArrivalTime); ?> || <?php echo date("H:i:s", $bus17OfficeArrivalTime); ?> || <?php echo $routeMin17; ?> min</h2>
		<h2>Bus 153: <?php echo date("H:i:s", $bus153EarliestArrivalTime); ?> || <?php echo date("H:i:s", $bus153OfficeArrivalTime); ?> || <?php echo $routeMin153; ?> min</h2>
		<h2>Bus 91: <?php echo date("H:i:s", $bus91EarliestArrivalTime); ?> || <?php echo date("H:i:s", $bus91OfficeArrivalTime); ?> || <?php echo $routeMin91; ?> min</h2>
		<h2>Tube: <?php echo date("H:i:s", $tubeOfficeArrivalTime); ?> || <?php echo $routeMinTube; ?> min</h2>

</div>

<div id="TFL" class="roundedcorner">

<h2>TFL Data</h2>
<h2>BUS 17:  <?php echo $tflArrival17_1; ?> min    |    <?php echo $tflArrival17_2; ?> min    |    <?php echo $tflArrival17_3; ?> min</h2>
<h2>BUS 153: <?php echo $tflArrival153_1; ?> min   |    <?php echo $tflArrival153_2; ?> min   |    <?php echo $tflArrival153_3; ?> min</h2>
<h2>BUS 91:  <?php echo $tflArrival91_1; ?> min    |    <?php echo $tflArrival91_2; ?> min    |    <?php echo $tflArrival91_3; ?> min</h2>

</div>

</div>

<div id="mainCopy" class="roundedcorner">

<h1><?php echo $bestChoiceCopy; ?></h1> 
<h1><?php echo $walkAndWaitCopy; ?></h1>
<h1><?php echo $journeyTimeCopy; ?></h1>

</div>

</body>
<script type="text/JavaScript" src="jquery.min.js"></script> 
<script src="toggle.js" charset="UTF-8"></script>
</html>