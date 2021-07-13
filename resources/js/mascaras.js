//  .celular{ }
$('.celular').mask('(99) 9 9999-9999');
//.phone{ }
$('.telefone').mask('(99) 9 9999-9999');
//.cep{ }
$('.cep').mask('99999-999');
//.data
$('.data').mask('00/00/0000');
//.dinheiro
$('.money').mask('000.000.000.000.000,00', { reverse: true });

//.cpf_cnpj{ }
var field = ".cpf_cnpj";

$(field).keydown(function () {
    try {
        $(field).unmask();
    } catch (e) { }

    var tamanho = $(field).val().length;

    if (tamanho < 11) {
        $(field).mask('999.999.999-99');
    } else {
        $(field).mask('99.999.999/9999-99');
    }

    //ajustando o foco
    var elem = this;
    setTimeout(function () {
        //modo a posicao do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);

    //republico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});
