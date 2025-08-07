<?php

// Database settings (local DB).
// $databases['default']['default'] = [
//   'driver' => 'mysql',
//   'database' => 'drupal_local',
//   'username' => 'root',
//   'password' => 'root',
//   'host' => '127.0.0.1',
//   'port' => '3306',
//   'prefix' => '',
// ];



$databases['default']['default'] = [
  'database' => 'drupal_local',
  'username' => 'root',
  'password' => '',
  'prefix' => '',
  'host' => 'localhost',
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'driver' => 'mysql',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'autoload' => 'core/modules/mysql\\src\\Driver\\Database\\mysql\\',
];

// Disable caches for local development.
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';

// Enable verbose error messages.
$config['system.logging']['error_level'] = 'verbose';

// Enable local development services.
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

$config_directories['sync'] = 'config/sync';