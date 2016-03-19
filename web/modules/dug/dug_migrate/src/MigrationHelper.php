<?php

/**
 * @file
 * Contains \Drupal\dug_migrate\MigrationHelper.
 */

namespace Drupal\dug_migrate;

class MigrationHelper {

  public static function convertUrlToLink($text) {
    $filter = (object) [
      'settings' => [
        'filter_url_length' => 72,
      ]
    ];
    return _filter_url($text, $filter);
  }

}
