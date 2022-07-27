<?php
require_once("config.class.php");
$config = new Config();

$config->host = "http://localhost/";
$config->pastePath = "/tmp/owo/";

return $config;
