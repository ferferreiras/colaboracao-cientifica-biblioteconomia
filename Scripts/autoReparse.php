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
            <ul>
            <?php
			require_once('functions.php');

			//TODO: colocar aqui o script que apaga o banco e refaz!

            set_time_limit(0);
            if (ob_get_level() == 0) ob_start();
                echo "<li>";
                    echo "<h1>Artigos</h1><small>";
                    require_once("AlimentaDBArtigos.php");
                echo "</small></li>";
            ob_flush();
            flush();
                echo "<li>";
                    echo "<h1>Cap Livros</h1><small>";
                    require_once("AlimentaDBCapLivros.php");
                echo "</small></li>";
            ob_flush();
            flush();
                echo "<li>";
                    echo "<h1>Livros</h1><small>";
                    require_once("AlimentaDBLivros.php");
                echo "</small></li>";
            ob_flush();
            flush();
                echo "<li>";
                    echo "<h1>Congressos</h1><small>";
                    require_once("AlimentaDBCongressos.php");
                echo "</small></li>";
            ob_flush();
            flush();
                echo "<li>";
                    echo "<h1>Otimizacao Eventos</h1><small>";
                    require_once("Finalizacao/processaComplementoEventos.php");
                echo "</small></li>";
            ob_flush();
            flush();
                echo "<li>";
                    echo "<h1>Otimizacao Pessoas</h1><small>";
                    require_once("Finalizacao/processaComplementoPessoas.php");
                echo "</small></li>";
            ob_flush();
            flush();
			echo "<li>";
				echo "<h1>Otimizacao Periodicos</h1><small>";
				require_once("Finalizacao/processaComplementoPeriodicos.php");
			echo "</small></li>";
			ob_flush();
			flush();
            ob_end_flush();
            ?>
			<br>
			<br>
			<hr>
			<h1>FIM</h1>
			<br>
			<br>
        </div>
    </body>
</html>
