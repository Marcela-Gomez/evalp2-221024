
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
