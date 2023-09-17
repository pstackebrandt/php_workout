<?php

declare(strict_types=1);
namespace train_b4_create_media;

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

#********** INCLUDE CLASSES **********#
require_once('./class/Medium.class.php');

#********************************************#
#********** PROCESS URL PARAMETERS **********#
#********************************************#

#********** PREVIEW GET ARRAY **********#

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

        // Schritt create media elements
        if (DEBUG) echo "<p class='debug'>📑 <b>Line " . __LINE__ . "</b>: Create media elements ... <i>(" . basename(__FILE__) . ")</i></p>\n";





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