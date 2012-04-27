<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		require_once('instagram-curl.php');

		$instagram = new Instagram(array(
			'client_id' => 'Curly', 
			'access_token' => '15998.f59def8.3516b1fc823f41d89df8c0fa51b4ed08'
		));

		// $response = $instagram->media_search(array("lat"=>"48.858844", "lng"=>"2.294351"));
		// $response = $instagram->media_id(8);
		// $response = $instagram->media_popular();
		// $response = $instagram->tags_media_recent('bradford');
		// $response = $instagram->tags('bradford');
		$response = $instagram->tags_search('bradford');

		if( is_array($response->data) && isset($response->data[0]->images) ){
			foreach ($response->data as $gram){
				echo '<img src="' . $gram->images->low_resolution->url . '" />';
			}
		} 

		if (isset($response->data->images) ) {
			echo '<img src="' . $response->data->images->low_resolution->url . '" />';
		}

		echo '<pre>';
		print_r($response);

	?>
</body>
</html>