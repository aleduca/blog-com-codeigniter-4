<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Olá <?php echo $name; ?></h2>
  <p>Para você resetar sua senha clique no link abaixo, esse link é válido por 5 minutos</p>
  <a href="<?php echo site_url("/reset/{$token}"); ?>">Clique aqui para resetar sua senha</a>
</body>

</html>