<?php
session_start();
session_unset();  // Limpia variables de sesión
session_destroy(); // Destruye sesión
header("Location: index.php");
exit;
