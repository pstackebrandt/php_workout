<?php

declare(strict_types=1);
namespace train_b4_insert_media;

use train_b4_insert_media\MediumType;

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

#********** INCLUDE CLASSES **********#
require_once('./class/Medium.class.php');

#                                   ********************************************#
#                                   ********** PROCESS URL PARAMETERS **********#
#                                   ********************************************#

#                                   ********** PREVIEW GET ARRAY **********#

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$_GET <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($_GET);
if (DEBUG_V) echo "</pre>";

// Schritt 1 URL: Prüfen, ob URL-Parameter übergeben wurde
if (isset($_GET['action']) === true) {
    if (DEBUG) echo "<p class='debug'>🧻 <b>Line " . __LINE__ . "</b>: URL-Parameter 'action' wurde übergeben. <i>(" . basename(__FILE__) . ")</i></p>\n";

    // Schritt 2 URL: Auslesen, entschärfen und Debug-Ausgabe der übergebenen Parameter-Werte
    if (DEBUG) echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Werte werden ausgelesen und entschärft... <i>(" . basename(__FILE__) . ")</i></p>\n";

    $action = htmlspecialchars($_GET['action'], ENT_QUOTES | ENT_HTML5);
    if (DEBUG_V) echo "<p class='debug value'><b>Line " . __LINE__ . "</b>: \$action: $action <i>(" . basename(__FILE__) . ")</i></p>\n";


    // Schritt 3 URL: Je nach Parameterwert verzweigen
    if ($action === 'insert') {
        if (DEBUG) echo "<p class='debug'><b>Line " . __LINE__ . "</b>: Process action: $action <i>(" . basename(__FILE__) . ")</i></p>\n";

        # *********************** Create media elements **********************************
        if (DEBUG) echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Create media elements ... <i>(" . basename(__FILE__) . ")</i></p>\n";

        $pinkFloyd = new Medium(
            'The Dark Side of the Moon',
            'Pink Floyd',
            1973,
            MediumType::CD,
            9.99,
            1
        );

        if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V) print_r($pinkFloyd);
        if (DEBUG_V) echo "</pre>";

// Empty medium filled with setters
        $manowarEmpty = new Medium();

        if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$manowarEmpty <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V) print_r($manowarEmpty);
        if (DEBUG_V) echo "</pre>";

        $manowarFilledAfterwards = new Medium();
        $manowarFilledAfterwards->setTitle('Kings of Metal');
        $manowarFilledAfterwards->setArtist('Manowar');
        $manowarFilledAfterwards->setReleaseYear(1988);
        $manowarFilledAfterwards->setMediumType(MediumType::CD);
        $manowarFilledAfterwards->setPrice(9.99);
        $manowarFilledAfterwards->setID(2);

        if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$manowarFilledAfterwards <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V) print_r($manowarFilledAfterwards);
        if (DEBUG_V) echo "</pre>";

        // Change medium after creation
        $accept = new Medium(
            'Too Mean to Die',
            'Accept',
            2021,
            MediumType::CD,
            66, // Add int instead of float
            id: 3
        );

        if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: Accept created <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V) print_r($accept);
        if (DEBUG_V) echo "</pre>";

        $accept->setReleaseYear('1999');
        $accept->setMediumType(MediumType::DVD);

        if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: Accept changed (year, type)  <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V) print_r($accept);
        if (DEBUG_V) echo "</pre>";

        // Partially filled medium afterwards filled
        $maiden = new Medium(
            null,
            'Iron Maiden',
            mediumType: MediumType::DVD
        );

        $maiden->setTitle('The Number of the Beast');
        $maiden->setReleaseYear(1982);
        $maiden->setPrice(12.99);


        if(DEBUG)	echo "<p class='debug'><b>Line " . __LINE__ . "</b>: Media elements created <i>(" . basename(__FILE__) . ")</i></p>\n";

        // Add media to array $musicILike
        $musicILike = [$pinkFloyd, $manowarFilledAfterwards, $accept, $maiden, $manowarEmpty];
        if(DEBUG)	echo "<p class='debug'><b>Line " . __LINE__ . "</b>: Array \$musicILike filled <i>(" . basename(__FILE__) . ")</i></p>\n";

        # ******************************* Save to DB ********************************

        #**********************************#
        #********** DB OPERATION **********#
        #**********************************#

        // Schritt 1 DB: DB-Verbindung herstellen
        /*
            Das PDO-Objekt sollte immer außerhalb der DB-Methoden
            erzeugt und dann an diese übergeben werden, da ansonsten
            keine Methodenübergreifenden Transactions funktionieren
            würden.
        */
        $PDO = dbConnect('mediasammlung_oop');

         /*
            Schritt 2-4 der DB-Operationen finden in den entsprechenden
            Objektmethoden statt.
        */
        foreach($musicILike as $medium){
            if( $medium->saveToDB($PDO) === false ) {
                // Fehlerfall
                echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: FEHLER beim Speichern des Datensatzes! <i>(" . basename(__FILE__) . ")</i></p>\n";
                $dbError = 'Beim Speichern des neuen Users ist ein Fehler aufgetreten!';
    
            } else {
                // Erfolgsfall
                if(DEBUG)		echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Datensatz erfolgreich unter ID{$user->getUserID()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";
                $dbSuccess = 'Der neue User wurde erfolgreich gespeichert.';
            }
        }
       
        // DB-Verbindung schließen
        if(DEBUG_DB)echo "<p class='debug db'><b>Line " . __LINE__ . "</b>: DB-Verbindung geschlossen. <i>(" . basename(__FILE__) . ")</i></p>\n";
        unset($PDO);




    } // BRANCHING END

} // PROCESS URL PARAMETERS END


?>

<!doctype html>

<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>works</title>

    <link rel="stylesheet" href="./css/debug.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<h1 class="my-5 text-primary">Insert media elements into database</h1>


<h2>Add link to call for media creation and db insert</h2>
<p>
    <a href="train_b4_insert_media.php?action=insert">Insert 5 media elements with content into db</a>
</p>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>