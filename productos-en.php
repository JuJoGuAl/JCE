<?php
declare(strict_types=1);
session_start();
require_once './vendor/autoload.php';

use App\Entities\Marcas;
use App\Entities\Productos;
use App\Entities\Categorias;

$marcas = new Marcas();
$productos = new Productos();
$categorias = new Categorias();

// Obtener datos
$data_marcas = $marcas->findAll([],'', 'nombre ASC');
$data_categorias = $categorias->findAll([],'', 'id ASC');

// Obtener filtros
$marca_filtro = $_GET['marca'] ?? null;
$categoria_filtro = $_GET['categoria'] ?? null;

$ordenamiento = $_GET['orden'] ?? '01';
switch ($ordenamiento) {
    case '01':
        $ordenamiento = 'nombre_en ASC';
        break;
    case '02':
        $ordenamiento = 'nombre_en DESC';
        break;
    case '03':
        $ordenamiento = 'marca_id ASC';
        break;
    case '04':
        $ordenamiento = 'marca_id DESC';
        break;
}

$producto_filters = [];
$categoria_filters = [];

if ($marca_filtro != null) {
    $array_filtro = explode(',', $marca_filtro);
    foreach ($array_filtro as $filtro) {
        $producto_filters[] = ['column' => 'marca_id', 'operator' => '=', 'value' => $filtro];
    }
}
if ($categoria_filtro != null) {
    $array_filtro = explode(',', $categoria_filtro);
    foreach ($array_filtro as $filtro) {
        $categoria_filters[] = ['column' => 'categoria_id', 'operator' => '=', 'value' => $filtro];
    }
}

