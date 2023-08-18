<?php

declare(strict_types=1);

// file name: print_helper.php
// path: utility\print_helper.php

/**
 * Returns the tag name. Removes the angle brackets of a tag.
 * Not intended to be used with attributes and endtags.
 * example: <p> -> p
 * 
 * @param string $tag The tag string to clean.
 * @return string The cleaned tag string.
 */
function getTagName(string $tag): string
{
   return trim(strtolower(strip_tags(trim($tag))));
}

/**
 * Prints a tag that surrounds the given text.
 * example: lorem ipsum -> <p>lorem ipsum</p>
 * @param string $formattedText The text to print.
 * @param string $tagNameToUse The name of the tag to clad the text.
 */
function printWithTag(string $formattedText = '', string $tagNameToUse = 'p')
{
   $tagName = getTagName($tagNameToUse);

   if ($tagName === '') {
      $tagName = 'p';
   }

   echo "<$tagNameToUse>" . $formattedText . "</$tagNameToUse>\n";
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
