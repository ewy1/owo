<?php
$config = require("../config.php");
header("Content-Type: application/json");

$json = file_get_contents('php://input');
$data = json_decode($json);

if ($payload = $data->payload) {
  $filename = hash("md5", $payload);

  if ($data->base64)
    if (!$payload = base64_decode($payload))
      error("Error decoding base64 payload");

  if (!file_put_contents($config->pastePath . $filename, $payload))
    error("Failure writing payload to paste directory.", 500);

  if ($data->filename) {
    $fileNamePath = $config->pastePath . $filename . ".filename";
    if (!file_put_contents($fileNamePath, $data->filename))
      error("Failure writing filename to paste directory.", 500);
  }

  success($config->host . $filename);

} else {
  error("No payload provided");
}

function success(string $target) {
  http_response_code(200);
  echo json_encode(["target" => $target], JSON_UNESCAPED_SLASHES);
  exit();
}

function error(string $message, int $httpResponseCode = 400) {
  http_response_code($httpResponseCode);
  echo json_encode(["error" => $message]);
  exit();
}
?>
