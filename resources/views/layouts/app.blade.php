<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meu Projeto Laravel')</title>

    <!-- Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand ms-5" onclick="window.location='{{ route('clientes.index') }}'" style="cursor: pointer;">Upd8</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" onclick="window.location='{{ route('clientes.index') }}'" style="cursor: pointer;
">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="window.location='{{ route('cidades.index') }}'" style="cursor: pointer;
">Cidades</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="window.location='{{ route('representantes.index') }}'" style="cursor: pointer;
">Representantes</a>
      </li>
    </ul>

  </div>
</nav>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS e dependências via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
