<?php

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


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }

    public function getReleaseYear(): int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int $releaseYear): void
    {
        $this->releaseYear = $releaseYear;
    }

    public function getMediumType(): MediumType
    {
        return $this->mediumType;
    }

    public function setMediumType(MediumType $mediumType): void
    {
        $this->mediumType = $mediumType;
    }
}

enum MediumType: string
{
    case DVD = "DVD";
    case BLURAY = "Blu-ray";
    case CD = "CD";
    case LP = "LP";
}
