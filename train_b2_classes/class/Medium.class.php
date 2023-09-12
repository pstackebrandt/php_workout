<?php
declare(strict_types=1);
namespace train_b2_classes;
class Medium
{
    private ?string $title;
    private ?string $artist;
    private ?int $releaseYear;
    private ?MediumType $mediumType;

    public function __construct(
        string $title = null,
        string $artist = null,
        int $releaseYear = null,
        MediumType $mediumType = null
    ) {
        $this->title = $title;
        $this->artist = $artist;
        $this->releaseYear = $releaseYear;
        $this->mediumType = $mediumType;
    }

    //  ****************************************
    //          SETTER & GETTER
    //  ****************************************

    //          TITLE
    // ****************************
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    //          ARTIST
    // ****************************

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }

    //          RELEASE YEAR
    // ****************************

    public function getReleaseYear(): int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int $releaseYear): void
    {
        $this->releaseYear = $releaseYear;
    }

    //          MEDIUM TYPE
    // ****************************


    public function getMediumType(): MediumType
    {
        return $this->mediumType;
    }

    public function setMediumType(MediumType $mediumType): void
    {
        $this->mediumType = $mediumType;
    }

    public function getAllMediumsAsUnorderedListItemHTML(): string
    {
        $formattedMedium = "<li class='list-group-item'>";
        $formattedMedium .= $this->getTitle() . ' - '  . $this->getArtist()  . ' (' . $this->getReleaseYear() . ')';
        $formattedMedium .= '</li>';

        return $formattedMedium;
    }
}

enum MediumType: string
{
    case DVD = "DVD";
    case BLUE_RAY = "Blue-ray";
    case CD = "CD";
    case LP = "LP";

    case MC = "MC";

    case BOOK = "Buch";
}
