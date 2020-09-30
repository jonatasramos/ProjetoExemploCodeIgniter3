<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

/**
 * Classe responsável por executar os 
 * testes do Model [ TarifaModel ]
 *
 * @author Jonatas Ramos
 */
final class TarifaModelTest extends TestCase
{
    /**
     * @var Object $tarifaModel
     */
    private $TarifaModel;

    /**
     * @var Object $CI
     */
    private $CI;

    /** @method setUp */
    public function setUp(): void
    {
        $this->CI =& get_instance();
        $this->CI->load->model('TarifaModel');
        
        $this->TarifaModel = new TarifaModel();
    }

    /**
     * @method testChecarSeClasseTemAtributoId
     * 
     * Verifica se Classe tarifaModel tem o atributo id
     *
     */
    public function testChecarSeClasseTemAtributoId(): void
    {
        $this->assertClassHasAttribute('id', 'TarifaModel');
    }

    /**
     * @method testChecarSeClasseTemAtributoTarifa
     * 
     * Verifica se Classe TarifaModel tem o atributo tarifa
     *
     */
    public function testChecarSeClasseTemAtributoTarifa(): void
    {
        $this->assertClassHasAttribute('tarifa', 'TarifaModel');
    }

    /**
     * @method testChecarSeClasseTemAtributoDataCadastro
     * 
     * Verifica se Classe TarifaModel tem o atributo dataCadastro
     *
     */
    public function testChecarSeClasseTemAtributoDataCadastro(): void
    {
        $this->assertClassHasAttribute('dataCadastro', 'TarifaModel');
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

        $this->TarifaModel->setId($id);
        $this->assertEquals($id, $this->TarifaModel->getId());

        return true;
    }


     /**
     * @method testRetornaValorMetodoGetterTarifa
     * 
     * Testa o retorno da função getter do atributo tarifa
     * 
     * @param boolean
     */
    public function testRetornarValorMetodoGetterTarifa(): bool
    {
        $tarifa = 1.61;

        $this->TarifaModel->setTarifa($tarifa);
        $this->assertEquals($tarifa, $this->TarifaModel->getTarifa());

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

        $this->TarifaModel->setDataCadastro($data);       
        $this->assertEquals($data, $this->TarifaModel->getDataCadastro());

        return true;
    }

    /**
     * @method testCadastrarRegistroTabelaTarifa
     * 
     * Testa o cadastro na tabela tarifa
     * 
     * @param int
     */
    public function testCadastrarRegistroTabelaTarifa(): int
    {
        $tarifa = 1.6;
        $data_cadastro = date('Y-m-d H:i:m');

        $this->TarifaModel->setTarifa($tarifa);
        $this->TarifaModel->setDataCadastro($data_cadastro);

        $tarifa_id = $this->TarifaModel->create();
        $this->assertTrue($tarifa_id > 0);

        return $tarifa_id;
    }

    /**
     * @method testAtualizarRegistroTabelaTarifa
     * 
     * Testa atualizar registros na tabela tarifa
     * 
     * @param Boolean
     */
    public function testAtualizarRegistroTabelaTarifa(): bool
    {   
        $id = 1;
        $tarifa = 0.90;

        $this->TarifaModel->setId($id);
        $this->TarifaModel->setTarifa($tarifa);

        $res = $this->TarifaModel->update([
            'tar_tarifa' => $this->TarifaModel->getTarifa()
        ]);
        $this->assertTrue($res);

        return $res;
    }

    /**
     * @method testDeletarRegistroTabelaTarifa
     * 
     * Testa o delete na tabela tarifa
     * 
     * @param boolean
     */
    public function testDeletarRegistroTabelaTarifa(): bool
    {
        $id = 1312;
        $this->TarifaModel->setid($id);
        
        $res = $this->TarifaModel->delete();
        $this->assertTrue($res);

        return $res;
    }

    /**
     * @method testRetornarDadosTabelaTarifa
     * 
     * Testa o retorno de todos os dados da tabela tarifa
     * 
     * @param array
     */
    public function testRetornarDadosTabelaTarifa(): array
    {
        $tarifas = $this->TarifaModel->read();
        $this->assertNotNull($tarifas);

        return $tarifas;
    }

    /**
     * @method testRetornarUmRegistroTabelaTarifa
     * 
     * Testa o retorno de um registro da tabela tarifa
     * 
     * @param array
     */
    public function testRetornarUmRegistroTabelaTarifa(): array
    {
        $id = 1;

        $this->TarifaModel->setId($id);
        $tarifa = $this->TarifaModel->read();
        $this->assertNotNull($tarifa);

        return $tarifa;
    }
}
