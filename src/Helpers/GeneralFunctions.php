<?php
namespace App\Helpers;

/**
 * Formatea una fecha en un formato específico.
 */
function formatDate(string $date, string $format = 'Y-m-d'): string
{
    $dateTime = new \DateTime($date);
    return $dateTime->format($format);
}

/**
 * Escapa y sanitiza una entrada de texto.
 */
function sanitizeInput(string $input): string
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Genera un timestamp único para un archivo para evitar problemas de caché.
 */
function addTimestamp(string $filePath): string
{
    if (file_exists($filePath)) {
        $filemtime = filemtime($filePath);
        return $filePath . '?' . $filemtime;
    }
    return $filePath;
}
?>