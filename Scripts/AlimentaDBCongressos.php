<ul>
		<?php
		set_time_limit(0);
		require_once('functions.php');

		// LENDO ARQUIVO CSV
		$leuHeader = false;

		foreach (array('FATEA.csv','FESPSP.csv','PUCCAMP.csv','UFSCAR.csv','UNESP.csv','UNIFAI.csv','USP.csv','USPRP.csv') as $arquivo) {
			echo "<li>";
			echo "<h4> Processado ".$arquivo."</h4>";
		//foreach (array('UFSCAR.csv','UNESP.csv') as $arquivo) {
			$num = 0;
			$file = array();
			// Leitura do arquivo
			if (($handle = fopen("CongressosARS2/".$arquivo, "r")) !== FALSE) {
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
				$evento = null;
				$ano = null;
				// Armazena na memória cada campo em suas respectivas variaveis
				foreach ($linha as $value) {
					$key = $keys[$i];
					if($key == "Autor" && $value != ''){
						$authors[] = $value;
					}
					if($key == "Evento" && $value != ''){
						$evento = $value;
					}
					if($key == "Ano" && $value != ''){
						$ano = $value;
					}
					$i++;
				}
				// Constroi um objeto contendo os campos identificados (periodico, ano e autores)
				// E armazena na memória
				$arr[] = array(
					'evento' => $evento,
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
				$evento = addslashes($pair['evento'])	;
				$ano = intval($pair['ano'])	;
				$evento = verificaSubstituicao($evento,$mantido,$substituido);
				//Antes de inserir o periodico, busca no banco por um com o nome igual ou semelhante
				$res = buscaSemelhante('evento', 'nome', $evento,'idEvento');
				$eventoID = null;
				if($res == false){
					if ($mysqli->query('INSERT INTO evento (nome) VALUES ("'.$evento.'")')) {
						$eventoID = $mysqli->insert_id;
					}else{
						echo 'Nao foi possivel adicionar o evento ('.$evento.'), saindo com erro : '.$mysqli->error.'<br><br>';
					}
				}elseif(is_int($res)){
					$eventoID = $res;
				}else{
					echo 'erro nao identificado<br><br>';
					var_dump($res);
					die();
				}

				// se foi possivel identificar o periodico (inserir ou recuperar ele do banco) podemos prosseguir
				if($eventoID != null){
					$congressoID = null;
					// Inserindo artigo pois cada linha de arr é um artigo, não tempos nome do artigo, temos apenas a informação do periódico em que foi publicado
					if ($mysqli->query('INSERT INTO anaisCongresso (idEvento,ano) VALUES ("'.$eventoID.'",'.$ano.')')) {
						$anaisID = $mysqli->insert_id;
					}else{
						echo 'Nao foi possivel adicionar o artigo com o periodico ('.$eventoID.'), saindo com erro : '.$mysqli->error.'<br><br>';
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
								echo 'Nao foi possivel adicionar a pessoa ('.$autor.'), saindo com erro : '.$mysqli->error.'<br><br>';
							}
						// Se encontrou coleta a referencia para a pessoa
						}elseif(is_int($res)){
							$pessoaID = $res;
						}else{
							echo 'erro nao identificado<br><br>';
							var_dump($res);
						}

						// Se foi possivel identificar a pessoa (inserir ou recuperar ela do banco) podemos adicionar a relação entre a pessoa e o artigo
						if($pessoaID != null && $anaisID != null){
							$mysqli->query('INSERT INTO pessoaCongresso (idAnais,idPessoa) VALUES ('.$anaisID.','.$pessoaID.')');
						}else{
							echo 'Nao foi possivel adicionar a pessoaCongresso ('.$anaisID.','.$pessoaID.'), saindo com erro : '.$mysqli->error.'<br><br>';
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
