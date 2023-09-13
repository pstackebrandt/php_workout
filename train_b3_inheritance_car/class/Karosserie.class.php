<?php

declare(strict_types=1);

namespace train_b3_p1_classes;

class Karosserie
{

    #*******************************#
    #********** ATTRIBUTE **********#
    #*******************************#

    private $bauform;
    private $tueren;
    private $sitzplaetze;

    #***********************************************************#

    #*********************************#
    #********** CONSTRUCTOR **********#
    #*********************************#

    public function __construct($hubraum = NULL, $zylinder = NULL, $leistung = NULL)
    {
        if (DEBUG_CC) echo "<p class='debug class'>🛠 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";

        // Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
        if ($hubraum !== '' and $hubraum !== NULL) $this->setBauform($hubraum);
        if ($zylinder !== '' and $zylinder !== NULL) $this->setTueren($zylinder);
        if ($leistung !== '' and $leistung !== NULL) $this->setSitzplaetze($leistung);

        if(DEBUG_CC)		echo "<pre class='debug class value'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if(DEBUG_CC)		print_r($this);
        if(DEBUG_CC)		echo "</pre>";
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
    public function getTueren(): null|string
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->tueren;
    }

    public function setTueren(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->tueren = sanitizeString($value);
    }

    #********** Sitzplaetze **********#
    public function getSitzplaetze(): null|string
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->sitzplaetze;
    }

    public function setSitzplaetze(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->sitzplaetze = sanitizeString($value);
    }


    #******************************#
    #********** METHODEN **********#
    #******************************#


}


?>


















