<?php
/* This file contains information for files which will be used by different train_xxx folders
 (train projects). Those files don't reside within the task folders and can't use the
 config.inc.php file from the task folders.
 */

#********** DEBUGGING **********#
define('DEBUG', true);                // Debugging for main document
// define('DEBUG', 				false);				// Debugging for main document
define('DEBUG_V', true);                // Debugging for values
// define('DEBUG_V', 			false);				// Debugging for values
define('DEBUG_F', true);                // Debugging for functions
// define('DEBUG_F', 			false);				// Debugging for functions
define('DEBUG_DB', true);                // Debugging for DB operations
// define('DEBUG_DB', 			false);				// Debugging for DB operations
define('DEBUG_C', true);                // Debugging for classes

define('DEBUG_CC', true);                // Debugging for constructor & destructor

