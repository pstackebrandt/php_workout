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
$formName = 'worksForm';
$fileName = basename(__FILE__);
$dbName = 'buechersammlung';

// Form parmeters
$author = null;
$title = null;
$price = null;
$year = null;
$mediaType = null;

// if (DEBUG) {
if (DEBUG && 0) {
   // Set default form content for debugging
   $author = 'Pedro';
   $title = 'Wilde Geschichten';
   $price = 29.95;
}

$firstMediaType = array_key_first($mediaTypes);

if (is_null($mediaType)) {
   $mediaType = $firstMediaType;
}

if (is_null($year)) {
   $year = Date('Y');
}

// Step 1 FORM: Check whether form has been submitted.
// *****************************************************************************
if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$_POST <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V)   print_r($_POST);
if (DEBUG_V)   echo "</pre>";

if (isset($_POST[$formName]) === true) {
   if (DEBUG)      echo "<p class='debug'>🧻 <b>Line " . __LINE__ . "</b>: Formular '$formName' wurde abgeschickt. <i>(" . basename(__FILE__) . ")</i></p>\n";

   // Step 2 FORM: Read, sanitize, debug output of passed form values.
   if (DEBUG) echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Values will be read and sanitized ... <i>(" . basename(__FILE__) . ")</i></p>\n";

   $receivedAuthor    = sanitizeString($_POST['author']);
   $receivedTitle     = sanitizeString($_POST['title']);
   $receivedPrice     = sanitizeString($_POST['price']);
   $receivedMediaType = sanitizeString($_POST['mediaType']);
   $receivedYear      = sanitizeString($_POST['year']);

   /**
    * Returns the form value if it's not null and not an empty string. 
    * Otherwise, it returns the default value.
    *
    * @param mixed $formValue The value received from the form.
    * @param mixed $defaultValue The default value to fall back on.
    * @return mixed
    */
   function getValueOrDefault($formValue, $defaultValue)
   {
      return (!is_null($formValue) && $formValue !== "") ? $formValue : $defaultValue;
   }

   // Nur wenn die empfangenen Daten nicht null und nicht leer sind, überschreiben Sie die Standardwerte
   $author    = getValueOrDefault($receivedAuthor, $author);
   $title     = getValueOrDefault($receivedTitle, $title);
   $price     = getValueOrDefault($receivedPrice, $price);
   $mediaType = getValueOrDefault($receivedMediaType, $mediaType);
   $year      = getValueOrDefault($receivedYear, $year);

   /*
   DEBUG manually:
      1. Is the variable name written correctly?
      2. Does each variable contain the correct value?
   */
   if (DEBUG_V) echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$author: $author <i>(" . basename(__FILE__) . ")</i></p>\n";

   if (DEBUG_V) echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$title: $title <i>(" . basename(__FILE__) . ")</i></p>\n";

   if (DEBUG_V) echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$price: $price <i>(" . basename(__FILE__) . ")</i></p>\n";

   if (DEBUG_V) echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$mediaType: $mediaType <i>(" . basename(__FILE__) . ")</i></p>\n";

   if (DEBUG_V) echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$releaseYear: $year <i>(" . basename(__FILE__) . ")</i></p>\n";

   $errorAuthor     = validateInputString($author, mandatory: true);
   $errorTitle      = validateInputString($title, mandatory: true);
   $errorPrice      = validateInputString($price, mandatory: true);
   $errorMediaType  = validateInputString($mediaType, maxLength: 9, minLength: 5, mandatory: true);
   $errorYear       = validateInputString($year, maxLength: 4, minLength: 4);

   if (
      $errorAuthor     !== NULL or
      $errorTitle      !== NULL or
      $errorPrice      !== NULL or
      $errorMediaType  !== NULL or
      $errorYear       !== NULL
   ) {
      // Fehlerfall
      if (DEBUG) echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Das Formular enthält noch Fehler! <i>(" . basename(__FILE__) . ")</i></p>\n";
   } else {
      // Erfolgsfall
      if (DEBUG)         echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Das Formular ist formal fehlerfrei. <i>(" . basename(__FILE__) . ")</i></p>\n";

      // Schritt 4 FORM: Daten weiterverarbeiten
      if (DEBUG)         echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Daten werden in die Datenbank eingefügt <i>(" . basename(__FILE__) . ")</i></p>\n";

      $successMessage = "Das Medium wird an die Datenbank geschickt:<br>" .
         "$mediaType <i><b>$title von $author</b></i><br>" .
         "für $price €<br>" .
         "von $year <br>";
      echo "<h3>$successMessage</h3>";

      #                   ********** INSERT **********#
      if (DEBUG)         echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: INSERT wird durchgeführt... <i>(" . basename(__FILE__) . ")</i></p>\n";

      #                    **********************************#
      #                    ********** DB OPERATION **********#
      #                    **********************************#

      //           Schritt 1 DB: Establish connection to the database
      $PDO = dbConnect($dbName);

      //             Create SQL statement and placeholder array. (Step 2)

      $sql = "INSERT INTO werke (werkeAuthor, werkeTitle, werkeReleaseYear, werkeMediaType, werkePrice) VALUES (:author, :title, :year, :mediaType, :price)";

      $placeholders = [
         'author' => $author,
         'title' => $title,
         'year' => $year,
         'mediaType' => $mediaType,
         'price' => $price
      ];

      try {
         // Prepare: SQL-Statement vorbereiten
         $PDOStatement = $PDO->prepare($sql);

         // Execute: SQL-Statement ausführen und ggf. Platzhalter füllen
         $PDOStatement->execute($placeholders);
      } catch (PDOException $error) {
         if (DEBUG) echo "<p class='debug db err'><b>Line " . __LINE__ . "</b>: FEHLER: " . $error->GetMessage() . "<i>(" . basename(__FILE__) . ")</i></p>\n";
         $dbError = 'Fehler beim Zugriff auf die Datenbank!';
      }

      // ************** Further processing of the data
      $rowCount = $PDOStatement->rowCount();
      if (DEBUG_V)         echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$rowCount: $rowCount <i>(" . basename(__FILE__) . ")</i></p>\n";

      if ($rowCount === 0) {
         // Fehlerfall
         if (DEBUG) echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: FEHLER beim Speichern des Datensatzes! <i>(" . basename(__FILE__) . ")</i></p>\n";

         $dbError = 'Beim Speichern des neuen Werks ist ein Fehler aufgetreten!';
      } else {
         // Erfolgsfall
         $newProductID = $PDO->lastInsertId();

         if (DEBUG) echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Datensatz erfolgreich unter ID$newProductID gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";

         $dbSuccess = 'Das neue Produkt wurde erfolgreich gespeichert.';
      }

      // *****************    Close db connection  *****************
      if (DEBUG_DB) echo "<p class='debug db'><b>Line " . __LINE__ . "</b>: Closes db connection<i>(" . basename(__FILE__) . ")</i></p>\n";
      unset($PDO);

      // Reset form values
      $author = null;
      $title = null;
      $price = null;
      $year = null;
      $mediaType = null;
   } // End form check
} // End form processing