// Obtener productos filtrados
$data_productos = $productos->findAllFull($producto_filters, $categoria_filters,$ordenamiento);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include ('./header-en.php'); ?>
        <title>Representaciones JCE - Products</title>
    </head>
    <body id="productos-page" class="lqd-preloader-style-fade lqd-sticky-footer-shadow-2 lqd-search-style-slide-top no-home" data-localscroll-offset="72" data-mobile-nav-breakpoint="1199" data-mobile-nav-style="classic" data-mobile-nav-scheme="light" data-mobile-nav-trigger-alignment="right" data-mobile-header-scheme="gray" data-mobile-logo-alignment="default" data-overlay-onmobile="true">
        <div class="bg-white" id="wrap">
            <?php include ('./navheader-en.php'); ?>
            <main class="content bg-white bg-repeat" id="lqd-site-content">
                <div id="lqd-contents-wrap">
                    <!-- Sección de Productos -->
                    <section class="lqd-section py-100" style="padding-top: 150px;">
                        <div class="container">
                            <div class="row">
                                <!-- Overlay de Filtros -->
                                <div class="filtros-overlay" onclick="toggleFiltros()"></div>
                                
                                <!-- Filtros -->
                                <div class="col-12 col-lg-3 mb-50 d-none d-lg-block">
                                    <div class="filtros-container">
                                        <h3>Filters</h3>
                                        <!-- Filtro de Marcas -->
                                        <div class="filtro-grupo">
                                            <h4 class="accordion-title font-normal">
                                                <a class="d-flex justify-content-between align-items-center" role="button" data-bs-toggle="collapse" href="#colapseMarcas" aria-expanded="true" aria-controls="colapseMarcas">
                                                    <span class="accordion-title-txt">Brands</span>
                                                    <span class="accordion-expander text-24 w-60 h-60 flex items-center justify-center p-0 border-2 rounded-full border-lightgray flex-shrink-0">
                                                        <i class="lqd-icn-ess icon-ion-ios-add" style="font-size: 19px;"></i>
                                                        <i class="lqd-icn-ess icon-ion-ios-remove" style="font-size: 19px;"></i>
                                                    </span>
                                                </a>
                                            </h4>
                                            <div class="collapse show" id="colapseMarcas">
                                                <div class="filtro-opciones">
                                                    <?php 
                                                    $marcas_seleccionadas = isset($_GET['marca']) ? explode(',', $_GET['marca']) : [];
                                                    foreach ($data_marcas['result'] as $marca): 
                                                    ?>
                                                        <div class="filtro-opcion">
                                                            <input type="checkbox" name="marca[]" value="<?php echo $marca['id']; ?>" <?php echo in_array($marca['id'], $marcas_seleccionadas) ? 'checked' : ''; ?> onchange="actualizarFiltros()" id="marca_<?php echo $marca['id']; ?>">
                                                            <label for="marca_<?php echo $marca['id']; ?>">
                                                                <?php echo $marca['nombre']; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filtro de Categorías -->
                                        <div class="filtro-grupo">
                                            <h4 class="accordion-title font-normal">
                                                <a class="collapsed d-flex justify-content-between align-items-center" role="button" data-bs-toggle="collapse" href="#colapseCategories" aria-expanded="false" aria-controls="colapseCategories">
                                                    <span class="accordion-title-txt">Categories</span>
                                                    <span class="accordion-expander text-24 w-60 h-60 flex items-center justify-center p-0 border-2 rounded-full border-lightgray flex-shrink-0">
                                                        <i class="lqd-icn-ess icon-ion-ios-add" style="font-size: 19px;"></i>
                                                        <i class="lqd-icn-ess icon-ion-ios-remove" style="font-size: 19px;"></i>
                                                    </span>
                                                </a>
                                            </h4>
                                            <div class="collapse" id="colapseCategories">
                                                <div class="filtro-opciones">
                                                    <?php 
                                                    $categorias_seleccionadas = isset($_GET['categoria']) ? explode(',', $_GET['categoria']) : [];
                                                    foreach ($data_categorias['result'] as $categoria): 
                                                    ?>
                                                        <div class="filtro-opcion">
                                                            <input type="checkbox" name="categoria[]" value="<?php echo $categoria['id']; ?>" <?php echo in_array($categoria['id'], $categorias_seleccionadas) ? 'checked' : ''; ?> onchange="actualizarFiltros()" id="categoria_<?php echo $categoria['id']; ?>">
                                                            <label for="categoria_<?php echo $categoria['id']; ?>">
                                                                <?php echo $categoria['nombre_en']; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lista de Productos -->
                                <div class="col-12 col-lg-9">
                                    <!-- Controles de Vista y Ordenamiento -->
                                    <div class="flex justify-between mb-30">
                                        <div class="vista-controls">
                                            <div class="search-box">
                                                <input type="text" id="searchInput" class="form-control" placeholder="Search by name, brand or SKU..." style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                                            </div>
                                            <div class="controls-group">
                                                <a href="javascript:void(0)" class="filtros-toggle" onclick="toggleFiltros()" title="Filtros">
                                                    <i class="fas fa-filter"></i>
                                                </a>
                                                <a href="javascript:void(0)" onclick="cambiarVista('grid-4'); return false;" class="active" id="btn-grid-4" title="4 columns view">
                                                    <i class="fas fa-th-large"></i>
                                                </a>
                                                <a href="javascript:void(0)" onclick="cambiarVista('grid-2'); return false;" id="btn-grid-2" title="2 columns view">
                                                    <i class="fas fa-th"></i>
                                                </a>
                                                <div class="ordenamiento-controls">
                                                    <select id="ordenamiento" onchange="cambiarOrdenamiento()">
                                                        <option value="01">Name (A-Z)</option>
                                                        <option value="02">Name (Z-A)</option>
                                                        <option value="03">Brand (A-Z)</option>
                                                        <option value="04">Brand (Z-A)</option>
                                                    </select>
                                                    <button class="btn-reset" onclick="reiniciarFiltros()" title="Reset filters">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Vista de Productos -->
                                    <?php if (empty($data_productos['result'])): ?>
                                        <div class="w-full text-center py-50">
                                            <i class="fas fa-search fa-3x text-gray-400 mb-20"></i>
                                            <h3 class="text-24 font-bold mb-10">No products found that match the selected filters</h3>
                                            <p class="text-gray-600 mb-20">Try with other filters</p>
                                            <a href="javascript:void(0)" onclick="reiniciarFiltros()" class="inline-flex items-center px-20 py-10 bg-secondary text-primary font-bold rounded-5 hover:bg-secondary/90 transition-colors">
                                                <i class="fas fa-sync-alt mr-10"></i>
                                                Reset filters
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div id="vista-productos" class="w-full flex flex-wrap gap-20">
                                            <?php foreach ($data_productos['result'] as $producto): 
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
                                                                    <img src="<?php echo $imagen; ?>" alt="<?php echo $producto['nombre_en']; ?>" class="w-full h-full object-cover">
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card-content">
                                                        <?php if (!empty($producto['marca']['nombre'])): ?>
                                                            <div class="mb-3">
                                                                <span class="product-marca text-12 font-bold text-secondary"><?php echo $producto['marca']['nombre']; ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <a href="producto-en.php?id=<?php echo $producto['id']; ?>">
                                                            <h3 class="product-nombre text-14 font-bold mb-3 line-clamp-2 flex-grow"><?php echo $producto['nombre_en']; ?></h3>
                                                        </a>
                                                        <?php if (!empty($producto['sku'])): ?>
                                                            <div class="mb-5">
                                                                <span class="text-12 text-gray-600">SKU: </span>
                                                                <span class="product-sku text-12 font-medium"><?php echo $producto['sku']; ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="relative w-full" style="margin-top: auto; padding: 0 20px;">
                                                            <a href="producto-en.php?id=<?php echo $producto['id']; ?>" class="btn btn-naked btn-sm font-medium whitespace-nowrap text-15 btn-icon-right btn-hover-swp btn-has-label" style="color: #2b2b2b;">
                                                                <span class="btn-txt" data-text="View Details">View Details</span>
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
                            </div>
                        </div>
                    </section>
                </div>
            </main>
            <?php include ('./footer-en.php'); ?>
            <?php include ('./asset.php'); ?>
        </div>

        <script>
            // Función para mostrar/ocultar filtros en móvil
            function toggleFiltros() {
                const filtrosContainer = document.querySelector('.filtros-container');
                const filtrosOverlay = document.querySelector('.filtros-overlay');
                
                filtrosContainer.classList.toggle('active');
                filtrosOverlay.classList.toggle('active');
            }

            function actualizarFiltros() {
                // Obtener todas las marcas y categorías seleccionadas
                const marcasSeleccionadas = Array.from(document.querySelectorAll('input[name="marca[]"]:checked')).map(cb => cb.value);
                const categoriasSeleccionadas = Array.from(document.querySelectorAll('input[name="categoria[]"]:checked')).map(cb => cb.value);
                const ordenamiento = document.getElementById('ordenamiento').value;
                const urlParams = new URLSearchParams(window.location.search);
                
                let url = 'productos-en.php?';
                
                // Agregar marcas seleccionadas como cadena separada por comas
                if (marcasSeleccionadas.length > 0) {
                    url += `marca=${marcasSeleccionadas.join(',')}&`;
                }
                
                // Agregar categorías seleccionadas como cadena separada por comas
                if (categoriasSeleccionadas.length > 0) {
                    url += `categoria=${categoriasSeleccionadas.join(',')}&`;
                }
                
                // Agregar ordenamiento
                if (ordenamiento) url += `orden=${ordenamiento}`;
                
                // Eliminar el último & si existe
                url = url.replace(/&$/, '');
                
                window.location.href = url;
            }

            function reiniciarFiltros() {
                // Desmarcar checkboxes
                document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
                
                // Resetear ordenamiento
                document.getElementById('ordenamiento').value = '01';
                window.location.href = 'productos-en.php';
            }

            function cambiarVista(tipo) {
                const contenedor = document.getElementById('vista-productos');
                const btnGrid4 = document.getElementById('btn-grid-4');
                const btnGrid2 = document.getElementById('btn-grid-2');
                const productos = document.querySelectorAll('.producto-card');
                
                if (tipo === 'grid-4') {
                    contenedor.className = 'vista-grid-4';
                    btnGrid4.classList.add('active');
                    btnGrid2.classList.remove('active');
                    
                    productos.forEach(producto => {
                        producto.className = 'producto-card bg-white rounded-10 shadow-md overflow-hidden hover:shadow-lg transition-shadow';
                    });
                } else if (tipo === 'grid-2') {
                    contenedor.className = 'vista-grid-2';
                    btnGrid2.classList.add('active');
                    btnGrid4.classList.remove('active');
                    
                    productos.forEach(producto => {
                        producto.className = 'producto-card bg-white rounded-10 shadow-md overflow-hidden hover:shadow-lg transition-shadow flex';
                    });
                }
            }

            function cambiarOrdenamiento() {
                actualizarFiltros();
            }

            // Cargar el ordenamiento seleccionado desde la URL
            document.addEventListener('DOMContentLoaded', function() {
                const urlParams = new URLSearchParams(window.location.search);
                const ordenamiento = urlParams.get('orden');
                if (ordenamiento) {
                    document.getElementById('ordenamiento').value = ordenamiento;
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Verificar si hay parámetros en la URL
                const urlParams = new URLSearchParams(window.location.search);
                const hasFilters = urlParams.has('marca') || urlParams.has('categoria') || urlParams.has('orden');
                
                // Si no hay parámetros (acceso directo a productos), reiniciar estados
                if (!hasFilters) {
                    localStorage.removeItem('colapseMarcasState');
                    localStorage.removeItem('colapseCategoriesState');
                } else {
                    // Recuperar estados guardados solo si hay filtros activos
                    const colapseMarcasState = localStorage.getItem('colapseMarcasState') === 'true';
                    const colapseCategoriesState = localStorage.getItem('colapseCategoriesState') === 'true';

                    // Aplicar estados guardados
                    if (colapseMarcasState) {
                        document.querySelector('#colapseMarcas').classList.add('show');
                        document.querySelector('[href="#colapseMarcas"]').classList.remove('collapsed');
                        document.querySelector('[href="#colapseMarcas"]').setAttribute('aria-expanded', 'true');
                    }
                    if (colapseCategoriesState) {
                        document.querySelector('#colapseCategories').classList.add('show');
                        document.querySelector('[href="#colapseCategories"]').classList.remove('collapsed');
                        document.querySelector('[href="#colapseCategories"]').setAttribute('aria-expanded', 'true');
                    }
                }

                // Escuchar cambios en los acordeones
                document.querySelector('#colapseMarcas').addEventListener('shown.bs.collapse', function() {
                    localStorage.setItem('colapseMarcasState', 'true');
                });
                document.querySelector('#colapseMarcas').addEventListener('hidden.bs.collapse', function() {
                    localStorage.setItem('colapseMarcasState', 'false');
                });
                document.querySelector('#colapseCategories').addEventListener('shown.bs.collapse', function() {
                    localStorage.setItem('colapseCategoriesState', 'true');
                });
                document.querySelector('#colapseCategories').addEventListener('hidden.bs.collapse', function() {
                    localStorage.setItem('colapseCategoriesState', 'false');
                });
            });

            document.getElementById('searchInput').addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase().trim();
                const products = document.querySelectorAll('.product-card');
                let hasVisibleProducts = false;

                products.forEach(product => {
                    const marca = product.querySelector('.text-12.font-bold.text-secondary')?.textContent.toLowerCase() || '';
                    const nombre = product.querySelector('.text-14.font-bold.mb-3')?.textContent.toLowerCase() || '';
                    const sku = product.querySelector('.text-12.font-medium')?.textContent.toLowerCase() || '';

                    if (searchTerm === '' || 
                        marca.includes(searchTerm) || 
                        nombre.includes(searchTerm) || 
                        sku.includes(searchTerm)) {
                        product.style.display = '';
                        hasVisibleProducts = true;
                    } else {
                        product.style.display = 'none';
                    }
                });

                // Mostrar mensaje si no hay resultados
                const noResultsMessage = document.querySelector('.no-results-message') || createNoResultsMessage();
                if (!hasVisibleProducts && searchTerm !== '') {
                    noResultsMessage.style.display = 'block';
                } else {
                    noResultsMessage.style.display = 'none';
                }
            });

            // Función para crear el mensaje de no resultados
            function createNoResultsMessage() {
                const message = document.createElement('div');
                message.className = 'no-results-message w-full text-center py-50';
                message.innerHTML = `
                    <i class="fas fa-search fa-3x text-gray-400 mb-20"></i>
                    <h3 class="text-24 font-bold mb-10">No products found that match the selected filters</h3>
                    <p class="text-gray-600 mb-20">Try with other filters</p>
                `;
                document.querySelector('#vista-productos').after(message);
                return message;
            }

            // Modificar reiniciarFiltros para incluir la limpieza del campo de búsqueda
            const originalReiniciarFiltros = window.reiniciarFiltros;
            window.reiniciarFiltros = function() {
                document.getElementById('searchInput').value = '';
                const event = new Event('input');
                document.getElementById('searchInput').dispatchEvent(event);
                if (typeof originalReiniciarFiltros === 'function') {
                    originalReiniciarFiltros();
                }
            };
        </script>

        <style>
            .search-box {
                display: inline-block;
                vertical-align: middle;
            }
            .search-box input {
                transition: all 0.3s ease;
            }
            .search-box input:focus {
                border-color: #007bff;
                box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
                outline: none;
            }
            .no-results-message {
                display: none;
            }
        </style>
    </body>
</html> 