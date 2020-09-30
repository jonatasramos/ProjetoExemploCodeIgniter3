/**
 * JS página Home
 *
 * @author Jonatas Ramos
 */


/**
 * @method sendForm
 * 
 * Envia o formulário de calcudo de minutos
 * 
 * @var data - Retorno do envio
 */
function sendForm(data) {
    try {
        if (typeof data.plano != 'undefined' || !data.error) {
            $('#resultado').show();

            $('#plano_txt').html(`Fale Mais ${data.plano}`);
            $('#origem').html(data.codigo_origem);
            $('#destino').html(data.codigo_destino);
            $('#tempo').html(data.tempo);
            $('#cFaleMais').html(`R$ ${data.cFaleMais}`);
            $('#sFaleMais').html(`R$ ${data.sFaleMais}`);
        } else {
            jhelly.msg("Ocorreu um erro tente novamente!", "error");
        }
    } catch (error) {
        jhelly.msg("Ocorreu um erro tente novamente!", "error");
    }
}