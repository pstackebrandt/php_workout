<?php

namespace train_b4_insert_media;

#			    #*************************************#
#			    #********** INTERFACE Medium ***********#
#			    #*************************************#

interface MediumInterface
{

#               #*********************************#
#               #********** CONSTRUCTOR **********#
#               #*********************************#    
public function __construct(null|string $title = null,
                                null|string $artist = null,
                            null|int|string $releaseYear = null,
                     null|MediumType|string $mediumType = null,
                          null|float|string $price = null,
                            null|int|string $id = null);

#				#********** DESTRUCTOR **********#	    
    public function __destruct();


#				#*************************************#
#				#********** GETTER & SETTER **********#
#				#*************************************#    
    public function getTitle(): string|null;

    public function setTitle(string $value): void;

    public function getArtist(): string|null;

    public function setArtist(string $value): void;

    public function getReleaseYear(): int|null;

    public function setReleaseYear(int|string $releaseYear): void;

    public function getMediumType(): MediumType|null;

    /** Set the medium type if $mediumType is usable. Otherwise, do nothing.
     * @param MediumType|string $mediumType
     */
    public function setMediumType(MediumType|string $mediumType): void;

    public function getPrice(): float|null;

    public function setPrice(float|string $value): void;

    public function getId(): ?int;

    public function setId(int|string $id): void;


#					#******************************#
#					#********** Methods **********#
#					#******************************#    
    public function getAllMediaAsUnorderedListItemHTML(): string;
}