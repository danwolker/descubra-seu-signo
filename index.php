<?php include('layouts/header.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Descubra seu signo</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

  <div class="card p-5 shadow-lg" style="max-width: 400px; width: 100%;">
    <h2 class="text-center mb-4">🔮 Descubra seu signo</h2>

    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
      <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de nascimento</label>
        <input 
          type="date" 
          class="form-control" 
          id="data_nascimento" 
          name="data_nascimento" 
          required 
        >
      </div>
      <button type="submit" class="btn btn-primary w-100">Descobrir</button>
    </form>
  </div>

</body>
</html>
