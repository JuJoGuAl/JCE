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

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include ('./header.php'); ?>
        <title>Representaciones JCE - Productos</title>
    </head>
    <body class="lqd-preloader-style-fade lqd-sticky-footer-shadow-2 lqd-search-style-slide-top no-home" data-localscroll-offset="72" data-mobile-nav-breakpoint="1199" data-mobile-nav-style="classic" data-mobile-nav-scheme="light" data-mobile-nav-trigger-alignment="right" data-mobile-header-scheme="gray" data-mobile-logo-alignment="default" data-overlay-onmobile="true">
        <div class="bg-white" id="wrap">
            <?php include ('./navheader.php'); ?>
            <main class="content bg-white bg-repeat" id="lqd-site-content">
                <div id="lqd-contents-wrap">
                    <section class="lqd-section pt-100 pb-35" style="padding-top: 150px;">
                        <div class="container">
                            <div class="w-full flex flex-wrap gap-20 sm:flex-col">
                                <?php if (empty($data_producto['0'])): ?>
                                <div class="w-full text-center py-50">
                                    <i class="fas fa-search fa-3x text-gray-400 mb-20"></i>
                                    <h3 class="text-24 font-bold mb-10">No se encontró información del producto</h3>
                                    <p class="text-gray-600 mb-20">Intenta con otro producto o vuelve al listado.</p>
                                    <div class="relative w-full" style="margin-top: auto; padding: 0 20px;">
                                        <a href="productos.php" class="btn btn-naked btn-sm font-medium whitespace-nowrap text-15 btn-icon-right btn-hover-swp btn-has-label" style="color: #2b2b2b;">
                                            <span class="btn-txt">Volver al listado</span>
                                            <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-ion-ios-arrow-back"></i></span>
                                            <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-ion-ios-arrow-back"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <?php else: $producto = $data_producto['0']; ?>
                                <div class="product-card-2 h-full relative flex flex-col overflow-hidden items-center justify-end rounded-12 sm:w-full">
                                    <div class="div1 relative flex flex-col w-full h-690">
                                        <div class="lqd-imggrp-single block relative w-full" style="flex: 1; min-height: 0;">
                                            <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center w-full h-full">
                                                <figure class="w-full h-full relative">
                                                    <?php
                                                        $imagen_path = './images/productos/' . $producto['id'] . '/';
                                                        $imagen_default = './images/productos/product_default.jpg';
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
                                                        echo '<img id="product-image" src="' . $imagen_default . '" alt="' . $producto['nombre_es'] . '" class="w-full h-full object-cover">';
                                                    ?>
                                                </figure>
                                                <span id="product-prev" class="slider-nav prev"><i class="lqd-icn-ess icon-ion-ios-arrow-back"></i></span>
                                                <span id="product-next" class="slider-nav next"><i class="lqd-icn-ess icon-ion-ios-arrow-forward"></i></span>
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-row relative" style="height: 100px;">
                                            <div class="w-full flex justify-center">
                                                <span id="thumbnails-prev" class="slider-nav prev"><i class="lqd-icn-ess icon-ion-ios-arrow-back"></i></span>
                                                <div class="product-thumbnails-scroll">
                                                    <?php
                                                    foreach ($imagenes as $index => $imagen) {
                                                        echo '
                                                            <div class="product-thumbnail">
                                                                <img class="thumbnail-img" data-image="' . $imagen . '" src="' . $imagen . '" alt="' . $producto['nombre_es'] . '">
                                                            </div>
                                                        ';
                                                    }
                                                    ?>
                                                </div>
                                                <span id="thumbnails-next" class="slider-nav next"><i class="lqd-icn-ess icon-ion-ios-arrow-forward"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-card-2 h-full relative flex flex-col overflow-hidden items-center justify-end rounded-12 p-20 sm:w-full">
                                    <div class="div2 relative flex flex-col w-full h-645">
                                        <div class="mb-0/75em ld-fancy-heading relative">
                                            <h5 class="mb-0/5em ld-fh-element relative text-gray-900 block"><?php echo $producto['marca']['nombre']; ?></h5>
                                            <h3 class="text-26 ld-fh-element relative block"><?php echo $producto['nombre_es']; ?></h3>
                                        </div>
                                        <div class="bg-gray-100 inline-block px-15 py-5 rounded-5">
                                            <span class="text-gray-600">SKU: <?php echo $producto['sku']; ?></span>
                                        </div>
                                        <?php if (!empty($producto['caracteristicas'])):?>
                                        <div class="w-full flex flex-wrap gap-10 mt-20">
                                            <?php foreach ($producto['caracteristicas'] as $caracteristica):
                                                $imagen_path = './images/caracteristicas/' . $caracteristica['foto'];
                                                $imagen_default = './images/caracteristicas/delf.jpg?'.filemtime("./images/caracteristicas/delf.jpg");
                                                if ($caracteristica['foto'] != '' && file_exists($imagen_path)) {
                                                    $imagen = $imagen_path;
                                                } else {
                                                    $imagen = $imagen_default;
                                                }
                                            ?>
                                            <div class="product-caracteristicas h-full relative flex flex-col rounded-8 p-10">
                                                <div class="relative w-full h-80">
                                                    <div class="lqd-imggrp-single block relative w-full h-full">
                                                        <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center w-full h-full">
                                                            <figure class="w-full h-full relative">
                                                                <img src="<?php echo $imagen; ?>" alt="<?php echo $caracteristica['nombre_es']; ?>" class="w-full h-full object-cover">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="relative w-full h-full">
                                                    <span class="text-12 inline-block w-full font-bold text-secondary"><?php echo $caracteristica['nombre_es']; ?></span>
                                                    <span class="text-14 inline-block w-full font-semibold"><?php echo $caracteristica['valor']; ?></span>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (!empty($producto['ficha'])): ?>
                                        <div class="w-full mt-20">
                                            <div class="relative w-full" style="margin-top: auto; padding: 0 20px;">
                                                <a href="./documentos/productos/<?php echo $producto['ficha']; ?>" target="_blank" class="btn btn-naked btn-sm font-medium whitespace-nowrap text-15 btn-icon-right btn-hover-swp btn-has-label" style="color: #2b2b2b;">
                                                    <span class="btn-txt">Ficha Técnica</span>
                                                    <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-md-arrow-down"></i></span>
                                                    <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-md-arrow-down"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if (!empty($producto['descripcion_es'])): ?>
                                            <div class="accordion accordion-title-underlined accordion-sm mt-20" id="product-description" role="tablist" aria-multiselectable="true">
                                                <div class="accordion-item panel">
                                                    <div class="accordion-heading" role="tab" id="heading-item-one" style="display: none;">
                                                        <h4 style="font-size: 25px; color: rgb(43, 43, 43);" class="accordion-title font-normal">
                                                            <a class="collapsed" role="button" data-bs-toggle="collapse" href="#collapse-item-one" aria-expanded="true" aria-controls="collapse-item-one">
                                                                <span class="accordion-title-txt">Descripción</span>
                                                                <span class="accordion-expander text-24 w-60 h-60 flex items-center justify-center p-0 border-2 rounded-full border-lightgray flex-shrink-0">
                                                                    <i class="lqd-icn-ess icon-ion-ios-add" style="font-size: 19px;"></i>
                                                                    <i class="lqd-icn-ess icon-ion-ios-remove" style="font-size: 19px;"></i>
                                                                </span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="description-content pt-1em">
                                                        <div class="ld-fh-element mb-0 inline-block relative">
                                                            <?php echo $producto['descripcion_es']; ?>
                                                        </div>
                                                    </div>
                                                    <div id="collapse-item-one" class="accordion-collapse collapse" data-bs-parent="#product-description" role="tabpanel" aria-labelledby="heading-item-one">
                                                        <div class="accordion-content"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                    <div style="height: 60px;"></div>
                    <section class="lqd-section pt-20 pb-35">
                        <div class="container">
                            <div class="w-full flex flex-wrap"><h3 class="text-24 font-bold mb-10">Productos Similares</h3></div>
                            <?php if (empty($productos_similares['result'])): ?>
                            <div class="w-full py-20">
                                <p class="text-18 text-gray-600 mb-20">Intenta con otros filtros</p>
                            </div>
                            <?php else: ?>
                            <div id="vista-productos" class="w-full flex flex-wrap py-30 gap-20">
                                <?php foreach ($productos_similares['result'] as $producto): 
                                    // Obtener la primera imagen del directorio
                                    $imagen_path = './images/productos/' . $producto['id'] . '/';
                                    $imagen_default = './images/productos/product_default.jpg';
                                    $imagen = $imagen_default;
                                    
                                    if (is_dir($imagen_path)) {
                                        $archivos = scandir($imagen_path);
                                        foreach ($archivos as $archivo) {
                                            if ($archivo != '.' && $archivo != '..' && 
                                                (strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'jpg' || strtolower(pathinfo($archivo, PATHINFO_EXTENSION)) == 'png')) {
                                                $imagen = $imagen_path . $archivo;
                                                break;
                                            }
                                        }
                                    }
                                ?>
                                    <div class="product-card h-full relative flex flex-col overflow-hidden items-center justify-end rounded-12">
                                        <div class="relative w-full h-210">
                                            <div class="lqd-imggrp-single block relative w-full h-full">
                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center w-full h-full">
                                                    <figure class="w-full h-full relative">
                                                        <img src="<?php echo $imagen; ?>" alt="<?php echo $producto['nombre_es']; ?>" class="w-full h-full object-cover">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card-content">
                                            <?php if (!empty($producto['marca']['nombre'])): ?>
                                                <div class="mb-3">
                                                    <span class="text-12 font-bold text-secondary"><?php echo $producto['marca']['nombre']; ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <h3 class="text-14 font-bold mb-3 line-clamp-2 flex-grow"><?php echo $producto['nombre_es']; ?></h3>
                                            <?php if (!empty($producto['sku'])): ?>
                                                <div class="mb-5">
                                                    <span class="text-12 text-gray-600">SKU: </span>
                                                    <span class="text-12 font-medium"><?php echo $producto['sku']; ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="relative w-full" style="margin-top: auto; padding: 0 20px;">
                                                <a href="producto.php?id=<?php echo $producto['id']; ?>" class="btn btn-naked btn-sm font-medium whitespace-nowrap text-15 btn-icon-right btn-hover-swp btn-has-label" style="color: #2b2b2b;">
                                                    <span class="btn-txt" data-text="Ver Detalles">Ver Detalles</span>
                                                    <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-ion-ios-arrow-forward"></i></span>
                                                    <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-ion-ios-arrow-forward"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>
            </main>
            <?php include ('./footer.php'); ?>
            <?php include ('./asset.php'); ?>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnailsScroll = document.querySelector('.product-thumbnails-scroll');
            const prevButton = document.getElementById('thumbnails-prev');
            const nextButton = document.getElementById('thumbnails-next');
            const productPrevButton = document.getElementById('product-prev');
            const productNextButton = document.getElementById('product-next');
            const thumbnails = document.querySelectorAll('.product-thumbnail');
            const productImage = document.getElementById('product-image');
            
            if (thumbnailsScroll && prevButton && nextButton && thumbnails.length > 0 && productImage) {
                const productSlider = {
                    elements: {
                        productImage: productImage,
                        thumbnails: thumbnails,
                        prevButton: prevButton,
                        nextButton: nextButton,
                        productPrevButton: productPrevButton,
                        productNextButton: productNextButton,
                        thumbnailsContainer: thumbnailsScroll
                    },
                    currentIndex: 0,
                    thumbnailGap: 10,

                    init() {
                        this.addEventListeners();
                        this.showProduct(0);
                    },

                    showProduct(index) {
                        const thumbnail = this.elements.thumbnails[index];
                        if (!thumbnail) return;
            
                        const newImageSrc = thumbnail.querySelector('.thumbnail-img').getAttribute('data-image');
                        this.elements.productImage.src = newImageSrc;
            
                        this.elements.thumbnails.forEach(thumb => thumb.classList.remove('active'));
                        thumbnail.classList.add('active');
                        this.currentIndex = index;
                    },

                    nextProduct() {
                        const nextIndex = (this.currentIndex + 1) % this.elements.thumbnails.length;
                        this.showProduct(nextIndex);
                    },

                    prevProduct() {
                        const prevIndex = (this.currentIndex - 1 + this.elements.thumbnails.length) % this.elements.thumbnails.length;
                        this.showProduct(prevIndex);
                    },

                    scrollThumbnails(direction) {
                        const thumbnailWidth = this.elements.thumbnails[0]?.offsetWidth || 0;
                        const scrollAmount = (thumbnailWidth + this.thumbnailGap) * direction;
                        
                        this.elements.thumbnailsContainer.scrollBy({
                            left: scrollAmount,
                            behavior: 'smooth'
                        });
                    },

                    addEventListeners() {
                        // Eventos para las miniaturas
                        this.elements.thumbnails.forEach((thumbnail, index) => {
                            thumbnail.addEventListener('click', () => {
                                this.showProduct(index);
                            });
                        });
            
                        // Eventos para los botones de scroll de miniaturas
                        this.elements.prevButton.addEventListener('click', () => {
                            this.scrollThumbnails(-1);
                        });
                        
                        this.elements.nextButton.addEventListener('click', () => {
                            this.scrollThumbnails(1);
                        });

                        // Eventos para los botones de cambio de imagen principal
                        this.elements.productPrevButton.addEventListener('click', () => {
                            this.prevProduct();
                        });

                        this.elements.productNextButton.addEventListener('click', () => {
                            this.nextProduct();
                        });
                    }
                };

                productSlider.init();
            }

            // Función para manejar el acordeón de descripción
            const accordionToggle = document.querySelector('.accordion-title a');
            const div2 = document.querySelector('.div2');
            const collapseOne = document.getElementById('collapse-item-one');
            const descriptionContent = document.querySelector('.description-content');
            const accordionHeading = document.querySelector('.accordion-heading');

            if (accordionToggle && div2 && collapseOne && descriptionContent && accordionHeading) {
                // Asegurar que div2 tenga la altura inicial
                div2.classList.add('h-645');

                // Función para verificar si el contenido excede el espacio disponible
                function checkContentOverflow() {
                    const contentHeight = descriptionContent.scrollHeight;
                    const containerHeight = div2.offsetHeight;
                    
                    // Si el contenido es más alto que el contenedor, mostrar el acordeón
                    if (contentHeight > containerHeight) {
                        accordionHeading.style.display = 'block';
                    } else {
                        accordionHeading.style.display = 'none';
                    }
                }

                // Verificar al cargar y al cambiar el tamaño de la ventana
                window.addEventListener('load', checkContentOverflow);
                window.addEventListener('resize', checkContentOverflow);

                // Usar el evento show.bs.collapse y hide.bs.collapse para manejar los cambios
                collapseOne.addEventListener('show.bs.collapse', function () {
                    div2.classList.remove('h-645');
                    div2.classList.add('h-full');
                });

                collapseOne.addEventListener('hide.bs.collapse', function () {
                    div2.classList.remove('h-full');
                    div2.classList.add('h-645');
                });
            }
        });
    </script>
</html>