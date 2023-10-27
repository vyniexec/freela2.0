<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ourocar";
$msgSuccess = "";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }
    $nome = $_POST['Nome_cad'];
    $data_nascimento = $_POST['Data_Nacimento_cad'];
    $endereco = $_POST['Enderço_cad'];
    $numEndereco = $_POST['N_cad'];
    $cep = $_POST['Cep_cad'];
    $cnh = $_POST['CNH_cad'];
    $email = $_POST['E-mail_cad'];
    $telefone = $_POST['Telefone_cad'];
    $senha = $_POST['Senha_cad'];
    $data_nasc = new DateTime($data_nascimento);
    $data_atual = new DateTime();
    $diferenca = $data_nasc->diff($data_atual);
    if ($diferenca->y >= 18) {
        $sql = $conn->prepare("INSERT INTO cadastro (nome, data_nascimento, endereco, numEndereco, cep, cnh, email, cel, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($sql === FALSE) {
            die("Erro ao preparar a consulta: " . $conn->error);
        }
        $sql->bind_param("sssssssss", $nome, $data_nascimento, $endereco, $numEndereco, $cep, $cnh, $email, $telefone, $senha);
        if ($sql->execute() === TRUE) {
            $page = "index";
            $msgSuccess = "Seu cadastro foi realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $sql->error;
        }
        $conn->close();
    } else {
        $msgSuccess = "Desculpe, apenas pessoas maiores de 18 anos podem se cadastrar.";
        $page = "cadastro";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3; url=../../../ourocar/<?php echo $page; ?>.html"><!-- Aguarda 5 segundos antes de redirecionar a página para o endereço ourocar/Login.php -->
    <link rel="stylesheet" href="../../Principal.css">
    <script src="back_end/cadastro/cadastro.js" async></script>
    <title>Cadastro</title>
</head>
<header>
    <!-- Logo do OuroCar -->
    <a href="Login.html"><img src="../../Logo Ourocar.jpg" alt="OuroCar"></a>
</header>
<body>
  <div id="cadastro">
    <form method="post"> 
      <h1>Cadastro</h1>
      <div>
        <h4>  
        <?php echo $msgSuccess; ?>
        </h4>
      </div>
      <p>
        <label for="Nome_cad">Nome Completo</label>
        <input id="Nome_cad" name="Nome_cad" required type="text" placeholder="Nome Completo" />
      </p>
      <p>
        <label for="Data_Nacimento_cad">Data de Nacimento</label>
        <input id="Data_Nacimento_cad" name="Data_Nacimento_cad" required type="date"  placeholder="Data de Nacimento" />
      </p>
      <p>
        <label for="Enderço_cad">Endereço</label>
        <input id="Enderço_cad" name="Enderço_cad" required type="text" placeholder="ex. Rua"/>
      </p>
      <p>
        <label for="N_cad">N</label>
        <input id="N_cad" name="N_cad" required type="required" placeholder="ex. 1234"/>
      </p>
      <p>
        <label for="Complemento_cad">Complemento</label>
        <input id="Complemento_cad" name="Complemento_cad" type="text" placeholder="ex. apt. 42"/>
      </p>
      <p>
        <label for="Cep_cad">Cep</label>
        <input id="Cep_cad" name="Cep_cad" required type="text" placeholder="ex. 1234"/>
      </p>
      <p>
        <label for="CNH_cad">Digite o Numero da CNH</label>
        <input id="CNH_cad" name="CNH_cad" required type="text" placeholder="Digite sua CNH aqui"/>
      </p>
      <p>
        <label for="E-mail_cad">E-mail</label>
        <input id="E-mail_cad" name="E-mail_cad" required type="E-mail" placeholder="contato@htmlecsspro.com"/> 
      </p>
      <p>
        <label for="Telefone_cad">Telefone para contato</label>
        <input id="Telefone_cad" name="Telefone_cad" required type="tel" placeholder="55+ (XXX) x xxxx-xxxx"/> 
      </p>
      <p>
        <label for="Senha_cad">Senha</label>
        <input id="Senha_cad" name="Senha_cad" required type="password" placeholder="Digite sua senha aqui"/>
      </p>
      <p>
        <input type="submit" value="Cadastrar"/>
      </p>
      </form>
    </div>
  </div>
</div>
    <footer>
        <!-- Rodapé -->
        <p>&copy; OuroCar</p>
    </footer>
</body>
</html>