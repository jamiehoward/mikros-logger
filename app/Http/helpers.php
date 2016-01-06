<?php
/**
 * Created by PhpStorm.
 * User: jhoward
 * Date: 1/6/16
 * Time: 10:52 AM
 */

function mikrosLog($data = [], $project = 'testing' ) {
	//open connection
	$ch = curl_init();
	$data = array('data' => $data);
	$data = json_encode($data);

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, "http://104.236.251.89/$project");
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
	);

	$result = curl_exec($ch);
}