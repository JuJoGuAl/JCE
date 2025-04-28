<?php
namespace App\Helpers;

use App\Config\Settings;
use Exception;

class DocumentHandler {
    private array $allowedTypes;
    private int $maxSize;
    private string $uploadPath;
    private array $errors = [];

    // Propiedades configurables
    public ?array $file = null;
    public ?string $relativePath = null;
    public ?string $uniqueName = null;
    public ?string $fileToDelete = null;

    public function __construct() {
        $settings = Settings::getInstance();
        $config = $settings->get('uploads');
        
        $this->allowedTypes = $config['allowed_types']['document'];
        $this->maxSize = $config['max_size']['document'];
        $this->uploadPath = dirname(dirname(__DIR__)) . '/documentos/productos/';
        
        // Asegurarse de que el directorio existe
        if (!file_exists($this->uploadPath)) {
            mkdir($this->uploadPath, 0777, true);
        }
    }

    /**
     * Sube y procesa un documento, utilizando las propiedades configuradas.
     * @return string Nombre único del archivo procesado.
     * @throws Exception Si ocurre un error durante el procesamiento o faltan propiedades obligatorias.
     */
    public function upload(): string
    {
        if (!$this->file || !$this->relativePath || !$this->uniqueName) {
            throw new Exception("Faltan propiedades obligatorias: 'file', 'relativePath' o 'uniqueName'.");
        }

        if ($this->fileToDelete) {
            $this->deleteExistingFile($this->fileToDelete);
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

        $originalExtension = pathinfo($this->file['name'], PATHINFO_EXTENSION);
        $file = $this->uniqueName . '.' . $originalExtension;
        $destination = rtrim($absolutePath, '/') . '/' . $file;

        // Mover el archivo
        if (!move_uploaded_file($this->file['tmp_name'], $destination)) {
            throw new Exception("No se pudo mover el archivo al destino: $destination");
        }

        return $file;
    }

    /**
     * Valida el archivo subido.
     * @param array $file Archivo subido.
     * @throws Exception Si el archivo no es válido.
     */
    private function validateFile(array $file): void
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception($this->getUploadErrorMessage($file['error']));
        }

        if (!in_array($file['type'], $this->allowedTypes)) {
            $tipos = implode(', ', $this->allowedTypes);
            throw new Exception("El archivo: <b>{$file['name']}</b> posee un tipo inválido, tipo actual: <b>{$file['type']}</b>, permitidos: <b>{$tipos}</b>");
        }

        if ($file['size'] > $this->maxSize) {
            $size = round($file['size'] / 1024 / 1024, 2);
            $size_max = round($this->maxSize / 1024 / 1024, 2);
            throw new Exception("El archivo: <b>{$file['name']}</b> excede el tamaño máximo permitido, tamaño actual: <b>{$size}MB</b>, permitido: <b>{$size_max}MB</b>");
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
        $rootPath = dirname(dirname(__DIR__));
        return rtrim($rootPath, '/') . '/' . ltrim($relativePath, '/');
    }

    /**
     * Elimina un archivo existente.
     * @param string $filePath Ruta del archivo a eliminar.
     * @throws Exception Si no se puede eliminar el archivo.
     */
    private function deleteExistingFile(string $filePath): void
    {
        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        $rootPath = dirname(dirname(__DIR__));
        $file = rtrim($rootPath, '/') . '/' . ltrim($filePath, '/');

        if (file_exists($file)) {
            if (!unlink($file)) {
                throw new Exception("No se pudo eliminar el archivo existente: $filePath");
            }
        }
    }

    /**
     * Obtiene los errores generados durante el procesamiento
     * @return array Lista de errores
     */
    public function getErrors(): array {
        return $this->errors;
    }

    /**
     * Obtiene el mensaje de error según el código de error de subida
     * @param int $errorCode Código de error de PHP
     * @return string Mensaje de error
     */
    private function getUploadErrorMessage(int $errorCode): string {
        return match($errorCode) {
            UPLOAD_ERR_INI_SIZE => 'El archivo excede el tamaño máximo permitido por el servidor',
            UPLOAD_ERR_FORM_SIZE => 'El archivo excede el tamaño máximo permitido por el formulario',
            UPLOAD_ERR_PARTIAL => 'El archivo fue subido parcialmente',
            UPLOAD_ERR_NO_FILE => 'No se subió ningún archivo',
            UPLOAD_ERR_NO_TMP_DIR => 'No existe el directorio temporal',
            UPLOAD_ERR_CANT_WRITE => 'No se pudo escribir el archivo en el disco',
            UPLOAD_ERR_EXTENSION => 'La subida fue detenida por una extensión de PHP',
            default => 'Error desconocido al subir el archivo'
        };
    }
} 