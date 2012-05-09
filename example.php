<?php
	require_once('instagram-curl.php');

	$instagram = new Instagram(array(
		'client_id' => 'ee52789f087846659ae08c6e5db1dc14'
	));

	// $response = $instagram->users_follows('15998');
	// $response = $instagram->users_followed_by('15998');
	// $response = $instagram->users_relationship('15968'); // Needs auth
	// $response = $instagram->users('15998');
	// $response = $instagram->users_self_feed(); // Needs auth
	// $response = $instagram->users_media_recent('15998'); // Needs auth
	// $response = $instagram->users_self_media_liked(); // Needs auth
	// $response = $instagram->users_search('phunky');
	// $response = $instagram->media_likes('555');
	// $response = $instagram->locations('1');
	// $response = $instagram->locations_media_recent(1);
	// $response = $instagram->locations_search(array("lat"=>"48.858844", "lng"=>"2.294351"));
	$response = $instagram->media_search(array("lat"=>"48.858844", "lng"=>"2.294351"));
	// $response = $instagram->media(8);
	// $response = $instagram->media_popular();
	// $response = $instagram->tags_media_recent('bradfordphotoaday');
	// $response = $instagram->tags('bradford');
	// $response = $instagram->tags_search('bradford');
	
	// header('Cache-Control: no-cache, must-revalidate');
	// header('Content-type: application/json');

	if($response) {
		printf($response);
	}
?>