<?php
namespace App\Helper;

class InputHelper
{
    /**
     * Remove all HTML tags and decode any entities (e.g. &lt;script&gt;).
     * Also remove leftover angle brackets just in case.
     */
    public static function sanitizeString($input)
    {
        $decoded = html_entity_decode($input, ENT_QUOTES, 'UTF-8');
        $stripped = strip_tags($decoded);
        $clean = preg_replace('/[<>]/', '', $stripped);
        return trim($clean);
    }

    public static function sanitizeSringForCMS($input)
    {
        // If the input contains an <img> tag, we need to extract the src attribute
        if (strpos($input, '<img') !== false) {
        // Extract the src attribute from <img> tags
        preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $input, $matches);

        // If src is found, return the first src value (or modify to return all src if needed)
        if (isset($matches[1]) && count($matches[1]) > 0) {
            return $matches[1][0];  // Return the first 'src' value
        }
    }

    // If no <img> tag is found, sanitize the string
    $decoded = html_entity_decode($input, ENT_QUOTES, 'UTF-8');
    $stripped = strip_tags($decoded);  // Remove HTML tags
    $clean = preg_replace('/[<>]/', '', $stripped);  // Remove any < or > characters
    return trim($clean);  // Return the sanitized string
    }


    /**
     * Sanitize an email by removing illegal characters.
     */
    public static function sanitizeEmail($input)
    {
        $decoded = html_entity_decode($input, ENT_QUOTES, 'UTF-8');
        $clean   = strip_tags($decoded);
        $clean   = filter_var($clean, FILTER_SANITIZE_EMAIL);
        return trim($clean);
    }
}
