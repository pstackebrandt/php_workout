<?php

declare(strict_types=1);
namespace train_b4_crud_medium;

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

#********** INCLUDE CLASSES **********#
require_once('./class/Medium.class.php');


#********** Create media instances **********#

// Full medium
$pinkFloyd = new Medium(
    'The Dark Side of the Moon',
    'Pink Floyd',
    1973,
    MediumType::CD
);

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($pinkFloyd);
if (DEBUG_V) echo "</pre>";

// Full medium
$maiden = new Medium(
    'The Number of the Beast',
    'Iron Maiden',
    1982,
    MediumType::DVD
);

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($maiden);
if (DEBUG_V) echo "</pre>";


// Empty medium filled with setters
$manowar = new Medium();
$manowar->setTitle('Kings of Metal');
$manowar->setArtist('Manowar');
$manowar->setReleaseYear(1988);
$manowar->setMediumType(MediumType::CD);

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($manowar);
if (DEBUG_V) echo "</pre>";


// Add newest accept cd
$accept = new Medium(
    'Too Mean to Die',
    'Accept',
    2021,
    MediumType::CD
);

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($accept);
if (DEBUG_V) echo "</pre>";

$accept->setMediumType(MediumType::DVD);

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($accept);
if (DEBUG_V) echo "</pre>";

// Add media to array $musicILike
$musicILike = [$pinkFloyd, $maiden, $manowar, $accept];

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($musicILike);
if (DEBUG_V) echo "</pre>";

// Variables

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
<h1 class="my-5 text-primary">Create works page with form</h1>

<h2 class="my-3 text-secondary">Music I like</h2>

<h3 class="my-2 ">Get formatted html from User class</h3>
<!-- Get formatted html from User class -->
<ul class="list-group">
    <?php

    if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
    if (DEBUG_V) print_r($musicILike);
    if (DEBUG_V) echo "</pre>";

    /** @var Medium[] $musicILike */
    foreach ($musicILike as $medium) {
        echo $medium->getAllMediaAsUnorderedListItemHTML();
    }
    ?>
</ul>

<!-- list the content of $musicILike -->
<ul class="list-group">
    <?php
    foreach ($musicILike as $medium) {
        echo "<li class='list-group-item'>" . $medium->getTitle() . ' - ' . $medium->getArtist() . ' (' . $medium->getReleaseYear() . ')</li>';
    }
    ?>
</ul>

<h3>Check getReleaseYear()</h3>
<?php
// Full medium
$pinkFloyd2 = new Medium(
    'The Dark Side of the Moon',
    'Pink Floyd',
    1973,
    MediumType::CD
);

if (DEBUG_V) echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$arrayName <i>(" . basename(__FILE__) . ")</i>:<br>\n";
if (DEBUG_V) print_r($pinkFloyd2);
if (DEBUG_V) echo "</pre>";

echo "getReleaseYear()" . $pinkFloyd2->getReleaseYear() . '<br>';
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>