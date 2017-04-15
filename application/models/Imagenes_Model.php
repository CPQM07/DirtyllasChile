<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'imagen_id' => 0,
'imagen_portada' => '',
'imagen_uno' => '',
'imagen_dos' => '',
'imagen_tres' => '',
'imagen_cuatro' => ''
);

function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $marca =  new Imagenes_Model();
  foreach ($row as $key => $value)
    {
      $marca->_columns[$key] = $value;
    }
  return $marca;
}

function insert(){
$this->db->insert('dirtyllas_imagenes',$this->_columns);
}

function update($id, $data) {
  $marca = $this->db->get_where('dirtyllas_imagenes',array('imagen_id'=>$id));
  if($marca->num_rows() > 0){
    $this->db->where('imagen_id', $id);
    return $this->db->update('dirtyllas_imagenes', $data);
    }else{
  $data['imagen_id'] = $id;
  return $this->db->insert('dirtyllas_imagenes',$data);
  }
}

function delete($id){
  $this->db->where('imagen_id',$id);
  return $this->db->delete('dirtyllas_imagenes');
}


function findAll(){
  $result=array();
  $bit = null;
  $consulta = $this->db->get('dirtyllas_imagenes');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findById($id){
  $result=array();
  $bit = null;
  $this->db->where('imagen_id',$id);
  $consulta = $this->db->get('dirtyllas_imagenes');
  if($consulta->num_rows() > 0){
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
    }
  }else{
    $result[] = $this->create($this->_columns);
  }
    return $result;
  }
}
