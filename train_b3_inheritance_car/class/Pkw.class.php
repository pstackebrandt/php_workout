<?php
#*******************************************************************************************#
				
				
				#******************************************#
				#********** ENABLE STRICT TYPING **********#
				#******************************************#
				
				/*
					Erklärung zu 'strict types' in Projekt '01a_klassen_und_instanzen'
				*/
				declare(strict_types=1);
namespace train_b3_p1_classes;
				
#*******************************************************************************************#


				#*******************************#
				#********** CLASS PKW **********#
				#*******************************#

				
#*******************************************************************************************#

				
				/*
					Die Kindklasse erbt mittels des Schlüsselwortes 'extends' von der Elternklasse alle 
					dort als 'protected' oder 'public' notierten Attribute und Methoden.
					
					Die solcherart geerbten Attribute und Methode können in der Kindklasse überschrieben
					werden, d.h. dass die Kindmethoden anders aussehen können, als die Elternmethoden.
					Außerdem kann die Elternklasse über die Kindklasse um weitere Attribute und Methoden
					erweitert werden, weshalb der englische Begriff 'extends' eigentlich genauer ist, als
					das eingedeutschte 'Vererbung'.
				*/
				class Pkw extends Kfz {
					
					#*******************************#
					#********** ATTRIBUTE **********#
					#*******************************#
					
					/* 
						Innerhalb der Klassendefinition müssen Attribute nicht zwingend initialisiert werden.
						Ein Weglassen der Initialisierung bewirkt das gleiche, wie eine Initialisierung mit NULL.
					*/
					private $chassis;
					
					
					#***********************************************************#
					
					
					#*********************************#
					#********** CONSTRUCTOR **********#
					#*********************************#
					
					/*
						Der Constructor ist eine besondere Methode in einer Klasse, 
						die automatisch aufgerufen wird, wenn ein neues Objekt dieser 
						Klasse erstellt wird. Der Zweck des Constructors besteht darin, 
						dem Objekt einen initialen Zustand zu geben und die notwendigen 
						Vorbereitungen für seine Verwendung zu treffen.
						
						Soll ein Objekt beim Erstellen bereits mit Attributwerten versehen werden,
						muss ein eigener Constructor geschrieben werden. Dieser nimmt die 
						Startwerte in Form von Parametern entgegen (genau wie bei Funktionen) 
						und ruft bei Verwendung des Getter & Setter Design Patterns seinerseits 
						die entsprechenden SETTER auf, die die Werte anschließend in die 
						jeweiligen Objektattribute schreiben.
					*/
					public function __construct( $manufacturer=NULL, $model=NULL, $chassis=NULL ) {
if(DEBUG_CC)		echo "<p class='debug class'>🛠 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";						
						
						
						#********** SET PARENT ATTRIBUTES **********#
						#********** CALL PARENT CONSTRUCTOR TO SET INHERITED ATTRIBUTES **********#
						parent::__construct( $manufacturer, $model );
						
						
						// Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
						if( $chassis 	!== '' AND $chassis 	!== NULL )		$this->setChassis($chassis);						
						
if(DEBUG_CC)		echo "<pre class='debug class value'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";					
if(DEBUG_CC)		print_r($this);					
if(DEBUG_CC)		echo "</pre>";	
					}
					

					#********** DESTRUCTOR **********#
					/*
						Der Destructor ist eine magische Methode und wird automatisch aufgerufen,
						sobald ein Objekt mittels unset() gelöscht wird, oder sobald das Skript beendet ist.
						Der Destructor gibt den vom gelöschten Objekt belegten Speicherplatz wieder frei.
					*/
					
					
					#***********************************************************#

					
					#*************************************#
					#********** GETTER & SETTER **********#
					#*************************************#
				
					#********** CHASSIS **********#
					public function getChassis():NULL|string {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return $this->chassis;
					}
					public function setChassis(string $value):void {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						$this->chassis = sanitizeString($value);
					}
										
					
					#***********************************************************#
					

					#******************************#
					#********** METHODEN **********#
					#******************************#

					public function honk() {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return '<i><b>*MeepMeep*</b></i>';
					}

					
					#***********************************************************#
					
				}
				
				
#*******************************************************************************************#
?>


















