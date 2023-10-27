var tipo_veiculo = [];
var hora_inicio = [];
var data_inicio = [];
var data_termino = [];
var hora_termino = [];

function processarDados(veiculo, preco) {
    fetch('back_end/processar/processarRead.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao obter os dados do servidor');
            }
            return response.json();
        })
        .then(dados => {
            localStorage.setItem('dadosAlguel', JSON.stringify(dados));
            for (var i = 0; i < dados.length; i++) {
                tamanho = dados.length;
                tipo_veiculo[i] = dados[i].tipo_veiculo;
                data_inicio[i] = dados[i].data_inicio;
                hora_inicio[i] = dados[i].hora_inicio;
                data_termino[i] = dados[i].data_fim;
                hora_termino[i] = dados[i].hora_fim;
                console.log("index: "+tamanho, 
                    "tipo veiculo: "+tipo_veiculo[i], 
                    "veiculo: "+veiculo, 
                    "preço do veiculo: "+preco, 
                    "data inicio: "+data_inicio[i], 
                    "hora inicio: "+hora_inicio[i], 
                    "data fim: "+data_termino[i], 
                "hora fim: "+hora_termino[i]);
            }
        }
    )
}