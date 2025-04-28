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
        $ordenamiento = 'nombre_es ASC';
        break;
    case '02':
        $ordenamiento = 'nombre_es DESC';
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
                    <!-- Sección de Productos -->
                    <section class="lqd-section py-100" style="padding-top: 150px;">
                        <div class="container">
                            <div class="row">
                                <!-- Overlay de Filtros -->
                                <div class="filtros-overlay" onclick="toggleFiltros()"></div>
                                
                                <!-- Filtros -->
                                <div class="col-12 col-lg-3 mb-50 d-none d-lg-block">
                                    <div class="filtros-container">
                                        <h3><?php echo $traduccion['filtros']; ?></h3>
                                        <!-- Filtro de Marcas -->
                                        <div class="filtro-grupo">
                                            <h4><?php echo $traduccion['marcas']; ?></h4>
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

                                        <!-- Filtro de Categorías -->
                                        <div class="filtro-grupo">
                                            <h4><?php echo $traduccion['categorias']; ?></h4>
                                            <div class="filtro-opciones">
                                                <?php 
                                                $categorias_seleccionadas = isset($_GET['categoria']) ? explode(',', $_GET['categoria']) : [];
                                                foreach ($data_categorias['result'] as $categoria): 
                                                ?>
                                                    <div class="filtro-opcion">
                                                        <input type="checkbox" name="categoria[]" value="<?php echo $categoria['id']; ?>" <?php echo in_array($categoria['id'], $categorias_seleccionadas) ? 'checked' : ''; ?> onchange="actualizarFiltros()" id="categoria_<?php echo $categoria['id']; ?>">
                                                        <label for="categoria_<?php echo $categoria['id']; ?>">
                                                            <?php echo $categoria['nombre_'.$lang]; ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Lista de Productos -->
                                <div class="col-12 col-lg-9">
                                    <!-- Controles de Vista y Ordenamiento -->
                                    <div class="flex justify-between mb-30">
                                        <div class="vista-controls">
                                            <a href="javascript:void(0)" class="filtros-toggle" onclick="toggleFiltros()" title="Filtros">
                                                <i class="fas fa-filter"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="cambiarVista('grid-4'); return false;" class="active" id="btn-grid-4" title="Vista de 4 columnas">
                                                <i class="fas fa-th-large"></i>
                                            </a>
                                            <a href="javascript:void(0)" onclick="cambiarVista('grid-2'); return false;" id="btn-grid-2" title="Vista de 2 columnas">
                                                <i class="fas fa-th"></i>
                                            </a>
                                            <div class="ordenamiento-controls">
                                                <select id="ordenamiento" onchange="cambiarOrdenamiento()">
                                                    <option value="01"><?php echo $traduccion['order_name']; ?> (A-Z)</option>
                                                    <option value="02"><?php echo $traduccion['order_name']; ?> (Z-A)</option>
                                                    <option value="03"><?php echo $traduccion['order_marca']; ?> (A-Z)</option>
                                                    <option value="04"><?php echo $traduccion['order_marca']; ?> (Z-A)</option>
                                                </select>
                                                <button class="btn-reset" onclick="reiniciarFiltros()" title="Reiniciar filtros">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Vista de Productos -->
                                    <?php if (empty($data_productos['result'])): ?>
                                        <div class="w-full text-center py-50">
                                            <i class="fas fa-search fa-3x text-gray-400 mb-20"></i>
                                            <h3 class="text-24 font-bold mb-10"><?php echo $traduccion['no_products_found']; ?></h3>
                                            <p class="text-gray-600 mb-20"><?php echo $traduccion['try_other_filters']; ?></p>
                                            <a href="javascript:void(0)" onclick="reiniciarFiltros()" class="inline-flex items-center px-20 py-10 bg-secondary text-primary font-bold rounded-5 hover:bg-secondary/90 transition-colors">
                                                <i class="fas fa-sync-alt mr-10"></i>
                                                <?php echo $traduccion['reset_filters']; ?>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div id="vista-productos" class="vista-grid-4">
                                            <?php foreach ($data_productos['result'] as $producto): 
                                                // Obtener la primera imagen del directorio
                                                $imagen_path = './images/productos/' . $producto['id'] . '/';
                                                $imagen_default = './images/productos/default.jpg';
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
                                                <div class="producto-card bg-white rounded-10 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                                    <div class="imagen-producto">
                                                        <img src="<?php echo $imagen; ?>" alt="<?php echo $producto['nombre_'.$lang]; ?>">
                                                    </div>
                                                    <div class="contenido-producto min-h-[180px] flex flex-col">
                                                        <?php if (!empty($producto['marca']['nombre'])): ?>
                                                            <div class="mb-3">
                                                                <span class="text-12 font-bold text-secondary"><?php echo $producto['marca']['nombre']; ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <h3 class="text-14 font-bold mb-3 line-clamp-2 flex-grow"><?php echo $producto['nombre_'.$lang]; ?></h3>
                                                        <?php if (!empty($producto['sku'])): ?>
                                                            <div class="mb-5">
                                                                <span class="text-12 text-gray-600">SKU: </span>
                                                                <span class="text-12 font-medium"><?php echo $producto['sku']; ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                        <a href="producto.php?id=<?php echo $producto['id']; ?>" class="btn btn-solid btn-xs text-primary font-bold bg-secondary w-full text-center mt-auto">
                                                            <?php echo $traduccion['product_btn_details']; ?>
                                                        </a>
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
            <?php include ('./footer.php'); ?>
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
                const lang = urlParams.get('lang');
                
                let url = 'productos.php?';
                if (lang) url += `lang=${lang}&`;
                
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
                
                // Obtener el parámetro lang actual
                const urlParams = new URLSearchParams(window.location.search);
                const lang = urlParams.get('lang');
                
                // Redirigir a la página sin filtros pero manteniendo el lang
                window.location.href = lang ? `productos.php?lang=${lang}` : 'productos.php';
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
        </script>
    </body>
</html> 