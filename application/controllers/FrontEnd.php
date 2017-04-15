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
    $this->load->model('Marcas_Model', 'Marcas');
    $datos['Zapatillas'] = $this->Zapatillas->findAll();
    $datos['Marcas'] = $this->Marcas->findAll();
    $datos['AddActive'] = "Todas";
    $datos['Frase'] = "Del Mundo para Tus Pies!";
    $this->load->view('Inicio', $datos);
  }

  function Genero($Genero)
  {
    $this->load->model('Zapatillas_Model', 'Zapatillas');
    $this->load->model('Marcas_Model', 'Marcas');
    $datos['Zapatillas'] = $this->Zapatillas->findBySex($Genero);
    $datos['Marcas'] = $this->Marcas->findAll();
    $datos['AddActive'] = "$Genero";

    //ENUNCIADOS PARALAX
    if ($Genero == 1) { $datos['Frase'] = "Zapatillas Hombre";}
      elseif ($Genero == 2) { $datos['Frase'] = "Zapatillas Mujer"; }
      elseif ($Genero == 3) { $datos['Frase'] = "Zapatillas Unisex";}
      elseif ($Genero != 1 || $Genero != 2 || $Genero != 3) { $datos['Frase'] = "Aqui no Sapo Culiao"; }

    $this->load->view('Inicio', $datos);
  }

  function Marca($Marca)
  {
    $this->load->model('Zapatillas_Model', 'Zapatillas');
    $this->load->model('Marcas_Model', 'Marcas');
    $datos['Zapatillas'] = $this->Zapatillas->findByBrand($Marca);
    $datos['Marcas'] = $this->Marcas->findAll();
    $datos['AddActive'] = "Todas";

    //ENUNCIADOS PARALAX
    if ($Marca == 1) { $datos['Frase'] = "NIKE";}
      elseif ($Marca == 2) { $datos['Frase'] = "ADIDAS"; }
      elseif ($Marca == 3) { $datos['Frase'] = "NEW BALANCE";}
      elseif ($Marca == 4) { $datos['Frase'] = "PUMA";}
      elseif ($Marca == 5) { $datos['Frase'] = "ASICS";}
      elseif ($Marca == 6) { $datos['Frase'] = "TIMBERLAND";}
      elseif ($Marca != 1 || $Marca != 2 || $Marca != 3 ||
      $Marca != 4 || $Marca != 5 || $Marca != 6) { $datos['Frase'] = "Aqui no Sapo Culiao"; }

    $this->load->view('Inicio', $datos);
  }

}
