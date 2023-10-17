var emailLogin = document.getElementById('email');
var emailBanco;
var senhaLogin = document.getElementById('senha');
var senhaBanco;
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
            console.log(dados);
            for (var i = 0; i < dados.length; i++) {
                tamanho = dados.length;
                emailBanco = dados[i].email;
                senhaBanco = dados[i].senha;
                console.log(emailBanco);
                console.log(senhaBanco);
                console.log(i);
            }
        }
    )
}

function validarLogin() {
    if(emailBanco == emailLogin.value){
        console.log('email correto');
        if(senhaBanco == senhaLogin.value){
            console.log('senha correta');
            window.location.href = "/ourocar/Acessar.html";
        }else{
            console.log('senha incorreta');
        }
    }else{
        console.log('email incorreto');
    }
}

// Chame a função para obter os dados
obterDadosDoBanco();

// Validar login
validarLogin();
