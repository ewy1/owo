<?php
$config = require("./config.php");
if (!file_exists($config->pastePath))
  mkdir($config->pastePath);

$target = $_SERVER["REQUEST_URI"];

$isNew = ($target === "/");


if ($target === "/")
  $target = "/example";

$path = $config->pastePath . substr($target, 1);
$contents = file_get_contents($path);
if (file_exists($path . ".filename"))
  $title = file_get_contents($path . ".filename");
else
  $title = false;

$selfdestruct = file_exists($path . ".selfdestruct");
?>
<!doctype html>
<html lang="">
<head>
  <link rel="icon" href="data:,">
  <meta charset="utf-8">
  <title><?=$title ?></title>
  <meta name="description"
        content="<?= $selfdestruct ? "Protected; open in browser to view." : htmlentities(substr($contents, 0, 100)) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">
  <link rel="stylesheet" href="/style.css"/>
  <script type="module" src="/owo.bundle.js"></script>
</head>
<body>
<?php
if ($selfdestruct && $_SERVER['REQUEST_METHOD'] !== 'POST') { ?>
  <main>
    <h1>This paste is protected and can only be viewed once. It will be permanently deleted the moment you decide to
      view it.</h1>
    <form method="post">
      <input type="submit" value="View"/>
    </form>
  </main>
<?php } else { ?>
  <textarea id="value" style="display: none;"><?= $contents ?></textarea>
  <header>
    <div></div>
    <input <?=$selfdestruct ? "disabled" : "" ?>
           id="filename" placeholder="filename" type="text" value="<?= $title ?: $config->defaultTitle ?>"/>
    <?php if (!$selfdestruct) { ?>
      <a title="This post will self destruct once viewed.">
        <input class="selfdestruct-toggle" type="checkbox"
               name="selfdestruct"></a>
      <button id="save"><?= $isNew ? "Save" : "Update" ?></button>
    <?php } ?>
  </header>
  <noscript>
    <pre id="raw" contenteditable="true"><?= htmlentities($contents) ?></pre>
  </noscript>
<?php } ?>
</body>
</html>

<?php if ($selfdestruct && $_SERVER['REQUEST_METHOD'] === 'POST') {
  unlink($path);
  unlink($path . ".selfdestruct");
  unlink($path . ".filename");
} ?>
