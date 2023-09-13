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

    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    #********** Motor **********#
    public function getMotor(): Motor
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->motor;
    }

    public function setMotor(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->motor = sanitizeString($value);
    }

    #******************************#
    #********** METHODEN **********#
    #******************************#



    #********** GENERATE DATA SHEET **********#
    public function getDataSheet()
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";

        $dataSheet = '<dataSheet>';

        // Klassennamen der aufrufenden Instanz auslesen
      /*  $dataSheet .= "<b>Fahrzeugart:</b> <i>" . get_class($this) . "</i><br>";

        // Elternattribute auslesen
        $dataSheet .= "<b>Hersteller:</b> <i> {$this->getMotor()} </i><br>";
        $dataSheet .= "<b>Modell:</b> <i> {$this->getModel()} </i><br>";


        // Kinderattribute auslesen


        #********** CHILD PKW **********#
        // Variante 1: Auslesen des Klassennamens als String
        if (get_class($this) === 'Pkw') {
            $dataSheet .= "<b>Karosserieform:</b> <i>{$this->getChassis()}</i><br>";
            //$dataSheet .= "<b>Karosserieform:</b> <i>{$this->getChassis()}</i><br>";
        }


        #********** CHILD LKW **********#
        // Variante 2: Klassenvergleichsoperator
        if ($this instanceof Lkw) {
            $dataSheet .= "<b>Gesamtgewicht:</b> <i>{$this->getWeight()}t</i><br>";
            $dataSheet .= "<b>Anzahl der Achsen:</b> <i>{$this->getAxles()}</i><br>";
        }*/


        $dataSheet .= '</dataSheet>';

        return $dataSheet;
    }


    #***********************************************************#

}


#*******************************************************************************************#
?>


















