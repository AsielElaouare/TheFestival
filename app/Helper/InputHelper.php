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
        // 1. Decode any HTML entities (&lt;script&gt; => <script>)
        // Using ENT_QUOTES only, and specifying UTF-8 if needed
        $decoded = html_entity_decode($input, ENT_QUOTES, 'UTF-8');

        // 2. Remove valid HTML tags (<script>, <b>, etc.)
        $stripped = strip_tags($decoded);

        // 3. Remove any leftover angle brackets if the user typed something like "< script>"
        $clean = preg_replace('/[<>]/', '', $stripped);

        // 4. Trim whitespace
        return trim($clean);
    }

    /**
     * Sanitize an email by removing illegal characters.
     * We'll still do further validation with FILTER_VALIDATE_EMAIL if needed.
     */
    public static function sanitizeEmail($input)
    {
        $decoded = html_entity_decode($input, ENT_QUOTES, 'UTF-8');
        $clean   = strip_tags($decoded);
        $clean   = filter_var($clean, FILTER_SANITIZE_EMAIL);
        return trim($clean);
    }
}
