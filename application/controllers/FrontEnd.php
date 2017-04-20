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
    if ($Marca == 'NIKE') { $datos['Frase'] = "NIKE";}
      elseif ($Marca == 'ADIDAS') { $datos['Frase'] = "ADIDAS"; }
      elseif ($Marca == 'NEW BALANCE') { $datos['Frase'] = "NEW BALANCE";}
      elseif ($Marca == 'PUMA') { $datos['Frase'] = "PUMA";}
      elseif ($Marca == 'ASICS') { $datos['Frase'] = "ASICS";}
      elseif ($Marca == 'TIMBERLAND') { $datos['Frase'] = "TIMBERLAND";}
      elseif ($Marca != 'NIKE' || $Marca != 'ADIDAS' || $Marca != 'NEW BALANCE' ||
      $Marca != 'PUMA' || $Marca != 'ASICS' || $Marca != 'TIMBERLAND') { $datos['Frase'] = "Aqui no Sapo Culiao"; }

    $this->load->view('Inicio/Inicio', $datos);
  }

  function test()
  {
    $datos['Zapatillas'] = $this->Zapatillas->findAll();
    $datos['Marcas'] = $this->Marcas->findAll();
    $this->load->view('Zapatillas', $datos);
  }

}
