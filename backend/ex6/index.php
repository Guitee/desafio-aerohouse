<?php

include '../assets/helpers.php';

function salvarTechs($techs) {
    $pessoa = new StdClass();
    $pessoa->emails="Emails";
    $pessoa->nome = $nome = "Meu nome"; 
    $pessoa->organizacao = "Nova Organização";
    $pessoa->telefone = "Telefones";
    $pessoa->techs = array_fill(0, 4, "None");
         
    foreach($techs as $i => $tech) {
        if($i >= count($pessoa->techs))
            return;
        $pessoa->techs[$i] = $tech;
    }
       
    return $pessoa->techs;
}

$techs = [
    "Js",
    "Php",
    "C#",
    "NodeJs",
];

print_r2(salvarTechs($techs));