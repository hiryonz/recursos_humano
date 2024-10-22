<?php
class Empleado {
    private $id;
    private $cedula;
    private $nombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $genero;
    private $estadoCivil;
    private $usaAC;
    private $apellidoCasada;
    private $turno;
    private $departamento;
    private $distrito;
    private $correo;
    private $telefono;
    private $provincia;
    private $corregimiento;

 
    public function __construct(
        $cedula = '',
        $nombre = '',
        $segundoNombre = '',
        $primerApellido = '',
        $segundoApellido = '',
        $genero = '',
        $estadoCivil = '',
        $usaAC = '',
        $apellidoCasada = '',
        //$turno = '',
        $departamento = '',
        $distrito = '',
        $correo = '',
        $telefono = '',
        $provincia = '',
        $corregimiento = ''
    ){
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->genero = $genero;
        $this->estadoCivil = $estadoCivil;
        $this->usaAC = $usaAC;
        $this->apellidoCasada = $apellidoCasada;
        //$this->turno = $turno;
        $this->departamento = $departamento;
        $this->distrito = $distrito;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->provincia = $provincia;
        $this->corregimiento = $corregimiento;
    }

    public function dataHombre(
        $cedula = '',
        $nombre = '',
        $segundoNombre = '',
        $primerApellido = '',
        $segundoApellido = '',
        $genero = '',
        $estadoCivil = '',
        //$turno = '',
        $departamento = '',
        $distrito = '',
        $correo = '',
        $telefono = '',
        $provincia = '',
        $corregimiento = ''
     ){       
            $this->cedula = $cedula;
            $this->nombre = $nombre;
            $this->segundoNombre = $segundoNombre;
            $this->primerApellido = $primerApellido;
            $this->segundoApellido = $segundoApellido;
            $this->genero = $genero;
            $this->estadoCivil = $estadoCivil;
            //$this->turno = $turno;
            $this->departamento = $departamento;
            $this->distrito = $distrito;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->provincia = $provincia;
            $this->corregimiento = $corregimiento;
    }



    // Getters y Setters
    public function getId() {return $this->cedula;}
    public function setId($cedula){$this->cedula = $cedula;}
    public function getCedula() { return $this->cedula; }
    public function setCedula($cedula) { $this->cedula = $cedula; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getSegundoNombre() { return $this->segundoNombre; }
    public function setSegundoNombre($segundoNombre) { $this->segundoNombre = $segundoNombre; }

    public function getPrimerApellido() { return $this->primerApellido; }
    public function setPrimerApellido($primerApellido) { $this->primerApellido = $primerApellido; }

    public function getSegundoApellido() { return $this->segundoApellido; }
    public function setSegundoApellido($segundoApellido) { $this->segundoApellido = $segundoApellido; }

    public function getGenero() { return $this->genero; }
    public function setGenero($genero) { $this->genero = $genero; }

    public function getEstadoCivil() { return $this->estadoCivil; }
    public function setEstadoCivil($estadoCivil) { $this->estadoCivil = $estadoCivil; }

    public function getUsaAC() { return $this->usaAC; }
    public function setUsaAC($usaAC) { $this->usaAC = $usaAC; }

    public function getApellidoCasada() { return $this->apellidoCasada; }
    public function setApellidoCasada($apellidoCasada) { $this->apellidoCasada = $apellidoCasada; }

    public function getTurno() { return $this->turno; }
    public function setTurno($turno) { $this->turno = $turno; }

    public function getDepartamento() { return $this->departamento; }
    public function setDepartamento($departamento) { $this->departamento = $departamento; }

    public function getDistrito() { return $this->distrito; }
    public function setDistrito($distrito) { $this->distrito = $distrito; }

    public function getCorreo() { return $this->correo; }
    public function setCorreo($correo) { $this->correo = $correo; }

    public function getTelefono() { return $this->telefono; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }

    public function getProvincia() { return $this->provincia; }
    public function setProvincia($provincia) { $this->provincia = $provincia; }

    public function getCorregimiento() { return $this->corregimiento; }
    public function setCorregimiento($corregimiento) { $this->corregimiento = $corregimiento; }
}

?>