<?php
declare(strict_types=1);
namespace train_b3_p1_classes;

use php_workout\utility\TypeCheck;
require_once('../include/config.inc.php');
require_once '../../utility/TypeCheck.php';

class Transporter extends Lkw
{
    /* 	Transporter: expected attributes
        --------------------------------
        -aufbau : String
        +construct($motor=new Motor(), $gewicht=NULL, $achsen=NULL, $kabine=NULL, $aufbau=NULL)
        +getAufbau() : NULL | String
        +setAufbau($value : String) : void
    */

    #*******************************#
    #********** ATTRIBUTE **********#
    #*******************************#

    private ?string $aufbau;

    #*********************************#
    #********** CONSTRUCTOR **********#
    #*********************************#

    public function __construct($motor = null, $gewicht = NULL, $achsen = NULL, $kabine = NULL, $aufbau = NULL)
    {
        if (DEBUG_CC) echo "<p class='debug class'>🛠 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";

        // call parent
        parent::__construct($motor, $gewicht, $achsen, $kabine);

        if (TypeCheck::isNotNullOrEmpty($aufbau)) $this->setAufbau($aufbau);

        if (DEBUG_CC) echo "<pre class='debug class value'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_CC) print_r($this);
        if (DEBUG_CC) echo "</pre>";
    }

    public function __destruct()
    {
        if (DEBUG_CC) echo "<p class='debug class'>☠️  <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";
    }

    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    #********** Bauform **********#
    public function getAufbau(): null|string
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->aufbau;
    }

    public function setAufbau(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->aufbau = sanitizeString($value);
    }

    #******************************#
    #********** METHODEN **********#
    #******************************#
}
