<?php

/**
 * @file
 * Contains \Drupal\dug_migrate\Plugin\migrate\source\d6\ContentProfile.
 */

namespace Drupal\dug_migrate\Plugin\migrate\source\d6;

use Drupal\node\Plugin\migrate\source\d6\Node;

/**
 * Drupal 6 content profile source from database.
 *
 * @MigrateSource(
 *   id = "d6_content_profile"
 * )
 */
class ContentProfile extends Node {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = parent::query();
    $query->addField('n', 'uid');
    $query->condition('type', 'profile');
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    $ids['uid']['type'] = 'integer';
    $ids['uid']['alias'] = 'n';
    return $ids;
  }

}
