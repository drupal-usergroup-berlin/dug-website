<?php

// include local services.yml for development
// $settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/local.services.yml';

$databases['default']['default'] = array (
 'database' => '',
  'username' => '',
  'password' => '',
  'host' => 'localhost',
  'port' => '',
  'driver' => 'mysql',
  'prefix' => '',
  'collation' => 'utf8mb4_general_ci',
);

$settings['hash_salt'] = 'whatever';

// useful development settings
// uncomment to activate

// do not aggregate JS and CSS
// $config['system.performance']['css']['preprocess'] = FALSE;
// $config['system.performance']['js']['preprocess'] = FALSE;

// turn off site cache
// $settings['cache']['bins']['render'] = 'cache.backend.null';
// $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
