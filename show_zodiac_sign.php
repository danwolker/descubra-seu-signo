<?php include('layouts/header.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Resultado do Signo</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-gradient d-flex align-items-center justify-content-center vh-100">

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $data_nascimento = $_POST['data_nascimento'];
  $dataFormatada = date('d/m', strtotime($data_nascimento));
  $signos = simplexml_load_file("signos.xml");
  $signoEncontrado = null;

  foreach ($signos->signo as $signo) {
    $dataInicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
    $dataFim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
    $dataNasc = DateTime::createFromFormat('d/m', $dataFormatada);

    if ($dataInicio && $dataFim && $dataNasc) {
      if (
        ($dataInicio <= $dataFim && $dataNasc >= $dataInicio && $dataNasc <= $dataFim) ||
        ($dataInicio > $dataFim && ($dataNasc >= $dataInicio || $dataNasc <= $dataFim))
      ) {
        $signoEncontrado = $signo;
        break;
      }
    }
  }

  if ($signoEncontrado) {
    echo "<div class='card p-5 shadow-lg text-center resultado-box'>";
    echo "<div class='signo-icone'>" . $signoEncontrado->icone . "</div>";
    echo "<h2 class='mb-3'>" . $signoEncontrado->signoNome . "</h2>";
    echo "<p class='descricao'>" . $signoEncontrado->descricao . "</p>";
    echo "<hr>";
    echo "<p><strong>Elemento:</strong> " . $signoEncontrado->elemento . "</p>";
    echo "<p><strong>Planeta regente:</strong> " . $signoEncontrado->planeta . "</p>";
    echo "<p><strong>Cor:</strong> " . $signoEncontrado->cor . "</p>";
    echo "<a href='index.php' class='btn btn-secondary mt-4'>Voltar</a>";
    echo "</div>";
  } else {
    echo "<p class='text-center text-danger'>Signo não encontrado.</p>";
  }
} else {
  echo "<p class='text-center text-danger'>Acesso inválido.</p>";
}
?>

</body>
</html>
