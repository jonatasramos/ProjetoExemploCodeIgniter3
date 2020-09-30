<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

/**
 * Classe responsável por executar os 
 * testes do Helper [ function_helper ]
 *
 * @author Jonatas Ramos
 */
final class FunctionHelperTest extends TestCase
{

    /** @method setUp */
    public function setUp(): void
    {}

    /**
     * @method testValidaRetornoFuncaoFilter
     * 
     * Verifica o retorno da função filter
     *
     */
    public function testValidaRetornoFuncaoFilter(): void
    {
        $id = 2;
        $dados = [
            ['id' => 1, 'nome' => 'teste1'],
            ['id' => 2, 'nome' => 'teste2'],
            ['id' => 3, 'nome' => 'teste3']
        ];

        $filter = filter($dados, 'id', (string) $id);

        $this->assertEquals($filter['id'], $id);
        $this->assertArrayHasKey('nome', $filter);
    }

    /**
     * @method testValidaRetornoCalculoDePorcentagem
     * 
     * Verifica o retorno da função calPorcent
     *
     */
    public function testValidaRetornoCalculoDePorcentagem(): void
    {
        $porcentagem = 10;
        $valor = 75;
        $resposta = (($porcentagem / 100) * $valor);

        $retorno = calcPorcent($valor, $porcentagem);
        $this->assertEquals($retorno, $resposta);
    }
}
