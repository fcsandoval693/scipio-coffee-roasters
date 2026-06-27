# Development Plan - Scipio Coffee Roasters

## Objetivo

Construir una tienda de cafe de especialidad con tres niveles de uso: visitante, cliente y administrador. La aplicacion debe permitir navegar productos sin iniciar sesion, registrar usuarios, iniciar/cerrar sesion, gestionar perfil, usar carrito, realizar pedidos como cliente y gestionar productos, stock, pedidos, clientes y estadisticas como administrador.

## Paleta Visual Provisional

- Rojo imperial, color principal: `#8B1E1E`
- Dorado, detalles y acentos: `#C9A227`
- Pergamino, color secundario: `#F5EBD7`
- Marfil, fondo alternativo: `#FAF7F0`
- Cafe oscuro, texto principal: `#2C1810`

## Tipografia

- Titulos: `Cinzel`
- Texto general: `Inter`

## Roles

### Visitante

- ✅ Ver pagina principal.
- ✅ Ver productos destacados.
- ✅ Registrarse.
- ✅ Iniciar sesion.
- ⬜ Ver detalle completo de producto.

### Cliente

- ✅ Iniciar sesion.
- ✅ Cerrar sesion.
- ✅ Ver perfil.
- ✅ Editar perfil.
- ✅ Ver productos destacados.
- ✅ Anadir productos al carrito.
- ✅ Ver carrito.
- ✅ Sumar unidades en carrito.
- ✅ Restar unidades en carrito.
- ✅ Vaciar carrito.
- ⬜ Confirmar pedido.
- ⬜ Ver sus pedidos.

### Administrador

- ✅ Acceder a panel admin si tiene rol `admin`.
- ✅ Bloquear panel admin a usuarios no admin.
- ✅ Mostrar enlace Admin solo a administradores.
- ⬜ Crear productos.
- ⬜ Editar productos.
- ⬜ Gestionar stock.
- ⬜ Gestionar pedidos.
- ⬜ Gestionar clientes.
- ⬜ Ver estadisticas.

## Arquitectura Actual

### Carpetas principales

- ✅ `public/css`, `public/js`, `public/img` para assets publicos.
- ✅ `includes/database.php` para conexion MySQL.
- ✅ `includes/auth.php` para helpers de autenticacion y permisos.
- ✅ `includes/cart.php` para funciones de carrito en sesion.
- ✅ `app/Repositories/UserRepository.php` para consultas de usuarios.
- ✅ `app/Repositories/ProductRepository.php` para consultas de productos.
- ⬜ `app/Repositories/OrderRepository.php` para pedidos.
- ✅ `pages/` para paginas publicas/cliente.
- ✅ `admin/` para zona de administracion.
- ✅ `database/scipio_coffee.sql` como receta de base de datos.

## Funcionalidades

### 1. Base de Usuarios

- ✅ Crear tabla `users`.
- ✅ Campos principales: nombre, email, telefono, password, rol, direccion, timestamps.
- ✅ Guardar contrasenas con `password_hash`.
- ✅ Validar contrasenas con `password_verify`.
- ✅ Rol por defecto `client`.
- ✅ Usuario admin definido desde base de datos/phpMyAdmin.

### 2. Registro

- ✅ Crear `pages/register.php`.
- ✅ Formulario de registro.
- ✅ Validar campos obligatorios.
- ✅ Validar formato de email.
- ✅ Validar email duplicado.
- ✅ Crear hash de contrasena.
- ✅ Insertar usuario usando `createUser()`.
- ✅ Mostrar errores y mensaje de exito.
- ✅ Evitar registro si el usuario ya esta logueado.

### 3. Login / Logout

- ✅ Crear `pages/login.php`.
- ✅ Validar email y contrasena.
- ✅ Buscar usuario por email con `findUserByEmail()`.
- ✅ Verificar contrasena con `password_verify`.
- ✅ Guardar datos en `$_SESSION`.
- ✅ Redirigir al index tras login correcto.
- ✅ Crear `pages/logout.php`.
- ✅ Destruir sesion al cerrar sesion.
- ✅ Evitar login si el usuario ya esta logueado.

### 4. Roles y Permisos

- ✅ Crear `isLoggedIn()`.
- ✅ Crear `requireLogin()`.
- ✅ Crear `isAdmin()`.
- ✅ Crear `requireAdmin()`.
- ✅ Proteger `pages/profile.php`.
- ✅ Proteger `pages/edit-profile.php`.
- ✅ Proteger `admin/index.php`.
- ✅ Mostrar header distinto para visitante, cliente y admin.

### 5. Perfil de Cliente

