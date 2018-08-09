
		<?php

		// LENDO ARQUIVO CSV
		$leuHeader = false;

		$arquivo =  'Finalizacao/Eventos.csv';
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
					echo 'numero de elementos na linha não batem, esperado '.$num.' encontrados '.count($data).' colunas!! :(';
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
			// idPessoa,nomeCompleto,nomeCitacao,docente,posLS,posSS,instituicao,país,Profissão
			foreach ($linha as $value) {
				$key = $keys[$i];
				if($value == "NULL" || $value == "-" || $value == ''){
					$value = 'NULL';
				}
				//Docente,Inst,PosLS,PosSS
				if($key == "idEvento" && $value != ''){
					$idEvento = $value;
				}
				if($key == "nome" && $value != ''){
					$nome = $value;
				}
				if($key == "tipo" && $value != ''){
					$tipo = $value;
				}
				if($key == "area"){
					$area = $value;
				}
				if($key == "classificacao" && $value != ''){
					$classificacao = $value;
				}
				$i++;
			}
			// Constroi um objeto contendo os campos identificados (periodico, ano e autores)
			// E armazena na memória
			$arr[] = array(
				'idEvento' 		=> $idEvento,
				'nome'			=> $nome,
				'tipo'			=> $tipo,
				'area' 			=> $area,
				'classificacao'	=> $classificacao
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

			$sql = 'UPDATE evento SET
						nome = '.checkNull($pair['nome']).',
						tipo = '.checkNull($pair['tipo']).',
						area = '.checkNull($pair['area']).',
						classificacao = '.checkNull($pair['classificacao']).'
							WHERE nome = '.checkNull($pair['nome']);

			if($mysqli->query($sql)){
		 		echo '.';
				ob_flush();
				flush();
		 	}else{
		 		echo $mysqli->error . '<br>';
		 	}
		}//Fim do loop de cada linha da tabela

		$mysqli->close();
		echo "</div>";
		?>
