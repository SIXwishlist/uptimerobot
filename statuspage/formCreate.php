<?php

define("apiUserKey", "u303281-1169387ddaf782107b89cfaf");
define("apiUrl", "https://api.uptimerobot.com/newMonitor?apiKey=u303281-1169387ddaf782107b89cfaf&");
  
$friendlyname = $_POST["v_monitorFriendlyName"];

$fields = array(
  'monitorFriendlyName' => urlencode($_POST["v_monitorFriendlyName"]),
  'monitorURL' => $_POST["v_monitorURL"],
  'monitorType' => urlencode($_POST["v_monitorType"])
);

$fields_string = '';

// foreach($fields as $key => $value) { $fields_string = $key.'='.$value.'&'; }
// rtrim($fields_string, '&');

$fields_string = http_build_query($fields);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, apiUrl.$fields_string );
// curl_setopt($ch, CURLOPT_POST, count($fields) );
// curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

$output = curl_exec($ch);
curl_close($ch);

$decoded = json_decode($output);

echo "$decoded";

?>