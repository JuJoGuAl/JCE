<?php
namespace App\Helpers;

use Exception;
use Intervention\Image\ImageManagerStatic as Image;

class ImageHandler
{
    private array $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    private int $maxFileSize = 5 * 1024 * 1024; // 5 MB

    /**
     * Sube y procesa una imagen.
     *
     * @param array $file Archivo subido.
     * @param string $salt Clave o string base para generar el hash único.
     * @param string $relativePath Ruta relativa donde guardar la imagen.
     * @param array|null $resizeDimensions Dimensiones para redimensionar (opcional).
     * @return string Nombre único del archivo procesado.
     * @throws Exception Si ocurre un error durante el procesamiento.
     */
    public function upload(
        array $file,
        string $salt,
        string $relativePath,
        ?array $resizeDimensions = null
    ): string {
        $this->validateFile($file);

        // Obtener la ruta absoluta basada en la raíz del proyecto
        $absolutePath = $this->getAbsolutePath($relativePath);

        // Asegurarse de que el directorio exista
        if (!is_dir($absolutePath)) {
            if (!mkdir($absolutePath, 0777, true)) {
                throw new Exception("No se pudo crear el directorio: $absolutePath");
            }
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Generar un nombre único usando el hash basado en el salt
        $uniqueName = $this->generateUniqueName($salt, $extension);
        $destination = rtrim($absolutePath, '/') . '/' . $uniqueName;

        if ($resizeDimensions) {
            // Redimensionar y guardar la imagen
            $this->processAndSaveImage($file['tmp_name'], $destination, $resizeDimensions);
        } else {
            // Guardar la imagen sin redimensionar
            if (!move_uploaded_file($file['tmp_name'], $destination)) {
                throw new Exception("No se pudo mover el archivo al destino: $destination");
            }
        }

        return $uniqueName;
    }

    /**
     * Valida el archivo subido.
     *
     * @param array $file Archivo subido.
     * @throws Exception Si el archivo no es válido.
     */
    private function validateFile(array $file): void
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Error: " . $file['error']);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($extension), $this->allowedExtensions)) {
            throw new Exception("Extensión inválida: $extension");
        }

        if ($file['size'] > $this->maxFileSize) {
            throw new Exception("El archivo excede el tamaño máximo permitido.");
        }
    }

    /**
     * Genera un nombre único para el archivo basado en un salt.
     *
     * @param string $salt Clave o string base para generar el hash único.
     * @param string $extension Extensión del archivo.
     * @return string Nombre único generado.
     */
    private function generateUniqueName(string $salt, string $extension): string
    {
        $hash = hash('sha256', uniqid($salt, true));
        return "{$hash}.{$extension}";
    }

    /**
     * Convierte una ruta relativa en una ruta absoluta basada en la raíz del proyecto.
     *
     * @param string $relativePath Ruta relativa.
     * @return string Ruta absoluta.
     */
    private function getAbsolutePath(string $relativePath): string
    {
        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        return rtrim($rootPath, '/') . '/' . ltrim($relativePath, '/');
    }

    /**
     * Redimensiona y guarda una imagen.
     *
     * @param string $sourcePath Ruta del archivo original.
     * @param string $destination Ruta donde se guardará la imagen redimensionada.
     * @param array $resizeDimensions Dimensiones para redimensionar ['width' => int, 'height' => int].
     */
    private function processAndSaveImage(string $sourcePath, string $destination, array $resizeDimensions): void
    {
        $image = Image::make($sourcePath);

        // Redimensionar la imagen
        $image->fit($resizeDimensions['width'], $resizeDimensions['height']);

        // Guardar la imagen redimensionada
        $image->save($destination);
    }
}