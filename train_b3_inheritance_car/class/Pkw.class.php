<?php

declare(strict_types=1);
namespace train_b3_p1_classes;

class Pkw extends Kfz
{
    /*
     * Expected content of Pkw
     * -karosserie : Karosserie
     * +construct($motor=NULL, $karosserie=NULL)
     * +getKarosserie() : Karosserie
     * +setKarosserie($value : Karosserie) : void
     */

    #*******************************#
    #********** ATTRIBUTE **********#
    #*******************************#

    private $karosserie;


    #***********************************************************#


    #*********************************#
    #********** CONSTRUCTOR **********#
    #*********************************#

    public function __construct($kabine = NULL, $karosserie = NULL)
    {
        if (DEBUG_CC) echo "<p class='debug class'>🛠 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";

        #********** SET PARENT ATTRIBUTES **********#
        parent::__construct($kabine);

        // Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
        if ($karosserie !== '' and $karosserie !== NULL) $this->setKarosserie($karosserie);

        if (DEBUG_CC) echo "<pre class='debug class value'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_CC) print_r($this);
        if (DEBUG_CC) echo "</pre>";
    }

    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    #********** Karosserie **********#
    public function getKarosserie(): null|string
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->karosserie;
    }

    public function setKarosserie(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->karosserie = sanitizeString($value);
    }


    #******************************#
    #********** METHODEN **********#
    #******************************#

}

?>


















