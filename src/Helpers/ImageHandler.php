<?php
namespace App\Helpers;

use Exception;
use Intervention\Image\ImageManagerStatic as Image;

class ImageHandler
{
    private array $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    private int $maxFileSize = 5 * 1024 * 1024; // 5 MB

    // Propiedades configurables
    public ?array $file = null;
    public ?string $relativePath = null;
    public ?string $uniqueName = null;
    public ?array $resizeDimensions = null;

    /**
     * Sube y procesa una imagen, utilizando las propiedades configuradas.
     * @return string Nombre único del archivo procesado.
     * @throws Exception Si ocurre un error durante el procesamiento o faltan propiedades obligatorias.
     */
    public function upload(): string
    {
        if (!$this->file || !$this->relativePath || !$this->uniqueName) {
            throw new Exception("Faltan propiedades obligatorias: 'file', 'relativePath' o 'uniqueName'.");
        }

        $this->validateFile($this->file);

        // Obtener la ruta absoluta basada en la raíz del proyecto
        $absolutePath = $this->getAbsolutePath($this->relativePath);

        // Asegurarse de que el directorio exista
        if (!is_dir($absolutePath)) {
            if (!mkdir($absolutePath, 0777, true)) {
                throw new Exception("No se pudo crear el directorio: $absolutePath");
            }
        }

        $destination = rtrim($absolutePath, '/') . '/' . $this->uniqueName;

        if ($this->resizeDimensions) {
            // Redimensionar y guardar la imagen
            $this->processAndSaveImage($this->file['tmp_name'], $destination, $this->resizeDimensions);
        } else {
            // Guardar la imagen sin redimensionar
            if (!move_uploaded_file($this->file['tmp_name'], $destination)) {
                throw new Exception("No se pudo mover el archivo al destino: $destination");
            }
        }

        return $this->uniqueName;
    }

    /**
     * Valida el archivo subido.
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
     * Convierte una ruta relativa en una ruta absoluta basada en la raíz del proyecto.
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

    /**
     * Genera un nombre único para el archivo basado en un salt.
     * @param string $salt Clave o string base para generar el hash único.
     * @param string $extension Extensión del archivo.
     * @return string Nombre único generado.
     */
    private function generateUniqueName(string $salt, string $extension): string
    {
        $hash = hash('sha256', uniqid($salt, true));
        return "{$hash}.{$extension}";
    }
}