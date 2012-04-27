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

 	public function users_self_feed(){
 		return $this->request('users/self/feed');
 	}

 	public function users_media_recent($user_id){
 		return $this->request('users/' . $user_id . '/media/recent');
 	}

 	public function media($id){
 		return $this->request('media/' . $media_id);
 	}

 	public function media_search($params){
 		return $this->request('media/search', $params);
 	}

 	public function media_popular(){
 		return $this->request('media/popular');
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