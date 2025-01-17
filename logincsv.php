<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $csvFile = 'C:\xampp\htdocs\site\senhas.csv';
    $csvData = array_map('str_getcsv', file($csvFile));
    

    $input_username = $_POST["username"];
    $input_password = $_POST["password"];
    

    $credentialsMatch = false;
    foreach ($csvData as $row) {
        if ($row[0] == $input_username && $input_password == $row[1]) {
            $credentialsMatch = true;
            break;
        }
    }
    
    if ($credentialsMatch) {
       
        header("Location: paginaRestrita.html");
        exit();
    } else {
       
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>
