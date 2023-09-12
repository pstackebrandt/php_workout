<?php
declare(strict_types=1);
namespace train_b2_classes;
class Medium
{
    private ?string $title;
    private ?Artist $artist;
    private ?int $releaseYear;
    private ?MediumType $mediumType;
    private ?string $price;


    /** Create a new medium
     * @param string|null $title
     * @param Artist|null $artist
     * @param int|null $releaseYear
     * @param MediumType|null $mediumType
     * @param string|null $price
     */
    public function __construct(
        string $title = null,
        Artist $artist = null,
        int $releaseYear = null,
        MediumType $mediumType = null,
        string $price = null
    ) {
        $this->title = $title;
        $this->artist = $artist;
        $this->releaseYear = $releaseYear;
        $this->mediumType = $mediumType;
        $this->price = $price;
    }

    //  ****************************************
    //          SETTER & GETTER
    //  ****************************************

    //          TITLE
    // ****************************
    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    //          ARTIST
    // ****************************

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist  $artist): void
    {
        $this->artist = $artist;
    }

    //          RELEASE YEAR
    // ****************************

    public function getReleaseYear(): ?int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(?int $releaseYear): void
    {
        $this->releaseYear = $releaseYear;
    }

    //          MEDIUM TYPE
    // ****************************

    public function getMediumType(): MediumType
    {
        return $this->mediumType;
    }

    public function setMediumType(?MediumType $mediumType): void
    {
        $this->mediumType = $mediumType;
    }

    //         PRICE
    // ****************************

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }


    public function getAllMedia_asUnorderedListItemHTML(): string
    {
        $formattedMedium = "<li class='list-group-item'>";
        $formattedMedium .= $this->getTitle() . ' - '  . $this->getArtist()->getFullName()  . ' (' . $this->getReleaseYear() . ')';
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

