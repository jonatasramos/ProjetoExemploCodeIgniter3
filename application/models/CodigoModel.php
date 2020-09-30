<?php

declare(strict_types=1);

/**
 * Modelo de integração com a tabela codigo
 *
 * @author Jonatas Ramos
 */
class CodigoModel extends CI_Model
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var int $codigo
     */
    private $codigo;

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
     * Getters, Setters [ codigo ] 
     * 
     */

    /**
     * @method getCodigo
     * 
     * Obtêm o valor de codigo
     *
     * @return  int
     */
    public function getCodigo(): int
    {
        return $this->codigo;
    }

    /**
     * @method setCodigo
     * 
     * Define o valor de codigo 
     * 
     * @param  int  $codigo
     */
    public function setCodigo(int $codigo): void
    {
        $this->codigo = $codigo;
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
     *                 CRUD table [ codigo ]
     ********************************************************/

    /**
     * @method create
     * 
     * Insere os dados do codigo no banco de dados
     * 
     */
    public function create(): int
    {
        $dados = [
            'cod_codigo' => $this->getCodigo(),
            'cod_datacadastro' =>  $this->getDataCadastro(),
        ];
        $this->db->insert('codigo', $dados);

        return (int) $this->db->insert_id();
    }

    /**
     * @method delete
     * 
     * Remove um codigo do banco de dados
     * 
     * @return Boolean
     */
    public function delete(): bool
    {
        $this->db->where('cod_id', $this->getId());
        $this->db->delete('codigo');
        if (!$this->db->affected_rows()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @method update
     * 
     * Atualiza os dados do código no bando de dados
     *
     * @param Int    $id Id do código a ser atualizado
     * @param Object $dados Dados do código a serem atualizados
     * @return Boolean
     */
    public function update (array $dados): bool
    {
        $this->db->where('cod_id', $this->getId());
        $this->db->update('codigo', $dados);
        
        if (!$this->db->affected_rows()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @method read
     * 
     * Busca os dados do código por ID ou obtêm todos os regitros
     *
     * @return Array codigos cadastrado no banco de dados
     */
    public function read(): array
    {
        $this->db->select("*");
        $this->db->from("codigo");
        if (!empty($this->id)) {
            $this->db->where("cod_id", $this->getId());
        }
        return $this->db->get()->result_array();
    }
}
