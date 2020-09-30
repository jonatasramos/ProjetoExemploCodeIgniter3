<?php

declare(strict_types=1);

/**
 * Modelo de integração com a tabela tarifa
 *
 * @author Jonatas Ramos
 */
class TarifaModel extends CI_Model
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var float $tarifa
     */
    private $tarifa;

    /**
     * @var string $data_cadastro
     */
    private $dataCadastro;


    /** @method __construct */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Getters, Setters [ id ] 
     * 
     */

    /**
     * @method getId
     * 
     * Obtêm o valor de id
     *
     * @return  int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @method setId
     * 
     * Define o valor de id
     * 
     * @param  int  $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Getters, Setters [ tarifa ] 
     * 
     */

    /**
     * @method getTarifa
     * 
     * Obtêm o valor de tarifa
     *
     * @return  float
     */
    public function getTarifa(): float
    {
        return $this->tarifa;
    }

    /**
     * @method setTarifa
     * 
     * Define o valor de tarifa 
     * 
     * @param  float  $tarifa
     */
    public function setTarifa(float $tarifa): void
    {
        $this->tarifa = $tarifa;
    }

    /**
     * Getters, Setters [ dataCadastro ] 
     * 
     */

    /**
     * @method getDataCadastro
     * 
     * Obtêm o valor de dataCadastro
     *
     * @return  string
     */
    public function getDataCadastro(): string
    {
        return $this->dataCadastro;
    }

    /**
     * @method setDataCadastro
     *
     * Define o valor de dataCadastro 
     * 
     * @param  string  $dataCadastro 
     */
    public function setDataCadastro(string $dataCadastro): void
    {
        $this->dataCadastro = $dataCadastro;
    }

    /********************************************************
     *                 CRUD table [ tarifa ]
     ********************************************************/

    /**
     * @method create
     * 
     * Insere os dados do tarifa no banco de dados
     * 
     */
    public function create(): int
    {
        $dados = [
            'tar_tarifa' => $this->getTarifa(),
            'tar_datacadastro' =>  $this->getDataCadastro(),
        ];
        $this->db->insert('tarifa', $dados);

        return (int) $this->db->insert_id();
    }

    /**
     * @method delete
     * 
     * Remove um tarifa do banco de dados
     * 
     * @return Boolean
     */
    public function delete(): bool
    {
        $this->db->where('tar_id', $this->getId());
        $this->db->delete('tarifa');
        if (!$this->db->affected_rows()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @method update
     * 
     * Atualiza os dados do tarifa no bando de dados
     *
     * @param Int    $id Id do tarifa a ser atualizado
     * @param Object $dados Dados do tarifa a serem atualizados
     * @return Boolean
     */
    public function update (array $dados): bool
    {
        $this->db->where('tar_id', $this->getId());
        $this->db->update('tarifa', $dados);
        if (!$this->db->affected_rows()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @method read
     * 
     * Busca os dados do tarifa por ID ou obtêm todos os regitros
     *
     * @return Array tarifas cadastrado no banco de dados
     */
    public function read(): array
    {
        $this->db->select("*");
        $this->db->from("tarifa");
        if (!empty($this->id)) {
            $this->db->where("tar_id", $this->getId());
        }
        return $this->db->get()->result_array();
    }
}
