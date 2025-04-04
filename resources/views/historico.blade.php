<?php
// URL da API
$url = "https://temperaturas.atlanticsafaris.com/api/v1/temperatures";

// Obtém os dados da API
$response = file_get_contents($url);

// Verifica se houve erro na requisição
if ($response === FALSE) {
    die("Erro ao acessar a API.");
}

// Converte JSON para array PHP
$data = json_decode($response, true);

// Verifica se os dados são válidos
if (!is_array($data) || empty($data)) {
    die("Nenhum dado disponível.");
}

// Mantém apenas os 20 registros mais recentes
$data = array_slice($data, -20);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Temperatura</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Estilo para o menu lateral */
        .offcanvas {
            width: 250px;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar com botão hambúrguer -->
    <nav class="navbaar navbar-light bg-light shadow-sm">
        <div class="container">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                ☰
            </button>
            <span class="navbar-brand fw-bold text-primary">Monitor de Temperatura</span>
        </div>
    </nav>

    <!-- Menu Lateral -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="menuLateral">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ url('/historico') }}" class="text-decoration-none">📊 Histórico de Dados</a></li>
                <li class="list-group-item"><a href="{{ url('/') }}"class="text-decoration-none">🏠 Temperatura Atual</a>
</li>
            </ul>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center text-primary">📊 Histórico de Temperaturas</h2>
        <table class="table table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Temperatura (°C)</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id']); ?></td>
                        <td><?php echo htmlspecialchars($item['temperature']); ?> °C</td>
                        
                        <!-- Formatar a data e hora corretamente -->
                        <td>
                            <?php
                            $datetime = new DateTime($item['created_at']);
                            echo $datetime->format('H:i'); // Exibe apenas hora e minutos
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
