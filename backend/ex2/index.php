<?php

/* 
Funções recursivas
 2)
    a)Crie uma função para imprimir em tela o menor número inteiro divisível 
     por 4, 5 e 6 ao mesmo tempo, utilizando as seguintes técnicas: 
      - Recurção
      - Com laços de repetição.
    b) Qual técnica gastária mais desempenho da máquina? 
*/

function menorDivisivelRecursao($n) {
  if($n % 4 == 0 && $n % 5 == 0 && $n % 6 == 0)
    return $n; 
  else{
    
    return menorDivisivelRecursao($n + 1);
  }        
 
}
  
echo "<br/ >" . menorDivisivelRecursao(1);

function menorDivisivelRepeticao($n) {
    do {
      if($n % 4 == 0 && $n % 5 == 0 && $n % 6 == 0)
        return $n;
      
      $n++;
      
    } while( true ); 
    
  }
  
echo "<br/ >" . menorDivisivelRepeticao(1);

echo "<br/ >" . "O menor número inteiro divisível por 4,5,6 ao mesmo tempo é o número 60.\n A técnica que gasta mais desempenho da máquina é com laços de repetição. Isso acontece
pois essa técnica repete o número de chamadas até encontrar o resultado, ou seja, ela irá repetir 60 vezes até parar o laço de repetição. Consequentemente consome mais memória e
tempo de execução mesmo que seja mínimo. Já a técnica de recursão a executa 59 vezes, sendo assim melhor que a outra técnica.";  