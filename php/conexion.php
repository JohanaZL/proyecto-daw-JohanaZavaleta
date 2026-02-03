<?php
/**
 * Clase ConexionBD
 *
 * Gestiona la conexión a la base de datos MySQL del proyecto DAW.
 * Utiliza la extensión mysqli para establecer la conexión.
 *
 * @package ProyectoDAW
 * @subpackage Conexion
 */
class ConexionBD {

    /**
     * Host del servidor MySQL.
     *
     * @var string
     */
    private $host = "localhost";

    /**
     * Nombre de usuario para la conexión a MySQL.
     *
     * @var string
     */
    private $usuario = "usuario_bd";

    /**
     * Contraseña del usuario de MySQL.
     *
     * @var string
     */
    private $contrasena = "password_bd";

    /**
     * Nombre de la base de datos a utilizar.
     *
     * @var string
     */
    private $base_datos = "proyecto_daw";

    /**
     * Objeto de conexión MySQLi.
     *
     * @var mysqli|null
     */
    private $conexion = null;

    /**
     * Establece la conexión con la base de datos.
     *
     * @return mysqli Objeto de conexión MySQLi.
     *
     * @throws Exception Si ocurre un error durante la conexión.
     */
    public function conectar() {
        $this->conexion = new mysqli(
            $this->host,
            $this->usuario,
            $this->contrasena,
            $this->base_datos
        );

        if ($this->conexion->connect_error) {
            throw new Exception("Error de conexión: " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }
}