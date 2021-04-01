<?php

// DB

$parts = parse_url($_ENV['CLEARDB_DATABASE_URL']);

define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', $parts['host']);
define('DB_USERNAME', $parts['user']);
define('DB_PASSWORD', $parts['pass']);
define('DB_DATABASE', substr($parts['path'], 1));
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');

