<?php

/**
 * @file
 * Custom migrate commands.
 */

use Drupal\Core\Database\Database;
use Drupal\migrate\Entity\Migration;
use Drupal\migrate\Entity\MigrationInterface;
use Drupal\migrate\MigrateExecutable;
use Drupal\migrate_tools\DrushLogMigrateMessage;

/**
 * Implements hook_drush_command().
 *
 * @return array
 */
function dug_berlin_drush_command() {
  $items['custom-site-install'] = [
    'description' => 'Install Drupal 8',
    'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_ROOT,
  ];
  $items['dug-migrate-configure'] = [
    'description' => 'Configure migrate',
    'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_FULL,
    'options' => [
      'legacy-db-url' => 'A Drupal 6 style database URL. Required.',
    ],
  ];
  return $items;
}

/**
 * Install Drupal 8 and run config-import.
 *
 * This is a poormans version of config_installer.
 */
function drush_dug_berlin_custom_site_install() {
  drush_invoke('site-install', ['minimal', '--locale=de']);
  $uuid = 'ab2960e9-031d-4b44-a709-9add01a9cb2a';
  \Drupal::configFactory()->getEditable('system.site')->set('uuid', $uuid)->save();
  drush_invoke('config-import', ['sync']);
}

function drush_dug_berlin_dug_migrate_configure() {
  $drupal_version = 6;
  $database = drush_convert_db_from_db_url(drush_get_option('legacy-db-url'));

  // Set up the connection.
  Database::addConnectionInfo('upgrade', 'default', $database);

  $database_state['key'] = 'upgrade';
  $database_state['database'] = $database;
  $database_state_key = 'migrate_upgrade_' . $drupal_version;
  \Drupal::state()->set($database_state_key, $database_state);
}
