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

   printWithTag("House checker", "h2");

   printWithTag("This is an house. Isn't it?");

   printWithTag($house . ": "  . getYesOrNo(isHouse($house)));
   printWithTag($garden . ": " . getYesOrNo(isHouse($garden)));
   printWithTag($isle . ": " . getYesOrNo(isHouse($isle)));


   printWithTag("Number checker", "h2");
   /**
    * Returns a formatted string with the result of the comparison.
    * @param int $value The value to compare.
    * @return string The result of the comparison.
    */
   function compareToBorders(int $value,  $lowerBorder = 20, $upperBorder = 30): string
   {
      if ($value < $lowerBorder) {
         return "The value passed is less than $lowerBorder!";
      } elseif ($value > $upperBorder) {
         return "The value passed is greater than $upperBorder!";
      } else {
         return "The value passed is between $lowerBorder and $upperBorder or equal to one of them!";
      }
   }

   printWithTag("Try to find numbers that are within the borders!");

   $val_13 = -13;
   $val_31 = 31;
   $val_23 = 23;
   $val_20 = 20;
   $val_40 = 40;

   printWithTag("I will try!");

   printWithTag('' . $val_13 . ": "  . compareToBorders($val_13));
   printWithTag('' . $val_31 . ": "  . compareToBorders($val_31));
   printWithTag('' . $val_23 . ": "  . compareToBorders($val_23));
   printWithTag('' . $val_20 . ": "  . compareToBorders($val_20));
   printWithTag('' . $val_40 . ": "  . compareToBorders($val_40, upperBorder: $val_40));

   ?>

</body>

</html>