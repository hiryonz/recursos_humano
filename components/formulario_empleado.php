<!doctype html>
<html lang="es">

<head>
    <title>Formulario de Empleado</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/formulario5.css">
</head>

<body>
    <!-- Barra de navegacion que deberia ser rojo bebesones -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Puchaina88</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="formulario_empleado.php">Recursos Humano</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_empleado.php">Ver Empleado</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario Perron -->

    <div class="container">
        <div class="row form">
            <div class="col-md-12">
                <div class="container-form shadow p-4">

                    
                    <form id="formularioRH" action="../classes/obtenerData.php" method="POST">

                <?php
                    if (isset($_GET['status']) && isset($_GET['message'])) {
                        $status = $_GET['status'];
                        $message = htmlspecialchars($_GET['message']); // Prevent XSS

                        if ($status === 'success') {
                            echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$message</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>
                            "; 
                            
                        } elseif ($status === 'failure') {
                            echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>$message</strong>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>
                            "; 
                        }
                    }
                ?>
                
                    <h3 class="text-center mb-4" style="width:'100%'">Formulario de Empleado</h3>
                    <form class="form-empleado" action="../classes/obtenerData.php" method="POST">

                    <div class="mb-3">
                            <label for="cedula" class="form-label">Cédula:</label>
                            <input type="text" class="form-control" id="cedula" name="cedula"
                                placeholder="x-xxx-xxxx" onkeypress="validacionCedula(event)" onblur="formatear(event)" required autocomplete="off">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre1" class="form-label" >Primer Nombre:</label>
                                <input type="text" class="form-control" id="nombre1" name="nombre1"
                                    placeholder="Ingresa tu primer nombre" onkeypress="validacionLetras(event)" autocomplete="off" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nombre2" class="form-label">Segundo Nombre:</label>
                                <input type="text" class="form-control" id="nombre2" name="nombre2"
                                    placeholder="Ingresa tu segundo nombre" onkeypress="validacionLetras(event)" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="apellido1" class="form-label">Primer Apellido:</label>
                                <input type="text" class="form-control" id="apellido1" name="apellido1"
                                    placeholder="Ingresa tu primer apellido" onkeypress="validacionLetras(event)" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="apellido2" class="form-label">Segundo Apellido:</label>
                                <input type="text" class="form-control" id="apellido2" name="apellido2"
                                    placeholder="Ingresa tu segundo apellido" onkeypress="validacionLetras(event)" autocomplete="off"> 
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="genero" class="form-label">Género</label>
                                <select class="form-control genero" id="genero" name="genero" onchange="toggleApellidoC(event)">
                                    <option value="0" selected>M</option>
                                    <option value="1">F</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="estadoCivil" class="form-label">Estado civil</label>
                                <select class="form-control estadoCivil" id="estadoCivil" name="estadoCivil" onchange="toggleApellidoC(event)">
                                    <option value="0" selected>Solter@</option>
                                    <option value="1">Casad@</option>
                                    <option value="2">Divorciad@</option>
                                    <option value="3">Viud@</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3 usa_apellidoC_div" id="usa_apellidoC_div" style="display: none;">
                            <div class="col-md-6">
                                <label for="usa_apellidoC" class="form-label">¿Usa Apellido de Casada?</label>
                                <select class="form-control usa_apellidoC" id="usa_apellidoC" name="usa_apellidoC"
                                    onchange="toggleApellidoCasada(event)">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3 campo_apellidoC" id="campo_apellidoC" style="display: none;">
                            <div class="col-md-6">
                                <label for="apellidoCasado" class="form-label">Apellido Casada:</label>
                                <input type="text" class="form-control apellidoCasado" id="apellidoCasado" name="apellidoCasado"
                                    placeholder="Ingresa tu apellido de casada" onkeypress="validacionLetras(event)" autocomplete="off">
                            </div>
                        </div>


                        <div class="row mb-3">
       
                            
                            <div class="col-md-6">
                                <label for="departamento" class="form-label">Departamento:</label>
                                <select class="form-control" id="departamento" name="departamento">
                                    <option value="4">Recursos Humano</option>
                                    <option value="1" selected>Tecnologia</option>
                                    <option value="2">Contabilidad</option>
                                    <option value="5">Compras</option>
                                    <option value="3">Bienes Patrimoniales</option>                           
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="provincia" class="form-label">Provincia:</label>
                                <select class="form-control form-select provincia" id="provincia" name="provincia" onchange="filtrarDistritos(event)">
                                    <!-- Opciones de provincias se agregarán aquí -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="distrito" class="form-label">Distrito:</label>
                                <select class="form-control form-select distrito" id="distrito" name="distrito" onchange="filtrarCorregimientos(event)">
                                    <!-- Opciones de distritos se agregarán aquí -->
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="corregimiento" class="form-label">Corregimiento:</label>
                                <select class="form-control form-select corregimiento" id="corregimiento" name="corregimiento">
                                    <!-- Opciones de corregimientos se agregarán aquí -->
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="correo" class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    placeholder="Ingresa tu correo" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ingresa tu teléfono" onkeypress="validacionNumeros(event)" autocomplete="off">
                            </div>
                        </div>
                        <h3 class="text-center mb-4">Planilla (mensual)</h3>
                        <div class="row">
                            <div class="col">
                                <label for="numero_pocision" class="form-label">Numero Pocision:</label>
                                <input type="text" class="form-control numero_pocision" id="numero_pocision" name="numero_pocision"
                                    placeholder="Ingresa pocision" required autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="horas_trabajadas" class="form-label">Horas trabajada:</label>
                                <input type="text" class="form-control horas_trabajadas" id="horas_trabajadas" name="horas_trabajadas"
                                    placeholder="Ingresa las horas trabajadas" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" required autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="sal_hora" class="form-label">Salario por hora:</label>
                                <input type="text" class="form-control sal_hora" id="sal_hora" name="sal_hora"
                                    placeholder="Ingresa tu salario por hora" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" required autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="salario_bruto" class="form-label">Salario Bruto:</label>
                                <input type="text" class="form-control salario_bruto" id="salario_bruto" name="salario_bruto"
                                    placeholder="salario bruto" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="seguro_social" class="form-label">Seguro Social:</label>
                                <input type="text" class="form-control seguro_social" id="seguro_social" name="seguro_social"
                                    placeholder="Seguro Social" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="seguro_educativo" class="form-label">Seguro Educativo:</label>
                                <input type="text" class="form-control seguro_educativo" id="seguro_educativo" name="seguro_educativo"
                                    placeholder="Seguro Educativo" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="ir" class="form-label">Impuesto/Renta:</label>
                                <input type="text" class="form-control ir" id="ir" name="ir" 
                                placeholder="Ingresa Impuesto/Renta:" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="descuento1" class="form-label">Descuento1:</label>
                                <input type="text" class="form-control descuento1" id="descuento1" name="descuento1"
                                    placeholder="Ingresa el Descuento1" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="descuento2" class="form-label">Descuento2:</label>
                                <input type="text" class="form-control descuento2" id="descuento2" name="descuento2"
                                    placeholder="Ingresa el Descuento2" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label for="descuento3" class="form-label">Descuento3:</label>
                                <input type="text" class="form-control descuento3" id="descuento3" name="descuento3"
                                    placeholder="Ingresa el Descuento3" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="deducciones" class="form-label">Deducciones:</label>
                                <input type="text" class="form-control deducciones" id="deducciones" name="deducciones" 
                                placeholder="Deducciones" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="salario_neto" class="form-label">Salario Neto:</label>
                                <input type="text" class="form-control salario_neto" id="salario_neto" name="salario_neto" 
                                placeholder="Salario Neto" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="insertar" id="accion">  <!-- Campo oculto -->

                        <div class="text-center">                            
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-danger" onclick="levantarPagina()">limpiar campos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row container-verEmpleado">
        <table class="table" id="tablaDatos">
            <thead id="thead">
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>

        <div class="text-center btn-tabla" id="parent-btn-div">
            <button  class="btn btn-primary actualizar" onclick="actualizar(event)">actualizar</button>
            <button  class="btn btn-danger eliminar" onclick="eliminar(event)">eliminar</button>
        </div>

    </div>
    </div>

                    <div class="container-actualizar-fondo">

                    </div>
                    <div class="container-actualizar">
                            <div class="row form2">
                                <div class="col-md-12">
                                    <div class="container-form shadow p-4" id="cloned-form">
                                        <div class=" d-flex justify-content-end">
                                            <button class="close-container btn btn-light" onclick="cerrarDivActualizar()">x</button>
                                        </div>
                                        <div class="close-container-actualizar">  
                                            <form class="form-empleado" action="../classes/obtenerData.php" method="POST">
                                             <div class="mb-3">
                                                        <label for="cedula" class="form-label">Cédula:</label>
                                                        <input type="text" class="form-control" id="cedula" name="cedula"
                                                            placeholder="x-xxx-xxxx" onkeypress="validacionCedula(event)" onblur="formatear(event)" required autocomplete="off">
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="nombre1" class="form-label" >Primer Nombre:</label>
                                                            <input type="text" class="form-control" id="nombre1" name="nombre1"
                                                                placeholder="Ingresa tu primer nombre" onkeypress="validacionLetras(event)" required autocomplete="off">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="nombre2" class="form-label">Segundo Nombre:</label>
                                                            <input type="text" class="form-control" id="nombre2" name="nombre2"
                                                                placeholder="Ingresa tu segundo nombre" onkeypress="validacionLetras(event)" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="apellido1" class="form-label">Primer Apellido:</label>
                                                            <input type="text" class="form-control" id="apellido1" name="apellido1"
                                                                placeholder="Ingresa tu primer apellido" onkeypress="validacionLetras(event)" autocomplete="off">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="apellido2" class="form-label">Segundo Apellido:</label>
                                                            <input type="text" class="form-control" id="apellido2" name="apellido2"
                                                                placeholder="Ingresa tu segundo apellido" onkeypress="validacionLetras(event)" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="genero" class="form-label">Género</label>
                                                            <select class="form-control genero" id="genero" name="genero" onchange="toggleApellidoC(event)" >
                                                                <option value="0" selected>M</option>
                                                                <option value="1">F</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="estadoCivil" class="form-label">Estado civil</label>
                                                            <select class="form-control estadoCivil" id="estadoCivil" name="estadoCivil" onchange="toggleApellidoC(event)">
                                                                <option value="0" selected>Solter@</option>
                                                                <option value="1">Casad@</option>
                                                                <option value="2">Divorciad@</option>
                                                                <option value="3">Viud@</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 usa_apellidoC_div" id="usa_apellidoC_div" style="display: none;">
                                                        <div class="col-md-6">
                                                            <label for="usa_apellidoC" class="form-label">¿Usa Apellido de Casada?</label>
                                                            <select class="form-control usa_apellidoC" id="usa_apellidoC" name="usa_apellidoC"
                                                                onchange="toggleApellidoCasada(event)">
                                                                <option value="0">No</option>
                                                                <option value="1">Sí</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 campo_apellidoC" id="campo_apellidoC" style="display: none;">
                                                        <div class="col-md-6">
                                                            <label for="apellidoCasado" class="form-label">Apellido Casada:</label>
                                                            <input type="text" class="form-control apellidoCasado" id="apellidoCasado" name="apellidoCasado"
                                                                placeholder="Ingresa tu apellido de casada" onkeypress="validacionLetras(event)" autocomplete="off">
                                                        </div>
                                                    </div>


                                                    <div class="row mb-3">
                                
                                                        
                                                        <div class="col-md-6">
                                                            <label for="departamento" class="form-label">Departamento:</label>
                                                            <select class="form-control" id="departamento" name="departamento">
                                                                <option value="4">Recursos Humano</option>
                                                                <option value="1" selected>Tecnologia</option>
                                                                <option value="2">Contabilidad</option>
                                                                <option value="5">Compras</option>
                                                                <option value="3">Bienes Patrimoniales</option>                           
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="provincia" class="form-label">Provincia:</label>
                                                            <select class="form-control form-select provincia" id="provincia" name="provincia" onchange="filtrarDistritos(event, true)">
                                                                <!-- Opciones de provincias se agregarán aquí -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="distrito" class="form-label">Distrito:</label>
                                                            <select class="form-control form-select distrito" id="distrito" name="distrito" onchange="filtrarCorregimientos(event, true)">
                                                                <!-- Opciones de distritos se agregarán aquí -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="corregimiento" class="form-label">Corregimiento:</label>
                                                            <select class="form-control form-select corregimiento" id="corregimiento" name="corregimiento">
                                                                <!-- Opciones de corregimientos se agregarán aquí -->
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="correo" class="form-label">Correo:</label>
                                                            <input type="email" class="form-control" id="correo" name="correo"
                                                                placeholder="Ingresa tu correo" autocomplete="off">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="telefono" class="form-label">Teléfono:</label>
                                                            <input type="text" class="form-control" id="telefono" name="telefono"
                                                                placeholder="Ingresa tu teléfono" onkeypress="validacionNumeros(event)" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <h3 class="text-center mb-4">Planilla (mensual)</h3>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="numero_pocision" class="form-label">Numero Pocision:</label>
                                                            <input type="text" class="form-control numero_pocision" id="numero_pocision" name="numero_pocision"
                                                                placeholder="Ingresa pocision" required autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="horas_trabajadas" class="form-label">Horas trabajada:</label>
                                                            <input type="text" class="form-control horas_trabajadas" id="horas_trabajadas" name="horas_trabajadas"
                                                                placeholder="Ingresa las horas trabajadas" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" required autocomplete="off">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="sal_hora" class="form-label">Salario por hora:</label>
                                                            <input type="text" class="form-control sal_hora" id="sal_hora" name="sal_hora"
                                                                placeholder="Ingresa tu salario por hora" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" required autocomplete="off">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="salario_bruto" class="form-label">Salario Bruto:</label>
                                                            <input type="text" class="form-control salario_bruto" id="salario_bruto" name="salario_bruto"
                                                                placeholder="salario bruto" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="seguro_social" class="form-label">Seguro Social:</label>
                                                            <input type="text" class="form-control seguro_social" id="seguro_social" name="seguro_social"
                                                                placeholder="Seguro Social" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="seguro_educativo" class="form-label">Seguro Educativo:</label>
                                                            <input type="text" class="form-control seguro_educativo" id="seguro_educativo" name="seguro_educativo"
                                                                placeholder="Seguro Educativo" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="ir" class="form-label">Impuesto/Renta:</label>
                                                            <input type="text" class="form-control ir" id="ir" name="ir" 
                                                            placeholder="Ingresa Impuesto/Renta:" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <label for="descuento1" class="form-label">Descuento1:</label>
                                                            <input type="text" class="form-control descuento1" id="descuento1" name="descuento1"
                                                                placeholder="Ingresa el Descuento1" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" autocomplete="off">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="descuento2" class="form-label">Descuento2:</label>
                                                            <input type="text" class="form-control descuento2" id="descuento2" name="descuento2"
                                                                placeholder="Ingresa el Descuento2" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" autocomplete="off">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="descuento3" class="form-label">Descuento3:</label>
                                                            <input type="text" class="form-control descuento3" id="descuento3" name="descuento3"
                                                                placeholder="Ingresa el Descuento3" onblur="redondearInput(event)" onkeypress="validacionNumerosPlanilla(event)" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <label for="deducciones" class="form-label">Deducciones:</label>
                                                            <input type="text" class="form-control deducciones" id="deducciones" name="deducciones" 
                                                            placeholder="Deducciones" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="salario_neto" class="form-label">Salario Neto:</label>
                                                            <input type="text" class="form-control salario_neto" id="salario_neto" name="salario_neto" 
                                                            placeholder="Salario Neto" readonly>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="accion" value="actualizar" id="accion">  <!-- Campo oculto -->

                                                    <div class="text-center">                            
                                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                                        <button type="reset" class="btn btn-danger" onclick="levantarPagina()">limpiar campos</button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

    </div>
    <footer>
        <p>© 2024 Me Corro en los jefes.com Todos los derechos reservados.</p>
    </footer>
    <script>
        //tonto el que lo lea
        function cerrarDivActualizar() {
            const containerActualizar = document.querySelector(".container-actualizar")
            const containerActualizarFondo = document.querySelector(".container-actualizar-fondo")

            containerActualizar.style.display = 'none'
            containerActualizarFondo.style.display = 'none'
        }

        
        async function Provincia(id, form, tipo) {
            try {
                const response = await fetch('../classes/databaseHelper/consultas/getProvincias.php');
                const provincias = await response.json();
                
                if (!form) form = document;
                const provinciaSelect = form.querySelector('#provincia');

                // Limpiar el select antes de agregar nuevas opciones
                provinciaSelect.innerHTML = '';

                provincias.forEach(provincia => {
                    const option = document.createElement('option');
                    option.value = provincia['codigo_provincia'];
                    option.textContent = provincia['nombre_provincia'];
                    provinciaSelect.appendChild(option);
                });

                if(!id) id = provincias[0]['codigo_provincia']

                
                await Distrito(id,  form, tipo);

            } catch (error) {
                console.error('Error al cargar provincias:', error);
            }
        }

        async function Distrito(id, form, tipo) {
            try {
                const response = await fetch(`../classes/databaseHelper/consultas/getDistrito.php?id=${id}`);
                const distritos = await response.json();
                
                if (!form) form = document;
                const distritoSelect = form.querySelector('#distrito');

                // Limpiar el select antes de agregar nuevas opciones
                distritoSelect.innerHTML = '';

                distritos.forEach(distrito => {
                    const option = document.createElement('option');
                    option.value = distrito['codigo_distrito'];
                    option.textContent = distrito['nombre_distrito'];
                    distritoSelect.appendChild(option);
                });
                
                if(tipo == 'provincia') id = distritos[0]['codigo_distrito']
                else  id = tipo

                
                await Corregimiento(id, form);
                
            } catch (error) {
                console.error('Error al cargar distritos:', error);
            }
        }

        async function Corregimiento(id, form) {
            try {
                const response = await fetch(`../classes/databaseHelper/consultas/getCorregimiento.php?id=${id}`);
                const corregimientos = await response.json();
                if (!form) form = document;
                const corregimientoSelect = form.querySelector('#corregimiento');

                // Limpiar el select antes de agregar nuevas opciones
                corregimientoSelect.innerHTML = '';

                corregimientos.forEach(corregimiento => {
                    const option = document.createElement('option');
                    option.value = corregimiento['codigo_corregimiento'];
                    option.textContent = corregimiento['nombre_corregimiento'];
                    corregimientoSelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error al cargar corregimientos:', error);
            }
        }




        async function filtrarDistritos(event, form) {
            const valor = event.target.value;
            if(form) form = event.target.closest('form')
            return await Distrito(valor, form, 'provincia')
        }

        async function filtrarCorregimientos(event, form) {
            const valor = event.target.value;
            if(form) form = event.target.closest('form')
            return await Corregimiento(valor, form)
        }



        setTimeout(function() {
            $(".alert").alert('close'); 
        }, 7000);



        async function actualizar(event) {
            const containerActualizar = document.querySelector(".container-actualizar")
            const containerActualizarFondo = document.querySelector(".container-actualizar-fondo")

            containerActualizar.style.display = 'block'
            containerActualizarFondo.style.display = 'flex'


            
            const clickedButton = event.target;
            const parentDivId  = clickedButton.closest('.btn-tabla');
            const cedula = parentDivId.id;

                const datos = await obtenerData('verEspecifico', cedula);
                console.log(datos)
                const empleado = datos.empleado[0];
                const planilla = datos.planilla[0] ; 
                
                console.log(planilla    )
                const parentDiv = document.getElementById('cloned-form');
                
                toggleApellidoC(null, parentDiv, empleado['Genero'])
                toggleApellidoCasada(null, containerActualizar, empleado['Usa A.C'])
                const provinciaData = await Provincia(empleado['codigo_provincia'], parentDiv, 'provincia')
                console.log(empleado['codigo_provincia'])
                const distritoData = await Distrito(empleado['codigo_provincia'], parentDiv, empleado['codigo_distrito'])


            
                parentDiv.querySelector('#cedula').value = empleado['Cedula'];
                parentDiv.querySelector('#nombre1').value = empleado['Nombre'];
                parentDiv.querySelector('#nombre2').value = empleado['Segundo_Nombre'];
                parentDiv.querySelector('#apellido1').value = empleado['Apellido']; 
                parentDiv.querySelector('#apellido2').value = empleado['Segundo_Apellido'];
                parentDiv.querySelector('#genero').value = empleado['Genero']; 
                parentDiv.querySelector('#estadoCivil').value = empleado['Estado_Civil']; 
                parentDiv.querySelector('#departamento').value = empleado['Departamento_ID']; 
                parentDiv.querySelector('#correo').value = empleado['Correo']; 
                parentDiv.querySelector('#telefono').value = empleado['Telefono']; 
                parentDiv.querySelector('#provincia').value = empleado['codigo_provincia']; 
                parentDiv.querySelector('#distrito').value = empleado['codigo_distrito']; 
                parentDiv.querySelector('#corregimiento').value = empleado['codigo_corregimiento']; 
                parentDiv.querySelector('#horas_trabajadas').value = planilla['Horas_Trabajadas']; 
                parentDiv.querySelector('#sal_hora').value = planilla['Salario_Por_Hora']; 
                parentDiv.querySelector('#seguro_social').value = planilla['Seguro_Social']; 
                parentDiv.querySelector('#seguro_educativo').value = planilla['Seguro_Educativo']; 
                parentDiv.querySelector('#salario_bruto').value = planilla['Salario_Bruto']; 
                parentDiv.querySelector('#ir').value = planilla['Impuesto_Renta']; 
                parentDiv.querySelector('#descuento1').value = planilla['Descuento_1']; 
                parentDiv.querySelector('#descuento2').value = planilla['Descuento_2']; 
                parentDiv.querySelector('#descuento3').value = planilla['Descuento_3'] || 0; 
                parentDiv.querySelector('#deducciones').value = planilla['Deducciones']; 
                parentDiv.querySelector('#salario_neto').value = planilla['Salario_Neto']; 
                parentDiv.querySelector('#numero_pocision').value = planilla['Numero_Posicion']; 

                
                console.log(planilla)

                if (empleado['Usa A.C'] == "1") {
                    parentDiv.querySelector('#usa_apellidoC').value = "1"; 
                    parentDiv.querySelector('#apellidoCasado').value = empleado['Apellido de Casada']; 
                } else {
                    parentDiv.querySelector('#usa_apellidoC').value = "0"; 
                    parentDiv.querySelector('#apellidoCasado').value = ""; 
                }


            
        }


        function eliminar(event){
            
            const clickedButton = event.target;
            const parentDiv  = clickedButton.closest('.btn-tabla');
            const cedula = parentDiv.id;
            
            if(!confirm("Deseas borrar este registro, cedula: " + cedula )){
                return;
            }



            const formData = new  FormData();
            formData.append('accion', 'eliminar');
            formData.append('cedula', cedula);

            fetch('../classes/obtenerData.php', {
                method: 'POST',
                body: formData, 
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);  // Show success message
                        window.location.reload();
                    } else {
                        console.log('Error: ' + data.message);  // Show error message
                    }
            })
            .catch(async (error) => {
                console.error('Error:', error);  
                const response = await fetch('../classes/obtenerData.php', {
                    method: 'POST',
                    body: formData
                });
                
                const text = await response.text(); // Obtén la respuesta como texto
                console.error('Respuesta del servidor:', text);

            });

        }


        /*
        * obtener los botones de actaulizar y eliminar
        */

        const btnActualizar = document.querySelectorAll('.actualizar');
        const accionInput = document.getElementById('accion');

        btnActualizar.forEach(btn => {
            btn.addEventListener('click', function() {
                accionInput.value = 'actualizar';
            });
        });


        


        function toggleApellidoC(event, form, genero) {
            if(event){
                var form = event.target.closest('form'); 
                var genero = event.target.value;
            }
            var usaApellidoCField = form.querySelector(".usa_apellidoC_div");
            genero = genero.toString()
            if (genero === "1") {
                usaApellidoCField.style.display = "block";
            } else {
                usaApellidoCField.style.display = "none";
                form.querySelector(".usa_apellidoC").value = "no";
                toggleApellidoCasada(null, form);  
            }
        }

        function toggleApellidoCasada(event, form, usaApellidoC) {
            if (!form) form = event.target.closest('form');  
            if (!usaApellidoC) var usaApellidoC = form.querySelector(".usa_apellidoC").value;
            var campoApellidoC = form.querySelector(".campo_apellidoC");
            usaApellidoC = usaApellidoC.toString()
            if (usaApellidoC === "1") {
                campoApellidoC.style.display = "block";
            } else {
                campoApellidoC.style.display = "none";
                form.querySelector(".apellidoCasado").value = "";
            }
        }

        // Add event listeners for both forms
        document.querySelectorAll('.genero').forEach(select => {
            select.addEventListener('change', toggleApellidoC);
        });

        document.querySelectorAll('.usa_apellidoC').forEach(select => {
            select.addEventListener('change', toggleApellidoCasada);
        });



        function levantarPagina() {
            window.scrollTo({top: 0, behavior: 'smooth' }); // Desplazarse suavemente a la sección
        }



        function actualizarData() {

            const actualizarDiv = document.getElementById("cloned-form")
            if (actualizarDiv) {
                initializePlanillaCalculators(actualizarDiv);
            }
        }


        document.addEventListener('DOMContentLoaded', async function() {
            Provincia(null, null, 'provincia');
            actualizarData();
            const datos = await obtenerData('verdata', '');
            crearTabla(datos['empleado']);

        });


        async function obtenerData(accion, cedula) {

            const formData = new  FormData();
            formData.append('accion', accion);
            formData.append('cedula', cedula);

            try {
                const response = await fetch("../classes/obtenerDataBase.php", {
                    method: "POST",
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error("Error en la respuesta del servidor");
                }

                // Espera a que la respuesta se convierta a JSON
                const datos = await response.json();
                return datos;

            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        }



        function crearTabla(datos, tablaId, theadId, tbodyId) {
            const tabla = document.getElementById('tableDato');
            const thead = document.getElementById('thead');
            const tbody = document.getElementById('tbody');

            thead.innerHTML = '';
            tbody.innerHTML = '';

            if (datos.length === 0) {
                const noData = document.createElement('tr');
                noData.innerHTML = '<td colspan="4">No hay datos disponibles</td>';
                tbody.appendChild(noData);
                return;
            }

            const columnas = ['#','Nombre', 'Cedula', 'Departamento_ID', 'Genero', 'Acciones'];

            const departamentos = {
                4: "Recursos Humano",
                1: "Tecnologia",
                2: "Contabilidad",
                5: "Compras",
                3: "Bienes Patrimoniales"
            };

            const filaCabecera = document.createElement('tr');
                
            columnas.forEach(columna => {
                const th = document.createElement('th');
                th.textContent = columna.charAt(0).toUpperCase() + columna.slice(1); // Capitalizar los nombres
                filaCabecera.appendChild(th);
            });

            thead.appendChild(filaCabecera);

            // Crear las filas de datos
            let cont = 1;
            datos.forEach(fila => {
                const filaDatos = document.createElement('tr');
                columnas.forEach(columna => {
                    const td = document.createElement('td');
                    td.textContent = fila[columna] ?? ""; 

                    if (columna === 'Acciones'){ 
                        let accion = document.querySelector('.btn-tabla')
                        let clonedDiv = accion.cloneNode(true)
                        clonedDiv.id = fila['Cedula']
                        td.appendChild(clonedDiv);
                    }

                    if(columna === '#') {
                        td.textContent = cont++;
                    }
                    if (columna === 'Departamento_ID') {
                        td.textContent = departamentos[fila[columna]] || fila[columna]; // Usar el valor como índice
                    } else if (columna === 'Genero') {
                        fila[columna] = (fila[columna] == "0") ? 'Masculino' : 'Femenino';
                        td.textContent = fila[columna];
                    }

                    filaDatos.appendChild(td);
                });
                tbody.appendChild(filaDatos);
            });
        }



        /*
        *
        *  seccion de los calculos de la planilla
        * 
        */


        function initializePlanillaCalculators(form) {
            const 
                horaTrabajada = form.querySelector(".horas_trabajadas"),
                salarioHora = form.querySelector(".sal_hora"),
                salarioBruto = form.querySelector(".salario_bruto"),
                seguroSocial = form.querySelector(".seguro_social"),
                seguroEducativo = form.querySelector(".seguro_educativo"),
                ir = form.querySelector(".ir"),
                descuento1 = form.querySelector(".descuento1"),
                descuento2 = form.querySelector(".descuento2"),
                descuento3 = form.querySelector(".descuento3"),
                deducciones = form.querySelector(".deducciones"),
                salarioNeto = form.querySelector(".salario_neto");

            horaTrabajada.addEventListener("input", calcularPlanilla);
            salarioHora.addEventListener("input", calcularPlanilla);
            descuento1.addEventListener("input", calcularPlanilla);
            descuento2.addEventListener("input", calcularPlanilla);
            descuento3.addEventListener("input", calcularPlanilla);


            function calcularPlanilla() {
                let horaTrabajadaValor = Math.round((parseFloat(horaTrabajada.value) || 0) * 100) / 100;
                let salarioHoraValor = Math.round((parseFloat(salarioHora.value) || 0) * 100) / 100;
                let descuento1Valor = Math.round((parseFloat(descuento1.value) || 0) * 100) / 100;
                let descuento2Valor = Math.round((parseFloat(descuento2.value) || 0) * 100) / 100;
                let descuento3Valor = Math.round((parseFloat(descuento3.value) || 0) * 100) / 100;



                salarioBruto.value = (horaTrabajadaValor * salarioHoraValor).toFixed(2);
                seguroSocial.value = (salarioBruto.value * 0.0975).toFixed(2);
                seguroEducativo.value = (salarioBruto.value * 0.0125).toFixed(2);

                // Calcular impuesto sobre la renta
                let salarioAnual = ((salarioBruto.value || 0) * 13).toFixed(2);
                let impuesto = 0;
                if (salarioAnual > 11000 && salarioAnual < 50000) {
                    impuesto = ((salarioAnual - 11000) * 0.15) / 13;
                } else if (salarioAnual > 50000) {
                    impuesto = ((50000 - 11000) * 0.15) / 13;
                    impuesto += ((salarioAnual - 50000) * 0.25) / 13;
                }

                ir.value = impuesto.toFixed(2);

                deducciones.value = parseFloat(
                    parseFloat(seguroSocial.value) + 
                    parseFloat(seguroEducativo.value) + 
                    parseFloat(ir.value) + 
                    parseFloat(descuento1Valor) + 
                    parseFloat(descuento2Valor) +  
                    parseFloat(descuento3Valor)
                ).toFixed(2);

                salarioNeto.value = ((salarioBruto.value || 0) - (deducciones.value || 0)).toFixed(2);
            }   

        }

        // Inicializa los calculadores para el formulario original
        const originalForm = document.querySelector(".form-empleado");
        initializePlanillaCalculators(originalForm);



        function validacionLetras(event) {
             const char = String.fromCharCode(event.which);
            // Verifica si el carácter es una letra (a-z o A-Z)
            if (!/[a-zA-Z]/.test(char)) {
                event.preventDefault(); // Evita la entrada del carácter
            }
        }

        function validacionNumeros(event) {
            const char = String.fromCharCode(event.which);

            // Verifica si el carácter es un número (0-9)
            if (!/[0-9]/.test(char)) {
                event.preventDefault(); // Evita la entrada del carácter
            }
        }


        function validacionNumerosPlanilla(event) {
            const char = String.fromCharCode(event.which);

            // Obtener el valor actual del input
            const inputValue = event.target.value;

            // Permitir solo números y el punto
            if (!/[0-9.]/.test(char)) {
                event.preventDefault(); // Evita la entrada del carácter
                return;
            }

            // Permitir solo un punto
            if (char === '.' && inputValue.includes('.')) {
                event.preventDefault(); // Evita más de un punto
                return;
            }


        }

        function redondearInput(event) {
            const value = parseFloat(event.target.value);
            if (!isNaN(value)) {
                event.target.value = value.toFixed(2); // Redondea a dos decimales
            }
        }

        function validacionCedula(event) {
            const char = String.fromCharCode(event.which);

            // Verifica si el carácter es un número (0-9)
            if (!/[0-9-]/.test(char)) {
                event.preventDefault(); // Evita la entrada del carácter
            }
        }

        function formatear(event) {
            const regex = /^\d{1,3}-\d{3}-\d{3,4}$/; // Expresión regular para validar el formato 8-888-8888

            if(event.target.value == '') {
                return
            }

            if (!regex.test(event.target.value)) {
                alert("Por favor, introduce el formato correcto: x-x-xxxx");
                event.target.value = ''
            }
        }


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>



     


</body>

</html>