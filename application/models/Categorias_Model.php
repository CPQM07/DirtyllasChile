<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'categoria_id' => 0,
'categoria_nombre' => ''
);

function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $categoria =  new Categorias_Model();
  foreach ($row as $key => $value)
    {
      $categoria->_columns[$key] = $value;
    }
  return $categoria;
}

function insert(){
$this->db->insert('dirtyllas_categorias',$this->_columns);
}

function update($id, $data) {
  $categoria = $this->db->get_where('dirtyllas_categorias',array('categoria_id'=>$id));
  if($categoria->num_rows() > 0){
    $this->db->where('categoria_id', $id);
    return $this->db->update('dirtyllas_categorias', $data);
    }else{
  $data['categoria_id'] = $id;
  return $this->db->insert('dirtyllas_categorias',$data);
  }
}

function delete($id){}
  $this->db->where('categoria_id',$id);
  return $this->db->delete('dirtyllas_categorias');
}


function findAll(){
  $result=array();
  $bit = null;
  $consulta = $this->db->get('dirtyllas_categorias');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findById($id){
  $result=array();
  $bit = null;
  $this->db->where('categoria_id',$id);
  $consulta = $this->db->get('dirtyllas_categorias');
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
