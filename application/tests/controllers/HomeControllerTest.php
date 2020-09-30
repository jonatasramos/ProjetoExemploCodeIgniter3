<?php

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \GuzzleHttp\Client;

/**
 * Classe responsável por executar os 
 * testes do Controller [ Home ]
 *
 * @author Jonatas Ramos
 */
final class HomeTest extends TestCase
{
    /**
     * @var Object $Http
     */
    private $Http;

    /** @method setUp */
    public function setUp(): void
    {
        $this->Http = new Client([
            'base_uri' => 'http://localhost:8080'
        ]);
    }

    /**
     * @method testTestarCalculoDoValorDeLigacao
     * 
     * Verifica o retorno do calculo do valor da ligação
     *
     */
    public function testTestarCalculoDoValorDeLigacao(): void
    {
        $response = $this->Http->post('/CalculaValor', [
            'form_params' => [
                'origem_destino' => 3,
                'plano' => 60,
                'minuto' => 80
            ]
        ]);
        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode((string) $response->getBody(), true);

        $this->assertArrayHasKey('codigo_origem', $data['result']);
        $this->assertArrayHasKey('codigo_destino', $data['result']);
        $this->assertArrayHasKey('tempo', $data['result']);
        $this->assertArrayHasKey('cFaleMais', $data['result']);
        $this->assertArrayHasKey('sFaleMais', $data['result']);
        $this->assertArrayHasKey('plano', $data['result']);
    }
}
