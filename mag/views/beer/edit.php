
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Editar users</title>
<!-- bootstrap css -->
<link rel="stylesheet" href="/css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" href="/css/style.css">

  </head>

  <body>

  <?php include  "../views/common/header.php" ?>

  <h1>Modificación de Cerveza</h1>

  <main role="main" class="container">
    <h1>Editar Cerveza <?php echo $beer->id ?></h1>

    <form action="/beer/update" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $beer->nombre ?>" required>
      </div>
      
      <div class="form-group">
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="<?php echo $beer->tipo ?>" required>
      </div>

      <div class="form-group">
        <label for="graduacion_alcoholica">Graduación alcohólica:</label>
        <input type="number" name="graduacion_alcoholica" value="<?php echo $beer->graduacion_alcoholica ?>" required>
      </div>

      <div class="form-group">
        <label for="pais">País:</label>
        <input type="text" name="pais" value="<?php echo $beer->pais ?>" required>
      </div>

      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?php echo $beer->precio ?>" required>
      </div>

      <div class="form-group">
        <label for="imagen">Seleccionar imagen (jpg o png):</label>
        <input type="file" name="imagen" id="imagen" required>
      </div>

      <div class="form-group">
        <button type="submit">Guardar Cambios</button>
        <input type="hidden" name="id" value="<?php echo $beer->id ?>">
      </div>

    </form>
</main>


  </div>

  <?php include  "../views/common/footer.php" ?>

  </body>
</html>