//*****************************************************************
//************** Process GET calls with action ********************

if (DEBUG)   echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Prüfe auf GET action ... <i>(" . basename(__FILE__) . ")</i></p>\n";

// Step 1 URL: Check if a URL parameter was passed
if (isset($_GET['action']) === true) {
   // GET call with action occured
   if (DEBUG) echo "<p class='debug'>🧻 <b>Line " . __LINE__ . "</b>: URL parameter 'action'  was passed. <i>(" . basename(__FILE__) . ")</i></p>\n";

   // Step 2 URL: Read, sanitize, debug output of passed URL parameter
   // *****************************************************************
   if ($_GET['action'] === 'showAllData') {
      // Show all data from the database
      // *****************************************************************

   } // End process GET showAllData
} // End process GET calls with action
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
            <input type="text" name="author" value="<?= $author ?>" placeholder="Name"><br>
         </fieldset>

         <fieldset>
            <legend>Titel</legend>
            <input type="text" name="title" value="<?= $title ?>" placeholder="Werktitel"><br>
         </fieldset>

         <fieldset>
            <legend>Preis</legend>
            <input type="text" name="price" value="<?= $price ?>" placeholder="0.00"><br>
         </fieldset>

         <!-- -------- MEDIATYPE -------- -->
         <fieldset>
            <legend>Medientyp</legend>
            <?php foreach ($mediaTypes as $value => $label) : ?>
               <label class="radio-inline">
                  <input type="radio" class="radio-button-mediatype" name="mediaType" value="<?= $value; ?>" <?= $mediaType == $value ? 'checked' : '' ?>>
                  <?= $label; ?>
               </label><br>
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

         <h2>Schreibende DB-Operationen mit PDO</h2>
         <p><a href="<?= $fileName ?>">Seitenaufruf ohne Parameter</a></p>
         <p><a href="?action=insert">Werk in Datenbank anlegen</a></p>

         <p><a href="?action=update">Werk in Datenbank ändern</a></p>
         <p><a href="?action=showAllData">Zeige alle Daten</a></p>
         <p><a href="?action=showAuthorsAndTitles">Zeige alle Autoren und ihre Werke</a></p>
         <p> <a href="?action=showDistinctAuthors">Zeige alle verschiedenen Autoren</a>
         </p>
         <p><a href="?action=showPaperback">Zeige alle Paperbacks</a></p>


      </form>
</body>

</html>