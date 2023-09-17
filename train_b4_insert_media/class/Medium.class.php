<?php
declare(strict_types=1);

namespace train_b4_insert_media;

use php_workout\utility\TypeCheck;

require_once '../utility/TypeCheck.class.php';


class Medium
{
    private ?string $title = null;
    private ?string $artist = null;
    private ?int $releaseYear = null;
    private ?MediumType $mediumType = null;
    private ?float $price = null;
    private ?int $id = null;

    public function __construct(null|string            $title = null,
                                null|string            $artist = null,
                                null|int|string        $releaseYear = null,
                                null|MediumType|string $mediumType = null,
                                null|float|string      $price = null,
                                null|int|string        $id = null)
    {
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
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->title = sanitizeString($value);
    }

    public function getArtist(): string|null
    {
        return $this->artist;
    }

    public function setArtist(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->artist = sanitizeString($value);
    }

    public function getReleaseYear(): int|null
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int|string $releaseYear): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

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
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: setPrice($value) " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

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
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
    
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
}

enum MediumType: string
{
    case DVD = "DVD";
    case BLU_RAY = "Blu-ray";
    case CD = "CD";
    case LP = "LP";
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