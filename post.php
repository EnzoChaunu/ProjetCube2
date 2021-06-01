<?php
  $url = 'http://127.0.0.1/Projet%20cube2/API/météo';
  $data = array('id_releve' => '1', 'Description' => '$Description', 'temperature' => '$temperature', 'humidite' => '$humidite', 'date' => '$date', 'id_sonde' => '2', 'id_station' => '3', 'nom' => '$nom', 'lat' => '$lat', 'lon' => '$lon');
  // utilisez 'http' même si vous envoyez la requête sur https:// ...
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { /* Handle error */ }

  var_dump($result);
?>