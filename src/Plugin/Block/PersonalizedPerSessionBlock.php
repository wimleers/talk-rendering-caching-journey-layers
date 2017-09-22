<?php

namespace Drupal\journey_talk\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "journey_talk_personalized_per_session_block",
 *   admin_label = @Translation("Personalized block (per session)"),
 * )
 */
class PersonalizedPerSessionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $funny_emojis = ['🤷', '😂', '🙈', '🐷', '🐑'];
    return [
      '#markup' => $this->t('<p>Funny emoji just for you: @emoji</p>
          <p>(Hand-picked at @time!)</p>', [
        '@emoji' => $funny_emojis[rand(0, count($funny_emojis) - 1)],
        '@time' => (int) microtime(TRUE),
      ]),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return ['session'];
  }

}
