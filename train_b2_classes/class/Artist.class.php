<?php
declare(strict_types=1);

namespace train_b2_classes;

enum ArtistRole: string
{
    case AUTHOR = "Autor";
    case COMPOSER = "Komponist";
    case DIRECTOR = "Regisseur";
    case INTERPRET = "Interpret";
    case BAND = "Band";
}

class Artist
{
    private ?string $firstName;
    private ?string $lastName;
    private ?string $role;


    public function __construct(
        string $firstName = null,
        string $lastName = null,
        string $role = null,
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
    }

    //  ****************************************
    //          SETTER & GETTER
    //  ****************************************

    //          FirstName
    // ****************************
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }


    //          LastName
    // ****************************
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    //          ROLE
    // ****************************
    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): void
    {
        $this->role = $role;
    }


    //  ****************************************
    //          METHODS & FUNCTIONS
    //  ****************************************

    // get full name
    public function getFullName(): string
    {
        // return only last name if first name is empty or null
        // return "Name unbekannt" if first name and last name are empty or null

        if (empty($this->firstName)) {
            if (empty($this->lastName)) {
                return "Name unbekannt";
            } else {
                return $this->lastName;
            }
        } else {
            if (empty($this->lastName)) {
                return $this->firstName;
            } else {
                return $this->firstName . " " . $this->lastName;
            }
        }
    }

}

