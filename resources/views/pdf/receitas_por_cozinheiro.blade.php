<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    th { background-color: #ffe6b4; }
    h1 { color: #B55233; }
  </style>
</head>
<body>
  <h1>Relatório de Receitas</h1>
  <p>Cozinheiro: <strong>{{ $cozinheiro }}</strong></p>
  <table>
    <thead>
      <tr>
        <th>Nome da Receita</th>
        <th>Categoria</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($receitas as $receita)
        <tr>
          <td>{{ $receita['nome'] }}</td>
          <td>{{ $receita['categoria'] }}</td>
          <td>{{ $receita['data'] }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
