<?php
 /*
  * Instagram curl api wrapper
  * @author Mark 'Phunky' Harwood
  *
  * Simple curl wrapper for interacting with the instagram API to refresh my PHP knowledge.
  *
  */

 class InstagramCurl {

 	private $endpoint = 'https://api.instagram.com/v1/';

 	public function __construct($client_id, $access_token){
 		$this->client_id = $client_id;
 		$this->access_token = $access_token;
 	}

 	public function media(){
 		return $this->sendRequest('media/popular');
 	}

 	private function buildRequest($endpoint, $query){
 		
 		$query->client_id = $this->client_id;
 		$query->access_token = $this->access_token;
 		
 		return $this->endpoint . $endpoint . '?' . http_build_query($query);
 	}

 	private function sendRequest($endpoint){
 		$request = $this->buildRequest($endpoint);
 		$curl = curl_init($request);
 		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
 		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
 		$response = curl_exec($curl);
 		curl_close($curl);
 		return $response;
 	}

 }

?>