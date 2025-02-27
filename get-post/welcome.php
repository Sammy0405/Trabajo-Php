<?php
session_start();

// Establecer el valor de la sesión
$_SESSION["valor1"] = '<div class="container"> 
        <form action="welcome.php" method="post">
                <h1>COLOCA TU CLAVE PARA DESBLOQUEAR</h1>
        </form>
        <?php include \'./inclides/footer.php\'; ?>
    </div>';


// Inicializa el arreglo de posts si no existe
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [];
}

// Verificar si el usuario  está establecido
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    // Mostramos los datos del formulario
    echo "<div class='use'> Bienvenido {$_SESSION['user']['name']} <br></div>";
} else {
    // Redirigir a la página de inicio
    header('Location: welcome.php');
    exit(); // Importante para detener la ejecución del script
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titulo']) && !empty($_POST['titulo']) && isset($_POST['blog']) && !empty($_POST['blog'])) {
        // Agregar el nuevo post al arreglo de posts en la sesión
        $nuevoPost = [
            'titulo' => htmlspecialchars($_POST['titulo']),
            'contenido' => htmlspecialchars($_POST['blog']),
        ];
        $_SESSION['posts'][] = $nuevoPost;
    } elseif (isset($_POST['bloquear'])) {
        // Redirigir a paginabloquear.php si se presionó el botón Bloquear
        header("Location: bloqueo.php");
        exit(); // Detener la ejecución del script
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        h1 { text-align: center; }
        .conte { text-align: center; }
        .use { text-align: center; font-size: 22px; margin: 5px; }
        textarea { height: 50px; }
        .post { margin: 20px; border: 1px solid #ccc; padding: 10px; border-radius: 5px; }
        .login{
            width: 150px;
            height: 60px;
        }
    </style>
</head>
<body>
    <h1>WELCOME</h1>
    <div class="conte">
        <form action="logout.php" method="post">
            <input type="submit" value="Cerrar sesión">
        </form>
        <form action="" method="post">
            <input type="submit" name="bloquear" value="Bloquear">
            <br><br>
            <input type="text" name="titulo" placeholder="titulo">
            <br><br>
            <textarea name="blog" placeholder="Escribe tu blog"></textarea>
            <br>
            <button type="submit">Guardar Post</button>
        </form>

        <?php
        // Mostrar los posts guardados
        if (!empty($_SESSION['posts'])) {
            foreach ($_SESSION['posts'] as $post) {
                echo "<div class='post'>";
                echo "<h3>{$post['titulo']}</h3>";
                echo "<p>{$post['contenido']}</p>";
                echo "</div>";
            }
        }
        ?>
        
        <?php include './inclides/footer.php'; ?>
    </div>
</body>
</html>