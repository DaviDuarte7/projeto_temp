<?php
$url = "https://temperaturas.atlanticsafaris.com/api/v1/temperatures/";

// Obtém os dados da API
$response = file_get_contents($url);

if ($response === false) {
    die(" Erro ao acessar a API.\n");
}

// Decodifica o JSON
$data = json_decode($response, true);

if ($data === null || !is_array($data)) {
    die(" Erro: Dados inválidos ou resposta vazia da API.\n");
}

// Verifica se há registros
if (empty($data)) {
    die(" Nenhuma temperatura encontrada.\n");
}

// Pega a última temperatura registrada
$lastTemperature = end($data);
$temperature = $lastTemperature['temperature'] ?? 'N/A';

echo " Última temperatura registrada: {$temperature}°C\n";
