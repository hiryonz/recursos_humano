<?php
class Empleado {
    private $id;
    private $nombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $cedula;
    private $turno;
    private $departamento;
    private $provincia;
    private $distrito;
    private $corregimiento;
    private $correo;
    private $telefono;
    private $salarioInicial;
    private $salarioHora;
    private $salarioBruto;
    private $salarioNeto;
    private $descuento;
    private $bonos;
    private $nPlanilla;

    
    public function __construct($id, $nombre, $segundoNombre, $primerApellido, $segundoApellido, $cedula, $turno, $departamento, $provincia, $distrito, $corregimiento, $correo, $telefono, $salarioInicial, $salarioHora, $salarioBruto, $salarioNeto, $descuento, $bonos, $nPlanilla) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->cedula = $cedula;
        $this->turno = $turno;
        $this->departamento = $departamento;
        $this->provincia = $provincia;
        $this->distrito = $distrito;
        $this->corregimiento = $corregimiento;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->salarioInicial = $salarioInicial;
        $this->salarioHora = $salarioHora;
        $this->salarioBruto = $salarioBruto;
        $this->salarioNeto = $salarioNeto;
        $this->descuento = $descuento;
        $this->bonos = $bonos;
        $this->nPlanilla = $nPlanilla;
    }
    
    public function __construct2() {}

    public function getId() {
        return $this->id;
}
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getSegundoNombre() {
        return $this->segundoNombre;
    }
    
    public function setSegundoNombre($segundoNombre) {
        $this->segundoNombre = $segundoNombre;
    }
    
    public function getPrimerApellido() {
        return $this->primerApellido;
    }
    
    public function setPrimerApellido($primerApellido) {
        $this->primerApellido = $primerApellido;
    }
    
    public function getSegundoApellido() {
        return $this->segundoApellido;
    }
    
    public function setSegundoApellido($segundoApellido) {
        $this->segundoApellido = $segundoApellido;
    }
    
    public function getCedula() {
        return $this->cedula;
    }
    
    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }
    
    public function getTurno() {
        return $this->turno;
    }
    
    public function setTurno($turno) {
        $this->turno = $turno;
    }
    
    public function getDepartamento() {
        return $this->departamento;
    }
    
    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }
    
    public function getProvincia() {
        return $this->provincia;
    }
    
    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }
    
    public function getDistrito() {
        return $this->distrito;
    }
    
    public function setDistrito($distrito) {
        $this->distrito = $distrito;
    }
    
    public function getCorregimiento() {
        return $this->corregimiento;
    }
    
    public function setCorregimiento($corregimiento) {
        $this->corregimiento = $corregimiento;
    }
    
    public function getCorreo() {
        return $this->correo;
    }
    
    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    
    public function getSalarioInicial() {
        return $this->salarioInicial;
    }
    
    public function setSalarioInicial($salarioInicial) {
        $this->salarioInicial = $salarioInicial;
    }
    
    public function getSalarioHora() {
        return $this->salarioHora;
    }
    
    public function setSalarioHora($salarioHora) {
        $this->salarioHora = $salarioHora;
    }
    
    public function getSalarioBruto() {
        return $this->salarioBruto;
    }
    
    public function setSalarioBruto($salarioBruto) {
        $this->salarioBruto = $salarioBruto;
    }
    
    public function getSalarioNeto() {
        return $this->salarioNeto;
    }
    
    public function setSalarioNeto($salarioNeto) {
        $this->salarioNeto = $salarioNeto;
    }
    
    public function getDescuento() {
        return $this->descuento;
    }
    
    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }
    
    public function getBonos() {
        return $this->bonos;
    }
    
    public function setBonos($bonos) {
        $this->bonos = $bonos;
    }
    
    public function getNPlanilla() {
        return $this->nPlanilla;
    }
    
    public function setNPlanilla($nPlanilla) {
        $this->nPlanilla = $nPlanilla;
    }


}


?>