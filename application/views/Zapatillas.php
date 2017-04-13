<?php foreach ($Zapatillas as $key => $value) :?>

  <h1>ID: <span><?=$value->get('zapatilla_id')?></span></h1>
  <h2>Nombre: <span><?=$value->get('zapatilla_nombre')?></span></h2>
  <h2>Genero: <span><?=$value->get('zapatilla_genero')?></span></h2>
  <h2>Modelo: <span><?=$value->get('zapatilla_modelo')?></span></h2>
  <h2>Talla: <span><?=$value->get('zapatilla_talla')?></span></h2>
  <p>Descripcion: <span><?=$value->get('zapatilla_descripcion')?></span></p>
  <h2>Precio: <span><?=$value->get('zapatilla_precio')?></span></h2>

<?php endforeach?> 
