<?php
declare(strict_types=1);
namespace train_b2_classes;

class Artist
{
    private ?string $firstName;
    private ?string $lastName;
    private ?string $role;


    public function __construct(
        string $firstName = null,
        string $lastName = null,
        int    $role = null,
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
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }


    //          LastName
    // ****************************
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    //          ROLE
    // ****************************
    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }


    //  ****************************************
    //          METHODS & FUNCTIONS
    //  ****************************************

}

