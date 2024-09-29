@extends('layouts.app')

@section('content')
<div class="border rounded p-4 mb-4">
    <h1>Adicionar Cidade</h1>

    <form id="cidade-form">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Cidade</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('cidades.index') }}'">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>

    <script>
        document.getElementById('cidade-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const nome = document.getElementById('nome').value;

            fetch('/api/cidades', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ nome: nome })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "{{ route('cidades.index') }}";
                } else {
                    console.error('Erro ao adicionar cidade:', data);
                }
            })
            .catch(error => console.error('Erro ao adicionar cidade:', error));
        });
    </script>
</div>
@endsection
