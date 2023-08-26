<?php

declare(strict_types=1); ?>
<!doctype html>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>workout</title>
</head>

<body>
   <h1>Workout</h1>

   <?php
   echo "<h1>Log to logfile</h1>\n";
   
   // Bestimmen Sie den Pfad zu Ihrem Log-File im Anwendungsordner
   $logFile = __DIR__ . '/mein-logfile.log';

   $e = new Exception('Test Exception');
   
   // Verwenden Sie error_log(), um in die spezifizierte Datei zu schreiben
   error_log("Database Error: " . $e->getMessage(), 3, $logFile);
   ?>

</body>

</html>