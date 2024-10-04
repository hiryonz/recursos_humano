<?php
class Empleado {
    private $id;
    private $nombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $usaACasado;
    private $cedula;
    private $genero;
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
    private $descuento1;
    private $descuento2;
    private $descuento3;
    private $seguroSocial;
    private $seguroEducativo;
    private $IR;
    private $deducciones;
    private $bonos;
    private $nPlanilla;
    private $npocision;

    private $horaTrabajada;

    // Constructor
    public function __construct($nombre, $segundoNombre, $primerApellido, $segundoApellido, $usaACasado, $cedula, $genero, $turno, $departamento, 
                                $provincia, $distrito, $corregimiento, $correo, $telefono, $salarioInicial, $horaTrabajada, $salarioHora, $salarioBruto, 
                                $salarioNeto, $descuento1, $descuento2, $descuento3, $seguroSocial, $seguroEducativo, $IR, $deducciones, $bonos, $nPlanilla,$npocision) {
        $this->nombre = $nombre;
        $this->segundoNombre = $segundoNombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->usaACasado = $usaACasado;
        $this->cedula = $cedula;
        $this->genero = $genero;
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
        $this->descuento1 = $descuento1;
        $this->descuento2 = $descuento2;
        $this->descuento3 = $descuento3;
        $this->seguroSocial = $seguroSocial;
        $this->seguroEducativo = $seguroEducativo;
        $this->IR = $IR;
        $this->deducciones = $deducciones;
        $this->bonos = $bonos;
        $this->horaTrabajada = $horaTrabajada;
        $this->nPlanilla = $nPlanilla;
        $this->npocision = $npocision;
    }

    // Getters and Setters
    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    
    public function getHoraTrabajada() {
        return $this->horaTrabajada;
    }

    public function setHoraTrabajada($horaTrabajada) {
        $this->horaTrabajada = $horaTrabajada;
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

    public function getUsaACasado() {
        return $this->usaACasado;
    }

    public function setUsaACasado($usaACasado) {
        $this->usaACasado = $usaACasado;
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

    public function getDescuento1() {
        return $this->descuento1;
    }

    public function setDescuento1($descuento1) {
        $this->descuento1 = $descuento1;
    }

    public function getDescuento2() {
        return $this->descuento2;
    }

    public function setDescuento2($descuento2) {
        $this->descuento2 = $descuento2;
    }

    public function getDescuento3() {
        return $this->descuento3;
    }

    public function setDescuento3($descuento3) {
        $this->descuento3 = $descuento3;
    }

    public function getSeguroSocial() {
        return $this->seguroSocial;
    }

    public function setSeguroSocial($seguroSocial) {
        $this->seguroSocial = $seguroSocial;
    }

    public function getSeguroEducativo() {
        return $this->seguroEducativo;
    }

    public function setSeguroEducativo($seguroEducativo) {
        $this->seguroEducativo = $seguroEducativo;
    }

    public function getIR() {
        return $this->IR;
    }

    public function setIR($IR) {
        $this->IR = $IR;
    }

    public function getDeducciones() {
        return $this->deducciones;
    }

    public function setDeducciones($deducciones) {
        $this->deducciones = $deducciones;
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
    public function getNPocision() {
        return $this->npocision;
    }

    public function setNPocision($npocision) {
        $this->npocision = $npocision;
    }
}

?>