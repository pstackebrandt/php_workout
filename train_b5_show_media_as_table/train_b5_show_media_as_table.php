<?php

declare(strict_types=1);


namespace train_b5_show_media;

use train_b5_show_media\classes\MediumType;
use train_b5_show_media\classes\MediumInterface;
use train_b5_show_media\classes\Medium;

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

        foreach ($musicILike as $mediumToSave) {
            if (DEBUG)    echo "<p class='debug'><b>Line " . __LINE__ . "</b>: Try to save 1 medium  to db. <i>(" . basename(__FILE__) . ")</i></p>\n";

            if (DEBUG_V)    echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$mediumToSave <i>(" . basename(__FILE__) . ")</i>:<br>\n";
            if (DEBUG_V)    print_r($mediumToSave);
            if (DEBUG_V)    echo "</pre>";

            if ($mediumToSave->saveToDB($PDO) === false) {
                // Fehlerfall
                echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: FEHLER beim Speichern des Datensatzes! <i>(" . basename(__FILE__) . ")</i></p>\n";
            } else {
                // Erfolgsfall
                if (DEBUG) echo "<p class='debug ok'><b>Line " . __LINE__ . "</b>: Datensatz erfolgreich unter ID {$mediumToSave->getId()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";
            }
        }

        // DB-Verbindung schließen
        if (DEBUG_DB) echo "<p class='debug db'><b>Line " . __LINE__ . "</b>: DB-Verbindung geschlossen. <i>(" . basename(__FILE__) . ")</i></p>\n";
        unset($PDO);

        //    ******* End of save to DB *******
        // ******  End of insert media elements into db *******
    } elseif ($action === 'fetchAllMediaFromDb') {

        //                           ********************************************
        //                                  Fetch all media elements from db
        //                           ********************************************


        if (DEBUG) echo "<p class='debug'><b>Line " . __LINE__ . "</b>: Process action: $action <i>(" . basename(__FILE__) . ")</i></p>\n";

        if (DEBUG) echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Fetch all media elements ... <i>(" . basename(__FILE__) . ")</i></p>\n";


        // ********* END Fetch all media elements from db **********

        // Schritt 1 DB: DB-Verbindung herstellen
        $PDO = dbConnect('mediasammlung_oop');

        $allMediaObjectsArray = Medium::fetchAllMediaFromDb($PDO);


        if (DEBUG_V)    echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$allMediaObjectsArray from fetch all media <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V)    print_r($allMediaObjectsArray);
        if (DEBUG_V)    echo "</pre>";

        /*
            Schritt 2-4 der DB-Operationen finden in den entsprechenden
            Objektmethoden statt.
        */

        // Fetch all media elements from db
        // DB-Verbindung schließen
        if (DEBUG_DB) echo "<p class='debug db'><b>Line " . __LINE__ . "</b>: DB-Verbindung geschlossen. <i>(" . basename(__FILE__) . ")</i></p>\n";
        unset($PDO);


    } // BRANCHING Actions END



    //                 ********************************************
    //                        Fetch all media elements from db
    //                 ********************************************



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
    <h1 class="my-5 text-primary">Show media elements on screen in table</h1>


    <h2>Add link to call for media creation and db insert</h2>
    <p>
        <a href="train_b5_show_media_as_table.php?action=insert">Insert 5 media elements with content into db</a>
    </p>

    <p>
        <a href="train_b5_show_media_as_table.php?action=fetchAllMediaFromDb">Show all media in table</a>
    </p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- [title:train_b5_show_media\classes\Medium:private] => 
    [artist:train_b5_show_media\classes\Medium:private] => 
    [releaseYear:train_b5_show_media\classes\Medium:private] => 
    [mediumType:train_b5_show_media\classes\Medium:private] => 
    [price:train_b5_show_media\classes\Medium:private] => 
    [id:train_b5_show_media\classes\Medium:private]  -->

    <?php foreach( $allMediaObjectsArray AS $mediaObject ): ?>
			<article>
				<p>
					<?= $mediaObject->getTitle() ?? 'unknown title'?> 
                    <?= $mediaObject->getArtist() ?? 'unknown artist' ?>
                    <?= $mediaObject->getReleaseYear() ?? 'unknown year' ?>
                    <?= $mediaObject->getPrice() ?? 'unknown price' ?>
                    <?= $mediaObject->getMediumType()?->value ?? 'unknown medium type' ?>
                    <?= $mediaObject->getId() ?? 'not set' ?>
                    
				</p>
			</article>
			<hr>
		<?php endforeach ?>
</body>

</html>