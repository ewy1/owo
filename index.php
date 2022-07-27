<?php
if ($_SERVER['REQUEST_URI'] === "/new")
  include("./new/index.php")
?>

<!doctype html>
<html lang="">
<head>
  <meta charset="utf-8">
  <title>owo *notices ur paste*</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <meta name="theme-color" content="#fafafa">

  <link rel="stylesheet" href="/style.css" />

  <script type="module" src="/owo.bundle.js"></script>
</head>
<body>
<noscript id="raw">
<pre><?php
  $config = require("./config.php");

  $target = $_SERVER["REQUEST_URI"];
  $contents = file_get_contents($config->pastePath . substr($target, 1));
  echo $contents;
?></pre>
</noscript>
</body>
</html>
