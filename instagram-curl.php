<?php
 /*
  * Instagram curl api wrapper
  * @author Mark 'Phunky' Harwood
  *
  * Simple curl wrapper for interacting with the instagram API to refresh my PHP knowledge.
  *
  */

 class Instagram {

 	private $client_id;
 	private $access_token;
 	private $endpoint = 'https://api.instagram.com/v1/';

 	public function __construct($cfg){
 		$this->client_id = $cfg['client_id'];
 		$this->access_token = $cfg['access_token'];
 	}

 	private function request($endpoint, $params = array()){
 		$request = $this->buildRequest($endpoint, $params);
 		return $this->sendRequest($request);
 	}

 	public function users($user_id){
 		return $this->request('users/' . $user_id);
 	}

 	public function users_self_feed($params){
 		return $this->request('users/self/feed', $params = array());
 	}

 	public function users_media_recent($user_id, $params = array()){
 		return $this->request('users/' . $user_id . '/media/recent', $params);
 	}

 	public function users_self_media_liked($params = array()){
 		return $this->request('users/self/media/liked', $params);
 	}

 	public function users_search($q, $count = null){
 		return $this->request('users/search', array('q'=>$q, 'count'=>$count));
 	}

 	public function media($id){
 		return $this->request('media/' . $media_id);
 	}

 	public function media_search($params = array()){
 		return $this->request('media/search', $params);
 	}

 	public function media_popular(){
 		return $this->request('media/popular');
 	}

 	public function media_likes($media_id){
 		return $this->request('media/' . $media_id . '/likes');
 	}

	public function tags($tag){
 		return $this->request('tags/' . $tag);
 	}

 	public function tags_media_recent($tag, $params = array()){
 		return $this->request('tags/' . $tag . '/media/recent', $params);
 	}

 	public function tags_search($tag){
 		return $this->request('tags/search', array('q'=>$tag));
 	}

 	public function locations($location_id){
 		return $this->request('locations/' . $location_id);
 	}

 	public function locations_media_recent($location_id, $params = array()){
 		return $this->request('locations/' . $location_id . '/media/recent', $params);
 	}

 	public function locations_search($params = array()){
 		return $this->request('locations/search', $params);
 	}

 	private function buildRequest($endpoint, $params){
 		return $this->endpoint . $endpoint . '?client_id=' . $this->client_id . '&access_token=' . $this->access_token . '&' . http_build_query($params);
 	}

 	private function sendRequest($uri){
 		$curl = curl_init($uri);
 		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
 		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
 		$response = curl_exec($curl);
 		curl_close($curl);
 		return json_decode($response);
 	}

 }

?>