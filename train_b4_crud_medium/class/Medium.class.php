<?php
declare(strict_types=1);

namespace train_b4_crud_medium;

use php_workout\utility\TypeCheck;

require_once '../../utility/TypeCheck.php';
require_once('../include/config.inc.php');

class Medium
{
    private ?string $title;
    private ?string $artist;
    private ?int $releaseYear;
    private ?MediumType $mediumType;

    public function __construct(null|string            $title = null,
                                null|string            $artist = null,
                                null|int|string        $releaseYear = null,
                                null|MediumType|string $mediumType = null)
    {
        if (TypeCheck::isNotNullOrEmpty($title)) $this->setTitle($title);
        if (TypeCheck::isNotNullOrEmpty($artist)) $this->setArtist($artist);
        if (TypeCheck::isNotNullOrEmpty($releaseYear)) $this->setReleaseYear($releaseYear);
        if (TypeCheck::isNotNullOrEmpty($mediumType)) $this->setMediumType($mediumType);
    }

    public function __destruct()
    {
        if (DEBUG_CC) echo "<p class='debug class'>☠️  <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";
    }

    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->title = sanitizeString($value);
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function setArtist(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->artist = sanitizeString($value);
    }

    public function getReleaseYear(): int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int|string $releaseYear): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        if (TypeCheck::isIntOrCastable($releaseYear)) $this->releaseYear = (int)$releaseYear;
    }

    public function getMediumType(): MediumType
    {
        return $this->mediumType;
    }

    /** Set the medium type if $mediumType is usable. Otherwise, do nothing.
     * @param MediumType|string $mediumType
     */
    public function setMediumType(MediumType|string $mediumType): void
    {
        if ($mediumType instanceof MediumType) {
            // is MediumType
        } else {
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

    public function getAllMediaAsUnorderedListItemHTML(): string
    {
        $formattedMedium = "<li class='list-group-item'>";
        $formattedMedium .= $this->getTitle() . ' - ' . $this->getArtist() . ' (' . $this->getReleaseYear() . ')';
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