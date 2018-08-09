<?php
set_time_limit(0);
// ####################################### correcao de nomes ###########################################
$num = 0;
if (($handle = fopen("CorrecaoDeNomes.csv", "r")) !== FALSE) {
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
$mantido = array();
$substituido = array();
// Para cada linha da tabela
foreach ($file as $linha) {
    $i = 0;
    // Armazena na memória cada campo em suas respectivas variaveis
    foreach ($linha as $value) {
        $key = $keys[$i];
        if($key == "Substituido" && $value != ''){
            $substituido[] = $value;
        }
        if($key == "Mantido" && $value != ''){
            $mantido[] = $value;
        }
        $i++;
    }
}
//var_dump($mantido);
//var_dump($substituido);
//die();
function verificaSubstituicao($nome,$mantido,$substituido){
    $nome = trim($nome);
    if(in_array($nome,$mantido)){
        return $nome;
    }else{
        if(in_array($nome,$substituido)){
            $keys = array_keys($substituido,$nome);
            return $mantido[$keys[0]];
        }
    }
    return $nome;
}
//########################################################################################################
function buscaSemelhante($tabela,$coluna,$valor,$idDeRetorno){
    // CONNECTANDO AO BANCO LOCAL
    $mysqli2 = new mysqli("localhost", "root", "m230889m", "MFF-Scripts");
    if ($mysqli2->connect_errno) {
        $err = "Failed to connect to MySQL: (" . $mysqli2->connect_errno . ") " . $mysqli2->connect_error ;
        var_dump($err);
        die();
    }
    $mysqli2->set_charset("utf8");
    $query = $mysqli2->query('SELECT * FROM '.$tabela);
    $ret = false;
    $retAlmost = false;
    while($row = $query->fetch_assoc()) {
        similar_text($row[$coluna], $valor, $percent);
        if($percent >= 90){
            $ret = intval($row[$idDeRetorno]);
            break;
        }elseif($percent > 80 && $percent < 90){
            $retAlmost = $row;
        }
    }
    $mysqli2->close();

    if($ret == false && $retAlmost != false){
        echo 'nomes parecidos porém mantendo como diferentes<br>';
        print_r('Nome1: '.$retAlmost[$coluna].' Nome2: '.$valor);
        print '<br>';
        $ret = false;
    }
    return $ret	;
}
function checkNull($string){
    if($string != "NULL"){
        $string = "\"".addslashes($string)."\"";
    }
    return $string;
}

?>
