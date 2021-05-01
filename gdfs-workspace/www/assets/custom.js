
$('#form_calculo_estimativa').submit(function (event){
    event.preventDefault();
    calcularEstimativa($(this));
})

function calcularEstimativa(form){
    let url = form.attr('action');
    $.ajax({
        type: "POST",
        url: '/api/calculo.php',
        data: form.serialize(),
        success: function (response){
            let data = JSON.parse(response);
            let novo_calculo = '<p>Em '+ data.cidade +', '+ data.categoria +', de '+ data.endereco_origem +' para '+ data.endereco_origem +', às '+ data.horario +': R$ '+ data.valor_formatado +'</p>';
            $('#section_historico').prepend(novo_calculo)
        },
        error: function (error){
            console.log(error);
        }
    });
}