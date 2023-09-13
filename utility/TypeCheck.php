<?php
declare(strict_types=1);

namespace php_workout\utility;

/*
 * Class TypeCheck helps to check types.
 * @package php_workout\utility
 */
class TypeCheck
{
   /**
     * Returns true if the given value is not NULL and not an empty string
     * @param mixed $value
     * @return bool
     */
    public static function isNotNullOrEmpty(mixed $value): bool
    {
        return  $value !== NULL && $value !== '';
    }
}