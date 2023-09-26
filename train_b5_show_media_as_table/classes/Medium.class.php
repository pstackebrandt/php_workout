<?php

declare(strict_types=1);

namespace train_b5_show_media\classes;

use DBOperationsInterface;
use PDO;
use PDOException;
use php_workout\utility\TypeCheck;

define('DEBUG_MEDIUM', false); // false: Don't show debug messages.

#                   ********* include classes ************
// require_once('../include/config.inc.php');
require_once __DIR__ . '\..\include\config.inc.php';
require_once('DBOperationsInterface.php');
require_once 'MediumInterface.php';
require_once(PROJECT_ROOT . '/utility/TypeCheck.class.php');


class Medium implements MediumInterface, DBOperationsInterface
{
    // ************* For Debug only *************

    private ?string $title = null;
    private ?string $artist = null;
    private ?int $releaseYear = null;
    private ?MediumType $mediumType = null;
    private ?float $price = null;
    private ?int $id = null;

    public function __construct(
        null|string            $title = null,
        null|string            $artist = null,
        null|int|string        $releaseYear = null,
        null|MediumType|string $mediumType = null,
        null|float|string      $price = null,
        null|int|string        $id = null
    ) {
        // Don't work with null or empty string, because we don't want to save empty values.
        if (TypeCheck::isNotNullOrEmpty($title)) $this->setTitle($title);
        if (TypeCheck::isNotNullOrEmpty($artist)) $this->setArtist($artist);
        if (TypeCheck::isNotNullOrEmpty($releaseYear)) $this->setReleaseYear($releaseYear);
        if (TypeCheck::isNotNullOrEmpty($mediumType)) $this->setMediumType($mediumType);
        if (TypeCheck::isNotNullOrEmpty($price)) $this->setPrice($price);
        if (TypeCheck::isNotNullOrEmpty($id)) $this->setID($id);
    }



