<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->load->model('Zapatillas_Model', 'Zapatillas');
    $datos['Zapatillas'] = $this->Zapatillas->findAll();
    $this->load->view('Zapatillas', $datos);
  }

}
