<?php
   declare(strict_types=1);

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

   ?>