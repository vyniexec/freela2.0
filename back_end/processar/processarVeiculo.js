var tipo_veiculo;
var data_inicio;
var hora_inicio;
var data_termino;
var hora_termino;

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
                tipo_veiculo = dados[i].tipo_veiculo;
                data_inicio = dados[i].data_inicio;
                hora_inicio = dados[i].hora_inicio;
                data_termino = dados[i].data_fim;
                hora_termino = dados[i].hora_fim;
                console.log("tipo veiculo: "+tipo_veiculo+"", 
                    "veiculo: "+veiculo, 
                    "preço do veiculo: "+preco, 
                    "data inicio: "+data_inicio, 
                    "hora inicio: "+hora_inicio, 
                    "data fim: "+data_termino, 
                "hora fim: "+hora_termino);
            }
            
        }
    )
}