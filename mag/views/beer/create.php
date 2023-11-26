
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Vista index users</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <style>
      #formularioCreate{
        padding:100px;
      }
    </style>
  </head>
  <body>

    <?php include  "../views/common/header.php" ?>
    <main role="main" class="container">
    <h1>Añadir Nueva Cerveza</h1>

    <form id="formularioCreate" method="post" action="/beer/store" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="graduacion">Graduación alcohólica:</label>
            <input type="number" name="graduacion_alcoholica" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pais">País:</label>
            <input type="text" name="pais" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="imagen">Seleccionar imagen (.jpg o .png):</label>
          <input type="file" name="imagen" id="imagen" required>
        </div>
        
        <div class="form-group">
          <label for="documento">Seleccionar archivo (.pdf o .docx):</label>
          <input type="file" name="documento" id="documento" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Nueva Cerveza</button>
    </form>
</main>




    <?php include "../views/common/footer.php"; ?>
    <?php include "../views/common/scripts.php"; ?>

  </body>
</html>
