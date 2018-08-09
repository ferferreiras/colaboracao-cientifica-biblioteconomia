<?php
/**
 * Created by PhpStorm.
 * User: maxwell
 * Date: 21/03/17
 * Time: 11:45
 */

$mysqli = new mysqli("localhost", "root", "m230889m", "MFF-Scripts");
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    $err = "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ;
    var_dump($err);
    die();
}

$query = $mysqli->query('SELECT * FROM pessoa');

while($row = $query->fetch_assoc()) {
    $pessoas[$row['idPessoa']] = $row['nomeCompleto'];
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>MFF - Scripts</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

		<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
		<style type="text/css">
            body{
                font-family: 'Raleway', sans-serif;
                }
		</style>
	</head>
	<body>
		<div class="container">

        </div>
    </body>
</html>
