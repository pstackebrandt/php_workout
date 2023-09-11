<?php

declare(strict_types=1);

require_once '../utility/print_helper.php';

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

// Resources

// Variables

?>

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

      <!-- Delete work in a select 
	• Erstelle Formular unter dem ersten
		○ Enthält Select-Box mit allen IDs der in der DB vorhandenen Einträge enthält
		○ Ok Button
		○ IDs sollen aus der DB ausgelesen werden
	• Wird der OK-Button geklickt, soll der entsprechende Eintrag aus der DB gelöscht werden. 
	• DB-Operation zum Löschen eines Eintrags wird in Schritt 4 einer Formularverarbeitung durchgeführt

   Implementierung
	• Statischen Select-Box Dummy erstellen
	• Daten aus DB auslesen
		○ ID
	• Formular aufbauen mit geladenen Daten
	• Auf Formulardatenverschickung reagieren
		○ Select und ok
	• Eintrag mit ID aus DB löschen
	• Seite aktualisieren
		○ also neu zur Seite navigieren Form

-->
      <form id="<?= $deleteWorkFormName ?>" action="" methode="POST">
         <input type="hidden" name="<?= $deleteWorkFormName ?>">
         <br>
         <p>Choose a work to delete. Afterwards click ok Button to delete it.</p>
         <label for="deleteWorkChooser">Ids of deletable works</label><br>
         <select id="deleteWorkChooser" name="deleteWorkChooser">
            <?php foreach ($allWorksIds as $work) : ?>
               <option value="<?= $work['werkeID'] ?>"><?= $work['werkeID'] ?></option>
            <?php endforeach; ?>
         </select>
         <input type="submit" value="Delete this work">
      </form>

</body>

</html>