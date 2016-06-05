<?php
// config.inc.php
	$json = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "data.json");
	$data = json_decode($json);
	
	$user = $data->{'user'};
	$pass = $data->{'pass'};
	$host = $data->{'host'};
	$dbname = $data->{'dbname'};
?>