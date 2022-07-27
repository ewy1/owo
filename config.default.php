<?php
require_once("config.class.php");
$config = new Config();

$config->host = "https://owo.ewy.one";
$config->pastePath = "/var/www/owo/raw";

return $config;
