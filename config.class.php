<?php
class Config {

  /**
   * @var string Fully qualified domain name (or IP) of the webserver with protocol and trialing slash.
   */
  public string $host = "https://localhost/";

  /**
   * @var string Path where the raw files will be stored, with trailing path separator.
   */
  public string $pastePath = "/var/www/owo";

  /**
   * @var string The default title of a paste and the tab.
   */
  public string $defaultTitle = "owo *notices ur pasting*";
}
