<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Dinámica con JSON</title>
    <link  href="../assets/css/formulario5.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    </style>
</head>
<body>

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
                <ul class="navbar-nav ms-auto">
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


    <!-- Ver datos perron -->
    <div class="container2">
        <div class="container-btn">
            <div class="btn btn-light" onclick="getJSON('empleado')">Empelados</div>
            <div class="btn btn-light" onclick="getJSON('planilla')">Planillas</div>
            <hr>
        </div>
        <div class="container-verEmpleado">
            <table class="table" id="tablaDatos">
                <thead id="thead">
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>© 2024 Me Corro en los jefes.com Todos los derechos reservados.</p>
    </footer>

    

    <script>
        document.addEventListener('DOMContentLoaded', getJSON('empleado'));



        function lugares(){

        }



        function getJSON(id) {
            fetch("../classes/obtenerDataBase.php")
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Error en la respuesta del servidor");
                    }
                    return response.json();
                })
                .then(datos => {
                    console.log(datos)
                    crearTabla(datos[id])
                })
                .catch(error => {
                    console.error('Error al obtener los datos:', error);
                });
        }

        function crearTabla(datos) {
            // Obtener referencias a la tabla
            const tabla = document.getElementById('tablaDatos');
            const thead = document.getElementById('thead');
            const tbody = document.getElementById('tbody');

            // Limpiar la tabla antes de llenarla
            thead.innerHTML = '';
            tbody.innerHTML = '';

            // Obtener todas las claves (columnas) únicas del JSON
            const columnas = new Set();
            datos.forEach(fila => {
                Object.keys(fila).forEach(columna => {
                    columnas.add(columna);
                });
            });
            
            const departamentos = {
                4: "Recursos Humano",
                1: "Tecnologia",
                2: "Contabilidad",
                5: "Compras",
                3: "Bienes Patrimoniales"
            };


            const civil = {
                "0": "Soltero",
                "1": "Casado",
                "2": "Divorciado",
                "3": "Viudo",
            };

            // Crear la fila de cabeceras
            const filaCabecera = document.createElement('tr');
            const th = document.createElement('th');
            th.textContent = "#";
            filaCabecera.appendChild(th);

            columnas.forEach(columna => {
                const th2 = document.createElement('th');
                th2.textContent = columna;
                filaCabecera.appendChild(th2);
            });
            thead.appendChild(filaCabecera);

            // Crear las filas de datos
            let cont = 1;
            datos.forEach(fila => {
                const filaDatos = document.createElement('tr');

                const td2 = document.createElement('td');
                td2.textContent = cont++;
                filaDatos.appendChild(td2)
                columnas.forEach(columna => {
                    const td = document.createElement('td');
                    td.textContent = fila[columna] || ''; // Si no existe la columna en esa fila, dejarla vacía



                    if (columna === 'Estado civil') {
                        td.textContent = civil[fila[columna]] || fila[columna]; // Usar el valor como índice
                    }else if (columna === 'Departamento_ID') {
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

    </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
