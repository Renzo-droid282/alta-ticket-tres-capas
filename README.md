# Alta de Ticket con arquitectura en tres capas

Aplicación PHP sencilla para registrar Tickets utilizando una arquitectura de tres capas.

## Capas

- **Presentación:** `public/tickets/crear.php`. Muestra el formulario, recibe título y descripción e inicia la creación.
- **Negocio:** `negocio/Ticket.php`. Representa el Ticket y aplica la regla de negocio: todo Ticket nuevo comienza como `pendiente`.
- **Persistencia:** `datos/TicketRepository.php` y `datos/Conexion.php`. Se encargan de conectarse a la base de datos y ejecutar el `INSERT`.

## Base de datos

Ejecutar `db.sql` en MySQL/MariaDB.

Luego configurar los datos de conexión en `config/config.php`.

## Regla importante

El estado no se solicita en el formulario. La clase `Ticket` lo establece automáticamente como `pendiente`, porque es una regla del sistema.

## Seguridad para GitHub

No subir contraseñas ni credenciales reales al repositorio.
