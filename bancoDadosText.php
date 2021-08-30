<?php



 

function save($dados){
    $arquivo = fopen('db.csv','a+'); 
    if ($arquivo == false){
       return false;
    }
    fwrite($arquivo, $dados);
    fclose($arquivo);
    return true;
}
 




?>