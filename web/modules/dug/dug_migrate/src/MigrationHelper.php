<?php

/**
 * @file
 * Contains \Drupal\dug_migrate\MigrationHelper.
 */

namespace Drupal\dug_migrate;

class MigrationHelper {

  public static function convertTextToHtml($text) {
    $text = _filter_autop($text);

    $filter = (object) [
      'settings' => [
        'filter_url_length' => 72,
      ]
    ];
    return _filter_url($text, $filter);
  }

  public static function locationToAddress($nid) {
    $map = [
      1 => [
        'country_code' => 'DE',
        'organization' => 'LOOM',
        'locality' => 'Berlin',
        'postal_code' => '10623',
        'address_line1' => 'Goethestraße 2-3'
      ],
      16 => [
        'country_code' => 'DE',
        'organization' => 'RedSight',
        'locality' => 'Berlin',
        'postal_code' => '10587',
        'address_line1' => 'Eosanderstraße 21e'
      ],
      133 => [
        'country_code' => 'DE',
        'organization' => 'betahaus',
        'locality' => 'Berlin',
        'postal_code' => '10969',
        'address_line1' => 'Prinzessinnenstraße 19'
      ],
      642 => [
        'country_code' => 'DE',
        'organization' => 'Reinblau',
        'locality' => 'Berlin',
        'postal_code' => '13359',
        'address_line1' => 'Osloer Straße 17'
      ]
    ];

    if (isset($map[$nid])) {
      return $map[$nid];
    }

    return NULL;
  }

}
