<?php
declare(strict_types=1);
namespace train_b2_classes;

require_once '../utility/print_helper.php';

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

#********** INCLUDE CLASSES **********#
require_once('./class/Medium.class.php');


#********** Create media instances **********#

$pinkFloyd = new Medium(
    'The Dark Side of the Moon',
    'Pink Floyd',
    1973,
    MediumType::CD
);

$maiden = new Medium(
    'The Number of the Beast',
    'Iron Maiden',
    1982,
    MediumType::DVD
);

$manowar = new Medium();
$manowar->setTitle('Kings of Metal');
$manowar->setArtist('Manowar');
$manowar->setReleaseYear(1988);
$manowar->setMediumType(MediumType::CD);

// Add newest accept cd
$accept = new Medium(
    'Too Mean to Die',
    'Accept',
    2021,
    MediumType::CD
);

// Add lords of the rings book
$lordsOfTheRings = new Medium(
    'The Lord of the Rings',
    'J. R. R. Tolkien',
    1954,
    MediumType::BOOK
);

$accept->setMediumType(MediumType::DVD);

// Add media to array $musicILike
$musicILike = [$pinkFloyd, $maiden, $manowar, $accept];
$musicILike[] = $lordsOfTheRings;

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
    foreach ($musicILike as $medium) {
        echo $medium->getAllMediumsAsUnorderedListItemHTML();
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>