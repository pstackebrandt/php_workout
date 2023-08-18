<?php

declare(strict_types=1);

require_once '../utility/print_helper.php';
?>
<!doctype html>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>workout</title>
</head>

<body>
   <h1>Use custom functions</h1>

   <?php

   /**
    * Returns true if the text is 'house'.
    * Don't underestimate the value of this function. ;-) 
    * @param string $text The text to check.
    * @return bool  True if the text is 'house'.
    */
   function isHouse(string $text): bool
   {
      if ($text === 'house') {
         return true;
      }

      return false;
   }

   $house = 'house';
   $garden = 'garden';
   $isle = 'isle_with_house_and_garden';

   $question = "This is an house. Isn't it?";

   printTagWithString($question);

   printTagWithString($house . ": "  . getYesOrNo(isHouse($house)));
   printTagWithString($garden . ": " . getYesOrNo(isHouse($garden)));
   printTagWithString($isle . ": " . getYesOrNo(isHouse($isle)));

   ?>

</body>

</html>