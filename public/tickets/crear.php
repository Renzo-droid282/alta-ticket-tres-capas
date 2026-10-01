<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../datos/Conexion.php';
require_once __DIR__ . '/../../datos/TicketRepository.php';
require_once __DIR__ . '/../../negocio/Ticket.php';

$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    if ($titulo === '' || $descripcion === '') {
        $error = 'El título y la descripción son obligatorios.';
    } else {
        try {
            // La capa de presentación recibe los datos e inicia la operación.
            // La regla "pendiente" se aplica dentro de Ticket, no en el formulario.
            $ticket = new Ticket($titulo, $descripcion);
            $conexion = Conexion::obtenerConexion();
            $repository = new TicketRepository($conexion);
            $repository->guardar($ticket);

            $mensaje = 'Ticket creado correctamente.';
        } catch (Exception $e) {
            $error = 'No se pudo crear el ticket.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Ticket</title>
</head>
<body>
    <h1>Alta de Ticket</h1>

    <?php if ($mensaje !== ''): ?>
        <p><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" maxlength="150" required>
        <br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="6" cols="50" required></textarea>
        <br><br>

        <button type="submit">Crear Ticket</button>
    </form>
</body>
</html>
