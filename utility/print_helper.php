<?php

declare(strict_types=1);

// file name: print_helper.php
// path: utility\print_helper.php

/**
 * Prints a tag with the given string.
 * @param string $formattedText The text to print.
 */
function printTagWithString(string $formattedText = '')
{
   echo "<p>" . $formattedText . "</p>\n";
}

/**
 * Returns 'Yes' if the value is true, 'No' otherwise.
*/
function getYesOrNo(bool $value): string
{
   if ($value) {
      return 'Yes';
   }

   return 'No';
}
