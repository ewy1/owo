# owo - an easy way to share text
![example landing page](https://litter.catbox.moe/uohhqb.png)
## Features
 - Upload through website or through the command line
 - No reverse proxy required
 - Immutable pastes but still easily edit- and savable.
 - Javascript only required for editing
 - Syntax highlighting (currently only for js/ts)

## Upcoming features
 - Syntax highlighting for more languages
 - Simplified setup

## Requirements
 - PHP 7.4+
 - Some kind of nodejs
 - NGINX

## Setup
1. Clone repository into your webhost
2. `cp config.deafult.php config.php` and edit the configuration
3. Ensure your configured directories exist
4. Fill text file $pasteDir/raw/example with your home page text
5. `npm install` to install the js dependencies
6. `rollup --config ./rollup.config.js` to bundle the js
7. Add NGINX configuration:
    - Static files must be served normally (/, /new, /raw, /owo.js, /style.css, favicon, etc.)
    - Redirect all other /* calls to index.php

## Powered by
- Codemirror
- NGINX
- PHP
