<?php
session_start();

// Usuario y contraseña definidos
$usuario_valido = "admin";
$contrasena_valida = "12345";

$error = "";

// Si ya está logueado, redirige directo
if (isset($_SESSION["usuario"])) {
    header("Location: inicio.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $contrasena = trim($_POST["contrasena"]);

    if (empty($usuario) || empty($contrasena)) {
        $error = "⚠️ Usuario y contraseña no pueden estar vacíos.";
    } elseif ($usuario === $usuario_valido && $contrasena === $contrasena_valida) {
        // Guardar usuario en sesión
        $_SESSION["usuario"] = $usuario;
        header("Location: inicio.php");
        exit;
    } else {
        $error = "❌ Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .contenedor {
            display: flex;
            background: #fff;
            width: 700px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .formulario {
            flex: 1;
            padding: 40px;
        }
        .formulario h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .formulario input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .formulario button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .formulario button:hover {
            background: #0056b3;
        }
        .imagen {
            flex: 1;
            background: url("./inico.jpg") no-repeat center center;
            background-size: cover;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="text" name="usuario" placeholder="Usuario" value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>">
                <input type="password" name="contrasena" placeholder="Contraseña">
                <button type="submit">Ingresar</button>
            </form>
        </div>
        <div class="imagen"></div>
    </div>
</body>
</html>
