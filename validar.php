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
            <h2>Inicio de Sesion</h2>
            <?php
                session_start();
                ob_start();
                if (isset($_POST['validar'])){
                    $servername = "localhost"; // Nombre/IP del servidor
                    $database = "conekta"; // Nombre de la BBDD
                    $username = "root"; // Nombre del usuario
                    $password = ""; // Contraseña del usuario
                    $conex = mysqli_connect($servername, $username, $password, $database);
                    if (!$conex) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $user = trim($_POST['user']);
                    $pass = trim($_POST['pass']);
                    $sql = "SELECT * FROM datos WHERE nombre='$user' AND contrasena='$pass'";
                    $resultado = $conex->query($sql) or die ('Algo ha ido mal en la consulta a la base de datos' . mysql_error());
                    if ($resultado->num_rows == 1){
                        echo '<p>Inicio de sesión exitoso. Redirigiendo...</p>';
                        header("refresh:2;url=prueba.html"); // Redirige después de 2 segundos
                        exit();
                    } else {
                        echo '<p class="error">Credenciales incorrectas</p>';
                    }
                    mysqli_close($conex);
                }
            ?>
            <br>
            <a href="index.html"><button>Regresar</button></a>
        </div>
    </div>
</body>
</html>
