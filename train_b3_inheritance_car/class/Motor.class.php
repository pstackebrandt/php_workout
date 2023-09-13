<?php

#******************************************#
#********** ENABLE STRICT TYPING **********#
#******************************************#

declare(strict_types=1);


#*******************************************************************************************#


#*******************************#
#********** CLASS KFZ **********#
#*******************************#


#*******************************************************************************************#

class Motor {

    #*******************************#
    #********** ATTRIBUTE **********#
    #*******************************#

    private $hubraum;
    private $zylinder;
    private $leistung;
    protected $kraftstoff;

    #***********************************************************#

    #*********************************#
    #********** CONSTRUCTOR **********#
    #*********************************#

    public function __construct( $hubraum=NULL, $zylinder=NULL , $leistung=NULL, $kraftstoff=NULL ) {
        if(DEBUG_CC)		echo "<p class='debug class'>🛠 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";

        // Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
        if( $hubraum 		!== '' and $hubraum 		!== NULL )		$this->setHubraum($hubraum);
        if( $zylinder 		!== '' and $zylinder 		!== NULL )		$this->setZylinder($zylinder);
        if($leistung 		!== '' and $leistung 		!== NULL )		$this->setLeistung($leistung);
        if($kraftstoff 		!== '' and $kraftstoff 	    !== NULL )		$this->setKraftstoff($kraftstoff);

        /*
        if(DEBUG_CC)		echo "<pre class='debug class value'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";
        if(DEBUG_CC)		print_r($this);
        if(DEBUG_CC)		echo "</pre>";
        */
    }

    public function __destruct() {
        if(DEBUG_CC)		echo "<p class='debug class'>☠️  <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";
    }


    #***********************************************************#


    #*************************************#
    #********** GETTER & SETTER **********#
    #*************************************#

    #********** Hubraum **********#
    public function getHubraum():null|string {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->hubraum;
    }

    public function setHubraum(string $value):void {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->hubraum = sanitizeString($value);
    }

    #********** Zylinder **********#
    public function getZylinder():null|string {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->zylinder;
    }

    public function setZylinder(string $value):void {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->zylinder = sanitizeString($value);
    }

    #********** Leistung **********#
    public function getLeistung():null|string {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->leistung;
    }
    public function setLeistung(string $value):void {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->leistung = sanitizeString($value);
    }

    #********** MODEL **********#
    public function getKraftstoff():null|string {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        return $this->kraftstoff;
    }
    public function setKraftstoff(string $value):void {
        if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
        $this->kraftstoff = sanitizeString($value);
    }

    #***********************************************************#


    #******************************#
    #********** METHODEN **********#
    #******************************#

    #***********************************************************#

}


?>


















