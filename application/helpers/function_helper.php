<?php

declare(strict_types=1);
/**
 * FUNÇÕES AUXILIARES DO SISTEMA
 *
 * @author Jonatas Ramos
 */

/**
 * @method msg_error
 * 
 * Função para retornar a mensagem de erro
 */
function msg_error($error): void
{
    echo json_encode(array("error" => array("message" => "{$error}")));
}

/**
 * @method msg_success
 * 
 * Função para retornar a mensagem de sucesso
 */
function msg_success($success): void
{
    echo json_encode(array("result" => $success));
}

/**
 * @method filter
 * 
 * Função para retornar um item específico de dentro de um objeto
 * 
 * @param Array  $object Objeto contêndo os items
 * @param String $key Parâmetro a ser utilizado como filtro
 * @param String $param Parâmetro as ser comparado
 */
function filter(array $object, string $key, string $param): array
{
    $result = array_filter(
        $object,
        function ($item) use ($param, $key) {
            if ($item[$key] == $param) {
                return true;
            }
        }
    );

    foreach ($result as $item) {
        $result = $item;
    }

    return $result;
}

/**
 * @method calcPorcent
 * 
 * Calcula porcentagem
 * 
 * @param Float $vlr Valor a ser retidado a porcemtagem
 * @param Float $porcent Valor da porcentagem
 */
function calcPorcent(float $vlr, float $porcent): float
{
    return (($porcent / 100) * $vlr);
}
