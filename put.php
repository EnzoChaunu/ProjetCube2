<?php
$url = "http://127.0.0.1/Projet%20cube2/API/météo"; // modifier le la météo
$data = array('id_releve' => '1', 'Description' => '$Description', 'temperature' => '$temperature', 'humidite' => '$humidite', 'date' => '$date', 'id_sonde' => '2', 'id_station' => '3', 'nom' => '$nom', 'lat' => '$lat', 'lon' => '$lon');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

$response = curl_exec($ch);

var_dump($response);

if (!$response) 
{
    return false;
}
?>