<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "agenda");
define("DB_PORT", 3306);


/* 
abre uma conecxao com o banco de dados e retoma um objeto de conexao
@return mysqli - retoma o objeto de conexao mysqli.
*/
function abrirbanco(){
    $conexaoComBanco = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    //verificar se ocorreu algum erro durante a conexao
if($conexaoComBanco->connect_error){
die("Falha na conexao" . $conexaoComBanco->connect_error );
}
    return $conexaoComBanco; 
}
/*
*Fecha a conexao com banco de dados
*/
function fecharBanco($conexaoComBanco){
    $conexaoComBanco->close();
}

?> 