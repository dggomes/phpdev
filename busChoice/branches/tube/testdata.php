<!DOCTYPE html>
<html>
<head>
<title>Which Bus?</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript" src="toggle.js"></script> 
<meta name="viewport" content="width=device-width, user-scalable=no" />

</head>
<body>
<?php include("transport.php"); 
	
$xml = simplexml_load_file('http://cloud.tfl.gov.uk/TrackerNet/PredictionDetailed/P/CRD');
print_r($xml);

$re1='(<)';	# Any Single Character 1
  $re2='(P)';	# Any Single Character 2
  $re3='.*?';	# Non-greedy match on filler
  $re4='\\/';	# Uninteresting: c
  $re5='.*?';	# Non-greedy match on filler
  $re6='(\\/)';	# Any Single Character 3
  $re7='(P)';	# Any Single Character 4
  $re8='(>)';	# Any Single Character 5

  if ($c=preg_match_all ("/".$re1.$re2.$re3.$re4.$re5.$re6.$re7.$re8."/is", $xml, $matches))
  {
      $c1=$matches[1][0];
      $c2=$matches[2][0];
      $c3=$matches[3][0];
      $c4=$matches[4][0];
      $c5=$matches[5][0];
      print "($c1) ($c2) ($c3) ($c4) ($c5) \n";
  }
	
?>

<div>

		<h2><TESTDATA</h2>
		<h2><?php echo $tubeTflXml; ?></h2>

</div>

</body>
</html>