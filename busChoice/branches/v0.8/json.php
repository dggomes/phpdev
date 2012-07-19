<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  
 )
);

$context = stream_context_create($opts);

$file = file_get_contents('data.txt', false, $context);

echo $file;

?>

<html>
<head>
<title>PHP</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="writtencontent">
<h1><?php echo $matches[1]; ?></h1>
<h1><?php echo $matches[2]; ?></h1>
<h1><?php echo $matches[3]; ?></h1>
<h1><?php echo $matches[4]; ?></h1>

</body>
</html>