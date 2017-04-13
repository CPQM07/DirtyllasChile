<!DOCTYPE html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DIRTYllasChile</title>
    <link rel="shortcut icon" href="<?= base_url() ?>resources/images/Dirtyllas/DIRTYllasLogo.ico">
    <!-- Lato Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <!-- Stylesheet -->
    <link href="<?= base_url() ?>resources/css/gallery-materialize.min.css" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="<?= base_url() ?>resources/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>

    <!-- Navbar and Header -->
    <nav class="nav-extended nav-full-header blue-grey lighten-4">
      <div class="nav-background">
        <img class="active" src="<?= base_url() ?>resources/images/Dirtyllas/BannerOne.jpg" alt="cityscape">
        <img src="http://placehold.it/1400x700" alt="cityscape">
        <img src="http://placehold.it/1400x700" alt="cityscape">
      </div>
      <div class="nav-wrapper container">
        <a href="index.html" class="brand-logo">DIRTYllasChile</a>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.html">DIRTYllasChile</a></li>
          <li class="active"><a class='dropdown-button' href='#' data-activates='feature-dropdown' data-belowOrigin="true" data-constrainWidth="false">Siguenos <i class='fa fa-flag-o'></i></a></li>
        </ul>
        <!-- Dropdown Structure -->
        <ul id='feature-dropdown' class='dropdown-content'>
          <li><a class="navy-text" href="https://www.instagram.com/_dirtyllas/"><i class='fa fa-instagram black-text'></i> _Dirtyllas</a></li>
          <li><a class="navy-text" href="https://www.facebook.com/DirtyllasCL/"><i class='fa fa-facebook black-text'></i> DIRTYllasChile</a></li>
        </ul>

      </div>
      <div class="nav-header valign-wrapper">
        <div class="carousel carousel-slider center" data-indicators="true">
          <div class="carousel-item white-text" href="#one!">
            <div class="container valign-wrapper">
              <h1>I MAKE THINGS</h1>
              <div class="tagline">Portfolio</div>
            </div>
          </div>
          <div class="carousel-item white-text" href="#two!">
            <div class="container valign-wrapper">
              <h1>PROFESSIONAL DESIGN</h1>
              <div class="tagline">Dedicated to you</div>
            </div>
          </div>
          <div class="carousel-item white-text" href="#three!">
            <div class="container valign-wrapper">
              <h1>LETS MAKE SOMETHING</h1>
              <div class="tagline">together</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Fixed Masonry Filters -->
      <div class="categories-wrapper teal darken-4">
        <div class="categories-container center">
          <ul class="categories container">
            <li class="active"><a href="#all">Todas</a></li>
            <li class=""><a href="#all">Hombre</a></li>
            <li class=""><a href="#all">Unisex</a></li>
            <li class=""><a href="#all">Mujer</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <ul class="side-nav" id="nav-mobile">
      <li><a href="#" class="brand-logo">DIRTYllasChile</a></li>
      <li class="active"><a>Siguenos <i class='fa fa-flag-o'></i></a></li>
      <li><a class="navy-text" href="https://www.instagram.com/_dirtyllas/"><i class='fa fa-instagram black-text'></i> _Dirtyllas</a></li>
      <li><a class="navy-text" href="https://www.facebook.com/DirtyllasCL/"><i class='fa fa-facebook black-text'></i> DIRTYllasChile</a></li>
    </ul>





    <!-- DIRTYllasChile -->
    <div id="portfolio" class="section gray">
      <div class="container">
        <div class="gallery row">

          <?php foreach ($Zapatillas as $key => $value) :?>
          <div class="col l4 m6 s12 gallery-item gallery-expand gallery-filter polygon">
            <div class="gallery-curve-wrapper">
              <a class="gallery-cover gray">
                <img class="responsive-img" src="http://placehold.it/350x250" alt="placeholder">
              </a>
              <div class="gallery-header">
                <span class="blue-text"><?=$value->get('zapatilla_nombre')?></span>
                <span class="blue-text"><?=$value->get('zapatilla_modelo')?></span><br>
                <span class="cyan-text"><i class='fa fa-dollar'></i><span> <?=$value->get('zapatilla_precio')?></span></span>
              </div>
              <div class="gallery-body">
                <div class="title-wrapper">
                <h5><?=$value->get('zapatilla_nombre')?> - <?=$value->get('zapatilla_modelo')?></h5><br>
                <span class="price"><i class='fa fa-dollar'></i> <span class="cyan-text"><?=$value->get('zapatilla_precio')?></span></span>
                </div>
                <p class="description"><span><?=$value->get('zapatilla_descripcion')?></span></p>

                <div class="carousel-wrapper">
                  <div class="carousel">
                    <a class="carousel-item" href="#one!"><img src="http://placehold.it/300x200"></a>
                    <a class="carousel-item" href="#two!"><img src="http://placehold.it/300x200"></a>
                    <a class="carousel-item" href="#three!"><img src="http://placehold.it/300x200"></a>
                    <a class="carousel-item" href="#four!"><img src="http://placehold.it/300x200"></a>
                    <a class="carousel-item" href="#five!"><img src="http://placehold.it/300x200"></a>
                  </div>
                </div>
              </div>
              <div class="gallery-action">
                <a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
              </div>
            </div>
          </div>
          <?php endforeach?>
        </div>
      </div>
    </div><!-- /.container -->

    <footer class="page-footer blue-grey darken-2">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h6 class="white-text">DIRTYllas CHILE</h6>
            <p class="grey-text text-lighten-4"></p>
          </div>
          <div class="col l4 offset-l2 s12">
            <a class="white-text" href=""></a>
            <ul>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2017 Copyright <a href="">CPQM07</a>
        <a class="grey-text text-lighten-4 right" href="#!"></a>
        </div>
      </div>
    </footer>



    <!-- Core Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>resources/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>resources/js/masonry.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/materialize/0.98.0/js/materialize.min.js"></script>
    <script src="<?= base_url() ?>resources/js/color-thief.min.js"></script>
    <script src="<?= base_url() ?>resources/js/galleryExpand.js"></script>
    <script src="<?= base_url() ?>resources/js/init.js"></script>

  </body>
</html>
