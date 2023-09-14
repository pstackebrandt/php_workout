<?php
declare(strict_types=1);

namespace php_workout\utility;

require_once '../include/config.inc.php';

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
        return $value !== NULL && $value !== '';
    }

    /** Returns true if the value is an integer or can be casted to an integer
     * @param int|string $value
     * @return bool
     */
    public static function isIntOrCastable(int|string $value): bool
    {
        if (filter_var($value, FILTER_VALIDATE_INT) === true) {
            return true;
        } else {
            // Fehler (nicht erlaubter Datentyp)
            if (DEBUG) echo "<p class='debug class err'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): Der Wert muss inhaltlich einem int entsprechen! (<i>" . basename(__FILE__) . "</i>)</p>\n";
            return false;
        }
    }
}