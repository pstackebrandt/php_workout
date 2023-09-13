<?php
declare(strict_types=1);
namespace train_b3_p1_classes;

class Lkw extends Kfz
{
    /* 	Lkw: expected attributes
     *  -------------------------
       	#gewicht : int
		#achsen : int
		#kabine : String
		+getGewicht() : NULL | int
		+setGewicht($value : int |String) : void
		+getAchsen() : NULL | int
		+setAchsen($value : int | String) : void
		+getKabine() : NULL | String
		+setKabine($value : String) : void
		+construct($motor=new Motor(), $gewicht=NULL, $achsen=NULL, $kabine=NULL)
     */

    #*******************************#
    #********** ATTRIBUTE **********#
    #*******************************#

    protected ?int $gewicht;
    protected ?int $achsen;
    protected ?string $kabine;

    #*********************************#
    #********** CONSTRUCTOR **********#
    #*********************************#

    public function __construct($motor = null, $gewicht = NULL, $achsen = NULL, $kabine = NULL)
    {
        if (DEBUG_CC) echo "<p class='debug class'>🛠 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";


        #********** SET PARENT ATTRIBUTES **********#
        #********** CALL PARENT CONSTRUCTOR TO SET INHERITED ATTRIBUTES **********#
        parent::__construct($motor);

        // Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
        if ($gewicht !== '' and $gewicht !== NULL) $this->setGewicht($gewicht);
        if ($achsen !== '' and $achsen !== NULL) $this->setAchsen($achsen);
        if ($kabine !== '' and $kabine !== NULL) $this->setKabine($kabine);

        if (DEBUG_CC) echo "<pre class='debug class value'><b>Line " . __LINE__ . "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if (DEBUG_CC) print_r($this);
        if (DEBUG_CC) echo "</pre>";
    }


    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    #********** Gewicht **********#
    public function getGewicht(): null|int
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->gewicht;
    }

    public function setGewicht(int $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->gewicht = $value;
    }


    #********** Achsen **********#
    public function getAchsen(): null|int
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->achsen;
    }

    public function setAchsen(int $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->achsen = $value;
    }

    #********** Kabine **********#
    public function getKabine(): null|string
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->kabine;
    }

    public function setKabine(string $value): void
    {
        if (DEBUG_C) echo "<p class='debug class'>🌀 <b>Line " . __LINE__ . "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->kabine = $value;
    }


    #******************************#
    #********** METHODEN **********#
    #******************************#

}



















