<?php
namespace App\Helpers;
class StringHelper
{
    /**
     * Convert a string to a slug format.
     *
     * @param string $string
     * @return string
     */
    public static function slugify($string)
    {
        // Convert to lowercase, replace spaces with hyphens, and remove special characters
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', trim($string)));
    }

    /**
     * Convert a string to title case.
     *
     * @param string $string
     * @return string
     */
    public static function titleCase($string)
    {
        return ucwords(strtolower($string));
    }

    /**
     * Truncate a string to a specified length.
     *
     * @param string $string
     * @param int $length
     * @return string
     */
    public static function truncate($string, $length = 100)
    {
        return mb_strimwidth($string, 0, $length, '...');
    }

    /**
     * Convert a string to camel case.
     *
     * @param string $string
     * @return string
     */
    public static function camelCase($string)
    {
        $string = str_replace(' ', '', ucwords($string));
        return lcfirst($string);
    }
    /**
     * Convert a string to snake case.
     *
     * @param string $string
     * @return string
     */
    public static function snakeCase($string)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9]+/', '_', trim($string)));
    }

    /**
     * Convert a string to kebab case.
     *
     * @param string $string
     * @return string
     */
    public static function kebabCase($string)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9]+/', '-', trim($string)));
    }

    /**
     * Convert a string to Pascal case.
     *
     * @param string $string
     * @return string
     */
    public static function pascalCase($string)
    {
        return str_replace(' ', '', ucwords($string));
    }
    /**
     * Convert a string to upper case.
     *
     * @param string $string
     * @return string
     */
    public static function upperCase($string)
    {
        return strtoupper($string);
    }
    /**
     * Convert a string to lower case.
     *
     * @param string $string
     * @return string
     */
    public static function lowerCase($string)
    {
        return strtolower($string);
    }
    /**
     * Convert a string to sentence case.
     *
     * @param string $string
     * @return string
     */
    public static function sentenceCase($string)
    {
        $string = strtolower($string);
        return ucfirst($string);
    }
    /**
     * Convert a string to a URL-friendly format.
     *
     * @param string $string
     * @return string
     */
    public static function urlFriendly($string)
    {
        return StringHelper::slugify($string);
    }
    
}