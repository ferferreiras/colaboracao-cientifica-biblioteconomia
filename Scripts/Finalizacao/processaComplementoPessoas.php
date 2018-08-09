
		<?php

		// LENDO ARQUIVO CSV
		$leuHeader = false;

		$arquivo =  'Finalizacao/Pessoas.csv';
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
				if($key == "idPessoa" && $value != ''){
					$idpessoa = $value;
				}
				if($key == "nomeCompleto" && $value != ''){
					$nomeCompleto = $value;
				}
				if($key == "nomeCitacao" && $value != ''){
					$nomeCitacao = $value;
				}
				if($key == "docente"){
					$docente = $value;
				}
				if($key == "posLS" && $value != ''){
					$posLS = $value;
				}
				if($key == "posSS" && $value != ''){
					$posSS = $value;
				}
				if($key == "instituicao" && $value != ''){
					$instituicao = $value;
				}
				if($key == "pais" && $value != ''){
					$pais = $value;
				}
				if($key == "profissao" && $value != ''){
					$profissao = $value;
				}
				$i++;
			}
			// Constroi um objeto contendo os campos identificados (periodico, ano e autores)
			// E armazena na memória
			$arr[] = array(
				'idPessoa' 		=> $idpessoa,
				'nomeCompleto'	=> $nomeCompleto,
				'nomeCitacao'	=> $nomeCitacao,
				'docente' 		=> $docente,
				'posLS'			=> $posLS,
				'posSS'			=> $posSS,
				'instituicao'	=> $instituicao,
				'pais'			=> $pais,
				'profissao'		=> $profissao,

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


		// para cada linha já estruturada
		foreach($arr as $pair){

			$sql = 'UPDATE pessoa SET
						nomeCompleto = "'.$pair['nomeCompleto'].'",
						nomeCitacao = '.checkNull($pair['nomeCitacao']).',
						docente = '.checkNull($pair['docente']).',
						posLS = '.checkNull($pair['posLS']).',
						posSS = '.checkNull($pair['posSS']).',
						instituicao = '.checkNull($pair['instituicao']).',
						pais = '.checkNull($pair['pais']).',
						profissao = '.checkNull($pair['profissao']).'
							WHERE nomeCompleto = '.checkNull($pair['nomeCompleto']);

			if($mysqli->query($sql)){
				echo '. ';
				ob_flush();
				flush();
		 	}else{
		 		echo $mysqli->error . '<br>';
		 	}
		}//Fim do loop de cada linha da tabela

		$mysqli->close();

		?>
