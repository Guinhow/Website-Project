<?php
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha as credenciais do arquivo CSV
    $csvFile = 'C:\xampp\htdocs\site\senhas.csv';
    $csvData = array_map('str_getcsv', file($csvFile));
    
    // Obtenha as credenciais do formulário
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];
    
    // Verifique se as credenciais correspondem
    $credentialsMatch = false;
    foreach ($csvData as $row) {
        if ($row[0] == $input_username && $input_password == $row[1]) {
            $credentialsMatch = true;
            break;
        }
    }
    
    if ($credentialsMatch) {
        // Credenciais válidas, redirecione para a página restrita ou exiba uma mensagem de sucesso
        header("Location: paginaRestrita.html");
        exit();
    } else {
        // Credenciais inválidas, exiba uma mensagem de erro
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>
