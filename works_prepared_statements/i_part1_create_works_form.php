<?php

declare(strict_types=1);

require_once '../utility/print_helper.php';

require_once('./include/config.inc.php');
require_once('./include/db.inc.php');
require_once('./include/form.inc.php');

?>
<!doctype html>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>works</title>

   <link rel="stylesheet" href="./css/main.css">
   <link rel="stylesheet" href="./css/debug.css">
   <link rel="stylesheet" href="./css/project_specific.css">
</head>

<body>
   <h1>Create works page with form</h1>

   <?php

   ?>

   <h2>Werke-Erfassung</h>

   <br>

   <form action="" method="POST">
      <input type="hidden" name="worksForm">
      <br>

      <label>Autor</label><br>
      <input type="text" name="author" value="Peter"><br>
      <br>

      <label>Titel</label><br>
      <input type="text" name="title" value="Wilde Geschichten"><br>
      <br>

      <label>Preis</label><br>
      <input type="text" name="price" value="29.95"><br>
      <br>

      <input type="submit" value="Werk speichern">
   </form>
</body>

</html>