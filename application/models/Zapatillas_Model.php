<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zapatillas_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'zapatilla_id' => 0,
'zapatilla_nombre' => '',
'zapatilla_genero' => '',
'zapatilla_modelo' => '',
'zapatilla_talla' => '',
'zapatilla_descipcion' => '',
'zapatilla_precio' => 0,
'zapatilla_imagen_id' => 0,
'zapatilla_marca_id' => 0,
'zapatilla_categoria_id' => 0
);

function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
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
  $consulta = $this->db->get('dirtyllas_zapatillas');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findById($id){
  $result=array();
  $bit = null;
  $this->db->where('zapatilla_id',$id);
  $consulta = $this->db->get('dirtyllas_zapatillas');
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
