<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Who is Mario?</title>
    
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
<body class="bg-white">

    <!-- Navbar com botão hambúrguer -->
    <nav class="navbar navbar-light bg-light shadow-sm">
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
                <li class="list-group-item"><a href="{{ url('/') }}" class="text-decoration-none">🏠 Temperatura Atual</a></li>
                <li class="list-group-item"><a href="{{ url('/historico') }}" class="text-decoration-none">📊 Histórico de Dados</a></li>
            </ul>
            </ul>
        </div>
    </div>

    <!-- Seção da Temperatura -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card text-center shadow p-4 border-0" style="max-width: 400px;">
            <div class="card-body">
                <h4 class="mb-3 text-primary">Temperatura Atual</h4>
                <p id="temperature" class="fs-1 fw-bold text-danger">
                    <span class="spinner-border spinner-border-sm"></span> Carregando...
                </p>
            </div>
        </div>
    </div>

    <script>
        function fetchData() {
            const tempElement = document.getElementById("temperature");
            tempElement.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Atualizando...';

            fetch("https://temperaturas.atlanticsafaris.com/api/v1/temperatures")
                .then(response => {
                    if (!response.ok) throw new Error('Erro na requisição');
                    return response.json();
                })
                .then(data => {
                    console.log('Dados recebidos:', data);
                    if (Array.isArray(data) && data.length > 0 && data[data.length - 1].temperature !== undefined) {
                        tempElement.innerHTML = `${data[data.length - 1].temperature} °C`;
                    } else {
                        tempElement.innerHTML = "Dados indisponíveis";
                    }
                })
                .catch(error => {
                    console.error("Erro ao buscar os dados:", error);
                    tempElement.innerHTML = "Erro ao buscar dados.";
                });
        }

        // Atualiza a temperatura automaticamente a cada 3 segundos
        setInterval(fetchData, 600000);
        window.onload = fetchData;
    </script>

</body>
</html>