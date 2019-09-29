<?php

#htTool has a method for each type of http request. It uses the php functions stream_context_create() and file_get_contents().
	class htTool{
		private $user;
		private $pass;
		private $url;
		private $data;
		public $out;
		
		#Use this method to make "GET" requests 
		public function getter($user, $pass, $url){
			$this->url = $url;
			$this->data = $data;
			$this->user = $user;
			$this->pass = $pass;
			
			$jData = json_encode($data);
			
			$opts =[
				'http' =>[
					'header' =>[
						"Authorization: Basic " . base64_encode("$user:$pass"),
						'Content-Type: Application/json'
					],
					'method' => 'GET'
				]
			];
			
			$context = stream_context_create($opts);
			$resu = file_get_contents($url, false, $context);
			$out = json_decode($resu, true);
			return $out;
		}
		
		#Use this method to make "POST" requests 
		public function poster($user, $pass, $url, $data){
			$this->url = $url;
			$this->data = $data;
			$this->user = $user;
			$this->pass = $pass;
			
			$jData = json_encode($data);
			
			$opts =[
				'http' =>[
					'header' =>[
						"Authorization: Basic " . base64_encode("$user:$pass"),
						'Content-Type: Application/json'
					],
					'method' => 'POST',
					'content'=> $jData
				]
			];
			
			$context = stream_context_create($opts);
			$resu = file_get_contents($url, false, $context);
			$out = json_decode($resu, true);
			return $out;
		}
		
		#Use this method to make "PUT" requests 
		public function putter($user, $pass, $url, $data){
			$this->url = $url;
			$this->data = $data;
			$this->user = $user;
			$this->pass = $pass;
			
			$jData = json_encode($data);
			
			$opts =[
				'http' =>[
					'header' =>[
						"Authorization: Basic " . base64_encode("$user:$pass"),
						'Content-Type: Application/json'
					],
					'method' => 'PUT',
					'content'=> $jData
				]
			];
			
			$context = stream_context_create($opts);
			$resu = file_get_contents($url, false, $context);
			$out = json_decode($resu, true);
			return $out;
		}
		
		#Use this method to make "PATCH" requests 
		public function patcher($user, $pass, $url, $data){
			$this->url = $url;
			$this->data = $data;
			$this->user = $user;
			$this->pass = $pass;
			
			$jData = json_encode($data);
			
			$opts =[
				'http' =>[
					'header' =>[
						"Authorization: Basic " . base64_encode("$user:$pass"),
						'Content-Type: Application/json'
					],
					'method' => 'PATCH',
					'content'=> $jData
				]
			];
			
			$context = stream_context_create($opts);
			$resu = file_get_contents($url, false, $context);
			$out = json_decode($resu, true);
			return $out;
		}
		
		#Use this method to make "DELETE" requests 
		public function deleter($user, $pass, $url, $item){
			$this->url = $url;
			$this->data = $data;
			$this->user = $user;
			$this->pass = $pass;
						
			$opts =[
				'http' =>[
					'header' =>[
						"Authorization: Basic " . base64_encode("$user:$pass"),
						'Content-Type: Application/json'
					],
					'method' => 'DELETE'
				]
			];
			
			$target = $url.'/'.$item;
			
			$context = stream_context_create($opts);
			$resu = file_get_contents($url.$item, false, $context);
			$out = json_decode($resu, true);
			return $out;
		}
	}

?>
