<?php 
$method = $_SERVER['REQUEST_METHOD'];

	if($method == 'GET')
	{
		$hire_id = $_REQUEST['hire_id'];
		$user_id = $_REQUEST['user_id'];
		$user_type = $_REQUEST['user_type'];

		$getDeviceToken = 'cM8V8nwjEOI:APA91bF5pgngkgLqUL8Q9E5KTRcWD6EeJKsVrG2a_Sp_U60zpRIc1qwPpqc8M_0ktUvV_hiy0KBAi3lxjwQlFdINx6LKo8t2xtW0zdrJZOvh4n9UXs2dhCSxNlNd4qo7lyCIXHO_HCYJ';
		$getDevice = '';
		$registrationIds = array();

	
			define( 'API_ACCESS_KEY', 'AIzaSyCEkOOPK1QtOsPPPpzvpgAucSS408Js2d0');
			$registrationIds[] = $getDeviceToken;
			$msg = array
			(
				"title"   => "Pickup call!",
				'sound'     => 'default',
				"room_id" => $hire_id,
				"hire_id" => $hire_id,
				"NT" => 9
			);
												
			$message = array
			(
				'registration_ids' => $registrationIds,
				'data' => $msg,
				'notification' => $msg
			);
												
			$fields = json_encode($message);
			// Set POST variables
												
			$url = 'https://fcm.googleapis.com/fcm/send';
								 
			$headers = array
			(
				'Authorization: key=AIzaSyCEkOOPK1QtOsPPPpzvpgAucSS408Js2d0',
				'Content-Type: application/json'
			);
			// Open connection
			$ch = curl_init();
										 
			// Set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
										 
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
			// Disabling SSL Certificate support temporarly
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
										 
			// Execute post
			$result = curl_exec($ch);
			if ($result === FALSE) 
			{
				die('Curl failed: ' . curl_error($ch)); 
			}
										 
			// Close connection
			curl_close($ch);
												
		
	}
?>
