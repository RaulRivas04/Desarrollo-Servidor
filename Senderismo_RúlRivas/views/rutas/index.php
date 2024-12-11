<?php
session_start();
include 'db.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        // Mostrar listado de rutas
        $stmt = $pdo->query('SELECT * FROM rutas ORDER BY titulo');
        $rutas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/index.php';
        break;

    case 'viewRuta':
        $idRuta = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $stmt = $pdo->prepare('SELECT * FROM rutas WHERE id = :id');
        $stmt->execute(['id' => $idRuta]);
        $ruta = $stmt->fetch(PDO::FETCH_ASSOC);
        include 'views/viewRuta.php';
        break;

    case 'verComentarios':
        $idRuta = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $stmt = $pdo->prepare('SELECT * FROM rutas_comentarios WHERE id_ruta = :idRuta ORDER BY fecha DESC');
        $stmt->execute(['idRuta' => $idRuta]);
        $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/comentarios.php';
        break;

    case 'comentarRuta':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idRuta = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $comentario = $_POST['comentario'];
            $idUsuario = $_SESSION['user_id'];

            // Verificar si el usuario ya comentó hoy
            $stmt = $pdo->prepare('SELECT * FROM rutas_comentarios WHERE id_ruta = :idRuta AND id_usuario = :idUsuario AND DATE(fecha) = CURDATE()');
            $stmt->execute(['idRuta' => $idRuta, 'idUsuario' => $idUsuario]);
            if ($stmt->rowCount() == 0) {
                // Insertar comentario
                $stmt = $pdo->prepare('INSERT INTO rutas_comentarios (id_ruta, id_usuario, comentario) VALUES (:idRuta, :idUsuario, :comentario)');
                $stmt->execute(['idRuta' => $idRuta, 'idUsuario' => $idUsuario, 'comentario' => $comentario]);
                header("Location: /comentarios/ruta/$idRuta");
            } else {
                echo "Ya has comentado hoy en esta ruta.";
            }
        }
        break;

    default:
        echo "Acción no válida";
        break;
}
?>
