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
