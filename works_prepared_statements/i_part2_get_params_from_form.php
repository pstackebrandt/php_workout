<?php

declare(strict_types=1);

require_once '../utility/print_helper.php';

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

// Resources
$mediaTypes = [
   'hardcover' => 'Hardcover',
   'paperback' => 'Paperback',
   'folio' => 'Foliant',
   'audiobook' => 'Hörbuch'
];

// Variables
$year = null;
$formName = 'worksForm';


// Step 1 FORM: Check whether form has been submitted.
// *****************************************************************************
if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$_POST <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V)   print_r($_POST);
if (DEBUG_V)   echo "</pre>";

if (isset($_POST[$formName]) === true) {
   if (DEBUG)      echo "<p class='debug'>🧻 <b>Line " . __LINE__ . "</b>: Formular '$formName' wurde abgeschickt. <i>(" . basename(__FILE__) . ")</i></p>\n";


   // End form check
}
?>
<!doctype html>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>works</title>

   <link rel="stylesheet" href="./css/main.css">
   <link rel="stylesheet" href="./css/debug.css">
   <link rel="stylesheet" href="./css/project_specific.css">
</head>

<body>
   <h1>Create works page with form</h1>

   <?php

   ?>

   <h2>Werke-Erfassung</h>

      <br>

      <form action="" method="POST">
         <input type="hidden" name="worksForm">
         <br>

         <fieldset>
            <legend>Autor</legend>
            <input type="text" name="author" value="Peter"><br>
         </fieldset>

         <fieldset>
            <legend>Titel</legend>
            <input type="text" name="title" value="Wilde Geschichten"><br>
         </fieldset>

         <fieldset>
            <legend>Preis</legend>
            <input type="text" name="price" value="29.95"><br>
         </fieldset>

         <!-- -------- MEDIATYPE -------- -->
         <fieldset>
            <legend>Medientyp</legend>
            <?php foreach ($mediaTypes as $value => $label) : ?>
               <label class="radio-inline">
                  <input type="radio" class="radio-button-mediatype" name="mediaType" value="<?= $value; ?>">
               </label><?= $label; ?><br>
            <?php endforeach; ?>
         </fieldset>

         <!-- ------------- YEAR -------------- -->
         <fieldset>
            <legend>Erscheinungjahr</legend>

            <select id="year" name="year">
               <?php for ($i = date('Y'); $i >= 1901; $i--) : ?>
                  <?php
                  /* Reselect year if form was submitted and year is equal to $i	*/
                  ?>
                  <option value="<?= $i ?>" <?php if ($year == $i) echo 'selected' ?>><?= $i ?></option>
               <?php endfor ?>
            </select>
         </fieldset>

         <br>
         <input type="submit" value="Werk speichern">

      </form>
</body>

</html>