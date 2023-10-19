var data_inicio;
var hora_inicio;
var data_termino;
var hora_termino;

function processarVeiculo(){
    console.log("processarVeiculo");
    fetch('back_end/processar/processar.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao obter os dados do servidor');
            }
            return response.json();
        })
        .then(dados => {
            console.log(dados);
            if (dados != null) {
                for (var i = 0; i < dados.length; i++) {
                    tamanho = dados.length;
                    data_inicio = dados[i].data_inicio;
                    hora_inicio = dados[i].hora_inicio;
                    data_termino = dados[i].data_termino;
                    hora_termino = dados[i].hora_termino;
                    console.log(data_inicio, hora_inicio, data_termino, hora_termino);
                }
                window.location.href = "ourocar/sedan.html";
            } else {
                console.log("Erro ao obter os dados do servidor");
                
            }
        }
    )
    
}

