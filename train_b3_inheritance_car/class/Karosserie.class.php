<?php

declare(strict_types=1);

namespace train_b3_p1_classes;

use php_workout\utility\TypeCheck;

class Karosserie
{
    /*
     * Karosserie - expected structure
        -bauform : String
        -tueren : int
        -sitzplaetze : int
        +contruct($bauform = NULL, $tueren=NULL, $sitzplaetze=NULL)
        +getBauform() : NULL | String
        +setBauform($value : String) : void
        +getTueren() :NULL | int
        +setTueren($value : int | String) : void
        +getSitzplaetze() : NULL | int
        +setSitzplaetze($value : int | String) : void
     */

    #*******************************#
    #********** ATTRIBUTE **********#
    #*******************************#

    private ?string $bauform;
    private ?int $tueren;
    private ?int $sitzplaetze;


    #*********************************#
    #********** CONSTRUCTOR **********#
    #*********************************#

    public function __construct($bauform = NULL, $tueren = NULL, $sitzplaetze = NULL)
    {
        if (DEBUG_CC) echo "<p class='debug class'>🛠 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";

        // Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
        if ($bauform !== '' and $bauform !== NULL) $this->setBauform($bauform);
        if ($tueren !== '' and $tueren !== NULL) $this->setTueren($tueren);
        if ($sitzplaetze !== '' and $sitzplaetze !== NULL) $this->setSitzplaetze($sitzplaetze);

        if (DEBUG_CC) echo "<pre class='debug class value'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_CC) print_r($this);
        if (DEBUG_CC) echo "</pre>";
    }

    public function __destruct()
    {
        if (DEBUG_CC) echo "<p class='debug class'>☠️  <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";
    }


    #***********************************************************#


    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    #********** Bauform **********#
    public function getBauform(): null|string
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->bauform;
    }

    public function setBauform(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->bauform = sanitizeString($value);
    }

    #********** Tueren **********#
    public function getTueren(): null|int
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->tueren;
    }

    public function setTueren(int|string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        if (TypeCheck::isIntOrCastable($value)) $this->tueren = (int)$value;
    }

    #********** Sitzplaetze **********#
    public function getSitzplaetze(): null|int
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->sitzplaetze;
    }

    public function setSitzplaetze(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        if (TypeCheck::isIntOrCastable($value)) $this->sitzplaetze = (int)$value;
    }


    #******************************#
    #********** METHODEN **********#
    #******************************#



}


?>


















