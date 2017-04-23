<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {

public function __construct()
{
parent::__construct();
}

private  $_columns  =  array(
'usuario_id' => 0,
'usuario_correo' => '',
'usuario_contrasena' => '',
'usuario_nombre' => '',
'usuario_apellido' => ''
);

function get($attr){
  return $this->_columns[$attr];
}

public function create($row){
  $marca =  new Usuarios_Model();
  foreach ($row as $key => $value)
    {
      $marca->_columns[$key] = $value;
    }
  return $marca;
}

function insert(){
$this->db->insert('dirtyllas_usuarios',$this->_columns);
}

function update($id, $data) {
  $marca = $this->db->get_where('dirtyllas_usuarios',array('usuario_id'=>$id));
  if($marca->num_rows() > 0){
    $this->db->where('usuario_id', $id);
    return $this->db->update('dirtyllas_usuarios', $data);
    }else{
  $data['usuario_id'] = $id;
  return $this->db->insert('dirtyllas_usuarios',$data);
  }
}

function delete($id){
  $this->db->where('usuario_id',$id);
  return $this->db->delete('dirtyllas_usuarios');
}


function findAll(){
  $result=array();
  $bit = null;
  $consulta = $this->db->get('dirtyllas_usuarios');
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
  }
  return $result;
}

function findById($id){
  $result=array();
  $bit = null;
  $this->db->where('usuario_id',$id);
  $consulta = $this->db->get('dirtyllas_usuarios');
  if($consulta->num_rows() > 0){
    foreach ($consulta->result() as $row) {
    $result[] = $this->create($row);
    }
  }else{
    $result[] = $this->create($this->_columns);
  }
    return $result;
  }

function login($correo, $contrasena){
  $datos=array();
  $Usuario = null;
  $result = $this->db->get_where('dirtyllas_usuarios',array('usuario_correo'=>$correo));
  if ($result->num_rows() > 0) {
    $row = $result->row_object();
    if($row->usuario_contrasena == $contrasena){
      $Usuario = $this->create($row);
    }
  }
  return $Usuario;
}

}
