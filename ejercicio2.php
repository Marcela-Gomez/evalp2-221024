<?php
$error = "";
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $figura = $_POST["figura"];

    if ($figura === "cilindro") {
        $radio = $_POST["radio"];
        $altura = $_POST["altura"];

        if (empty($radio) || empty($altura)) {
            $error = "⚠️ Todos los campos son obligatorios.";
        } elseif (!is_numeric($radio) || !is_numeric($altura)) {
            $error = "⚠️ Solo se permiten valores numéricos.";
        } elseif ($radio <= 0 || $altura <= 0) {
            $error = "⚠️ Los valores deben ser positivos.";
        } else {
            $area = 2 * M_PI * $radio * $altura + 2 * M_PI * pow($radio, 2);
            $resultado = "El área del cilindro es: <strong>" . round($area, 2) . "</strong> unidades².";
        }

    } elseif ($figura === "rectangulo") {
        $base = $_POST["base"];
        $altura = $_POST["alturaR"];

        if (empty($base) || empty($altura)) {
            $error = "⚠️ Todos los campos son obligatorios.";
        } elseif (!is_numeric($base) || !is_numeric($altura)) {
            $error = "⚠️ Solo se permiten valores numéricos.";
        } elseif ($base <= 0 || $altura <= 0) {
            $error = "⚠️ Los valores deben ser positivos.";
        } else {
            $area = $base * $altura;
            $resultado = "El área del rectángulo es: <strong>" . round($area, 2) . "</strong> unidades².";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Áreas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
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
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, button {
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
            text-align: center;
            font-weight: bold;
        }
        .campo {
            margin-bottom: 12px;
        }
    </style>
    <script>
        function mostrarCampos() {
            let figura = document.getElementById("figura").value;
            document.getElementById("camposCilindro").style.display = figura === "cilindro" ? "block" : "none";
            document.getElementById("camposRectangulo").style.display = figura === "rectangulo" ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="card">
        <h2>Calculadora de Áreas</h2>
        <form method="POST">
            <label for="figura">Seleccione una figura:</label>
            <select name="figura" id="figura" onchange="mostrarCampos()" required>
                <option value="">-- Seleccionar --</option>
                <option value="cilindro" <?php if(isset($_POST["figura"]) && $_POST["figura"]=="cilindro") echo "selected"; ?>>Cilindro</option>
                <option value="rectangulo" <?php if(isset($_POST["figura"]) && $_POST["figura"]=="rectangulo") echo "selected"; ?>>Rectángulo</option>
            </select>

            <!-- Campos Cilindro -->
            <div id="camposCilindro" style="display:none;">
                <label>Radio:</label>
                <input type="text" name="radio" value="<?php echo isset($_POST['radio']) ? htmlspecialchars($_POST['radio']) : ''; ?>">
                <label>Altura:</label>
                <input type="text" name="altura" value="<?php echo isset($_POST['altura']) ? htmlspecialchars($_POST['altura']) : ''; ?>">
            </div>

            <!-- Campos Rectángulo -->
            <div id="camposRectangulo" style="display:none;">
                <label>Base:</label>
                <input type="text" name="base" value="<?php echo isset($_POST['base']) ? htmlspecialchars($_POST['base']) : ''; ?>">
                <label>Altura:</label>
                <input type="text" name="alturaR" value="<?php echo isset($_POST['alturaR']) ? htmlspecialchars($_POST['alturaR']) : ''; ?>">
            </div>

            <button type="submit">Calcular</button>
        </form>

        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (!empty($resultado)): ?>
            <div class="resultado"><?php echo $resultado; ?></div>
        <?php endif; ?>
    </div>

    <script>
        // Para que muestre los campos correctos al recargar
        mostrarCampos();
    </script>
</body>
</html>
