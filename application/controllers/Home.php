<?php

declare(strict_types=1);

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller principal do sistema
 * 
 * @author Jonatas Ramos 
 */

class Home extends CI_Controller
{
	/**
	 * @var Array
	 */
	public $data = [];

	/** @method __construct */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CodigoModel');
		$this->load->model('TarifaModel');
		$this->load->model('MinutoModel');
		$this->load->model('CodigoTarifaModel');
		$this->data['codigo_tarifa'] = $this->CodigoTarifaModel->read();
	}

	/**
	 * @method index
	 * 
	 * Carrega a view principal do sistema
	 */
	public function index(): void
	{
		$this->data['minutos'] = $this->MinutoModel->read();
		$this->data['tarifas'] = $this->TarifaModel->read();

		$this->load->view('system/base/header');
		$this->load->view('system/home', $this->data);
		$this->load->view('system/base/footer');
	}

	/**
	 * @method calculaValor
	 * 
	 * Executa o calculo de minutos
	 * 
	 * @param Int $_POST['origem_destino'] Id da tabela pivo contêndo
	 * os DDDs oriem e destino 
	 * @param Int $_POST['plano'] Valor em minutos do plano selecionado
	 * @param Int $_POST['minuto'] Quantidade de minutos informados
	 */
	public function calculaValor(): void
	{
		try {
			$id_tarifa_codigo = $this->input->post("origem_destino", true);
			$plano  = (int) $this->input->post("plano", true);
			$minuto = (int) $this->input->post("minuto", true);

			$vlr_porcentagem = 10;
			if (isset($id_tarifa_codigo) && isset($plano) && isset($minuto)) {
				/**
				 * Filtra o objeto correspondente ao id selecionado
				 */
				$codigo_tarifa = filter($this->data['codigo_tarifa'], 'id', (string) $id_tarifa_codigo);

				/**
				 * Extrai os minutos exedentes correspondentes ao plano
				 */
				$vlr_minuto = ($minuto > $plano ? ($minuto - $plano) : 0);

				/**
				 * Calcula o valor dos minutos com relaao á tarifa do plano selecionado
				 */
				$vlr_tarifaMinuto = ($codigo_tarifa['tarifa'] * $vlr_minuto);

				/**
				 * Faz o calculo com o plano Fale Mais
				 */
				$vlr_cFaleMais = ($vlr_tarifaMinuto + calcPorcent($vlr_tarifaMinuto, $vlr_porcentagem));

				/**
				 * Faz o calculo sem o plano Fale Mais
				 */
				$vlr_sFaleMais =  ($codigo_tarifa['tarifa'] * $minuto);

				/**
				 * Monta o resultado
				 */
				$result = [
					"codigo_origem"  => $codigo_tarifa["origem"],
					"codigo_destino" => $codigo_tarifa["destino"],
					"tempo" => $minuto,
					"cFaleMais" => number_format($vlr_cFaleMais, 2, ",", "."),
					"sFaleMais" => number_format($vlr_sFaleMais, 2, ",", "."),
					"plano" => $plano
				];

				echo msg_success($result);
			}
		} catch (\Throwable $th) {
			msg_error('Ocorreu um erro tente novamente!!');
		}
	}
}
