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
				#********** CLASS LKW **********#
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
				class Lkw extends Kfz {
					
					
					#*******************************#
					#********** ATTRIBUTE **********#
					#*******************************#
					
					/* 
						Innerhalb der Klassendefinition müssen Attribute nicht zwingend initialisiert werden.
						Ein Weglassen der Initialisierung bewirkt das gleiche, wie eine Initialisierung mit NULL.
					*/
					private $weight;
					private $axles;
					
					
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
					public function __construct( $manufacturer=NULL, $model=NULL, $weight=NULL, $axles=NULL ) {
if(DEBUG_CC)		echo "<p class='debug class'>🛠 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";						
						
						
						#********** SET PARENT ATTRIBUTES **********#
						#********** CALL PARENT CONSTRUCTOR TO SET INHERITED ATTRIBUTES **********#
						parent::__construct( $manufacturer, $model );
						
						
						// Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
						if( $weight 		!== '' AND $weight 			!== NULL )		$this->setWeight($weight);
						if( $axles 			!== '' AND $axles 			!== NULL )		$this->setAxles($axles);						
						
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
				
					#********** WEIGHT **********#
					public function getWeight():NULL|float {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return $this->weight;
					}
					public function setWeight(float|string $value):void {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						
						/*
							SONDERFALL NUMBER:
							Da wir aus Formularen und anderen Usereingaben alle Werte immer
							als Datentyp String erhalten, macht eine Prüfung auf einen konkreten
							numerischen Datentyp in PHP nur selten Sinn.
							
							Anstatt mittels is_float() direkt auf den Datentyp Float zu prüfen,
							ist es besser, einen empfangenen String auf sein inhaltliches Format 
							zu prüfen: Ist der String numerisch und entspricht sein Wert einem Float?
						*/
						/*
							Die Funktion filter_var() kann mittels eines regulären Ausdrucks, der über
							eine Konstante gesteuert wird, auch einen String auf den Inhalt 'Integer' oder
							'Float' überprüfen.
						*/
						#********** VALIDATE DATA FORMAT **********#
						if( filter_var($value, FILTER_VALIDATE_FLOAT) === false ) {
							// Fehlerfall (nicht erlaubter Datentyp)
if(DEBUG_C)				echo "<p class='debug class err'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): Der Wert muss inhaltlich einem Float entsprechen! (<i>" . basename(__FILE__) . "</i>)</p>\n";
							
						} else {
							// Erfolgsfall
							// Umwandeln in einen echten Float
							// Variante 1. Direktes Type Casting bzw. Type Juggling
							$this->weight = (float) $value;
							// Variante 2. PHP-Funktion zum Type Casting
							$this->weight = floatval($value);
							
if(DEBUG_C)				echo "<p class='debug class'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): Datentyp: " . gettype($this->getWeight()) . " (<i>" . basename(__FILE__) . "</i>)</p>\n";
						}	
					}
					
					
					#********** AXLES **********#
					public function getAxles():NULL|int {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return $this->axles;
					}
					public function setAxles(int|string $value):void {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						
						/*
							SONDERFALL NUMBER:
							Da wir aus Formularen und anderen Usereingaben alle Werte immer
							als Datentyp String erhalten, macht eine Prüfung auf einen konkreten
							numerischen Datentyp in PHP nur selten Sinn.
							
							Anstatt mittels is_int() direkt auf den Datentyp Integer zu prüfen,
							ist es besser, einen empfangenen String auf sein inhaltliches Format 
							zu prüfen: Ist der String numerisch und entspricht sein Wert einem Integer?
						*/
						/*
							Die Funktion filter_var() kann mittels eines regulären Ausdrucks, der über
							eine Konstante gesteuert wird, auch einen String auf den Inhalt 'Integer' oder
							'Float' überprüfen.
						*/
						#********** VALIDATE DATA FORMAT **********#
						if( filter_var($value, FILTER_VALIDATE_INT) === false ) {
							// Fehlerfall (nicht erlaubter Datentyp)
if(DEBUG_C)				echo "<p class='debug class err'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): Der Wert muss inhaltlich einem Integer entsprechen! (<i>" . basename(__FILE__) . "</i>)</p>\n";
							
						} else {
							// Erfolgsfall
							// Umwandeln in einen echten Float
							// Variante 1. Direktes Type Casting bzw. Type Juggling
							$this->axles = (int) $value;
							// Variante 2. PHP-Funktion zum Type Casting
							$this->axles = intval($value);
							
if(DEBUG_C)				echo "<p class='debug class'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): Datentyp: " . gettype($this->getAxles()) . " (<i>" . basename(__FILE__) . "</i>)</p>\n";
						}	
					}
					
					
					#***********************************************************#
					

					#******************************#
					#********** METHODEN **********#
					#******************************#

					public function honk() {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return '<i><b>*HOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONK*</b></i>';
					}

					
					#***********************************************************#
					
				}
				
				
#*******************************************************************************************#
?>


















