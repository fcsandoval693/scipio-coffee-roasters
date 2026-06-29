# Scipio Coffee Roasters

Scipio Coffee Roasters es una aplicación web en PHP para una tienda de café de especialidad.

El proyecto nace como práctica de aprendizaje para trabajar conceptos reales de desarrollo web: estructura de archivos, conexión a base de datos, sesiones, autenticación, roles de usuario, carrito de compra y creación de pedidos.

## Objetivo del proyecto

Crear una tienda online sencilla donde un visitante pueda ver productos, registrarse, iniciar sesión, añadir cafés al carrito y finalizar un pedido.

El proyecto también incluye una primera base para diferenciar usuarios normales y administradores.

## Funcionalidades actuales

- Listado de productos destacados.
- Registro de usuarios.
- Inicio y cierre de sesión.
- Sesiones con `$_SESSION`.
- Roles de usuario: `client` y `admin`.
- Perfil de usuario.
- Edición de datos personales y dirección.
- Panel básico de administración protegido por rol.
- Carrito guardado en sesión.
- Añadir productos al carrito.
- Aumentar y reducir unidades del carrito.
- Eliminar un producto completo del carrito.
- Vaciar carrito.
- Control básico de stock al añadir unidades.
- Checkout básico.
- Creación de pedidos en base de datos.
- Relación entre pedidos y productos mediante `orders` y `order_items`.

## Tecnologías utilizadas

- HTML
- CSS
- PHP
- MySQL / MariaDB
- XAMPP
- phpMyAdmin
- Git y GitHub

## Estructura principal

```text
scipio-coffee-roasters/
├── admin/
│   └── index.php
├── app/
│   └── Repositories/
│       ├── UserRepository.php
│       ├── ProductRepository.php
│       └── OrderRepository.php
├── database/
│   └── scipio_coffee.sql
├── docs/
│   └── development-plan.md
├── includes/
│   ├── auth.php
│   ├── cart.php
│   └── database.php
├── pages/
│   ├── register.php
│   ├── login.php
│   ├── logout.php
│   ├── profile.php
│   ├── edit-profile.php
│   ├── cart.php
│   ├── checkout.php
│   ├── add-to-cart.php
│   ├── increase-cart-item.php
│   ├── decrease-cart-item.php
│   ├── remove-from-cart.php
│   └── clear-cart.php
├── public/
│   ├── css/
│   ├── js/
│   └── img/
└── index.php
```

## Base de datos

El archivo principal de base de datos está en:

```text
database/scipio_coffee.sql
```

Tablas principales:

- `products`: productos de café disponibles en la tienda.
- `users`: usuarios registrados.
- `orders`: pedidos creados por los usuarios.
- `order_items`: productos concretos dentro de cada pedido.

## Estado del proyecto

El proyecto está en desarrollo.

Actualmente la parte principal de usuario, carrito y checkout básico ya funciona. Quedan pendientes mejoras de diseño, panel de administración más completo, gestión avanzada de pedidos, validaciones más robustas y una estructura más cercana a MVC.

## Próximos pasos previstos

- Mejorar la interfaz visual con CSS.
- Mostrar pedidos del usuario en su perfil.
- Crear gestión de productos para administradores.
- Crear gestión de pedidos para administradores.
- Mejorar validaciones y mensajes de error.
- Reorganizar progresivamente hacia una estructura tipo MVC.
- Añadir página de confirmación de pedido.
- Reducir stock al finalizar compra.

## Nota de aprendizaje

Este proyecto se está construyendo paso a paso como ejercicio práctico de programación web. La idea no es solo tener una tienda funcionando, sino entender qué hace cada parte: formularios, sesiones, consultas SQL, repositorios, relaciones entre tablas y flujo de usuario.
