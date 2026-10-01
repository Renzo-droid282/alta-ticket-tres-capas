# Explicación para la defensa

### ¿Qué pertenece a presentación?
`public/tickets/crear.php`. Es lo que interactúa con el usuario.

### ¿Qué pertenece a negocio?
`negocio/Ticket.php`. Representa el Ticket y establece el estado inicial `pendiente`.

### ¿Qué pertenece a persistencia?
`datos/Conexion.php` y `datos/TicketRepository.php`. Se encargan de la conexión y del INSERT.

### ¿Por qué el INSERT está en TicketRepository?
Porque la persistencia es la capa que conoce cómo guardar información en la base de datos. El formulario no debería contener SQL.

### ¿Por qué "pendiente" es una regla de negocio?
Porque todos los Tickets nuevos deben comenzar de esa manera. El usuario no decide ese valor y el formulario no debería poder cambiar esa regla.
