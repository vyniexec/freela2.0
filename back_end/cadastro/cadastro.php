<?php

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ourocar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $nome = $_POST['Nome_cad'];
    $data_nascimento = $_POST['Data_Nacimento_cad'];
    $endereco = $_POST['Enderço_cad'];
    $numEndereco = $_POST['N_cad'];
    $cep = $_POST['Cep_cad'];
    $cnh = $_POST['CNH_cad'];
    $email = $_POST['E-mail_cad'];
    $telefone = $_POST['Telefone_cad'];
    $senha = $_POST['Senha_cad'];

    // Prepara e executa a inserção no banco de dados
    $sql = $conn->prepare("INSERT INTO cadastro (nome, data_nascimento, endereco, numEndereco, cep, cnh, email, cel, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // Verifica se a preparação foi bem-sucedida
    if ($sql === FALSE) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }
    // Associa os parâmetros e executa a consulta
    $sql->bind_param("sssssssss", $nome, $data_nascimento, $endereco, $numEndereco, $cep, $cnh, $email, $telefone, $senha);
    if ($sql->execute() === TRUE) {
        header("Location: /ourocar/Login.html");
        exit();
    } else {
        $message = "Erro ao cadastrar: ";
        echo "Erro ao cadastrar: " . $sql->error;
    }

    // Fecha a instrução e a conexão
    $conn->close();
}
?>