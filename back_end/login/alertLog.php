<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url=../../../ourocar/Acessar.html"><!-- Aguarda 5 segundos antes de redirecionar a página para o endereço ourocar/Login.php -->
    <link rel="stylesheet" href="../../Principal.css">
    <script src="back_end/login/login.js" async></script>
    <title>Login</title>
</head>
<body>
    <div class="page">
        <form action="" class="formLogin">
            <h1>Login</h1>
            <div>
                <h4>
                <?php echo "Login realizado com sucesso!"; ?>
                </h4>
            </div>
            <label for="email">E-mail</label>
            <input id="email" type="email" placeholder="Digite seu e-mail" autofocus="true" />
            <label for="senha">Senha</label>
            <input id="senha" type="password" placeholder="Digite sua senha" />
            <p class="link">
                
            <a href="Esqueci a senha.html">Esqueci minha senha</a>
            <p class="link">
                <a href="Cadastro.html">Cadastre-se</a>
            </p>
            <input onclick="validarLogin()" value="Acessar" class="btn"/>
        </form>
    </div>
</body>
</html>