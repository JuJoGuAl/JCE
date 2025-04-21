<?php
namespace App\Helpers;

class GeneralFunctions
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

    /**
     * Genera un nombre único basado en un string base y un timestamp.
     * @param string $baseString El string base para generar el nombre único.
     * @param int $size La longitud del hash generado (opcional, por defecto 30).
     * @return string El nombre único generado.
     */
    public static function generateUniqueName(string $baseString, int $size = 30): string {
        $timestamp = microtime(true);
    
        $input = $baseString . $timestamp;
        $hash = hash('sha256', $input);
        
        return substr($hash, 0, $size);
    }
}
