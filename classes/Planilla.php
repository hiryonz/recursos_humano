<?php
class Planilla extends Empleado {
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
    private $nPosicion;
    private $horasTrabajadas;

    public function __construct(
        $salarioInicial = 0,
        $salarioHora = 0,
        $salarioBruto = 0,
        $salarioNeto = 0,
        $descuento1 = 0,
        $descuento2 = 0,
        $descuento3 = 0,
        $seguroSocial = 0,
        $seguroEducativo = 0,
        $IR = 0,
        $deducciones = 0,
        $bonos = 0,
        $nPlanilla = '',
        $nPosicion = '',
        $horasTrabajadas = 0
      ) {
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
        $this->nPlanilla = $nPlanilla;
        $this->nPosicion = $nPosicion;
        $this->horasTrabajadas = $horasTrabajadas;
      }

    // Métodos Getters
    public function getSalarioInicial() {
        return $this->salarioInicial;
    }

    public function getSalarioHora() {
        return $this->salarioHora;
    }

    public function getSalarioBruto() {
        return $this->salarioBruto;
    }

    public function getSalarioNeto() {
        return $this->salarioNeto;
    }

    public function getDescuento1() {
        return $this->descuento1;
    }

    public function getDescuento2() {
        return $this->descuento2;
    }

    public function getDescuento3() {
        return $this->descuento3;
    }

    public function getSeguroSocial() {
        return $this->seguroSocial;
    }

    public function getSeguroEducativo() {
        return $this->seguroEducativo;
    }

    public function getIR() {
        return $this->IR;
    }

    public function getDeducciones() {
        return $this->deducciones;
    }

    public function getBonos() {
        return $this->bonos;
    }

    public function getNPlanilla() {
        return $this->nPlanilla;
    }

    public function getNPosicion() {
        return $this->nPosicion;
    }

    public function getHorasTrabajadas() {
        return $this->horasTrabajadas;
    }

    // Métodos Setters
    public function setSalarioInicial($salarioInicial) {
        $this->salarioInicial = $salarioInicial;
    }

    public function setSalarioHora($salarioHora) {
        $this->salarioHora = $salarioHora;
    }

    public function setSalarioBruto($salarioBruto) {
        $this->salarioBruto = $salarioBruto;
    }

    public function setSalarioNeto($salarioNeto) {
        $this->salarioNeto = $salarioNeto;
    }

    public function setDescuento1($descuento1) {
        $this->descuento1 = $descuento1;
    }

    public function setDescuento2($descuento2) {
        $this->descuento2 = $descuento2;
    }

    public function setDescuento3($descuento3) {
        $this->descuento3 = $descuento3;
    }

    public function setSeguroSocial($seguroSocial) {
        $this->seguroSocial = $seguroSocial;
    }

    public function setSeguroEducativo($seguroEducativo) {
        $this->seguroEducativo = $seguroEducativo;
    }

    public function setIR($IR) {
        $this->IR = $IR;
    }

    public function setDeducciones($deducciones) {
        $this->deducciones = $deducciones;
    }

    public function setBonos($bonos) {
        $this->bonos = $bonos;
    }

    public function setNPlanilla($nPlanilla) {
        $this->nPlanilla = $nPlanilla;
    }

    public function setNPosicion($nPosicion) {
        $this->nPosicion = $nPosicion;
    }

    public function setHorasTrabajadas($horasTrabajadas) {
        $this->horasTrabajadas = $horasTrabajadas;
    }
}


?>