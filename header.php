<!--
  file-name: header.php
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: header of the application containing all the header information and stylesheet references.
-->

<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width" />
  <meta charset = "utf-8"/>
  <title><?= isset($PageTitle) ? $PageTitle : "Default Title"?></title>
  <link rel = "stylesheet" href = "assets/css/style.css" />
  <link rel="stylesheet" href="assets/vendors/normalize.css" />
  <link rel = "stylesheet" href = "assets/vendors/bootstrap/css/bootstrap.min.css" />
  </head>
  <body>