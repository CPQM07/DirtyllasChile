<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEnd extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Zapatillas_Model', 'Zapatillas');
    $this->load->model('Marcas_Model', 'Marcas');
  }

  function index()
  {
    $datos['Zapatillas'] = $this->Zapatillas->findAll();
    $datos['Marcas'] = $this->Marcas->findAll();
    $datos['AddActive'] = "Todas";
    $datos['Frase'] = "Del Mundo para Tus Pies!";
    $this->load->view('Inicio/Inicio', $datos);
  }

  function Genero($Genero)
  {
    $datos['Zapatillas'] = $this->Zapatillas->findBySex($Genero);
    $datos['Marcas'] = $this->Marcas->findAll();
    $datos['AddActive'] = "$Genero";

    //ENUNCIADOS PARALAX
    if ($Genero == 'hombre') { $datos['Frase'] = "Zapatillas Hombre";}
      elseif ($Genero == 'mujer') { $datos['Frase'] = "Zapatillas Mujer"; }
      elseif ($Genero == 'unisex') { $datos['Frase'] = "Zapatillas Unisex";}
      elseif ($Genero != 'hombre' || $Genero != 'mujer' || $Genero != 'unisex') { $datos['Frase'] = "Aqui no Sapo Culiao"; }

    $this->load->view('Inicio/Inicio', $datos);
  }

  function Marca($Marca)
  {
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

    $this->load->view('Inicio/Inicio', $datos);
  }

  function test()
  {
    $datos['Zapatillas'] = $this->Zapatillas->findAll();
    $datos['Marcas'] = $this->Marcas->findAll();
    $this->load->view('Zapatillas', $datos);
  }

}
