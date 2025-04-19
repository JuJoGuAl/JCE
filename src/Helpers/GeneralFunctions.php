<?php
namespace App\Helpers;

class Helpers
{
    /**
     * Genera un timestamp único para un archivo para evitar problemas de caché.
     */
    public static function addTimestamp(string $filePath): string
    {
        if (file_exists($filePath)) {
            $filemtime = filemtime($filePath);
            return $filePath . '?' . $filemtime;
        }
        return $filePath;
    }

    /**
     * Formatea una fecha en un formato específico.
     */
    public static function formatDate(string $date, string $format = 'Y-m-d'): string
    {
        $dateTime = new \DateTime($date);
        return $dateTime->format($format);
    }

    /**
     * Escapa y sanitiza una entrada de texto.
     */
    public static function sanitizeInput(string $input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}
?>