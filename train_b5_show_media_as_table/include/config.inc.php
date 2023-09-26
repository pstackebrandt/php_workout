<?php
#****************************************************************************************************#
				require_once(__DIR__ . '/../../config.php');
				
				#***************************************************#
				#********** GLOBALE PROJECT CONFIGURATION **********#
				#***************************************************#
				
				/*
					Konstanten werden in PHP mittels der Funktion define() oder über 
					das Schlüsselwort const (const DEBUG = true;) definiert. 
					Konstanten besitzen im Gegensatz zu Variablen kein $-Präfix
					Üblicherweise werden Konstanten komplett GROSS geschrieben.
					
					1. Verwendung von const:
					Mit dem const-Schlüsselwort können Konstanten innerhalb von Klassen definiert werden.
					Die Verwendung von const ist auf Klassenebene beschränkt und erfordert, dass die Konstante in 
					einer Klasse definiert wird.
					Konstanten, die mit const definiert werden, sind implizit öffentlich (public) und können direkt
					über den Klassennamen aufgerufen werden, ohne eine Instanz der Klasse zu erstellen.
					Beispiel: const LOGIN_TYPE = email;			$loginType = User::LOGIN_TYPE;
					
					2. Verwendung von define():
					Die Funktion define() wird außerhalb von Klassen verwendet, um Konstanten zu definieren.
					define() kann Konstanten global in jedem Bereich des Codes definieren.
					Konstanten, die mit define() definiert werden, sind standardmäßig global und können überall 
					im Code verwendet werden.
					Beispiel: define('DEBUG', true);
				*/
				
				
				#********** DATABASE CONFIGURATION **********#
				define('DB_SYSTEM',							'mysql');
				define('DB_HOST',								'localhost');
				define('DB_NAME',								'market');
				define('DB_USER',								'root');
				define('DB_PWD',								'');
				
				
				#********** EXTERNAL INPUT STRING CONFIGURATION **********#
				define('INPUT_MAX_LENGTH',	256);
				define('INPUT_MIN_LENGTH',	0);
				
				
				#********** DEBUGGING **********#
				define('DEBUG', 				true);				// Debugging for main document
				// define('DEBUG', 				false);				// Debugging for main document
				define('DEBUG_V', 			true);				// Debugging for values
				// define('DEBUG_V', 			false);				// Debugging for values
				define('DEBUG_F', 			true);				// Debugging for functions
				// define('DEBUG_F', 			false);				// Debugging for functions
				define('DEBUG_DB', 			true);				// Debugging for DB operations
				// define('DEBUG_DB', 			false);				// Debugging for DB operations
                define('DEBUG_C', 			true);				// Debugging for classes
                define('DEBUG_CC', 			true);				// Debugging for constructor & destructor

#****************************************************************************************************#