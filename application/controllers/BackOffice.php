<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->layout->setLayout('/BackOffice/MasterPage', false);
    $this->load->model('Zapatillas_Model', 'Zapatillas');
    $this->load->model('Categorias_Model', 'Categorias');
    $this->load->model('Marcas_Model', 'Marcas');
  }

  function shoes()
  {
    $datos['Zapatillas'] = $this->Zapatillas->findAll();
    $datos['AddActive'] = "Zapatillas";
    $this->layout->view('/BackOffice/Zapatillas', $datos);
  }

  function category()
  {
    $datos['Categorias'] = $this->Categorias->findAll();
    $datos['AddActive'] = "Categorias";
    $this->layout->view('/BackOffice/Categorias', $datos);
  }

  function brands()
  {
    $datos['Marcas'] = $this->Marcas->findAll();
    $datos['AddActive'] = "Marcas";
    $this->layout->view('/BackOffice/Marcas', $datos);
  }

  function newShoes()
  {
    $datos['AddActive'] = "Zapatillas";
    $this->layout->view('/BackOffice/RegistroZapatilla', $datos);
  }

  function newCategory()
  {
    $datos['AddActive'] = "Categorias";
    $this->layout->view('/BackOffice/RegistroCategoria', $datos);
  }

  function newBrand()
  {
    $datos['AddActive'] = "Marcas";
    $this->layout->view('/BackOffice/RegistroMarca', $datos);
  }

}
