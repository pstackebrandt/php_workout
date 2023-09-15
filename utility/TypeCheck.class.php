<?php
declare(strict_types=1);

namespace php_workout\utility;

//require_once '../include/config.inc.php';
// We get this from the using file

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


    /** Returns true if the value is an integer or can be cast to an integer
     * @param int|string $value
     * @return bool
     */
    public static function isIntOrCastable(int|string $value): bool
    {
        if (filter_var($value, FILTER_VALIDATE_INT) !== false) {
            if (DEBUG) echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Value is castable into int. \$value = $value <i>(" . basename(__FILE__) . ")</i></p>\n";
            return true;
        } else {
            // Fehler (nicht erlaubter Datentyp)
            if (DEBUG) echo "<p class='debug class err'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): Value is not castable into int. \$value = $value (<i>" . basename(__FILE__) . "</i>)</p>\n";
            return false;
        }
    }

    /** Returns true if the value is a float or can be cast into a float
     * @param int|string $value
     * @return bool
     */
    public static function isFloatOrCastable(int|string $value): bool
    {
        if (filter_var($value, FILTER_VALIDATE_FLOAT) !== false) {
            if (DEBUG) echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Value is castable into float. \$value = $value <i>(" . basename(__FILE__) . ")</i></p>\n";
            return true;
        } else {
            // Fehler (nicht erlaubter Datentyp)
            if (DEBUG) echo "<p class='debug class err'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): Value is not castable into float. \$value = $value (<i>" . basename(__FILE__) . "</i>)</p>\n";
            return false;
        }
    }

    public static function getIntOrFalse(int|string $value): int|bool
    {
        if (filter_var($value, FILTER_VALIDATE_INT) !== false) {
            if (DEBUG) echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Value is castable into int. \$value = $value <i>(" . basename(__FILE__) . ")</i></p>\n";
            return $value;
        } else {
            // Fehler (nicht erlaubter Datentyp)
            if (DEBUG) echo "<p class='debug class err'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): Value is not castable into int. \$value = $value (<i>" . basename(__FILE__) . "</i>)</p>\n";
            return false;
        }
    }

    public static function getFloatOrFalse(float|int|string $value): float|bool
    {
        if (filter_var($value, FILTER_VALIDATE_FLOAT) !== false) {
            if (DEBUG) echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Value is castable into float. \$value = $value <i>(" . basename(__FILE__) . ")</i></p>\n";
            return $value;
        } else {
            // Fehler (nicht erlaubter Datentyp)
            if (DEBUG) echo "<p class='debug class err'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): Value is not castable into float. \$value = $value (<i>" . basename(__FILE__) . "</i>)</p>\n";
            return false;
        }
    }
}