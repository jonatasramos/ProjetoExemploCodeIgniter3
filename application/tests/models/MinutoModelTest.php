<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

/**
 * Classe responsável por executar os 
 * testes do Model [ MinutoModel ]
 *
 * @author Jonatas Ramos
 */
final class MinutoModelTest extends TestCase
{
    /**
     * @var Object $minutoModel
     */
    private $MinutoModel;

    /**
     * @var Object $CI
     */
    private $CI;

    /** @method setUp */
    public function setUp(): void
    {
        $this->CI =& get_instance();
        $this->CI->load->model('MinutoModel');
        
        $this->MinutoModel = new MinutoModel();
    }

    /**
     * @method testChecarSeClasseTemAtributoId
     * 
     * Verifica se Classe MinutoModel tem o atributo id
     *
     */
    public function testChecarSeClasseTemAtributoId(): void
    {
        $this->assertClassHasAttribute('id', 'MinutoModel');
    }

    /**
     * @method testChecarSeClasseTemAtributoMinuto
     * 
     * Verifica se Classe MinutoModel tem o atributo Minuto
     *
     */
    public function testChecarSeClasseTemAtributoMinuto(): void
    {
        $this->assertClassHasAttribute('minuto', 'MinutoModel');
    }

    /**
     * @method testChecarSeClasseTemAtributoDataCadastro
     * 
     * Verifica se Classe MinutoModel tem o atributo dataCadastro
     *
     */
    public function testChecarSeClasseTemAtributoDataCadastro(): void
    {
        $this->assertClassHasAttribute('dataCadastro', 'MinutoModel');
    }

    /**
     * @method testRetornaValorMetodoGetterId
     * 
     * Testa o retorno da função getter do atributo id
     * 
     * @param boolean
     */
    public function testRetornarValorMetodoGetterId(): bool
    {
        $id = 1;

        $this->MinutoModel->setId($id);
        $this->assertEquals($id, $this->MinutoModel->getId());

        return true;
    }


     /**
     * @method testRetornaValorMetodoGetterMinuto
     * 
     * Testa o retorno da função getter do atributo Minuto
     * 
     * @param boolean
     */
    public function testRetornarValorMetodoGetterMinuto(): bool
    {
        $minuto = 16;

        $this->MinutoModel->setMinuto($minuto);
        $this->assertEquals($minuto, $this->MinutoModel->getMinuto());

        return true;
    }

    /**
     * @method testRetornaValorMetodoGetterDataCadastro
     * 
     * Testa o retorno da função getter do atributo dataCadastro
     * 
     * @param boolean
     */
    public function testRetornarValorMetodoGetterDataCadastro(): bool
    {
        $data = date('Y-m-d H:i:m');

        $this->MinutoModel->setDataCadastro($data);       
        $this->assertEquals($data, $this->MinutoModel->getDataCadastro());

        return true;
    }

    /**
     * @method testCadastrarRegistroTabelaMinuto
     * 
     * Testa o cadastro na tabela Minuto
     * 
     * @param int
     */
    public function testCadastrarRegistroTabelaMinuto(): int
    {
        $minuto = 13;
        $data_cadastro = date('Y-m-d H:i:m');

        $this->MinutoModel->setMinuto($minuto);
        $this->MinutoModel->setDataCadastro($data_cadastro);

        $minuto_id = $this->MinutoModel->create();
        $this->assertTrue($minuto_id > 0);

        return $minuto_id;
    }

    /**
     * @method testAtualizarRegistroTabelaMinuto
     * 
     * Testa atualizar registros na tabela minuto
     * 
     * @param Boolean
     */
    public function testAtualizarRegistroTabelaMinuto(): bool
    {   
        $id     = 10;
        $minuto = 30;

        $this->MinutoModel->setId($id);
        $this->MinutoModel->setMinuto($minuto);

        $res = $this->MinutoModel->update([
            'min_minuto' => $this->MinutoModel->getMinuto()
        ]);
        $this->assertTrue($res);

        return $res;
    }

    /**
     * @method testDeletarRegistroTabelaMinuto
     * 
     * Testa o delete na tabela Minuto
     * 
     * @param boolean
     */
    public function testDeletarRegistroTabelaMinuto(): bool
    {
        $id = 10;
        $this->MinutoModel->setid($id);
        
        $res = $this->MinutoModel->delete();
        $this->assertTrue($res);

        return $res;
    }

    /**
     * @method testRetornarDadosTabelaMinuto
     * 
     * Testa o retorno de todos os dados da tabela Minuto
     * 
     * @param array
     */
    public function testRetornarDadosTabelaMinuto(): array
    {
        $minutos = $this->MinutoModel->read();
        $this->assertNotNull($minutos);

        return $minutos;
    }

    /**
     * @method testRetornarUmRegistroTabelaMinuto
     * 
     * Testa o retorno de um registro da tabela Minuto
     * 
     * @param array
     */
    public function testRetornarUmRegistroTabelaMinuto(): array
    {
        $id = 1;

        $this->MinutoModel->setId($id);
        $minuto = $this->MinutoModel->read();
        $this->assertNotNull($minuto);

        return $minuto;
    }
}
