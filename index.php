<?php
session_start();
require_once __DIR__ . '/includes/db.php';
include_once __DIR__ . '/includes/header.php';
?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
/* Centrar las imágenes y hacerlas más grandes */
.swiper-slide {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.swiper-slide img {
    max-width: 50%; /* La imagen no excederá el ancho del contenedor */
    max-height: 200px; /* Altura máxima fija para todas las imágenes */
    object-fit: contain; /* Ajusta la imagen dentro del contenedor sin recortarla */
    margin-bottom: 15px;
    border-radius: 5px;
}

.swiper-slide strong {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.swiper-slide p {
    font-size: 1.1em;
    color: #333;
}
</style>

<?php
// Obtener los productos de la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<h1>Bienvenido a nuestra tienda</h1>
<p>Explora nuestros productos y agrégalos al carrito.</p>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($prod = $result->fetch_assoc()): ?>
                <div class="swiper-slide">
                    <!-- Enlace al detalle del producto -->
                    <a href="/tienda_virtual/modulos/productos/detalle_producto.php?id=<?php echo $prod['id']; ?>" style="text-decoration: none; color: inherit;">
                        <strong><?php echo htmlspecialchars($prod['nombre']); ?></strong><br>
                        <img src="/tienda_virtual/img/<?php echo htmlspecialchars($prod['imagen']); ?>" alt="<?php echo htmlspecialchars($prod['nombre']); ?>" style="max-width: 100%; max-height: 200px; object-fit: contain; border-radius: 5px;">
                        <p>$<?php echo number_format($prod['precio'], 2); ?></p>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay productos disponibles en este momento.</p>
        <?php endif; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script>
    const swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
    });
</script>

<?php include_once __DIR__ . '/includes/footer.php'; ?>