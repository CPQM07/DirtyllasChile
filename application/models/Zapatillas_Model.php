<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zapatillas_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'zapatilla_id' => 0,
'zapatilla_genero' => '',
'zapatilla_modelo' => '',
'zapatilla_talla_desde' => '',
'zapatilla_talla_hasta' => '',
'zapatilla_descipcion' => '',
'zapatilla_precio' => 0,
'zapatilla_imagen_portada' => '',
'zapatilla_imagen_uno' => '',
'zapatilla_imagen_dos' => '',
'zapatilla_imagen_tres' => '',
'zapatilla_imagen_cuatro' => '',
'zapatilla_marca_id' => 0,
'zapatilla_categoria_id' => 0
);

function get($attr){
  return $this->_columns[$attr];
}

function setColumns ($row = null){
  foreach ($row as $key => $value) {
    $this->_columns[$key] = $value;
  }
}

function create($row){
  $zapatilla =  new Zapatillas_Model();
  foreach ($row as $key => $value)
    {
      $zapatilla->_columns[$key] = $value;
    }
  return $zapatilla;
}

function insert(){
$this->db->insert('dirtyllas_zapatillas',$this->_columns);
}

function update($id, $data) {
  $zapatilla = $this->db->get_where('dirtyllas_zapatillas',array('zapatilla_id'=>$id));
  if($zapatilla->num_rows() > 0){
    $this->db->where('zapatilla_id', $id);
    return $this->db->update('dirtyllas_zapatillas', $data);
    }else{
  $data['zapatilla_id'] = $id;
  return $this->db->insert('dirtyllas_zapatillas',$data);
  }
}

function delete($id){
  $this->db->where('zapatilla_id',$id);
  return $this->db->delete('dirtyllas_zapatillas');
}

function findAll(){
  $result=array();
  $bit = null;
  $consulta = $this->db->query('select zapatilla_id, zapatilla_genero, zapatilla_modelo, zapatilla_talla_desde,
  zapatilla_talla_hasta, zapatilla_descripcion, zapatilla_precio, zapatilla_imagen_portada,
  zapatilla_imagen_uno, zapatilla_imagen_dos, zapatilla_imagen_tres, zapatilla_imagen_cuatro, marca_nombre, categoria_nombre from dirtyllas_zapatillas
  INNER JOIN dirtyllas_marcas on dirtyllas_marcas.marca_id = dirtyllas_zapatillas.zapatilla_marca_id
  INNER JOIN dirtyllas_categorias on dirtyllas_categorias.categoria_id = dirtyllas_zapatillas.zapatilla_categoria_id');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findBySex($Genero){
  $result=array();
  $bit = null;
  $consulta = $this->db->query('select zapatilla_id, zapatilla_genero, zapatilla_modelo, zapatilla_talla_desde,
  zapatilla_talla_hasta, zapatilla_descripcion, zapatilla_precio, zapatilla_imagen_portada,
  zapatilla_imagen_uno, zapatilla_imagen_dos, zapatilla_imagen_tres, zapatilla_imagen_cuatro, marca_nombre, categoria_nombre from dirtyllas_zapatillas
  INNER JOIN dirtyllas_marcas on dirtyllas_marcas.marca_id = dirtyllas_zapatillas.zapatilla_marca_id
  INNER JOIN dirtyllas_categorias on dirtyllas_categorias.categoria_id = dirtyllas_zapatillas.zapatilla_categoria_id
  where dirtyllas_zapatillas.zapatilla_genero ="'.$Genero.'"');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findByBrand($Marca){
  $result=array();
  $bit = null;
  $consulta = $this->db->query('select zapatilla_id, zapatilla_genero, zapatilla_modelo, zapatilla_talla_desde,
  zapatilla_talla_hasta, zapatilla_descripcion, zapatilla_precio, zapatilla_imagen_portada,
  zapatilla_imagen_uno, zapatilla_imagen_dos, zapatilla_imagen_tres, zapatilla_imagen_cuatro, marca_nombre, categoria_nombre from dirtyllas_zapatillas
  INNER JOIN dirtyllas_marcas on dirtyllas_marcas.marca_id = dirtyllas_zapatillas.zapatilla_marca_id
  INNER JOIN dirtyllas_categorias on dirtyllas_categorias.categoria_id = dirtyllas_zapatillas.zapatilla_categoria_id
  where dirtyllas_marcas.marca_nombre ="'.$Marca.'"');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findByCategory($Categoria){
  $result=array();
  $bit = null;
  $consulta = $this->db->query('select zapatilla_id, zapatilla_genero, zapatilla_modelo, zapatilla_talla_desde,
  zapatilla_talla_hasta, zapatilla_descripcion, zapatilla_precio, zapatilla_imagen_portada,
  zapatilla_imagen_uno, zapatilla_imagen_dos, zapatilla_imagen_tres, zapatilla_imagen_cuatro, marca_nombre, categoria_nombre from dirtyllas_zapatillas
  INNER JOIN dirtyllas_marcas on dirtyllas_marcas.marca_id = dirtyllas_zapatillas.zapatilla_marca_id
  INNER JOIN dirtyllas_categorias on dirtyllas_categorias.categoria_id = dirtyllas_zapatillas.zapatilla_categoria_id
  where dirtyllas_categorias.categoria_nombre ="'.$Categoria.'"');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

  function findAllShoesImg(){
    $result = array();
    $this->load->database();
    $res = null;
    $res=$this->db->query("SELECT * FROM dirtyllas_zapatillas LEFT JOIN dirtyllas_imagenes on dirtyllas_zapatillas.zapatilla_id = dirtyllas_imagenes.imagen_id");
    if ($res->num_rows() > 0) {
      foreach ($res->result() as $value) {
      $result[] = $this->createempresa($value);
      }
    }
    return $result;
  }

}
