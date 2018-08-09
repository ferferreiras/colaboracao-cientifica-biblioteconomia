
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

		foreach (array('DocentesInstPos.csv') as $arquivo) {
		//foreach (array('UFSCAR.csv','UNESP.csv') as $arquivo) {
			$num = 0;
			$file = array();
			// Leitura do arquivo
			if (($handle = fopen($arquivo, "r")) !== FALSE) {
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
					//Docente,Inst,PosLS,PosSS
					if($key == "Docente" && $value != ''){
						$docente = $value;
					}
					if($key == "Inst" && $value != ''){
						$inst = $value;
					}
					if($key == "PosLS" && $value != ''){
						$posLS = $value;
					}
					if($key == "PosSS" && $value != ''){
						$posSS = $value;
					}
					$i++;
				}
				// Constroi um objeto contendo os campos identificados (periodico, ano e autores)
				// E armazena na memória
				$arr[] = array(
					'Docente' => $docente,
					'Inst' => $inst,
					'PosLS' => $posLS,
					'PosSS' => $posSS
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
				$percent = 0;
				$count2 = 0;
				$sql = 'SELECT * FROM pessoa';
				$query = $mysqli->query($sql);
				$id = array();
				$maisProvavel = 0;
				$maisProvavelRow = array();
				while($row = $query->fetch_assoc()) {

					$nome = str_replace(',','',$row['nomeCompleto']);
					$compara = explode(' ',strtolower($nome));
					$docente = explode(' ',strtolower($pair['Docente']));

					$maiorPercent = 0;
					$count = 0;
					foreach($compara as $c){
						$p = 0;
						foreach($docente as $d){
							similar_text(strtolower($c), strtolower($d), $percent);
							if($percent > $p){
								$p = $percent;
							}
						}
						$count++;
						$maiorPercent += $p;
					}
					$percent = $maiorPercent/$count;

					if($percent >= 98){
						$count2++;
						echo 'Nomes parecidos ('.round($percent,1).'%),'.$pair['Docente'].','.$row['idPessoa'].','.$row['nomeCompleto'].'<br>';
						$id[] = $row['idPessoa'];
						break;
					}elseif($percent > 90 && $percent < 98){
						$count2++;
						$id[] = $row['idPessoa'];
						echo '+ Nomes parecidos ('.round($percent,1).'%),'.$pair['Docente'].','.$row['idPessoa'].','.$row['nomeCompleto'].'<br>';
					}else{
						if($maisProvavel < $percent){
							$maisProvavel = $percent;
							$maisProvavelRow = $row;
						}
					}
				}
				if($count2 == 0){
					echo 'Nome sem similares no banco verificar manualmente: '.$pair['Docente'].'<br>';
					echo 'Nome Mais Provavel ('.round($maisProvavel,1).'%),'.$pair['Docente'].','.$maisProvavelRow['idPessoa'].','.$maisProvavelRow['nomeCompleto'].'<br>';
				}else{
					if(count($id) > 1){
						echo '<br> Mais de um nome identificado para: '.$pair['Docente'].', ids: '.implode(',',$id);
					}
					$sql = 'UPDATE pessoa SET docente = TRUE, posLS = "'.addslashes($pair['PosLS']).'", posSS = "'.addslashes($pair['PosSS']).'", instituicao = "'.$pair['Inst'].'" WHERE idPessoa = '.$id[0];
					echo $sql;
					if($mysqli->query($sql)){
				 		echo 'Updated !<br>';
				 	}else{
				 		echo $mysqli->error . '<br>';
				 	}
				}
			}//Fim do loop de cada linha da tabela
		}// Fim do arquivo de cada instituicao
		$mysqli->close();
		echo "</div>";
		?>
		</div>
	</body>
</html>
