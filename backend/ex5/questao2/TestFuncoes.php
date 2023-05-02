<?php

require_once '.../ex2/index.php';
use PHPUnit\Framework\TestCase;

class TestFuncoes extends TestCase { 
    public function testMenorDivisivelRecursao() {
        $this->assertEquals(60, menorDivisivelRecursao(1));
    }

    public function testMenorDivisivelRepeticao() {
        $this->assertEquals(60, menorDivisivelRepeticao(1));
    }
}