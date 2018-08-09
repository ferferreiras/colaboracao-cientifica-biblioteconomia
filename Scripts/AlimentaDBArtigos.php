<ul>
		<?php
		set_time_limit(0);
		require_once('functions.php');

		// LENDO ARQUIVO CSV
		$leuHeader = false;

		foreach (array('FATEA.csv','FESPSP.csv','PUCCAMP.csv','UFSCAR.csv','UNESP.csv','UNIFAI.csv','USP.csv','USPRP.csv') as $arquivo) {
		//foreach (array('UFSCAR.csv','UNESP.csv') as $arquivo) {
		echo "<li>";
		echo "<h4> Processado ".$arquivo."</h4>";
			$num = 0;
			$file = array();
			// Leitura do arquivo
			if (($handle = fopen("ArtigosArs2/".$arquivo, "r")) !== FALSE) {
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
				// Armazena na memória cada campo em suas respectivas variaveis
				foreach ($linha as $value) {
					$key = $keys[$i];
					if($key == "autor" && $value != ''){
						$authors[] = $value;
					}
					if($key == "per" && $value != ''){
						$periodico = $value;
					}
					if($key == "ano" && $value != ''){
						$ano = $value;
					}
					$i++;
				}
				// Constroi um objeto contendo os campos identificados (periodico, ano e autores)
				// E armazena na memória
				$arr[] = array(
					'per' => $periodico,
					'ano' => $ano,
					'autores' => $authors
				);
			}

			// Connectando ao banco de dados
			//echo "<br> ...... Conectado ao banco de dados ...... <br><br>";
			$mysqli = new mysqli("localhost", "root", "m230889m", "MFF-Scripts");
			$mysqli->set_charset("utf8");
			if ($mysqli->connect_errno) {
				$err = "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error ;
				var_dump($err);
				die();
			}

			// para cada linha já estruturada
			foreach($arr as $pair){
				$periodico = addslashes($pair['per'])	;
				$ano = intval($pair['ano'])	;
				$periodico = verificaSubstituicao($periodico,$mantido,$substituido);
				//Antes de inserir o periodico, busca no banco por um com o nome igual ou semelhante
				$res = buscaSemelhante('periodico', 'nome', $periodico,'idPeriodico');
				$periodicoID = null;
				if($res == false){
					if ($mysqli->query('INSERT INTO periodico (nome) VALUES ("'.$periodico.'")')) {
						$periodicoID = $mysqli->insert_id;
					}else{
						echo 'Nao foi possivel adicionar o evento ('.$periodico.'), saindo com erro : '.$mysqli->error.'<br><br>';
					}
				}elseif(is_int($res)){
					$periodicoID = $res;
				}else{
					echo 'erro nao identificado<br><br>';
					var_dump($res);
					die();
				}

				// se foi possivel identificar o periodico (inserir ou recuperar ele do banco) podemos prosseguir
				if($periodicoID != null){
					$artigoID = null;
					// Inserindo artigo pois cada linha de arr é um artigo, não tempos nome do artigo, temos apenas a informação do periódico em que foi publicado
					if ($mysqli->query('INSERT INTO artigoARS (idPeriodico) VALUES ("'.$periodicoID.'")')) {
						$artigoID = $mysqli->insert_id;
					}else{
						echo 'Nao foi possivel adicionar o artigo com o periodico ('.$periodicoID.'), saindo com erro : '.$mysqli->error.'<br><br>';
					}
					// Para cada autor o processo é o mesmo
					foreach ($pair['autores'] as $autor){
						$pessoaID = null;
						$autor = verificaSubstituicao($autor,$mantido,$substituido);
						// Busca por nome semenhante ou igual no banco
						$res = buscaSemelhante('pessoa', 'nomeCompleto', $autor,'idPessoa');

						//Se não econtrou o nome igual ou semelhante
						if($res == false){
							// Adiciona no banco
							if ($mysqli->query('INSERT INTO pessoa (nomeCompleto) VALUES ("'.$autor.'")')) {
								$pessoaID = $mysqli->insert_id;
							}else{
								echo 'Nao foi possivel adicionar a pessoa ('.$autor.') do arquivo , saindo com erro : '.$mysqli->error.'<br><br>';
								var_dump($arquivo);
								var_dump($pair['autores'] );
                                var_dump($periodico);
							}
						// Se encontrou coleta a referencia para a pessoa
						}elseif(is_int($res)){
							$pessoaID = $res;
						}else{
							echo 'erro nao identificado<br><br>';
							var_dump($res);
						}
						// Se foi possivel identificar a pessoa (inserir ou recuperar ela do banco) podemos adicionar a relação entre a pessoa e o artigo
						if($pessoaID != null && $artigoID != null){
							$mysqli->query('INSERT INTO pessoaArtigo (idArtigo,idPessoa,ano) VALUES ('.$artigoID.','.$pessoaID.','.$ano.')');
						}else{
							echo 'Nao foi possivel adicionar a pessoaArtigo ('.$artigoID.','.$pessoaID.','.$ano.') do arquivo , saindo com erro : '.$mysqli->error.'<br><br>';
							var_dump($arquivo);
							var_dump($pair['autores'] );
							var_dump($periodico);
						}
					}// Fim do loop de autores
				}
				ob_flush();
	            flush();
			}//Fim do loop de cada linha da tabela
			echo "</li>";
			ob_flush();
            flush();
		}// Fim do arquivo de cada instituicao
		$mysqli->close();

		?>
</ul>
