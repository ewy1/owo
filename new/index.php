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
    error("Failure writing to paste directory.", 500);

  echo json_encode(["target" => $config->host . $filename], JSON_UNESCAPED_SLASHES);
} else {
  error("No payload provided");
}

function error(string $message, int $httpResponseCode = 400) {
  http_response_code($httpResponseCode);
  echo json_encode(["error" => $message]);
  exit();
}
?>
