<?php

declare(strict_types=1);


namespace train_b4_insert_media;

use train_b4_insert_media\classes\MediumType;
use train_b4_insert_media\classes\MediumInterface;
use train_b4_insert_media\classes\Medium;

#********** PAGE CONFIGURATION **********#
require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

#********** INCLUDE CLASSES **********#
require_once('./classes/Medium.class.php');

#                          ********************************************
#                                          Functions
#                          ********************************************

function create5MediaElements(): array
{
    if (DEBUG_F) echo "<p class='debug function'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __FUNCTION__ . "() <i>(" . basename(__FILE__) . ")</i></p>\n";

    $pinkFloyd = new Medium(
        'The Dark Side of the Moon',
        'Pink Floyd',
        1973,
        MediumType::CD,
        9.99,
        1
    );

    // Empty medium filled with setters
    $manowarEmpty = new Medium();

    $manowarFilledAfterwards = new Medium();
    $manowarFilledAfterwards->setTitle('Kings of Metal');
    $manowarFilledAfterwards->setArtist('Manowar');
    $manowarFilledAfterwards->setReleaseYear(1988);
    $manowarFilledAfterwards->setMediumType(MediumType::CD);
    $manowarFilledAfterwards->setPrice(9.99);
    $manowarFilledAfterwards->setID(2);

    // Change medium after creation
    $accept = new Medium(
        'Too Mean to Die',
        'Accept',
        2021,
        MediumType::CD,
        66, // Add int instead of float
        id: 3
    );

    $accept->setReleaseYear('1999');
    $accept->setMediumType(MediumType::DVD);

    // Partially filled medium afterwards filled
    $maiden = new Medium(
        null,
        'Iron Maiden',
        mediumType: MediumType::DVD
    );

    $maiden->setTitle('The Number of the Beast');
    $maiden->setReleaseYear(1982);
    $maiden->setPrice(12.99);

    // @var Medium[]
    $musicILikeMediaElements = [$pinkFloyd, $manowarFilledAfterwards, $accept, $maiden, $manowarEmpty];

    return $musicILikeMediaElements;
}


#                          ********************************************
#                                   PROCESS URL PARAMETERS
#                          ********************************************

#                          ********** PREVIEW GET ARRAY **********
if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$_GET <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($_GET);
if (DEBUG_V) echo "</pre>";

//                           **********************************
//                                  Process GET Calls
//                           **********************************

// Schritt 1 URL: Prüfen, ob URL-Parameter übergeben wurde
if (isset($_GET['action']) === true) {
    if (DEBUG) echo "<p class='debug'>🧻 <b>Line " . __LINE__ . "</b>: URL-Parameter 'action' wurde übergeben. <i>(" . basename(__FILE__) . ")</i></p>\n";

    // Schritt 2 URL: Process URL-Parameter
    if (DEBUG) echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Werte werden ausgelesen und entschärft... <i>(" . basename(__FILE__) . ")</i></p>\n";

    // Clean action value
    $action = htmlspecialchars($_GET['action'], ENT_QUOTES | ENT_HTML5);

    // Schritt 3 URL: Je nach action value verzweigen

    //                           ********************************************
    //                                  Insert media elements into db
    //                           ********************************************
    if ($action === 'insert') {
        if (DEBUG) echo "<p class='debug'><b>Line " . __LINE__ . "</b>: Process action: $action <i>(" . basename(__FILE__) . ")</i></p>\n";

        if (DEBUG) echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Create media elements ... <i>(" . basename(__FILE__) . ")</i></p>\n";


        # ******************************* Save to DB ********************************

        #**********************************#
        #********** DB OPERATION **********#
        #**********************************#

        $musicILike = create5MediaElements();
        if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$musicILike <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V) print_r($musicILike);
        if (DEBUG_V) echo "</pre>";

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

        if (true) {
            // foreach ($musicILike as $mediumToSave) {
            if (true) {
                if (DEBUG)    echo "<p class='debug'><b>Line " . __LINE__ . "</b>: Try to save 1 medium  to db. <i>(" . basename(__FILE__) . ")</i></p>\n";
                $mediumToSave = $musicILike[0];

                if (DEBUG_V)    echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$mediumToSave <i>(" . basename(__FILE__) . ")</i>:<br>\n";
                if (DEBUG_V)    print_r($mediumToSave);
                if (DEBUG_V)    echo "</pre>";


                if ($mediumToSave->saveToDB($PDO) === false) {
                    // Fehlerfall
                    echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: FEHLER beim Speichern des Datensatzes! <i>(" . basename(__FILE__) . ")</i></p>\n";
                    $dbError = 'Beim Speichern des neuen Users ist ein Fehler aufgetreten!';
                } else {
                    // Erfolgsfall
                    if (DEBUG) echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Datensatz erfolgreich unter ID {$mediumToSave->getId()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";
                    $dbSuccess = 'Das neue Medium wurde erfolgreich gespeichert.';
                }
            }
        }
        // DB-Verbindung schließen
        if (DEBUG_DB) echo "<p class='debug db'><b>Line " . __LINE__ . "</b>: DB-Verbindung geschlossen. <i>(" . basename(__FILE__) . ")</i></p>\n";
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