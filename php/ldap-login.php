<?php
// Servidor LDAP - ldap-login.php
$ldap_host = "ldap://localhost"; // o la IP/hostname del servidor LDAP
$ldap_port = 389;

// Base DN del directorio 
$base_dn = "dc=devwebpro,dc=local";

// Credenciales que el usuario introduciría en un formulario.
$usuario = "johana"; 
$contrasena = "johana123";

// Construimos el DN completo del usuario según la estructura LDAP
// Por ejemplo, si el usuario está en la OU developers:
$user_dn = "uid=" . $usuario . ",ou=developers," . $base_dn;

// 1. Conectar al servidor LDAP
$conexion = ldap_connect($ldap_host, $ldap_port);

if (!$conexion) {
    die("No se pudo conectar al servidor LDAP");
}

// Opcional: configurar versión de protocolo
ldap_set_option($conexion, LDAP_OPT_PROTOCOL_VERSION, 3);

// 2. Intentar hacer bind (autenticación) con las credenciales del usuario
$bind = @ldap_bind($conexion, $user_dn, $contrasena);

if ($bind) {
    echo "Autenticación LDAP correcta para el usuario: " . $usuario;
    // Aquí podrías continuar con la lógica de la aplicación:
    // - Crear sesión
    // - Redirigir a zona privada
} else {
    echo "Error de autenticación LDAP para el usuario: " . $usuario;
    // Podrías mostrar un mensaje de error al usuario
}

// 3. Cerrar la conexión
ldap_unbind($conexion);
?>