<?php

class Fabrica
{
  private $cantMaxOperarios;
  private $operarios;
  private $razonSocial;

  public function __construct($rs)
  {
    $this->razonSocial=$rs;
    $this->cantMaxOperarios=5;
    $this->operarios = array();
  }

  //Calcula el dinero gastado en salario de toda la fábrica.
  private function RetornarCostos():float
  {
    $retorno=0;
    foreach ($this->operarios as $item)
    {
      if($item!=null)
      $retorno+=$item->salario;
    }
    return $retorno;
  }

  //Recorre la lista de empleados y compara si alguno es igual
  //al empleado pasado como parámetro. Retorna TRUE si alguno coincide.
  public function Equals(Fabrica $fb, Operario $op):bool
  {
    $retorno = false;
    foreach($fb->operarios as $item)
    {
      if($item==$op)
      {
        $retorno=true;
        break;
      }
    }
    return $retorno;
  }

  //Agrega un operario pasado por parámetro.
  public function Add(Operario $op):bool
  {
    $retorno = false;
    $cantidadActual=count($this->operarios)."<br>";    
    if
    (
      !$this->Equals($this, $op) &&
      $cantidadActual < $this->cantMaxOperarios &&
      $op != null
    )
    {
      array_push($this->operarios,$op);
      $retorno=true;

    }
    return $retorno;
  }

  public function Remove(Operario $op):bool
  {
    $retorno = false;
    $indice=-1;
    if($this->Equals($this,$op) && $op!=null)
    {
      $indice=array_search($op,$this->operarios);
      unset($this->operarios[$indice]);
      $retorno = true;
    }
    else
    echo "No se pudo eliminar el opearario de la fábrica.<br>";

    return $retorno;

  }

  ///Retorna un string con toda la informacion de la fábrica.
  public function MostrarOperarios():string
  {
    $datos="";
    foreach ($this->operarios as $item)
    {
      if($item!=null)
      {
        $datos.= Operario::MostrarOp($item)."<br>";        
      }

    }
    return $datos;
  }

  public static function MostrarCosto(Fabrica $fb):void
  {
    echo $fb->RetornarCostos();

  }
}
