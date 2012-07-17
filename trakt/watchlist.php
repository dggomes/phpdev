<?
	if(@$_REQUEST['commit'] == '1')
	{
		$post_data = file_get_contents('newjson.txt');
		
		$ch = curl_init('http://api.trakt.tv/movie/watchlist/8420cea7feaff66a8be0fdb93273b727');                                                                      
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);  
		//curl_setopt($ch, CURLOPT_USERPWD, $auth = 'leles:' . sha1('m4z3123'));
		curl_setopt($ch, CURLOPT_USERPWD, $auth = 'dggomes:' . 'e55108769672083058b33c76bec40a65fe55f81c');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($post_data))
		);
		$result = curl_exec($ch);
		var_dump( $auth, $result );
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<head>
</head>
<body>
   <a href="?commit=1">commit</a>
</body>
</html>