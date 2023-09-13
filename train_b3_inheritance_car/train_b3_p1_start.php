<?php
declare(strict_types=1);
namespace train_b3_p1_classes;

require_once '../utility/print_helper.php';

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

#********** INCLUDE CLASSES **********#


#********** Create media instances **********#

// Full medium with full artist as variable
// ----------------------------------------
$pinkFloyd = new Artist(
    'Pink',
    'Floyd',
    ArtistRole::BAND->value
);

$floydDarkSide = new Medium(
    'The Dark Side of the Moon',
    $pinkFloyd,
    1973,
    MediumType::CD,
    '9.99'
);

// Full medium with artist created in constructor
// ----------------------------------------------
$maidenNumberBeast = new Medium(
    'The Number of the Beast',
    new Artist(
        lastName: 'Iron Maiden',
        role: ArtistRole::BAND->value),
    1982,
    MediumType::DVD,
    price: '12.99'
);

// Empty medium with empty artist
// ------------------------------
$emptyMedium = new Medium(artist: new Artist());


// Empty medium with full artist
// -----------------------------
$mano = new Artist(
    null,
    'Manowar',
    ArtistRole::BAND->value
);


$manowarKing = new Medium(artist: $mano);

// Add title, release year and medium type after init by setter
$manowarKing->setTitle('Kings of Metal');
$manowarKing->setArtist($mano);
$manowarKing->setReleaseYear(1988);
$manowarKing->setMediumType(MediumType::CD);

// Add newest accept cd
$acceptMean = new Medium(
    'Too Mean to Die',
    new Artist(lastName: "Accept", role: ArtistRole::INTERPRET->value),
    2021,
    MediumType::CD,
    '12.99'
);

// Fill author after use
$tolkien = new Artist();

// Add lords of the rings book
$tolkienLord = new Medium(
    'The Lord of the Rings',
    $tolkien,
    1954,
    MediumType::BOOK
);

$tolkien->setFirstName('John Ronald Reuel');
$tolkien->setLastName('Tolkien');
$tolkien->setRole(ArtistRole::AUTHOR->value);


// Add media to array $musicILike
$musicILike = [$floydDarkSide, $maidenNumberBeast, $manowarKing, $acceptMean];
$musicILike[] = $tolkienLord;
$musicILike[] = $emptyMedium;

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
        echo $medium->getAllMedia_asUnorderedListItemHTML();
    }
    ?>
</ul>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>