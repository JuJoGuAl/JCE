<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Helpers\GeneralFunctions;

if (class_exists('App\Helpers\GeneralFunctions')) {
    echo "La clase Helpers está accesible.";
    echo GeneralFunctions::addTimestamp(__FILE__);
} else {
    echo "La clase GeneralFunctions no está accesible.";
}
?>