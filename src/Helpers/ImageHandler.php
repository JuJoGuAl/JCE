<?php
namespace App\Helpers;

use Exception;
use Intervention\Image\ImageManagerStatic as Image;

class ImageHandler
{
    private array $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    private int $maxFileSize = 5 * 1024 * 1024; // 5 MB

    public function upload(array $file, string $entityName, int $entityId, string $uploadDir, array $resizeDimensions): string
    {
        $this->validateFile($file);

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $uniqueName = $this->generateUniqueName($entityName, $entityId, $extension);
        $destination = rtrim($uploadDir, '/') . '/' . $uniqueName;

        // Procesar y guardar la imagen usando Intervention Image
        $this->processAndSaveImage($file['tmp_name'], $destination, $resizeDimensions);

        return $uniqueName;
    }

    public function delete(string $fileName, string $uploadDir): void
    {
        $filePath = rtrim($uploadDir, '/') . '/' . $fileName;

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    private function validateFile(array $file): void
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Error: " . $file['error']);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($extension), $this->allowedExtensions)) {
            throw new Exception("Extension invalida: $extension");
        }

        if ($file['size'] > $this->maxFileSize) {
            throw new Exception("El archivo excede el tamaño máximo permitido.");
        }
    }

    private function generateUniqueName(string $entityName, int $entityId, string $extension): string
    {
        $hash = md5(uniqid((string) $entityId, true));
        return strtolower($entityName) . "_{$entityId}_{$hash}.$extension";
    }

    private function processAndSaveImage(string $sourcePath, string $destination, array $resizeDimensions): void
    {
        $image = Image::make($sourcePath);

        // Redimensionar la imagen
        $image->fit($resizeDimensions['width'], $resizeDimensions['height']);

        // Guardar la imagen redimensionada
        $image->save($destination);
    }
}