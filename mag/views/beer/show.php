
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>vista de 1 cerveza</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
  </head>

  <body>

  <?php require  "../views/common/header.php"; ?>
<br>
    <!-- Begin page content id nombre, tipo, graduacion_alcoholica, pais, precio, ruta_imagen -->
    <main role="main" class="container">
    <h1>Detalle de la cerveza <?php echo $beer->id ?></h1>
    <img src="/../../<?php echo "$beer->ruta_imagen" ?>" alt="imagen del modelo de la cerveza"/>
      <ul>
          <li><strong>Nombre: </strong><?php echo $beer->nombre ?></li>
          <li><strong>Tipo: </strong><?php echo $beer->tipo ?></li>
          <li><strong>Graduacion alcoholica: </strong><?php echo $beer->graduacion_alcoholica ?></li>
          <li><strong>Pais</strong><?php echo $beer->pais ?></li>
          <li><strong>Precio</strong><?php echo $beer->precio ?></li>
      </ul>
    </main>

    <?php require (__DIR__ . '/../common/footer.php');?>
  </body>
</html>