- ✅ Crear `pages/profile.php`.
- ✅ Mostrar nombre, email y rol.
- ✅ Crear `pages/edit-profile.php`.
- ✅ Cargar datos del usuario con `findUserById()`.
- ✅ Editar nombre, telefono y direccion.
- ✅ Guardar cambios con `updateUserProfile()`.
- ✅ Actualizar `$_SESSION["user_name"]` si cambia el nombre.
- ✅ Enlace desde perfil a editar perfil.

### 6. Productos

- ✅ Mostrar productos destacados desde MySQL.
- ✅ Mostrar nombre, descripcion, notas de cata y precio.
- ✅ Mostrar boton de anadir al carrito si hay stock.
- ✅ Ocultar compra si no hay stock.
- ⬜ Crear listado completo de productos.
- ⬜ Crear detalle de producto.
- ⬜ Mostrar imagen real de producto.
- ⬜ Filtrar productos.

### 7. Carrito

- ✅ Crear `includes/cart.php`.
- ✅ Crear `ensureCart()`.
- ✅ Crear `addToCart()`.
- ✅ Crear `cartCount()`.
- ✅ Crear `clearCart()`.
- ✅ Crear `removeFromCart()`.
- ✅ Crear `decreaseCartItem()`.
- ✅ Crear `pages/add-to-cart.php`.
- ✅ Crear `pages/cart.php`.
- ✅ Crear `pages/clear-cart.php`.
- ✅ Crear `pages/decrease-cart-item.php`.
- ✅ Crear `pages/increase-cart-item.php`.
- ✅ Mostrar contador de carrito en header.
- ✅ Mostrar productos del carrito.
- ✅ Mostrar cantidad, precio y subtotal.
- ✅ Mostrar total general.
- ✅ Vaciar carrito.
- ✅ Sumar unidad desde carrito.
- ✅ Restar unidad desde carrito.
- ✅ Evitar sumar desde carrito si supera stock.
- ✅ Reforzar stock en backend al anadir.
- ⬜ Quitar producto completo desde carrito con boton especifico.
- ⬜ Mejorar formato visual del carrito.

### 8. Pedidos

- ✅ Crear tabla `orders`.
- ✅ Crear tabla `order_items`.
- ⬜ Crear `OrderRepository.php`.
- ⬜ Convertir carrito en pedido.
- ⬜ Guardar lineas en `order_items`.
- ⬜ Guardar total en `orders`.
- ⬜ Vaciar carrito tras confirmar pedido.
- ⬜ Ver pedidos del cliente.
- ⬜ Ver detalle de pedido.

### 9. Administracion

- ✅ Crear `admin/index.php`.
- ✅ Proteger admin por rol.
- ⬜ Dashboard con resumen.
- ⬜ Gestion de productos.
- ⬜ Gestion de stock.
- ⬜ Gestion de pedidos.
- ⬜ Gestion de clientes.
- ⬜ Estadisticas basicas.

### 10. Reestructura / Arquitectura

- ✅ Mover assets a `public/`.
- ✅ Eliminar carpeta `html/` vacia.
- ✅ Crear `app/Repositories`.
- ✅ Mover consultas de usuario a `UserRepository.php`.
- ✅ Mover consultas de producto a `ProductRepository.php`.
- ⬜ Mover consultas de pedidos a `OrderRepository.php`.
- ⬜ Separar vistas/controladores de forma gradual.
- ⬜ Evaluar router/front controller mas adelante.

### 11. Diseno y CSS

- ⬜ Definir estilos base.
- ⬜ Aplicar paleta visual.
- ⬜ Integrar tipografias.
- ⬜ Estilizar header/nav.
- ⬜ Estilizar formularios.
- ⬜ Estilizar tarjetas de producto.
- ⬜ Estilizar carrito.
- ⬜ Estilizar perfil/admin.
- ⬜ Responsive basico.

## Proximos Pasos Recomendados

1. Terminar carrito: boton para quitar producto completo.
2. Crear `OrderRepository.php`.
3. Crear checkout para convertir carrito en pedido.
4. Crear pagina `pages/orders.php` para ver pedidos del cliente.
5. Crear detalle de pedido.
6. Empezar administracion de pedidos.
7. Empezar CSS base.

## Notas

- El carrito actual vive en `$_SESSION`, no en base de datos.
- Los pedidos reales se guardaran en `orders` y `order_items` al confirmar compra.
- El rol `admin` no se elige desde registro; se define desde base de datos o futuro panel admin.
- Las contrasenas nunca se guardan en texto plano.
- El proyecto avanza hacia una arquitectura tipo MVC/repositorios de forma gradual.
