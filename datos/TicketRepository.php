<?php

require_once __DIR__ . '/../negocio/Ticket.php';

class TicketRepository
{
    private mysqli $conexion;

    public function __construct(mysqli $conexion)
    {
        $this->conexion = $conexion;
    }

    public function guardar(Ticket $ticket): bool
    {
   
        $titulo = $this->conexion->real_escape_string($ticket->getTitulo());
        $descripcion = $this->conexion->real_escape_string($ticket->getDescripcion());
        $estado = $this->conexion->real_escape_string($ticket->getEstado());

        $sql = "INSERT INTO ticket (titulo, descripcion, estado)
                VALUES ('$titulo', '$descripcion', '$estado')";

        return $this->conexion->query($sql) === true;
    }
}
