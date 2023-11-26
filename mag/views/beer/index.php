<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MagnaBeer</title>
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <body class="main-layout">
      <!-- header -->
      <?php require  "../views/common/header.php" ?>
      <!-- end header inner -->
      <!-- end header -->
      <!-- gallery -->
      <div id="gallery" class="gallery">
         <div class="container">
            <div class="row">
                  <div class="col-md-12">
                     <div class="titlepage">
                        <h2>Nuestras <span class="green">Cervezas</span></h2>
                        <p>Todas estas cervezas son artesanas y envasadas en Zaragoza</p>
                     </div>
                  </div>
            </div>
            <div class="row">
                  <?php foreach ($cervezas as $cerveza) : ?>
                     <div class="col-md-4 col-sm-6">
                        <div class="gallery_img">
                              <figure>
                                 <a href="/beer/show/<?= $cerveza->id ?>">
                                    <img src="/../../<?= $cerveza->ruta_imagen ?>" alt="imagen del modelo de la cerveza" />
                                 </a>
                                 <div class="button-container">
                                    <a href="/beer/edit/<?= $cerveza->id ?>" class="btn btn-primary">Editar</a>
                                    <a href="/beer/delete/<?= $cerveza->id ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas borrar esta cerveza?')">Borrar</a>
                                 </div>
                              </figure>
                        </div>
                     </div>
                  <?php endforeach; ?>
            </div>
         </div>
      </div>




      <!-- end gallery -->
      <!--  footer -->
      <?php require  "../views/common/footer.php" ?>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>