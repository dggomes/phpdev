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
		<li><a id="displayTfl">TFL</a></li>
</ul>

</div>



<div id="bestChoice" class="roundedcorner">

		<h2><?php echo $bestChoice; ?></h2>

</div>

<div id="bus17" class="data roundedcorner" style="display: none">

		<h1>Bus 17</h1>
		<h2>Walk BusStop: <?php echo ($walkTimeBus17/60); ?> min</h2>
		<h2>Arrival at Bus Stop: <?php echo date("H:i:s", $arrivalatBusStopForBus17Epoch); ?></h2>
		<h2>Route: <?php echo ($bus17Route/60); ?> min</h2>
		<h2>Walk Office: <?php echo ($walkDistanceBus17/60); ?> min</h2>
		<h2>Arrival Office: <?php echo date("H:i:s", $bus17OfficeArrivalTime); ?></h2>

</div>

<div id="bus153" class="data roundedcorner" style="display: none">

		<h1>Bus 153</h1>
		<h2>Walk BusStop: <?php echo ($walkTimeBus153/60); ?> min</h2>
		<h2>Arrival at Bus Stop: <?php echo date("H:i:s", $arrivalatBusStopForBus153Epoch); ?></h2>
		<h2>Route: <?php echo ($bus153Route/60); ?> min</h2>
		<h2>Walk Office: <?php echo ($walkDistanceBus153/60); ?> min</h2>
		<h2>Arrival Office: <?php echo date("H:i:s", $bus153OfficeArrivalTime); ?></h2>

</div>

<div id="bus91" class="data roundedcorner" style="display: none">

		<h1>Bus 91</h1>
		<h2>Walk BusStop: <?php echo ($walkTimeBus91/60); ?> min</h2>
		<h2>Arrival at Bus Stop: <?php echo date("H:i:s", $arrivalatBusStopForBus91Epoch); ?></h2>
		<h2>Route: <?php echo ($bus91Route/60); ?> min</h2>
		<h2>Walk Office: <?php echo ($walkDistanceBus91/60); ?> min</h2>
		<h2>Arrival Office: <?php echo date("H:i:s", $bus91OfficeArrivalTime); ?></h2>

</div>

<div id="tfl" class="data roundedcorner" style="display: none">

		<h1>TFL</h1>
		<h2>BUS 17</h2>

		<h2>1st Prediction: 
		
		<?php if ($prediction17_valid1==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions17[0][1])." || VALID";	
		}
		?>
		
		</h2>

		<h2>2nd Prediction: 
		
		<?php if ($prediction17_valid2==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions17[0][2])." || VALID";	
		}
		?>
		
		</h2>
		
		<h2>3rd Prediction: 
		
		<?php if ($prediction17_valid3==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions17[0][3])." || VALID";	
		}
		?>
		
		</h2>
		
		<h2>4th Prediction: 
		
		<?php if ($prediction17_valid4==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions17[0][4])." || VALID";	
		}
		?>
		
		</h2>
		
		<br>
		<h2>BUS 153</h2>
		<h2>1st Prediction: 
		
		<?php if ($prediction153_valid1==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions153[0][1])." || VALID";	
		}
		?>
		
		</h2>

		<h2>2nd Prediction: 
		
		<?php if ($prediction153_valid2==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions153[0][2])." || VALID";	
		}
		?>
		
		</h2>
		
		<h2>3rd Prediction: 
		
		<?php if ($prediction153_valid3==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions153[0][3])." || VALID";	
		}
		?>
		
		</h2>
		
		<h2>4th Prediction: 
		
		<?php if ($prediction153_valid4==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions153[0][4])." || VALID";	
		}
		?>
		
		</h2>
		
		<br>
		<h2>BUS 91</h2>

		<h2>1st Prediction: 
		
		<?php if ($prediction91_valid1==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions91[0][1])." || VALID";	
		}
		?>
		
		</h2>

		<h2>2nd Prediction: 
		
		<?php if ($prediction91_valid2==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions91[0][2])." || VALID";	
		}
		?>
		
		</h2>
		
		<h2>3rd Prediction: 
		
		<?php if ($prediction91_valid3==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions91[0][3])." || VALID";	
		}
		?>
		
		</h2>
		
		<h2>4th Prediction: 
		
		<?php if ($prediction91_valid4==0)
		{
		echo INVALID;
		}
		
		else
		
		{
		echo date("H:i:s", $predictions91[0][4])." || VALID";	
		}
		?>
		
		</h2>

</div>

<div id="tube" class="data roundedcorner" style="display: none">

		<h1>Conclusion</h1>
		<h2>Bus 17: <?php echo date("H:i:s", $bus17EarliestArrivalTime); ?> || <?php echo date("H:i:s", $bus17OfficeArrivalTime); ?> || <?php echo $routeMin17; ?> min</h2>
		<h2>Bus 153: <?php echo date("H:i:s", $bus153EarliestArrivalTime); ?> || <?php echo date("H:i:s", $bus153OfficeArrivalTime); ?> || <?php echo $routeMin153; ?> min</h2>
		<h2>Bus 91: <?php echo date("H:i:s", $bus91EarliestArrivalTime); ?> || <?php echo date("H:i:s", $bus91OfficeArrivalTime); ?> || <?php echo $routeMin91; ?> min</h2>
		<h2>Tube: <?php echo date("H:i:s", $tubeOfficeArrivalTime); ?> || <?php echo $routeMinTube; ?> min</h2>

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