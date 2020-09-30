<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

/**
 * Classe responsável por executar os 
 * testes do Model [ CodigoModel ]
 *
 * @author Jonatas Ramos
 */
final class CodigoModelTest extends TestCase
{
    /**
     * @var Object $CodigoModel
     */
    private $CodigoModel;

    /**
     * @var Object $CI
     */
    private $CI;

    /** @method setUp */
    public function setUp(): void
    {
        $this->CI =& get_instance();
        $this->CI->load->model('CodigoModel');
        
        $this->CodigoModel = new CodigoModel();
    }

    /**
     * @method testChecarSeClasseTemAtributoId
     * 
     * Verifica se Classe CodigoModel tem o atributo id
     *
     */
    public function testChecarSeClasseTemAtributoId(): void
    {
        $this->assertClassHasAttribute('id', 'CodigoModel');
    }

    /**
     * @method testChecarSeClasseTemAtributoCodigo
     * 
     * Verifica se Classe CodigoModel tem o atributo codigo
     *
     */
    public function testChecarSeClasseTemAtributoCodigo(): void
    {
        $this->assertClassHasAttribute('codigo', 'CodigoModel');
    }

    /**
     * @method testChecarSeClasseTemAtributoDataCadastro
     * 
     * Verifica se Classe CodigoModel tem o atributo dataCadastro
     *
     */
    public function testChecarSeClasseTemAtributoDataCadastro(): void
    {
        $this->assertClassHasAttribute('dataCadastro', 'CodigoModel');
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

        $this->CodigoModel->setId($id);
        $this->assertEquals($id, $this->CodigoModel->getId());

        return true;
    }

     /**
     * @method testRetornaValorMetodoGetterCodigo
     * 
     * Testa o retorno da função getter do atributo codigo
     * 
     * @param boolean
     */
    public function testRetornarValorMetodoGetterCodigo(): bool
    {
        $codigo = 16;

        $this->CodigoModel->setCodigo($codigo);
        $this->assertEquals($codigo, $this->CodigoModel->getCodigo());

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

        $this->CodigoModel->setDataCadastro($data);       
        $this->assertEquals($data, $this->CodigoModel->getDataCadastro());

        return true;
    }

    /**
     * @method testCadastrarRegistroTabelaCodigo
     * 
     * Testa o cadastro na tabela codigo
     * 
     * @param int
     */
    public function testCadastrarRegistroTabelaCodigo(): int
    {
        $this->CodigoModel->setCodigo(13);
        $this->CodigoModel->setDataCadastro(date('Y-m-d H:i:m'));

        $codigo_id = $this->CodigoModel->create();
        $this->assertTrue($codigo_id > 0);

        return $codigo_id;
    }

    /**
     * @method testAtualizarRegistroTabelaCodigo
     * 
     * Testa atualizar registros na tabela codigo
     * 
     * @param Boolean
     */
    public function testAtualizarRegistroTabelaCodigo(): bool
    {   
        $id = 1;
        $codigo = 11;

        $this->CodigoModel->setId($id);
        $this->CodigoModel->setCodigo($codigo);

        $res = $this->CodigoModel->update([
            'cod_codigo' => $this->CodigoModel->getCodigo()
        ]);

        $this->assertTrue($res);

        return $res;
    }

    /**
     * @method testDeletarRegistroTabelaCodigo
     * 
     * Testa o delete na tabela codigo
     * 
     * @param boolean
     */
    public function testDeletarRegistroTabelaCodigo(): bool
    {
        $id = 8;
        $this->CodigoModel->setid($id);
        
        $res = $this->CodigoModel->delete();
        $this->assertTrue($res);

        return $res;
    }

    /**
     * @method testRetornarDadosTabelaCodigo
     * 
     * Testa o retorno de todos os dados da tabela codigo
     * 
     * @param array
     */
    public function testRetornarDadosTabelaCodigo(): array
    {
        $codigos = $this->CodigoModel->read();
        $this->assertNotNull($codigos);

        return $codigos;
    }

    /**
     * @method testRetornarUmRegistroTabelaCodigo
     * 
     * Testa o retorno de um registro da tabela codigo
     * 
     * @param array
     */
    public function testRetornarUmRegistroTabelaCodigo(): array
    {
        $id = 1;

        $this->CodigoModel->setId($id);
        $codigo = $this->CodigoModel->read();
        $this->assertNotNull($codigo);

        return $codigo;
    }
}
