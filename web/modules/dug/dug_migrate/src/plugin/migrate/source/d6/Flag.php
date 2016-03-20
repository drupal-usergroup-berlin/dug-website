<?php

/**
 * @file
 * Contains \Drupal\dug_migrate\Plugin\migrate\source\d6\Flag.
 */

namespace Drupal\dug_migrate\Plugin\migrate\source\d6;

use Drupal\migrate_drupal\Plugin\migrate\source\DrupalSqlBase;

/**
 * Drupal 6 flag from database.
 *
 * @MigrateSource(
 *   id = "d6_flag"
 * )
 */
class Flag extends DrupalSqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Select flaggings from flag_content.
    $query = $this->select('flag_content', 'fc')
      ->fields('fc', [
        'fcid',
        'fid',
        'content_type',
        'content_id',
        'uid',
        'sid',
        'timestamp',
      ]);

    if (isset($this->configuration['flag_id'])) {
      $query->condition('fid', $this->configuration['flag_id']);
    }

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'fcid' => $this->t('Flag content id'),
      'fid' => $this->t('Flag id'),
      'content_type' => $this->t('Content type'),
      'content_id' => $this->t('Content id'),
      'uid' => $this->t('User'),
      'timestamp' => $this->t('The timestamp of the flag was created.'),
    ];
    return $fields;
  }

  public function getIds() {
    $ids = [];
    $ids['fcid'] = [
      'type' => 'integer',
      'alias' => 'fc'
    ];
    return $ids;
  }

}
