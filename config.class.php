<?php
class Config {

  /**
   * @var string Fully qualified domain name (or IP) of the webserver with protocol and trialing slash.
   */
  public string $host;

  /**
   * @var string Path where the raw files will be stored, with trailing path separator.
   */
  public string $pastePath;
}
