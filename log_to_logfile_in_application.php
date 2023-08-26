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
   // use strict type declaration

   function logMessage(string $message, string $file): void
   {
      $logEntry = formatLogEntry($message, $file);
      saveLogEntry($logEntry);
   }

   function logException(Exception $exception, string $file): void
   {
      $message = $exception->getMessage();
      $logEntry = formatLogEntry($message, $file);
      saveLogEntry($logEntry);
   }

   function formatLogEntry(string $message, string $file): string
   {
      return "<p>"
         . date('Y-m-d | H:i:s') . " | "
         . "File: <i>'" . $file . "'</i> | "
         . "<b>$message</b>"
         . "</p>\n";
   }

   function saveLogEntry(string $logEntry): void
   {
      file_put_contents('./logfiles/errorLog.html', $logEntry, FILE_APPEND);
   }

   // Ordner erzeugen
   @mkdir('./logfiles');


   echo "<h1>Log to html logfile</h1>\n";

   // Log exception
   $e = new Exception('Could not connect to the starship enterprise');
   logException($e, basename(__FILE__));

   // Log message
   logMessage('Test log. Logged a message.', basename(__FILE__));

   ?>

</body>

<h3>Error Log:</h3>

<?php include('./logfiles/errorLog.html') ?>

</html>