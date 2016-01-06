<?php
/**
 * Created by PhpStorm.
 * User: jhoward
 * Date: 1/6/16
 * Time: 10:52 AM
 */

function mikrosLog($data = [], $project = 'mikros' ) {
	//open connection
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => "http://104.236.251.89/$project",
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => [
			'data' => json_encode($data)
		]
	));
	curl_exec($ch);
	curl_close($ch);
}
