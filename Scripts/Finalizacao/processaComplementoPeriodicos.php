<?php
// LENDO ARQUIVO CSV
$leuHeader = false;

$arquivo =  'Finalizacao/Periodicos.csv';
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
		if($key == "nome" && $value != ''){
			$nome = $value;
		}
		if($key == "avaliacao" && $value != ''){
			$avaliacao = $value;
		}
		if($key == "webqualis"){
			$webqualis = $value;
		}
		if($key == "classificacao" && $value != ''){
			$classificacao = $value;
		}
		$i++;
	}
	// Constroi um objeto contendo os campos identificados (periodico, ano e autores)
	// E armazena na memória
	$arr[] = array(
		'nome'	=> $nome,
		'avaliacao'	=> $avaliacao,
		'webqualis' 		=> $webqualis,
		'classificacao'		=> $classificacao,
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
	$sql = 'UPDATE periodico SET
				avaliacao = '.checkNull($pair['avaliacao']).',
				webqualis = '.checkNull($pair['webqualis']).',
				classificacao = '.checkNull($pair['classificacao']).'
					WHERE nome = "'.$pair['nome'].'"';
	$result = $mysqli->query($sql);
	if($result){
 		echo $result." - ";
		ob_flush();
		flush();
 	}else{
 		echo $sql . '<br>';
		var_dump($pair['nome']);
		echo "<br><br>";
			echo $mysqli->error . '<br>';
 	}
}//Fim do loop de cada linha da tabela

$mysqli->close();
?>
