# Proyecto DAW - Johana Zavaleta
## Autenticación de usuarios con LDAP (concepto)

En este proyecto se ha incluido un archivo `php/ldap-login.php` que muestra de forma conceptual cómo se podría autenticar a los usuarios del directorio LDAP en la aplicación web.

La idea general es la siguiente:

1. El usuario introduce su nombre de usuario y contraseña en un formulario de login.
2. La aplicación construye el DN (Distinguished Name) del usuario según la estructura del directorio.  
   Por ejemplo, para el usuario `renato` en la OU `developers`:
   `uid=renato,ou=developers,dc=devwebpro,dc=local`
3. La aplicación se conecta al servidor LDAP (por ejemplo, `ldap://localhost` en el puerto 389).
4. Se intenta hacer un `ldap_bind` usando el DN del usuario y la contraseña introducida.
5. Si el `bind` tiene éxito, se considera que el usuario está autenticado correctamente y se le puede dar acceso a la parte privada de la aplicación.
6. Si el `bind` falla, se muestra un mensaje de error indicando que las credenciales no son válidas.

Este enfoque permite que la autenticación de usuarios se centralice en el directorio LDAP, de modo que:
- Los usuarios se gestionan desde un único punto (OpenLDAP).
- La aplicación web no necesita almacenar contraseñas, solo validar contra el directorio.