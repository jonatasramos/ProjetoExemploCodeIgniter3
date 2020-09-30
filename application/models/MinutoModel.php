<?php

declare(strict_types=1);

/**
 * Modelo de integração com a tabela minuto
 *
 * @author Jonatas Ramos
 */
class MinutoModel extends CI_Model
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var int $minuto
     */
    private $minuto;

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
     * Getters, Setters [ minuto ] 
     * 
     */

    /**
     * @method getMinuto
     * 
     * Obtêm o valor de minuto
     *
     * @return  int
     */
    public function getMinuto(): int
    {
        return $this->minuto;
    }

    /**
     * @method setMinuto
     * 
     * Define o valor de minuto 
     * 
     * @param  int  $minuto
     */
    public function setMinuto(int $minuto): void
    {
        $this->minuto = $minuto;
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
     *                 CRUD table [ minuto ]
     ********************************************************/

    /**
     * @method create
     * 
     * Insere os dados do minuto no banco de dados
     * 
     */
    public function create(): int
    {
        $dados = [
            'min_minuto' => $this->getMinuto(),
            'min_datacadastro' =>  $this->getDataCadastro(),
        ];
        $this->db->insert('minuto', $dados);

        return (int) $this->db->insert_id();
    }

    /**
     * @method delete
     * 
     * Remove um minuto do banco de dados
     * 
     * @return Boolean
     */
    public function delete(): bool
    {
        $this->db->where('min_id', $this->getId());
        $this->db->delete('minuto');
        if (!$this->db->affected_rows()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @method update
     * 
     * Atualiza os dados do minuto no bando de dados
     *
     * @param Int    $id Id do minuto a ser atualizado
     * @param Object $dados Dados do minuto a serem atualizados
     * @return Boolean
     */
    public function update (array $dados): bool
    {
        $this->db->where('min_id', $this->getId());
        $this->db->update('minuto', $dados);
        if (!$this->db->affected_rows()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @method read
     * 
     * Busca os dados do minuto por ID ou obtêm todos os regitros
     *
     * @return Array Minutos cadastrados no banco de dados
     */
    public function read(): array
    {
        $this->db->select("*");
        $this->db->from("minuto");
        if (!empty($this->id)) {
            $this->db->where("min_id", $this->getId());
        }
        
        return $this->db->get()->result_array();
    }
}
