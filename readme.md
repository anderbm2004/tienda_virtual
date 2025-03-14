Tienda Virtual

hola soy Anderson estudiante de desarrollo de software y quiero ofrecer una bienvenida a mi tienda virtual, un proyecto estudiantil que busca emplear los conocimientos adquiridos en el transcurso de la carrera, este proyecto web que está siendo construido en un ambiente web usa PHP, MySQL, JavaScript, HTML y CSS. Este sistema permite gestionar productos mediante funciones de agregar, editar, eliminar, listrar entre otras que surgen con el avance del proyecto.

Tecnologías Utilizadas

-Lenguajes: PHP, JavaScript, HTML, CSS.
-Base de Datos: MySQL.
-Servidor Local: XAMPP (Apache, MySQL, PHP).
-Control de Versiones: Git y GitHub.

Instalacion:

Clonar el repositorio:

git clone https://github.com/anderbm2004/tienda_virtual.git

Importar la base de datos:
1-Abrir phpMyAdmin en el navegador.
2-Crear una base de datos llamada tienda_virtual.
3-Importar el archivo db/tienda_virtual.sql.
4-Configurar la conexión:
5-Editar el archivo db.php con los datos de tu servidor local.
6-Ejecutar el proyecto:
7-Iniciar Apache y MySQL en XAMPP.
8-Acceder desde el navegador a http://localhost/tienda_virtual

Estructura del proyecto
/tienda_virtual
│── /css           Archivos de estilos
|── /db            Base de datos(script.sql) 
│── /js            Archivos JavaScript
│── /productos     Módulo de productos 
│── /usuarios      Módulo de usuarios (futuro desarrollo)
│── db.php         Configuración de la base de datos
│── index.php      Página principal
│── README.md 

Funcionalidades Implementadas:

-Agregar productos con nombre, categoría, proveedor, precio, stock y descripción.
-Listar productos en una tabla con botones de edición y eliminación.
-Editar productos y actualizar los datos almacenados en la base de datos.
-Eliminar productos con confirmación para evitar errores.

Próximos Pasos
-Implementar autenticación de usuarios.
-Mejorar la interfaz con un framework CSS como Bootstrap o Tailwind.
-Agregar un sistema de roles para gestionar permisos de usuario.