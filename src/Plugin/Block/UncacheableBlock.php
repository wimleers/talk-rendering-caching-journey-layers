<?php

namespace Drupal\journey_talk\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 *   id = "journey_talk_uncacheable_block",
 *   admin_label = @Translation("Uncacheable block"),
 * )
 */
class UncacheableBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    usleep(250*1000); // Pretend we're computing a better forecast 👍
    return [
      '#markup' => $this->t('<p>Weather forecast at @time: ☔️.</p>', [
        '@time' => (int) microtime(TRUE),
      ]),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
