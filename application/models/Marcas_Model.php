<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'marca_id' => 0,
'marca_nombre' => ''
);

function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $marca =  new Marcas_Model();
  foreach ($row as $key => $value)
    {
      $marca->_columns[$key] = $value;
    }
  return $marca;
}

function insert(){
$this->db->insert('dirtyllas_marcas',$this->_columns);
}

function update($id, $data) {
  $marca = $this->db->get_where('dirtyllas_marcas',array('marca_id'=>$id));
  if($marca->num_rows() > 0){
    $this->db->where('marca_id', $id);
    return $this->db->update('dirtyllas_marcas', $data);
    }else{
  $data['marca_id'] = $id;
  return $this->db->insert('dirtyllas_marcas',$data);
  }
}

function delete($id){
  $this->db->where('marca_id',$id);
  return $this->db->delete('dirtyllas_marcas');
}


function findAll(){
  $result=array();
  $bit = null;
  $consulta = $this->db->get('dirtyllas_marcas');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findById($id){
  $result=array();
  $bit = null;
  $this->db->where('marca_id',$id);
  $consulta = $this->db->get('dirtyllas_marcas');
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
