<?php
session_start();

require_once "includes/database.php";
require_once "includes/auth.php";
require_once "includes/cart.php";
$sql = "SELECT * FROM products WHERE active = 1 AND featured = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Scipio Coffee Roasters</title>
  <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
  <header>
    <!-- <img src="public/img/logo_scipio_roasters_horizontal.png" alt="Logo Scipio Coffee Roasters"> -->
    <nav>
      <ul>
        <li><a href="#hero">Inicio</a></li>
        <li><a href="#products">Productos</a></li>
        <li><a href="#about">Nosotros</a></li>
        <li><a href="#contact">Contacto</a></li>
        <li><a href="pages/cart.php">Carrito (<?php echo cartCount(); ?>)</a></li>

        <?php if (isLoggedIn()): ?>
          <li>Hola, <?php echo currentUserName(); ?></li>

          <?php if (isAdmin()): ?>
            <li><a href="admin/index.php">Admin</a></li>
          <?php endif; ?>

          <li><a href="pages/profile.php">Mi cuenta</a></li>
          <li><a href="pages/logout.php">Cerrar sesión</a></li>
        <?php else: ?>
          <li><a href="pages/register.php">Registro</a></li>
          <li><a href="pages/login.php">Iniciar sesión</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <!-- <div>
    <h1>Scipio Coffee Roasters</h1>
    <p>Esta es la página principal de Scipio Coffee Roasters. El proyecto se encuentra actualmente en desarrollo</p>
  </div> -->

  <main>
    <section id="hero">
      <h2>Café tostado con la precisión de un general romano</h2>

      <p>Origen único. Tueste artesanal.</p>

      <a href="#products">Ver productos</a>
    </section>

    <section id="products">
      <h2>Productos destacados</h2>

      <?php while ($product = $result->fetch_assoc()): ?>
        <article class="product-card">
          <h3><?php echo $product["name"]; ?></h3>
          <p><?php echo $product["description"]; ?></p>
          <p><?php echo $product["tasting_notes"]; ?></p>
          <span><?php echo $product["price"]; ?>€</span>
          <?php if ($product["stock"] > 0): ?>
                 <a href="pages/add-to-cart.php?id=<?php echo $product["id"]; ?>">Añadir al carrito</a>
          <?php else: ?>
            <span>Sin stock</span>
          <?php endif; ?>         
        </article>
      <?php endwhile; ?>
    </section>

    <section id="about">
      <h2>Sobre nosotros</h2>
      <p>Scipio Coffee Roasters es una empresa dedicada a la producción de café de alta calidad, con un enfoque en la sostenibilidad y el comercio justo.</p>
    </section>

    <section id="contact">
      <h2>Contacto</h2>
      <p>Tel: +34 666 202 146</p>
      <p>Dirección: Avinguda Roma, 12, Barcelona, Catalunya</p>
      <p>Horario: Lunes a Viernes: 8:00 - 20:00 | Sábado: 9:00 - 14:00</p>
      <p>Si deseas ponerte en contacto con nosotros, envíanos un correo electrónico a</p>
      <a href="mailto:info@scipiocoffeeroasters.com">info@scipiocoffeeroasters.com</a>

      <div class="redes-sociales">
        <a href="https://instagram.com/ScipioCoffe">Instagram - @ScipioCoffe</a>
      </div>
    </section>
  </main>
</body>
</html>
