# owo - an easy way to share text
![example landing page](https://files.catbox.moe/pvrul3.png)
## Features
 - Upload through website or through the command line
 - Destructible pastes
 - Rich embeds
 - Simple file based backend
 - No overhead
 - Immutable pastes but still easily edit- and savable.
 - Noscript compatible (excluding editing)
 - Syntax highlighting
   - currently only for js/ts

## Requirements
 - PHP 7.4+
 - Some kind of nodejs
 - NGINX

## Setup
1. Clone repository into your webhost
2. `cp config.default.php config.php` and edit the configuration
3. Ensure your configured directories exist
4. Fill text file `$pasteDir/raw/example` with your home page text - my default is a shell script to submit a paste
5. `npm install` to install the js dependencies
6. `rollup --config ./rollup.config.js` to bundle the js
7. Add NGINX configuration:
    - Static files must be served normally (/, /new, /raw, /owo.js, /style.css, favicon, etc.)
    - Redirect all other /* calls to index.php

## Powered by
- Codemirror
- NGINX
- PHP
