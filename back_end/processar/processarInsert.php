<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ourocar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtém os dados do formulário
    $escolhaVeiculo = $_POST['veiculo'];
    $data_inicio = $_POST['data_inicio'];
    $hora_inicio = $_POST['horario_inicio'];
    $data_termino = $_POST['data_fim'];
    $hora_termino = $_POST['horario_fim'];

    // Prepara e executa a inserção no banco de dados
    $sql = $conn->prepare("INSERT INTO aluguel (tipo_veiculo, data_inicio, hora_inicio, data_fim, hora_fim) VALUES (?, ?, ?, ?, ?)");

    // Verifica se a preparação foi bem-sucedida
    if ($sql === FALSE) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }

    // Associa os parâmetros e executa a consulta
    $sql->bind_param("sssss", $escolhaVeiculo, $data_inicio, $hora_inicio, $data_termino, $hora_termino);
    if ($sql->execute() === TRUE) {
        // Consulta SQL para obter os dados dos usuários
        header("Location: /ourocar/$escolhaVeiculo.html");
        exit();
    } else {
        $message = "Erro ao cadastrar: ";
        echo "Erro ao cadastrar: " . $sql->error;
    }
    // Fecha a instrução e a conexão
    $conn->close();
}
?>