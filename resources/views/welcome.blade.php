<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel com Bootstrap</title>

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="container mt-5">
        <header class="d-flex justify-content-center align-items-center mb-4">
            <h1>Bem-vindo ao Laravel com Bootstrap</h1>
        </header>

        <main>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Documentação</h5>
                            <p class="card-text">Laravel possui uma excelente documentação. Confira os guias e aprenda mais sobre o framework.</p>
                            <a href="https://laravel.com/docs" class="btn btn-primary">Ver Documentação</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Laracasts</h5>
                            <p class="card-text">Explore tutoriais em vídeo no Laracasts para aprimorar suas habilidades de desenvolvimento.</p>
                            <a href="https://laracasts.com" class="btn btn-primary">Ver Laracasts</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="text-center py-3">
            <p class="text-muted">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </footer>
    </div>

    <!-- Bootstrap JS e dependências via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
