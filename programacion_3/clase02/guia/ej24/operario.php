<?php

class Operario{
  private $apellido;
  private $legajo;
  private $nombre;
  public $salario;

  public function __construct($legajo,$apellido,$nombre){
    $this->legajo= $legajo;
    $this->apellido=$apellido;
    $this->nombre=$nombre;
  }

  ///Obtiene el salario del operario y retorno un double.
  public function GetSalario():float
  {
    $salario = 0;
    if($this->salario!=null)
      $salario=$this->salario;
    return $salario;
  }

  ///Retorna el nombre y el apellido del operario en forma de string.
  public function GetNombreApellido():string
  {
    $str="";
    if($this->nombre != null && $this->apellido!=null)
      {
        $str.=$this->nombre.", ".$this->apellido.".<br>";
      }
    return $str;
  }

  //Aumenta el sueldo del operario en un rango de 0% a 100%.
  public function SetAumentarSalario($aumento):void
  {
    if($aumento>0 && $aumento<=100)
    {
      $aumento = $this->salario*$aumento/100;
      $this->salario+=$aumento;
    }
    else
    {
      $this->salario;
      echo "No se pudo realizar el aumento del sueldo.";
    }
  }

  ///Método igualdad que compara dos operarios. Retorna True en caso de
  //ser iguales
  public function Equals(Operario $opUno, Operario $opDos):bool
  {
    $retorno = false;
    if($opUno->legajo == $opDos->legajo &&
      $opUno->nombre == $opDos->nombre &&
      $opUno->apellido == $opDos->apellido
    )
      $retorno=true;
    return $retorno;
  }

  //Metodo de instancia Mostrar
  public function Mostrar():string
  {
    $datos="";
    $datos.=$this->GetNombreApellido();
    $datos.="Legajo: ".$this->legajo."<br>";
    $datos.="Salario: ".$this->GetSalario()."<br>";
    return $datos;
  }


  //DOS METODOS SE LLAMAN IGUALES.
  public static function MostrarOp(Operario $operario):string
  {
    return $operario->Mostrar();
  }



}


 ?>
