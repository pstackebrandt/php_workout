<?php

declare(strict_types=1);
namespace train_b3_p1_classes;

#*******************************************************************************************#

abstract class Kfz
{

    #*******************************#
    #********** ATTRIBUTE **********#
    #*******************************#

    protected Motor $motor;

    #*********************************#
    #********** CONSTRUCTOR **********#
    #*********************************#

    public function __construct($kabine = NULL)
    {
        if (DEBUG_CC) echo "<p class='debug class'>🛠 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";

        // Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
        if ($kabine !== '' and $kabine !== NULL) $this->setMotor($kabine);

        if (DEBUG_CC) echo "<pre class='debug class value'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_CC) print_r($this);
        if (DEBUG_CC) echo "</pre>";
    }

    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    #********** Motor **********#
    public function getMotor(): Motor
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->motor;
    }

    public function setMotor(Motor $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->motor = $value;
    }

    #******************************#
    #********** METHODEN **********#
    #******************************#


    #********** GENERATE DATA SHEET **********#
    public function getDataSheet() : string
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        $dataSheet = '<dataSheet>';

        // Klassennamen der aufrufenden Instanz auslesen
        $dataSheet .= "<b>Fahrzeug:</b> <i>" . get_class($this) . "</i><br>";

        // Elternattribute auslesen
        $dataSheet .= "<b>Motor:</b> <i>{$this->getMotor()}</i><br>";

        // Kinderattribute auslesen

        #********** CHILD PKW **********#
        // Variante 1: Auslesen des Klassennamens als String
        if ($this instanceof Pkw) {
            $dataSheet .= "<b>Karosserie:</b> <i> {$this->getKarosserie()} </i><br>";
        }

        /*
                 #********** CHILD LKW **********#
                 // Variante 2: Klassenvergleichsoperator
                 if ($this instanceof Lkw) {
                     $dataSheet .= "<b>Gesamtgewicht:</b> <i>{$this->getWeight()}t</i><br>";
                     $dataSheet .= "<b>Anzahl der Achsen:</b> <i>{$this->getAxles()}</i><br>";
                 }
        */

        $dataSheet .= '</dataSheet>';

        return $dataSheet;
    }
}




















