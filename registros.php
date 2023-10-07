<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hack-Athon</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .text-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .error {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-container">
            <?php
                //conexión a la base de datos
                $servername = "localhost"; // Nombre/IP del servidor
                $database = "conekta"; // Nombre de la BBDD
                $username = "root"; // Nombre del usuario
                $password = ""; // Contraseña del usuario

                // Creamos la conexión
                $con = mysqli_connect($servername, $username, $password, $database);
                // Comprobamos la conexión
                if (!$con) {
                    die("La conexión ha fallado: ".mysqli_connect_error());
                }

                //obtenemos la información del formulario
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $contrasena = $_POST['contraseña'];
                $ccontrasena = $_POST['ccontraseña'];

                

                //insertamos los valores del formulario a la Base de Datos
                $sql = "INSERT INTO datos(nombre, correo, contrasena) VALUES ('$nombre','$correo','$contrasena')";
                if ($contrasena == $ccontrasena){
                    if (mysqli_query($con, $sql)) {
                        echo "Regitro almacenado correctamente en la base de datos";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
                    echo "<br><a href='index.html'><button>Inicio</button></a>";
                } else {
                    echo "Error al confirmar <br>";
                    echo "<a href='registrarse.html'><button>Reintentar</button></a>";
                }
                // Cerramos la conexión a la base de datos
                mysqli_close($con);
            ?>
        </div>
    </div>
</body>
</html>
