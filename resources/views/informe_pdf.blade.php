<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informe Médico</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      background-image: url("https://example.com/medical-report-paper.jpg");
      background-repeat: repeat;
      background-position: center center;
    }
  .container {
      width: 80%;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      position: relative;
    }
    h1, h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
  .section-break {
      height: 2px;
      background-color: #ccc;
      margin: 30px 0;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      background-color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Informe Médico</h1>
    <div class="section-break"></div>
    <div class="section">
      <h2 class="section-title">Datos del Paciente</h2>
      <table>
        <tr>
          <th>Nombre:</th>
          <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
          <th>DNI:</th>
          <td>{{ Auth::user()->dni }}</td>
        </tr>
        <tr>
          <th>Sexo:</th>
          <td>{{ Auth::user()->sexo }}</td>
        </tr>
        <tr>
          <th>Fecha de Nacimiento:</th>
          <td>{{ Auth::user()->fecha_nacimiento }}</td>
        </tr>
      </table>
    </div>
    <div class="section-break"></div>
    <div class="section">
      <h2 class="section-title">Detalles del Informe</h2>
      <table>
        <tr>
          <th>Título del Informe:</th>
          <td>{{ $informe->titulo }}</td>
        </tr>
        <tr>
          <th>Descripción:</th>
          <td>{{ $informe->descripcion }}</td>
        </tr>
        <tr>
          <th>Tipo de Informe:</th>
          <td>{{ $informe->tipo_informe }}</td>
        </tr>
        <tr>
          <th>Centro Médico:</th>
          <td>{{ $informe->centro_medico }}</td>
        </tr>
        <tr>
          <th>Fecha de Creación:</th>
          <td>{{ $informe->created_at->format('d/m/Y') }}</td>
        </tr>
        <tr>
          <th>Observaciones:</th>
          <td>{{ $informe->observaciones }}</td>
        </tr>
      </table>
    </div>
  </div>
</body>
</html>