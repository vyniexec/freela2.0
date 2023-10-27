var emailLogin = document.getElementById('email');
var emailBanco = [];
var senhaLogin = document.getElementById('senha');
var senhaBanco = [];
var tamanho;

function obterDadosDoBanco() {
    fetch('back_end/login/loginPhp.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao obter os dados do servidor');
            }
            return response.json();
        })
        .then(dados => {
            localStorage.setItem('dadosUsuario', JSON.stringify(dados));
            for (var i = 0; i < dados.length; i++) {
                tamanho = dados.length;
                emailBanco[i] = dados[i].email;
                senhaBanco[i] = dados[i].senha;
                console.log("email banco "+ i +": " + emailBanco[i]);
                console.log("senha banco "+ i +": " + senhaBanco[i]);
            }
        }
    )
}

function validarLogin() {
    for(var i = 0; i < tamanho; i++) {
        if(emailBanco[i] == emailLogin.value){
            console.log('email correto');
            if(senhaBanco[i] == senhaLogin.value){
                console.log('senha correta');
                window.location.href = "/ourocar/back_end/login/alertLog.php";
            }else{
                console.log('senha incorreta');
            }
        }else{
            console.log('email incorreto');
        }
    }
}

// Chame a função para obter os dados
obterDadosDoBanco();

// Validar login
validarLogin();
