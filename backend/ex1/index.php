<?php

include './funcionarios.php';

include '../assets/helpers.php';

// a) Uma função que retorne o nome do funcionário mais jovem;
function funcionarioMaisJovem($funcionarios) {
    $idadeMaisJovem = PHP_INT_MAX;
    $nomeMaisJovem = '';
  
    foreach ($funcionarios as $funcionario) {
      if ($funcionario['idade'] < $idadeMaisJovem) {
        $idadeMaisJovem = $funcionario['idade'];
        $nomeMaisJovem = $funcionario['nome'];
      }
    }
    
    return $nomeMaisJovem;
}

echo "a) O funcionário(a) mais novo é: " . funcionarioMaisJovem($funcionarios) . "<br />";

// b) Uma função que gere um novo array agrupando os funcionarios por organizacao (organização como index);

function fucionariosPorOrganização($funcionarios) {
  $organizacoes = array();
  
  foreach($funcionarios as $funcionario) {
    $organizacao = $funcionario['organizacao'];
    
    if(!array_key_exists($organizacao, $organizacoes)) {
      $organizacoes[$organizacao] = array();
    }
    
    $organizacoes[$organizacao][] = $funcionario;
    ksort($organizacoes);
  }
  
  return $organizacoes;
}

echo "<br />" . "b)";
print_r2(fucionariosPorOrganização($funcionarios));


// c) Uma função que retorne a média de salários;
function mediaSalarial($funcionarios) {
  $totalSalarios = 0;
  $numeroFuncionarios = count($funcionarios);

  foreach ($funcionarios as $funcionario) {
    $totalSalarios += $funcionario['salario'];
  }

  return $totalSalarios / $numeroFuncionarios;
}   

echo "c) A média salarial dos funcionários é : R$" .  mediaSalarial($funcionarios) . ",00" . "<br />";

// d) Uma função que ordene os funcionarios pelo nome;
function ordenarPorNome($funcionarios) {
    $nomes = array_column($funcionarios, 'nome');
    array_multisort($nomes, SORT_ASC, $funcionarios);
  
    return $funcionarios;
}

echo "<br />" . "d)";
print_r2(ordenarPorNome($funcionarios));
