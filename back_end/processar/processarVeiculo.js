var data_inicio;
var hora_inicio;
var data_termino;
var hora_termino;

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Previne o envio do formulário
        validarFormulario();
    });    
});
  

function validarFormulario() {
    acessarVeiculo();
}

function acessarVeiculo(){
    var escolhaVeiculo = document.getElementById("veiculo").value;
    console.log(escolhaVeiculo);
    data_inicio = document.getElementById("data_inicio").value;
    hora_inicio = document.getElementById("horario_inicio").value;
    data_termino = document.getElementById("data_fim").value;
    hora_termino = document.getElementById("horario_fim").value;
    console.log("Acessando veiculo...");
    window.location.href = "/ourocar/"+escolhaVeiculo+".html";

}

function processarVeiculo(){
    console.log(data_inicio, hora_inicio, data_termino, hora_termino);
}

