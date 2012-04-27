<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		require_once('instagram-curl.php');

		$test = new InstagramCurl('Curly', '15998.f59def8.3516b1fc823f41d89df8c0fa51b4ed08');
		$endpoint = 'media/search';
		$params = array("lat"=>"48.858844", "lng"=>"2.294351");
		$value = json_decode( $test->request($endpoint, $params) );

		if( is_array($value->data) ){
			foreach ($value->data as $gram){
				echo '<img src="' . $gram->images->low_resolution->url . '" />';
			}
		} else {
			echo '<img src="' . $value->data->images->low_resolution->url . '" />';
		}

		echo '<pre>';
		print_r( $value );
		echo '</pre>';
	?>
</body>
</html>