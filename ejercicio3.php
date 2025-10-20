<?php
$error = "";
$tipo = "";
$imagen = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["ladoA"];
    $b = $_POST["ladoB"];
    $c = $_POST["ladoC"];

    // Validaciones
    if (empty($a) || empty($b) || empty($c)) {
        $error = "⚠️ Todos los lados son obligatorios.";
    } elseif (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        $error = "⚠️ Todos los lados deben ser números.";
    } elseif ($a <= 0 || $b <= 0 || $c <= 0) {
        $error = "⚠️ Los lados deben ser positivos.";
    } else {
        // Clasificación
        if ($a == $b && $b == $c) {
            $tipo = "Equilátero";
            $imagen = "./recursos/equilatero.png";
        } elseif ($a == $b || $b == $c || $a == $c) {
            $tipo = "Isósceles";
            $imagen = "./recursos/isosceles.png";
        } else {
            $tipo = "Escaleno";
            $imagen = "./recursos/escaleno.png";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clasificador de Triángulos</title>
    <style>
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

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
            width: 400px;
            text-align: center;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        button {
            background: #007bff;
            color: #fff;
            border: none;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: #dc3545;
            margin-top: 10px;
            font-size: 14px;
        }
        .resultado {
            background: #e9f7ef;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-top: 15px;
            font-weight: bold;
        }
        .resultado img {
            margin-top: 10px;
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
        <!-- Navbar -->
    <div class="navbar">
        <div class="brand">Dashboard</div>
        <ul>
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="calculadora.php">Calculadora Áreas</a></li>
            <li><a href="triangulo.php">Triángulo</a></li>
            <li><a href="logout.php" class="logout">Cerrar Sesión</a></li>
        </ul>
    </div>
    <div class="card">
        <h2>Clasificador de Triángulos</h2>
        <form method="POST">
            <label>Lado A:</label>
            <input type="text" name="ladoA" value="<?php echo isset($_POST['ladoA']) ? htmlspecialchars($_POST['ladoA']) : ''; ?>">
            <label>Lado B:</label>
            <input type="text" name="ladoB" value="<?php echo isset($_POST['ladoB']) ? htmlspecialchars($_POST['ladoB']) : ''; ?>">
            <label>Lado C:</label>
            <input type="text" name="ladoC" value="<?php echo isset($_POST['ladoC']) ? htmlspecialchars($_POST['ladoC']) : ''; ?>">
            <button type="submit">Clasificar</button>
        </form>

        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (!empty($tipo)): ?>
            <div class="resultado">
                El triángulo es: <strong><?php echo $tipo; ?></strong>
                <div><img src="<?php echo $imagen; ?>" alt="<?php echo $tipo; ?>"></div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>