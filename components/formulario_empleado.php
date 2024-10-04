<!doctype html>
<html lang="es">

<head>
    <title>Formulario de Empleado</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/formularios.css">
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario Perron -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-form shadow p-4">
                    <h3 class="text-center mb-4">Formulario de Empleado</h3>
                    <form action="../classes/obtenerData.php" method="POST">
                    <div class="mb-3">
                            <label for="cedula" class="form-label">Cédula:</label>
                            <input type="text" class="form-control" id="cedula" name="cedula"
                                placeholder="Ingresa tu cédula" >
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre1" class="form-label">Primer Nombre:</label>
                                <input type="text" class="form-control" id="nombre1" name="nombre1"
                                    placeholder="Ingresa tu primer nombre" >
                            </div>
                            <div class="col-md-6">
                                <label for="nombre2" class="form-label">Segundo Nombre:</label>
                                <input type="text" class="form-control" id="nombre2" name="nombre2"
                                    placeholder="Ingresa tu segundo nombre">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="apellido1" class="form-label">Primer Apellido:</label>
                                <input type="text" class="form-control" id="apellido1" name="apellido1"
                                    placeholder="Ingresa tu primer apellido" >
                            </div>
                            <div class="col-md-6">
                                <label for="apellido2" class="form-label">Segundo Apellido:</label>
                                <input type="text" class="form-control" id="apellido2" name="apellido2"
                                    placeholder="Ingresa tu segundo apellido">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="genero" class="form-label">Género</label>
                                <select class="form-control" id="genero" name="genero" onchange="toggleApellidoC()">
                                    <option value="m">M</option>
                                    <option value="f">F</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="apellido2" class="form-label">Estado civil</label>
                                <select class="form-control" id="genero" name="genero" onchange="toggleApellidoC()">
                                    <option value="soltero">Solter@</option>
                                    <option value="casado">Casad@</option>
                                    <option value="divorciado">Divorciad@</option>
                                    <option value="viudo">Viud@</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3" id="usa_apellidoC_div" style="display: none;">
                            <div class="col-md-6">
                                <label for="usa_apellidoC" class="form-label">¿Usa Apellido de Casada?</label>
                                <select class="form-control" id="usa_apellidoC" name="usa_apellidoC"
                                    onchange="toggleApellidoCasada()">
                                    <option value="no">No</option>
                                    <option value="si">Sí</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3" id="campo_apellidoC" style="display: none;">
                            <div class="col-md-6">
                                <label for="apellidoC" class="form-label">Apellido Casada:</label>
                                <input type="text" class="form-control" id="apellidoC" name="apellidoC"
                                    placeholder="Ingresa tu apellido de casada">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="horario" class="form-label">Horario:</label>
                                <input type="text" class="form-control" id="horario" name="horario"
                                    placeholder="Ingresa tu horario" >
                            </div>
                            <div class="col-md-6">
                                <label for="departamento" class="form-label">Departamento:</label>
                                <input type="text" class="form-control" id="departamento" name="departamento"
                                    placeholder="Ingresa tu departamento" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="provincia" class="form-label">Provincia:</label>
                                <input type="text" class="form-control" id="provincia" name="provincia"
                                    placeholder="Ingresa tu provincia" >
                            </div>
                            <div class="col-md-4">
                                <label for="distrito" class="form-label">Distrito:</label>
                                <input type="text" class="form-control" id="distrito" name="distrito"
                                    placeholder="Ingresa tu distrito" >
                            </div>
                            <div class="col-md-4">
                                <label for="corregimiento" class="form-label">Corregimiento:</label>
                                <input type="text" class="form-control" id="corregimiento" name="corregimiento"
                                    placeholder="Ingresa tu corregimiento" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="correo" class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    placeholder="Ingresa tu correo" >
                            </div>
                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ingresa tu teléfono" >
                            </div>
                        </div>
                        <h3 class="text-center mb-4">Planilla</h3>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="horas_trabajadas" class="form-label">Horas trabajadas:</label>
                                <input type="text" class="form-control" id="horas_trabajadas" name="horas_trabajadas"
                                    placeholder="Ingresa las horas trabajadas" >
                            </div>
                            <div class="col-md-6">
                                <label for="sal_hora" class="form-label">Salario por hora:</label>
                                <input type="text" class="form-control" id="sal_hora" name="sal_hora"
                                    placeholder="Ingresa tu salario por hora" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="salario_bruto" class="form-label">Salario Bruto</label>
                                <input type="text" class="form-control" id="salario_bruto" name="salario_bruto"
                                    placeholder="salario bruto" >
                            </div>
                            <div class="col-md-4">
                                <label for="seguro_social" class="form-label">Seguro Social</label>
                                <input type="text" class="form-control" id="seguro_social" name="seguro_social"
                                    placeholder="Seguro Social" >
                            </div>
                            <div class="col-md-4">
                                <label for="seguro_educativo" class="form-label">Seguro Educativo:</label>
                                <input type="text" class="form-control" id="seguro_educativo" name="seguro_educativo"
                                    placeholder="Seguro Educativo">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="ir" class="form-label">1/R:</label>
                                <input type="text" class="form-control" id="ir" name="ir" placeholder="Ingresa 1/R" >
                            </div>
                            <div class="col-md-4">
                                <label for="descuento1" class="form-label">Descuento1:</label>
                                <input type="text" class="form-control" id="descuento1" name="descuento1"
                                    placeholder="Ingresa el Descuento1" >
                            </div>
                            <div class="col-md-4">
                                <label for="descuento2" class="form-label">Descuento2:</label>
                                <input type="text" class="form-control" id="descuento2" name="descuento2"
                                    placeholder="Ingresa el Descuento2" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="descuento3" class="form-label">Descuento3:</label>
                                <input type="text" class="form-control" id="descuento3" name="descuento3"
                                    placeholder="Ingresa el Descuento3">
                            </div>
                            <div class="col-md-6">
                                <label for="deducciones" class="form-label">Deducciones:</label>
                                <input type="text" class="form-control" id="deducciones" name="deducciones" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="salario_neto" class="form-label">Salario Neto:</label>
                                <input type="text" class="form-control" id="salario_neto" name="salario_neto" >
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer>
        <p>© 2024 Me Corro en los jefes.com Todos los derechos reservados.</p>
    </footer>
    <script>
        function toggleApellidoC() {
            var genero = document.getElementById("genero").value;
            var usaApellidoCField = document.getElementById("usa_apellidoC_div");

            if (genero === "f") {
                usaApellidoCField.style.display = "block";
            } else {
                usaApellidoCField.style.display = "none";
                document.getElementById("usa_apellidoC").value = "no";
                toggleApellidoCasada();
            }
        }

        function toggleApellidoCasada() {
            var usaApellidoC = document.getElementById("usa_apellidoC").value;
            var campoApellidoC = document.getElementById("campo_apellidoC");
            if (usaApellidoC === "si") {
                campoApellidoC.style.display = "block";
            } else {
                campoApellidoC.style.display = "none";
                document.getElementById("apellidoC").value = "";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>