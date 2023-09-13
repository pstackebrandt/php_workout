<?php
#*******************************************************************************************#
				
				
				#******************************************#
				#********** ENABLE STRICT TYPING **********#
				#******************************************#
				
				/*
					Erklärung zu 'strict types' in Projekt '01a_klassen_und_instanzen'
				*/
				declare(strict_types=1);
				
				
#*******************************************************************************************#


				#*******************************#
				#********** CLASS KFZ **********#
				#*******************************#

				
#*******************************************************************************************#

				
				/*
					Wenn aus einer Elternklasse KEINE Instanz erzeugt werden darf, etwa weil einem Objekt der Elternklasse
					lebenswichtige Attribute der Kinder fehlen würden, kann man die Klasse mit dem Zusatz 'abstract' vor 
					dem Schlüsselwort 'Class' für die Instanziierung sperren.
				*/
				abstract class Kfz {
					
					#*******************************#
					#********** ATTRIBUTE **********#
					#*******************************#
					
					/* 
						Innerhalb der Klassendefinition müssen Attribute nicht zwingend initialisiert werden.
						Ein Weglassen der Initialisierung bewirkt das gleiche, wie eine Initialisierung mit NULL.
					*/
					protected $manufacturer;
					protected $model;
					
					
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
					public function __construct( $manufacturer=NULL, $model=NULL ) {
if(DEBUG_CC)		echo "<p class='debug class'>🛠 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";						
						
						// Setter nur aufrufen, wenn der jeweilige Parameter keinen Leerstring und nicht NULL enthält
						if( $manufacturer 	!== '' AND $manufacturer 	!== NULL )		$this->setManufacturer($manufacturer);
						if( $model 				!== '' AND $model 			!== NULL )		$this->setModel($model);
/*						
if(DEBUG_CC)		echo "<pre class='debug class value'><b>Line " . __LINE__ .  "</b> | " . __METHOD__ . "(): <i>(" . basename(__FILE__) . ")</i>:<br>\n";					
if(DEBUG_CC)		print_r($this);					
if(DEBUG_CC)		echo "</pre>";
*/
					}
					
					
					#********** DESTRUCTOR **********#
					/*
						Der Destructor ist eine magische Methode und wird automatisch aufgerufen,
						sobald ein Objekt mittels unset() gelöscht wird, oder sobald das Skript beendet ist.
						Der Destructor gibt den vom gelöschten Objekt belegten Speicherplatz wieder frei.
					*/
					public function __destruct() {
if(DEBUG_CC)		echo "<p class='debug class'>☠️  <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "()  (<i>" . basename(__FILE__) . "</i>)</p>\n";						
					}
					
					
					#***********************************************************#

					
					#*************************************#
					#********** GETTER & SETTER **********#
					#*************************************#
				
					#********** MANUFACTURER **********#
					public function getManufacturer():NULL|string {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return $this->manufacturer;
					}
					public function setManufacturer(string $value):void {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						$this->manufacturer = sanitizeString($value);
					}
					
					
					#********** MODEL **********#
					public function getModel():NULL|string {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return $this->model;
					}
					public function setModel(string $value):void {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						$this->model = sanitizeString($value);
					}
										
					
					#***********************************************************#
					

					#******************************#
					#********** METHODEN **********#
					#******************************#
					
					
					#********** HONK **********#
					/*
					public function honk() {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						return '<i><b>*HONK*</b></i>';
					}
					*/
					
					/*
						An dieser Stelle wird eine abstrakte Methode mit dem Namen honk() deklariert.
						Sie erhält keinen Methodenrumpf.
						Abstrakte Methoden müssen von den erbenden Kinderklassen zwingend implementiert 
						und dort ausgearbeitet (also mit einem Methodenrumpf versehen) werden.
						
						Abstrakte Methoden können ausschließlich innerhalb abstrakter Klassen deklariert werden.
					*/
					abstract public function honk();

					
					#***********************************************************#
					
					
					#********** GENERATE DATA SHEET **********#
					public function generateDataSheet() {
if(DEBUG_C)			echo "<p class='debug class'>🌀 <b>Line " . __LINE__ .  "</b>: Aufruf " . __METHOD__ . "() (<i>" . basename(__FILE__) . "</i>)</p>\n";
						
						$dataSheet  = '<dataSheet>';
						
						// Klassennamen der aufrufenden Instanz auslesen
						$dataSheet .= "<b>Fahrzeugart:</b> <i>" . get_class($this) . "</i><br>";
						
						// Elternattribute auslesen
						$dataSheet .= "<b>Hersteller:</b> <i> {$this->getManufacturer()} </i><br>";
						$dataSheet .= "<b>Modell:</b> <i> {$this->getModel()} </i><br>";
						
						
						// Kinderattribute auslesen
						
						
						#********** CHILD PKW **********#
						// Variante 1: Auslesen des Klassennamens als String
						if( get_class($this) === 'Pkw' ) {
							$dataSheet .= "<b>Karosserieform:</b> <i>{$this->getChassis()}</i><br>";
							//$dataSheet .= "<b>Karosserieform:</b> <i>{$this->getChassis()}</i><br>";
						}
						
						
						#********** CHILD LKW **********#
						// Variante 2: Klassenvergleichsoperator
						if( $this instanceof Lkw ) {
							$dataSheet .= "<b>Gesamtgewicht:</b> <i>{$this->getWeight()}t</i><br>";
							$dataSheet .= "<b>Anzahl der Achsen:</b> <i>{$this->getAxles()}</i><br>";
						}
						

						$dataSheet .= '</dataSheet>';
						
						return $dataSheet;
					}
					
					
					#***********************************************************#
					
				}
				
				
#*******************************************************************************************#
?>


















