<?php

declare(strict_types=1);

/**
 * Modelo de integação com a tabela codigo_tairifa
 *
 * @author Jonatas Ramos
 */
class CodigoTarifaModel extends CI_Model
{
    /** @method __construct */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @method read
     * 
     * Busca os dados da tabela codigo_tarifa 
     *
     * @return Array codigos cadastrado no banco de dados
     */
    public function read(): array
    {
        $query = $this->db->query('
            SELECT cot_id id, ori.cod_codigo origem, des.cod_codigo destino, tar_tarifa tarifa
            FROM codigo_tarifa
            INNER JOIN codigo ori ON ori.cod_id = cot_id_origem
            INNER JOIN codigo des ON des.cod_id = cot_id_destino
            INNER JOIN tarifa ON tar_id = cot_id_tarifa
            ORDER BY cot_id
        ');
        
        return $query->result_array();
    }
}
