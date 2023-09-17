<?php
#*******************************************************************************************#


				#**********************************************#
				#********** INTERFACE DB OPERATIONS ***********#
				#**********************************************#

				/*
					So wie eine Klasse quasi eine Blaupause für alle später aus ihr zu erstellenden Objekte/Instanzen
					darstellt, kann man ein Interface quasi als eine Blaupause für eine später zu erstellende Klasse
					ansehen.	Hierzu wird ein Interface definiert, das später in die entsprechende Klasse implementiert 
					wird. Der Sinn des Interfaces besteht darin, dass innerhalb des Interfaces sämtliche später 
					innerhalb der Klasse zu erstellende Methoden bereits vordeklariert werden.
					Die Klasse muss dann zwingend sämtliche im Interface deklarierten Methoden enthalten.
					
					Ein Interface darf keinerlei Attribute beinhalten.
					Die im Interface definierten Methoden müssen public sein und dürfen über keinen 
					Methodenrumpf {...} verfügen.
					An die Methode zu übergebende Parameter müssen im Interface vordefiniert sein ($value).
				*/

				
#*******************************************************************************************#

				
				/*
					In Anlehnung an die inoffizielle PSR-Norm der Framework-Entwickler
					werden Interfaces in PHP üblicherweise aus ihrem Namen sowie
					und dem Zusatz 'Interface' benannt: interface NameInterface {}
				*/
				interface DBOperationsInterface {
					
					/*
						Ein Interface darf keinerlei Attribute beinhalten.
					*/

					
					#***********************************************************#
					
					
					#*********************************#
					#********** CONSTRUCTOR **********#
					#*********************************#
					

					#********** DESTRUCTOR **********#

					
					#***********************************************************#
					

					#******************************#
					#********** METHODEN **********#
					#******************************#

					public function saveToDB(PDO $PDO);
					
					// public function fetchFromDB(PDO $PDO);
					
					// public static function fetchAllFromDB(PDO $PDO);
					
					// public function updateToDB(PDO $PDO);
					
					// public function deleteFromDB(PDO $PDO);

					
					#***********************************************************#
					
				}
				
				
#*******************************************************************************************#
?>


















