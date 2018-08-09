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
		<?php

		// LENDO ARQUIVO CSV
		$leuHeader = false;

		foreach (array('nomesDosEventosProcessado.csv') as $arquivo) {
		//foreach (array('UFSCAR.csv','UNESP.csv') as $arquivo) {
			$num = 0;
			$file = array();
			// Leitura do arquivo
			if (($handle = fopen("EventosProcessados/".$arquivo, "r")) !== FALSE) {
				while (($data = fgetcsv($handle)) !== FALSE) {
					if($num == 0){
						$keys = $data;
					}elseif($num == count($data)){
						$file[] = $data;
					}else{
						echo 'numero de elementos na linha não batem esperado '.$num.' encontrados '.count($data).' colunas!! :(';
						echo json_encode($data);
					}
					$num = count($data);
				}
				fclose($handle);
			}

			$arr = array();
			// Para cada linha da tabela
			foreach ($file as  $linha) {
				$authors = array();
				$i = 0;
				$periodico = null;
				$ano = null;
				$idEvento_subs = '';
				// Armazena na memória cada campo em suas respectivas variaveis
				foreach ($linha as $value) {
					$key = $keys[$i];
					//idEvento,nome,idEvento_subs,tipo,area
					if($key == "idEvento" && $value != ''){
						$idEvento = $value;
					}
					if($key == "nome" && $value != ''){
						$nome = $value;
					}
					if($key == "idEvento_subs" && $value != ''){
						$idEvento_subs = $value;
					}
					if($key == "tipo" && $value != ''){
						$tipo = $value;
					}
					if($key == "area" && $value != ''){
						$area = $value;
					}
					$i++;
				}
				// Constroi um objeto contendo os campos identificados (periodico, ano e autores)
				// E armazena na memória
				$arr[] = array(
					'idEvento' => intval($idEvento),
					'nome' => $nome,
					'idEvento_subs' => ($idEvento_subs == '' ? 0 : intval($idEvento_subs)),
					'tipo' => $tipo,
					'area' => $area
				);
			}

			// Connectando ao banco de dados
			echo "<br> ...... Conectado ao banco de dados ...... <br><br>";
			$mysqli = new mysqli("localhost", "root", "m230889m", "MFF-Scripts");
			$mysqli->set_charset("utf8");
			if ($mysqli->connect_errno) {
				$err = "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ;
				var_dump($err);
				die();
			}

			echo "<div>";
			// para cada linha já estruturada
			foreach($arr as $pair){
				$nomeEvento = addslashes($pair['nome']);

				$tipo = $pair['tipo'];
				$area = $pair['area'];

                $query = $mysqli->query('SELECT * FROM evento WHERE tipo IS NULL OR area IS NULL');
                $percent = 0;
                while($row = $query->fetch_assoc()) {
                    similar_text($row['nome'], $pair['nome'], $percent);
                    if($percent > 70 && $percent < 80){
                       print $percent;
                        echo '<br>';
                        print_r($pair);
                        echo '<br>';
                        print_r($row);
                        echo '<br>';
                        echo '<br>';
                        /*if($mysqli->query('UPDATE evento SET tipo = "'.$tipo.'", area = "'.$area.'" WHERE idEvento = '.$row['idEvento'])){
                            echo 'Updated !<br>';
                        }else{
                            echo $mysqli->error . '<br>';
                        }*/
                    }
                }
//                $append = 'nome = "'.addslashes(stripslashes($nome['nome'])).'", ';
                $append = '';


			}//Fim do loop de cada linha da tabela
		}// Fim do arquivo de cada instituicao
		$mysqli->close();
        echo 'Descomente as linhas acima para atualizar no banco';
		echo "</div>";
		?>
		</div>
	</body>
</html>
