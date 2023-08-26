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
   echo "<h1>Log to html logfile</h1>\n";

   // Bestimmen Sie den Pfad zu Ihrem Log-File im Anwendungsordner
   // $logFile = __DIR__ . '/mein-logfile.log';

   $e = new Exception('Could not connect to the starship enterprise');

   // Verwenden Sie error_log(), um in die spezifizierte Datei zu schreiben
   // error_log("Database Error: " . $e->getMessage(), 3, $logFile);

   // Ordner erzeugen
   @mkdir('./logfiles');

   // $errorMessage = 'Ungültiger Login - Password falsch';
   $errorMessage = $e->getMessage();

   // Vorbereiten des Logeintrags
   $logEntry  = "<p>";
   $logEntry .= date('Y-m-d | H:i:s') . " | ";
   $logEntry .= "File: <i>'" . __FILE__ . "'</i> | ";
   $logEntry .= "<b>$errorMessage</b>";
   $logEntry .= "</p>\n";

   // Vorbereiteten LogEintrag in 'errorLog.html' speichern
   file_put_contents('./logfiles/errorLog.html', $logEntry, FILE_APPEND);
   ?>

</body>

<h3>Error Log:</h3>

<?php include('./logfiles/errorLog.html') ?>

</html>