<?php

namespace Controllers;

use Lib\Pages;
use Models\RutaComentario;
use Services\RutaComentarioService;
use Services\RutaService;

class RutaComentarioController {
    private Pages $paginacion;
    private RutaComentarioService $comentarioServicio;
    private RutaService $rutaServicio;
    
    public function __construct() {
        $this->paginacion = new Pages();
        $this->comentarioServicio = new RutaComentarioService();
        $this->rutaServicio = new RutaService();
    }

    // Función para mostrar el formulario de comentarios
    public function mostrarFormularioComentario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rutaId = $_POST['idRuta'];
            $usuarioId = $_POST['idUsuario'];

            $comentario = new RutaComentario(
                null,
                $rutaId,
                $_POST['nombreUsuario'],
                '',
                '',
                $usuarioId
            );
            
            $comentario->sanitizarOcultos();
            $errores = $comentario->validarOcultos();

            $rutaSeleccionada = $this->rutaServicio->rutaAComentar($rutaId);
            $comentariosRutaSeleccionada = $this->comentarioServicio->comentariosRutaAComentar($rutaId);

            $comentariosDeHoy = $this->comentarioServicio->comentarioDiario();
            foreach ($comentariosDeHoy as $comentarioDia) {

                if ($comentarioDia["id_ruta"] == $rutaId && $comentarioDia["fecha"] == date("Y-m-d") && $comentarioDia["usuarioID"] == $usuarioId) {
                    $this->paginacion->render('RutaComentarios/comentarioDiario');
                    exit;
                }
            }

            if (!empty($errores)) {
                $this->paginacion->render('RutaComentarios/formComentar', [
                    "errores" => $errores,
                    "usuario" => $comentario->getNombre(),
                    "usuarioId" => $comentario->getIdUsuario(),
                    "rutaId" => $comentario->getIdRuta(),
                    "rutaSeleccionada" => $rutaSeleccionada,
                    "comentariosRutaSeleccionada" => $comentariosRutaSeleccionada
                ]);
                return;
            }
            
            $this->paginacion->render('RutaComentarios/formComentar', [
                "usuario" => $comentario->getNombre(),
                "usuarioId" => $comentario->getIdUsuario(),
                "rutaId" => $comentario->getIdRuta(),
                "rutaSeleccionada" => $rutaSeleccionada,
                "comentariosRutaSeleccionada" => $comentariosRutaSeleccionada
            ]);
        }
    }

    // Función para agregar un comentario a una ruta
    public function agregarComentarioARuta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comentarioRuta = new RutaComentario(null,
                $_POST['id_ruta'],
                $_POST['nombre'],
                $_POST['texto'],
                $_POST['fecha'],
                $_POST['id_usuario']
            );

            $comentarioRuta->sanitizar();

            $errores = $comentarioRuta->validar();

            if (empty($errores)) {
                $resultado = $this->comentarioServicio->guardarComentario([
                    'id_ruta' => $comentarioRuta->getIdRuta(),
                    'nombre' => $comentarioRuta->getNombre(),
                    'texto' => $comentarioRuta->getTexto(),
                    'fecha' => $comentarioRuta->getFecha(),
                    'usuarioID' => $comentarioRuta->getIdUsuario(),
                ]);

                if ($resultado === true) {
                    header("Location: " . BASE_URL);
                    exit;
                } else {
                    $errores['db'] = "Error al añadir el comentario: " . $resultado;
                    $this->paginacion->render('RutaComentarios/formComentar', ["errores" => $errores]);
                }
            } else {
                $this->paginacion->render('RutaComentarios/formComentar', ["errores" => $errores]);
            }
        }
    }
}
