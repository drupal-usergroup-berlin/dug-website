<?php

namespace Drupal\dug_talks\Controller;

use Drupal\node\Controller\NodeController;
use Drupal\node\NodeTypeInterface;

/**
 * Class TalkController.
 *
 * @package Drupal\dug_talks\Controller
 */
class TalkController extends NodeController {

  public function add(NodeTypeInterface $node_type) {
    if ($this->currentUser()->isAnonymous()) {
      $introduction = config_pages_config('submit_talk_introduction');
      $form = \Drupal::formBuilder()->getForm('Drupal\user\Form\UserLoginForm');
      $form['#action'] = $this->url('<current>', [], ['query' => $this->getDestinationArray(), 'external' => FALSE]);

      return [
        'introduction' => $introduction ? entity_view($introduction, 'full') : [],
        'form' => $form
      ];
    }

    $introduction = config_pages_config('submit_talk_intro_logged_in');

    $build = [
      'introduction' => $introduction ? entity_view($introduction, 'full') : [],
      'form' => parent::add($node_type)
    ];
    $build['form']['actions']['submit']['#value'] = 'Talk einreichen';
    return $build;
  }
}
