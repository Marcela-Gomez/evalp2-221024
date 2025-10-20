<?php
session_start();

// Verificamos sesión
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }
        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #007bff;
            padding: 15px 30px;
            color: white;
        }
        .navbar .brand {
            font-size: 20px;
            font-weight: bold;
        }
        .navbar ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }
        .navbar ul li {
            margin: 0 15px;
        }
        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .navbar ul li a:hover {
            text-decoration: underline;
        }
        .logout {
            background: #dc3545;
            padding: 8px 15px;
            border-radius: 5px;
            color: white !important;
            font-weight: bold;
        }
        .logout:hover {
            background: #b52a37;
        }

        /* Contenido */
        .contenido {
            padding: 40px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="brand">Dashboard</div>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="ejercicio2.php">Ejercicio 2</a></li>
            <li><a href="ejercicio3.php">Ejercicio 3</a></li>
            <li><a href="logout.php" class="logout">Cerrar Sesión</a></li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="contenido">
        <div class="card">
            <h1>Bienvenido <?php echo htmlspecialchars($_SESSION["usuario"]); ?> 🎉</h1>
            <p>Has iniciado sesión correctamente.</p>
            <p>Usa el menú de arriba para navegar entre los ejercicios.</p>
        </div>
    </div>

</body>
</html>
