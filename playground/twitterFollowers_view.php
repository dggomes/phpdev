<!DOCTYPE html>
<html>
<head>
<title>Twitter</title>
<meta name="viewport" content="width=device-width, user-scalable=no" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>   
</head>

<script type="text/javascript">     
var vfresh = function()
{
   $('#twitter').empty();
   $('#twitter').load('twitterFollowers.php');
}
setInterval(vfresh, 500);
</script>


<body>

<!--

-->

<div id="twitter">

</div>

</body>
</html>