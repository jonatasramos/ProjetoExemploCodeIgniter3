<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;

/**
 * Classe responsável por executar os 
 * testes do Model [ CodigoM ]
 *
 * @author Jonatas Ramos
 */
final class CodigoTarifaModelTest extends TestCase
{
    /**
     * @var Object $CodigoTarifaModel
     */
    private $CodigoTarifaModel;

    /**
     * @var Object $CI
     */
    private $CI;

    /** @method setUp */
    public function setUp(): void
    {
        $this->CI =& get_instance();
        $this->CI->load->model('CodigoTarifaModel');
        
        $this->CodigoTarifaModel = new CodigoTarifaModel();
    }

    /**
     * @method testRetornarDadosTabelaPivoEntreCodigoETarifa_Tarifa
     * 
     * Testa o retorno de todos os dados da tabela codigo_tarifa
     * 
     * @param array
     */
    public function testRetornarDadosTabelaPivoEntreCodigoETarifa(): array
    {
        $codigo_tarifa = $this->CodigoTarifaModel->read();
        $this->assertNotNull($codigo_tarifa);
        
        return $codigo_tarifa;
    }
}