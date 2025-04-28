<?php
declare(strict_types=1);
session_start();
require_once './vendor/autoload.php';

use App\Entities\Productos;

$productos = new Productos();

// Obtener producto
$id = $_GET['id'] ?? null;
$data_producto = $productos->findByIdFull((int)$id);

// Obtener productos similares
$productos_similares = [];
if (!empty($data_producto['0'])) {
    $producto = $data_producto['0'];
    $categoria_filters = [];
    if (!empty($producto['categorias'])) {
        foreach ($producto['categorias'] as $categoria) {
            $categoria_filters[] = ['column' => 'categoria_id', 'operator' => '=', 'value' => $categoria['categoria_id']];
        }
    }
    $categoria_filters[] = ['column' => 'producto_id', 'operator' => '!=', 'value' => $producto['id']];
    $productos_similares = $productos->findAllFull([],$categoria_filters, 'RAND()', '4');
}

include_once './translations.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <?php include ('./header.php'); ?>
        <title><?php echo $traduccion['title'].' - '.$traduccion['products'] ?></title>
    </head>
    <body class="lqd-preloader-style-fade lqd-sticky-footer-shadow-2 lqd-search-style-slide-top no-home" data-localscroll-offset="72" data-mobile-nav-breakpoint="1199" data-mobile-nav-style="classic" data-mobile-nav-scheme="light" data-mobile-nav-trigger-alignment="right" data-mobile-header-scheme="gray" data-mobile-logo-alignment="default" data-overlay-onmobile="true">
        <div class="bg-white" id="wrap">
            <?php include ('./navheader.php'); ?>
            <main class="content bg-white bg-repeat" id="lqd-site-content">
                <div id="lqd-contents-wrap">
                    <!-- Sección de Producto -->
                    <section class="lqd-section py-100" style="padding-top: 150px;">
                        <div class="container">
                            <div class="row">
                                <!-- Detalle del Producto -->
                                <div class="col-12">
                                    <?php if (empty($data_producto['0'])): ?>
                                        <div class="w-full text-center py-50">
                                            <i class="fas fa-search fa-3x text-gray-400 mb-20"></i>
                                            <h3 class="text-24 font-bold mb-10">No se encontró información del producto</h3>
                                            <p class="text-gray-600 mb-20">Intenta con otro producto o vuelve al listado.</p>
                                            <a href="productos.php" class="inline-flex items-center px-20 py-10 bg-secondary text-primary font-bold rounded-5 hover:bg-secondary/90 transition-colors">
                                                <i class="fas fa-arrow-left mr-10"></i>
                                                Volver al listado
                                            </a>
                                        </div>
                                    <?php else: $producto = $data_producto['0']; ?>
                                        <div class="row">
                                            <section class="product-details-area">
                                                <div class="container">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-6">
                                                            <div class="product-view-one-image">
                                                                <div class="product-main-display">
                                                                    <div class="product-image">
                                                                        <?php
                                                                            $imagen_path = './images/productos/' . $producto['id'] . '/';
                                                                            $imagen_default = './images/productos/default.jpg';
                                                                            $imagenes = [];

                                                                            if (is_dir($imagen_path)) {
                                                                                $archivos = scandir($imagen_path);
                                                                                foreach ($archivos as $archivo) {
                                                                                    if ($archivo != '.' && $archivo != '..' && 
                                                                                        (strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'jpg' || 
                                                                                         strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'jpeg' || 
                                                                                         strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'png' || 
                                                                                         strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'gif')) {
                                                                                        $imagenes[] = $imagen_path . $archivo;
                                                                                    }
                                                                                }
                                                                            }
                                                                            // Si no hay imágenes, usamos la imagen por defecto
                                                                            if (empty($imagenes)) {
                                                                                $imagenes[] = $imagen_default;
                                                                            }

                                                                            // Mostramos la primera imagen
                                                                            if (!empty($imagenes)) {
                                                                                echo '<img src="' . $imagenes[0] . '" alt="' . $producto['nombre_'.$lang] . '" class="w-full h-auto">';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="product-thumbnails-wrapper">
                                                                    <button class="slider-nav prev">❮</button>
                                                                    <div class="product-thumbnails-container">
                                                                        <?php
                                                                            foreach ($imagenes as $index => $imagen) {
                                                                                echo '<div class="product-thumbnail" data-image="' . $imagen . '" style="background-image: url(\'' . $imagen . '\')"></div>';
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                    <button class="slider-nav next">❯</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="product-content ml-15">
                                                                <div class="product-header mb-30">
                                                                    <div class="product-brand mb-10">
                                                                        <span class="text-secondary font-semibold text-18"><?php echo $producto['marca']['nombre']; ?></span>
                                                                    </div>
                                                                    <h1 class="product-title text-32 font-bold mb-15"><?php echo $producto['nombre_'.$lang]; ?></h1>
                                                                    <div class="product-sku bg-gray-100 inline-block px-15 py-5 rounded-5">
                                                                        <span class="text-gray-600">SKU: <?php echo $producto['sku']; ?></span>
                                                                    </div>
                                                                </div>

                                                                <div class="product-features mb-30">
                                                                    <h3 class="text-20 font-semibold mb-15">Características</h3>
                                                                    <div class="row">
                                                                        <div class="col-4">
                                                                            <div class="feature-item text-center p-15 bg-gray-50 rounded-8">
                                                                                <div class="feature-label text-12 text-gray-600 mb-5">
                                                                                    Material
                                                                                </div>
                                                                                <div class="feature-value text-14 font-semibold">
                                                                                    Acero Inoxidable
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="feature-item text-center p-15 bg-gray-50 rounded-8">
                                                                                <div class="feature-label text-12 text-gray-600 mb-5">
                                                                                    Diámetro
                                                                                </div>
                                                                                <div class="feature-value text-14 font-semibold">
                                                                                    25mm
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <div class="feature-item text-center p-15 bg-gray-50 rounded-8">
                                                                                <div class="feature-label text-12 text-gray-600 mb-5">
                                                                                    Longitud
                                                                                </div>
                                                                                <div class="feature-value text-14 font-semibold">
                                                                                    100mm
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php if (!empty($producto['ficha'])): ?>
                                                                <div class="product-document mb-30">
                                                                    <a href="./documentos/productos/<?php echo $producto['ficha']; ?>" target="_blank" class="document-link">
                                                                        <div class="document-content p-8 bg-secondary text-white">
                                                                            <div class="document-icon mr-15">
                                                                                <i class="fas fa-file-pdf text-24"></i>
                                                                            </div>
                                                                            <div class="document-text">
                                                                                <h4 class="text-16 font-semibold mb-5 text-white">Ficha Técnica</h4>
                                                                                <p class="text-14" style="opacity: 0.8;">Descarga la información técnica del producto</p>
                                                                            </div>
                                                                            <div class="document-arrow ml-auto">
                                                                                <i class="fas fa-arrow-right text-18"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <!-- Sección de Descripción -->
                                            <section class="product-description mt-50">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="description-content bg-white p-30 rounded-12 shadow-sm">
                                                                <h3 class="text-24 font-bold mb-20">Descripción del Producto</h3>
                                                            <div class="description-text text-gray-600">
                                                                <?php 
                                                                    echo $producto['descripcion_'.$lang];
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                        <!-- Productos Similares -->
                                        <?php if (!empty($producto)): ?>
                                        <section class="related-products mt-50">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3 class="text-24 font-bold mb-30">Productos Similares</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php
                                                    if (!empty($productos_similares['result'])) {
                                                        foreach ($productos_similares['result'] as $producto_similar) {
                                                    ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                                                        <div class="product-card bg-white p-20 rounded-12 shadow-sm h-100">
                                                            <div class="product-image mb-15">
                                                                <a href="producto.php?id=<?php echo $producto_similar['id']; ?>">
                                                                    <?php
                                                                    $imagen_path = './images/productos/' . $producto_similar['id'] . '/';
                                                                    $imagen_default = './images/productos/default.jpg';
                                                                    $imagen_principal = $imagen_default;

                                                                    if (is_dir($imagen_path)) {
                                                                        $archivos = scandir($imagen_path);
                                                                        foreach ($archivos as $archivo) {
                                                                            if ($archivo != '.' && $archivo != '..' && 
                                                                                (strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'jpg' || 
                                                                                 strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'jpeg' || 
                                                                                 strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'png')) {
                                                                                $imagen_principal = $imagen_path . $archivo;
                                                                                break;
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <img src="<?php echo $imagen_principal; ?>" 
                                                                         alt="<?php echo $producto_similar['nombre_'.$lang]; ?>" 
                                                                         class="w-100 h-auto rounded-8">
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h4 class="product-title text-16 font-semibold mb-5">
                                                                    <a href="producto.php?id=<?php echo $producto_similar['id']; ?>" class="text-dark">
                                                                        <?php echo $producto_similar['nombre_'.$lang]; ?>
                                                                    </a>
                                                                </h4>
                                                                <div class="product-brand text-14 text-secondary mb-5">
                                                                    <?php echo $producto_similar['marca']['nombre']; ?>
                                                                </div>
                                                                <div class="product-sku text-12 text-gray-600">
                                                                    SKU: <?php echo $producto_similar['sku']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo '<div class="col-12"><p class="text-center text-gray-600">No hay productos similares disponibles.</p></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </section>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
            <?php include ('./footer.php'); ?>
            <?php include ('./asset.php'); ?>
            <style>
                .product-view-one-image {
                    position: relative;
                    margin-bottom: 30px;
                    background: #fff;
                    border-radius: 12px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                    padding: 20px;
                    min-height: 400px; /* Altura mínima fija */
                    display: flex;
                    flex-direction: column;
                }

                .product-main-display {
                    margin-bottom: 20px;
                    position: relative;
                    overflow: hidden;
                    border-radius: 8px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                    flex-grow: 1; /* Ocupa el espacio disponible */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .product-image {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    min-height: 300px; /* Altura mínima para la imagen */
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: #f8f9fa;
                }

                .product-image img {
                    max-width: 100%;
                    max-height: 100%;
                    object-fit: contain;
                    transition: transform 0.3s ease;
                }

                .product-image img:hover {
                    transform: scale(1.02);
                }

                .product-thumbnails-wrapper {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    padding: 10px;
                    background: #f8f9fa;
                    border-radius: 8px;
                    margin-top: auto; /* Empuja el carrusel hacia abajo */
                }

                .product-thumbnails-container {
                    display: flex;
                    gap: 12px;
                    overflow-x: auto;
                    scroll-behavior: smooth;
                    padding: 5px;
                    -ms-overflow-style: none;
                    scrollbar-width: none;
                    flex: 1;
                }

                .product-thumbnails-container::-webkit-scrollbar {
                    display: none;
                }

                .product-thumbnail {
                    min-width: 90px;
                    height: 90px;
                    background-size: cover;
                    background-position: center;
                    border-radius: 6px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    border: 1px solid #eee;
                    position: relative;
                    overflow: hidden;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                }

                .product-thumbnail::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: rgba(0, 0, 0, 0.2);
                    opacity: 0;
                    transition: opacity 0.3s ease;
                }

                .product-thumbnail:hover::after {
                    opacity: 1;
                }

                .product-thumbnail:hover {
                    border-color: #007bff;
                    transform: translateY(-2px);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                }

                .product-thumbnail.active {
                    border-color: #007bff;
                    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.2);
                }

                .product-thumbnail.active::after {
                    opacity: 0;
                }

                .slider-nav {
                    background: rgba(255, 255, 255, 0.9);
                    border: none;
                    width: 35px;
                    height: 35px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    color: #666;
                    font-size: 16px;
                    transition: all 0.3s ease;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    z-index: 10;
                }

                .slider-nav.prev {
                    left: 10px;
                }

                .slider-nav.next {
                    right: 10px;
                }

                .slider-nav:hover {
                    background: #fff;
                    color: #007bff;
                    transform: translateY(-50%) scale(1.1);
                }

                .slider-nav:active {
                    transform: translateY(-50%) scale(0.95);
                }

                @media (max-width: 768px) {
                    .product-view-one-image {
                        min-height: 300px; /* Altura menor en móvil */
                    }

                    .product-image {
                        min-height: 200px;
                    }

                    .product-title {
                        font-size: 20px;
                    }

                    .feature-item {
                        margin-bottom: 15px;
                    }

                    .document-content {
                        padding: 12px;
                    }

                    .document-icon {
                        width: 35px;
                        height: 35px;
                    }

                    .product-thumbnail {
                        min-width: 70px;
                        height: 70px;
                    }

                    .slider-nav {
                        width: 30px;
                        height: 30px;
                        font-size: 14px;
                    }
                }

                .product-content {
                    padding: 20px;
                }

                .product-header {
                    border-bottom: 1px solid #eee;
                    padding-bottom: 20px;
                }

                .product-brand {
                    display: inline-block;
                    padding: 5px 15px;
                    background: rgba(0, 123, 255, 0.1);
                    border-radius: 20px;
                    margin-bottom: 10px;
                }

                .product-title {
                    color: #333;
                    line-height: 1.2;
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 15px;
                }

                .product-sku {
                    display: inline-block;
                    font-size: 14px;
                    color: #666;
                }

                .product-features {
                    margin-top: 30px;
                }

                .feature-item {
                    transition: all 0.3s ease;
                    border: 1px solid #eee;
                    background: #fff;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                }

                .feature-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                    border-color: #007bff;
                }

                .feature-label {
                    color: #666;
                }

                .feature-value {
                    color: #333;
                }

                .document-link {
                    text-decoration: none;
                    display: block;
                    transition: all 0.3s ease;
                }

                .document-link:hover {
                    transform: translateX(5px);
                }

                .document-content {
                    border: 1px solid var(--lqd-color-primary);
                    transition: all 0.3s ease;
                    background-color: var(--lqd-color-secondary);
                    border-radius: 8px;
                    display: flex;
                    align-items: center;
                    padding: 8px;
                }

                .document-link:hover .document-content {
                    border-color: var(--lqd-color-primary);
                    background-color: var(--lqd-color-secondary);
                    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.1);
                    transform: translateX(5px);
                }

                .document-icon {
                    width: 40px;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: rgba(var(--lqd-color-primary-rgb), 0.1);
                    border-radius: 8px;
                    margin-right: 15px;
                }

                .document-arrow {
                    opacity: 0;
                    transition: all 0.3s ease;
                }

                .document-link:hover .document-arrow {
                    opacity: 1;
                    transform: translateX(5px);
                }

                .description-content {
                    border: 1px solid #eee;
                }

                .description-text {
                    line-height: 1.6;
                }

                .description-text p {
                    margin-bottom: 15px;
                }

                .description-text p:last-child {
                    margin-bottom: 0;
                }

                .description-text ul,
                .description-text ol {
                    margin-bottom: 15px;
                    padding-left: 20px;
                }

                .description-text li {
                    margin-bottom: 5px;
                }

                .description-text img {
                    max-width: 100%;
                    height: auto;
                    margin: 15px 0;
                }

                .description-text h1,
                .description-text h2,
                .description-text h3,
                .description-text h4,
                .description-text h5,
                .description-text h6 {
                    margin: 20px 0 15px;
                    font-weight: bold;
                }

                .description-text table {
                    width: 100%;
                    border-collapse: collapse;
                    margin: 15px 0;
                }

                .description-text table td,
                .description-text table th {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                .description-text table th {
                    background-color: #f5f5f5;
                }

                .product-description {
                    margin-top: 50px;
                }

                .description-content {
                    border: 1px solid #eee;
                }

                @media (max-width: 768px) {
                    .description-content {
                        margin: 0;
                    }
                }

                /* Estilos para Productos Similares */
                .related-products {
                    margin-top: 50px;
                }

                .product-card {
                    transition: all 0.3s ease;
                    border: 1px solid #eee;
                    border-radius: 12px;
                    overflow: hidden;
                    background: #fff;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }

                .product-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                }

                .product-card .product-image {
                    width: 100%;
                    aspect-ratio: 1; /* Mantiene la proporción cuadrada */
                    overflow: hidden;
                    position: relative;
                    background: #f8f9fa;
                }

                .product-card .product-image img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transition: transform 0.3s ease;
                }

                .product-card:hover .product-image img {
                    transform: scale(1.05);
                }

                .product-card .product-info {
                    padding: 15px;
                    display: flex;
                    flex-direction: column;
                    gap: 8px;
                }

                .product-card .product-title {
                    margin: 0;
                    line-height: 1.3;
                }

                .product-card .product-title a {
                    text-decoration: none;
                    transition: color 0.3s ease;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    font-size: 14px;
                    color: #333;
                }

                .product-card:hover .product-title a {
                    color: var(--lqd-color-primary) !important;
                }

                .product-card .product-brand {
                    font-size: 12px;
                    color: var(--lqd-color-secondary);
                    margin: 0;
                }

                .product-card .product-sku {
                    font-size: 12px;
                    color: #666;
                    margin: 0;
                }

                @media (max-width: 768px) {
                    .product-card {
                        margin-bottom: 20px;
                    }
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const thumbnails = document.querySelectorAll('.product-thumbnail');
                    const mainImage = document.querySelector('.product-image img');
                    const prevButton = document.querySelector('.slider-nav.prev');
                    const nextButton = document.querySelector('.slider-nav.next');
                    const container = document.querySelector('.product-thumbnails-container');
                    let currentIndex = 0;
                    let touchStartX = 0;
                    let touchEndX = 0;

                    // Función para actualizar la imagen principal
                    function updateMainImage(index) {
                        const thumbnail = thumbnails[index];
                        const imageUrl = thumbnail.getAttribute('data-image');
                        mainImage.src = imageUrl;
                        
                        // Actualizar clases activas
                        thumbnails.forEach(thumb => thumb.classList.remove('active'));
                        thumbnail.classList.add('active');
                    }

                    // Evento click en miniaturas
                    thumbnails.forEach((thumbnail, index) => {
                        thumbnail.addEventListener('click', () => {
                            currentIndex = index;
                            updateMainImage(index);
                        });
                    });

                    // Navegación con botones
                    prevButton.addEventListener('click', () => {
                        currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
                        updateMainImage(currentIndex);
                        scrollToThumbnail(currentIndex);
                    });

                    nextButton.addEventListener('click', () => {
                        currentIndex = (currentIndex + 1) % thumbnails.length;
                        updateMainImage(currentIndex);
                        scrollToThumbnail(currentIndex);
                    });

                    // Función para desplazar a la miniatura seleccionada
                    function scrollToThumbnail(index) {
                        const thumbnail = thumbnails[index];
                        const containerRect = container.getBoundingClientRect();
                        const thumbnailRect = thumbnail.getBoundingClientRect();
                        
                        container.scrollTo({
                            left: container.scrollLeft + (thumbnailRect.left - containerRect.left) - (containerRect.width / 2) + (thumbnailRect.width / 2),
                            behavior: 'smooth'
                        });
                    }

                    // Soporte para gestos táctiles
                    container.addEventListener('touchstart', (e) => {
                        touchStartX = e.changedTouches[0].screenX;
                    });

                    container.addEventListener('touchend', (e) => {
                        touchEndX = e.changedTouches[0].screenX;
                        handleSwipe();
                    });

                    function handleSwipe() {
                        const diff = touchStartX - touchEndX;
                        if (Math.abs(diff) > 50) { // Umbral mínimo para considerar un swipe
                            if (diff > 0) {
                                // Swipe izquierda
                                currentIndex = (currentIndex + 1) % thumbnails.length;
                            } else {
                                // Swipe derecha
                                currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
                            }
                            updateMainImage(currentIndex);
                            scrollToThumbnail(currentIndex);
                        }
                    }

                    // Inicializar con la primera imagen
                    if (thumbnails.length > 0) {
                        updateMainImage(0);
                    }
                });
            </script>
        </div>
    </body>
</html>