    public function __destruct()
    {
        if (DEBUG_CC) echo "<p class='debug class'>☠️  <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";
    }

    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string $value): void
    {
        if (DEBUG_MEDIUM && DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->title = sanitizeString($value);
    }

    public function getArtist(): string|null
    {
        return $this->artist;
    }

    public function setArtist(string $value): void
    {
        if (DEBUG_MEDIUM && DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->artist = sanitizeString($value);
    }

    public function getReleaseYear(): int|null
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int|string $releaseYear): void
    {
        if (DEBUG_MEDIUM && DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        if (TypeCheck::isIntOrCastable($releaseYear)) {
            $this->releaseYear = (int)$releaseYear;
        } else {
            if (DEBUG) echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Value not castable into int. \$releaseYear = $releaseYear  <i>(" . basename(__FILE__) . ")</i></p>\n";
        }
    }

    public function getMediumType(): MediumType|null
    {
        return $this->mediumType;
    }

    /** Set the medium type if $mediumType is usable. Otherwise, do nothing.
     * @param MediumType|string $mediumType
     */
    public function setMediumType(MediumType|string $mediumType): void
    {
        if ($mediumType instanceof MediumType === false) {
            // is string
            $mediumType = sanitizeString($mediumType);
            $mediumType = MediumTypeHelper::toMediumTypeOrNull($mediumType);
            if (is_null($mediumType)) {
                if (DEBUG) echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Value not castable into MediumType. \$mediumType = $mediumType  <i>(" . basename(__FILE__) . ")</i></p>\n";
                return;
            }
        }

        $this->mediumType = $mediumType;
    }


    public function getPrice(): float|null
    {
        return $this->price;
    }

    public function setPrice(float|string $value): void
    {
        if (DEBUG_MEDIUM && DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: setPrice($value) " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        $result = TypeCheck::getFloatOrFalse($value);
        if ($result !== false) {
            $this->price = (float)$value;
        } else {
            if (DEBUG) echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Price value not castable into float. \$value = $value  <i>(" . basename(__FILE__) . ")</i></p>\n";
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int|string $id): void
    {
        if (DEBUG_MEDIUM && DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        if (TypeCheck::isIntOrCastable($id)) {
            $this->id = (int)$id;
        } else {
            if (DEBUG) echo "<p class='debug err'><b>Line " . __LINE__ . "</b>: Value not castable into int. \$id = $id  <i>(" . basename(__FILE__) . ")</i></p>\n";
        }
    }


    public function getAllMediaAsUnorderedListItemHTML(): string
    {
        $formattedMedium = "<li class='list-group-item'>";

        // first line: title, artist, release year
        $formattedMedium .= $this->getTitle() ?? 'unknown title';
        $formattedMedium .= ' - ';
        $formattedMedium .= $this->getArtist() ?? 'unknown artist';
        $formattedMedium .= ' (';
        $formattedMedium .= $this->getReleaseYear() ?? 'unknown year';
        $formattedMedium .= ')';

        // Second line: price, medium type
        $formattedMedium .= '<br>';
        $formattedMedium .= $this->getPrice() ?? 'unknown price';
        $formattedMedium .= ' - ';
        $formattedMedium .= $this->getMediumType()?->value ?? 'unknown medium type';
        // Add id at the end of the second line
        $formattedMedium .= ' - ID: ';
        $formattedMedium .= $this->getId() ?? 'not set';
        $formattedMedium .= '</li>';

        return $formattedMedium;
    }


    #***********************    Save into db    **********************#

    /**
     * Saves the medium into the database.
     * If the write process was successful, the new medium id will be written into the medium object.
     * @param PDO $PDO 
     * @return true if the medium was saved successfully, otherwise false. 
     */
    public function saveToDB(PDO $PDO): bool
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        // Schritt 2 DB: SQL-Statement und Placeholder-Array erstellen
        $sql = 'INSERT INTO Medium
                    (mediumTitle , mediumArtist, mediumReleaseYear, mediumMediumType, mediumPrice)
                    VALUES
                    (?,?,?,?,?)';

        $params = array(
            $this->getTitle(),
            $this->getArtist(),
            $this->getReleaseYear(),
            MediumType::getValueOrNull($this->getMediumType()),
            $this->getPrice()
        );

        // Schritt 3 DB: Prepared Statements:
        try {
            // Prepare: SQL-Statement vorbereiten
            $PDOStatement = $PDO->prepare($sql);

            // Execute: SQL-Statement ausführen und ggf. Platzhalter füllen
            $PDOStatement->execute($params);
        } catch (PDOException $error) {
            if (DEBUG_C) echo "<p class='debug class db err'><b>Line " . __LINE__ . "</b>: FEHLER: " . $error->GetMessage() . "<i>(" . basename(__FILE__) . ")</i></p>\n";
            $dbError = 'Fehler beim Zugriff auf die Datenbank!';
        }

        // Schritt 4 DB: Datenbankoperation auswerten und DB-Verbindung schließen
        /*
            Bei schreibenden Operationen (INSERT/UPDATE/DELETE):
            Schreiberfolg prüfen anhand der Anzahl der betroffenen Datensätze (number of affected rows).
            Diese werden über die PDOStatement-Methode rowCount() ausgelesen.
            Der Rückgabewert von rowCount() ist ein Integer; wurden keine Daten verändert, wird 0 zurückgeliefert.
        */
        $rowCount = $PDOStatement->rowCount();

        if ($rowCount === 1) {
            // 1 changed row means success

            // ID des neuen Datensatzes auslesen und im Objekt speichern
            $newMediumId = $PDO->lastInsertId();
            $this->setId($newMediumId);

            // Erfolgsfall
            if (DEBUG_C) echo "<p class='debug class db ok'><b>Line " . __LINE__ . "</b>: Datensatz erfolgreich unter ID {$this->getId()} gespeichert. <i>(" . basename(__FILE__) . ")</i></p>\n";

            return true;
        } else {
            // Fehlerfall
            if (DEBUG_C) echo "<p class='debug class db err'><b>Line " . __LINE__ . "</b>: FEHLER beim Speichern des Datensatzes! Count of change rows: $rowCount<i>(" . basename(__FILE__) . ")</i></p>\n";

            return false;
        }
    }

    //          **************************************
    //          ********** Static functions *********
    //          **************************************

    #***********************    Fetch from db    **********************#
    /**
     * Fetches all Media from the database.
     * @param PDO $PDO 
     * @return array with Medium objects.
     */
    public static function fetchAllMediaFromDb(PDO $PDO): array
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        // Schritt 2 DB: SQL-Statement vorbereiten
        $sql = 'SELECT * FROM Medium';

        $params     = array();

        // Schritt 3 DB: Prepared Statements
        try {
            // Prepare: SQL-Statement vorbereiten
            $PDOStatement = $PDO->prepare($sql);

            // Execute: SQL-Statement ausführen und ggf. Platzhalter füllen
            $PDOStatement->execute($params);
        } catch (PDOException $error) {
            if (DEBUG) echo "<p class='debug db err'><b>Line " . __LINE__ . "</b>: FEHLER: " . $error->GetMessage() . "<i>(" . basename(__FILE__) . ")</i></p>\n";
            $dbError = 'Fehler beim Zugriff auf die Datenbank!';
        }

        /*
        Der fetchAll()-Parameter PDO::FETCH_ASSOC liefert o.g. assoziatives Array zurück.
        Der fetchAll()-Parameter PDO::FETCH_NUM liefert das gleiche Array als numerisches Array zurück.
        */
        $arrayWithMediaArrays = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);

        $arrayWithMediaObjects = Medium::convertMediaArraysToMediaObjects($arrayWithMediaArrays);

        if (DEBUG_V)    echo "<pre class='debug value'><b>Line " . __LINE__ . "</b>: \$resultArray <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_V)    print_r($arrayWithMediaArrays);
        if (DEBUG_V)    echo "</pre>";

        return $arrayWithMediaObjects;
    }

    /**
     * Converts an array of media arrays to an array of Medium objects.
     * @param array $arrayWithMediaArrays 
     * @return array with Medium objects, contains no null values.
     */
    public static function convertMediaArraysToMediaObjects(?array $arrayWithMediaArrays): array
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $arrayWithMediaObjects = array();
        if(is_null($arrayWithMediaArrays)) return $arrayWithMediaObjects;

        foreach ($arrayWithMediaArrays as $mediaArray) {
            if (is_array($mediaArray)) {
                $mediumObjectOrNull = Medium::convertMediaArrayToMediaObject($mediaArray);
                if (is_object($mediumObjectOrNull)) {
                    $arrayWithMediaObjects[] = $mediumObjectOrNull;
                }
            }
        }

        return $arrayWithMediaObjects;
    }

    /**
     * Converts a media array to a Medium object. Returns null if $mediaArray is null.
     * Returns empty object if $mediaArray contains no usable data.
     * @param array $mediaArray Should contain 1 or all of the keys of the db table. Current
     *  keys: 'mediumTitle', 'mediumArtist', 'mediumReleaseYear', 'mediumMediumType', 'mediumPrice', 'mediumID'. 
     * If value data isn't usable, it will be ignored.
     * @return Medium object.
     */
    static function convertMediaArrayToMediaObject(?array $mediaArray): ?Medium
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        if (is_null($mediaArray)) {
            if(DEBUG)	echo "<p class='debug'><b>Line " . __LINE__ . "</b>: \$mediaArray is null. I return null. <i>(" . basename(__FILE__) . ")</i></p>\n";

            return null;
        }

        $medium = new Medium(
            title: $mediaArray['mediumTitle'],
            artist: $mediaArray['mediumArtist'],
            releaseYear: $mediaArray['mediumReleaseYear'],
            // übergebe null, wenn $mediaArray['mediumMediumType'] null ist.
            mediumType: $mediaArray['mediumMediumType']? MediumTypeHelper::toMediumTypeOrNull($mediaArray['mediumMediumType']) : null,
            price: $mediaArray['mediumPrice'],
            id: $mediaArray['mediumID']
        );
        return $medium;
    }
}

enum MediumType: string
{
    case DVD = "DVD";
    case BLU_RAY = "Blu-ray";
    case CD = "CD";
    case LP = "LP";

    /** Returns the value of the given MediumType or null if $mediumType is null. 
     * @param MediumType|null $mediumType will be checked.
     */
    public static function getValueOrNull(?MediumType $mediumType): ?string
    {
        if ($mediumType === null) {
            return null;
        }

        return $mediumType->value;
    }
}

class MediumTypeHelper
{
    /** Return the MediumType for the given string or null if no MediumType value matches the given string.
     * @param string $mediumType
     * @return MediumType|null
     */
    public static function toMediumTypeOrNull(string $mediumType): ?MediumType
    {
        foreach (MediumType::cases() as $case) {
            if ($case->value === $mediumType) {
                return $case;
            }
        }
        return null;
    }
}
