<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ourocar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para obter os dados dos usuários
$sql = "SELECT * FROM aluguel";
$result = $conn->query($sql);
if ($result === FALSE) {
    die("Erro ao consultar: " . $conn->error);
}

// Verifica se há resultados e os converte para JSON
if ($result->num_rows > 0) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode(array()); // Retorna um JSON vazio se não houver resultados
}
?>