<?php
$config = require("./config.php");

$target = $_SERVER["REQUEST_URI"];

$isNew = ($target === "/");

if ($target === "/")
  $target = "/example";

$path = $config->pastePath . substr($target, 1);
$contents = file_get_contents($path);
if (file_exists($path . ".filename"))
  $title = file_get_contents($path . ".filename");
else
  $title = false
?>
<!doctype html>
<html lang="">
<head>
  <meta charset="utf-8">
  <title>owo *notices ur <?= $title ?: "pasting" ?>*</title>
  <meta name="description" content="<?=htmlentities(substr($contents, 0, 100))?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <meta name="theme-color" content="#fafafa">

  <link rel="stylesheet" href="/style.css"/>

  <script type="module" src="/owo.bundle.js"></script>
</head>
<body>
<textarea id="value" style="display: none;"><?=$contents?></textarea>
<header>
  <div></div>
  <input id="filename" placeholder="filename" type="text" value="<?= $title ?: "owo *notices ur pasting*" ?>"/>
  <button id="save"><?= $isNew ? "Save" : "Update" ?></button>
</header>
<noscript><pre id="raw" contenteditable="true"><?= htmlentities($contents) ?></pre></noscript>
</body>
</html>
