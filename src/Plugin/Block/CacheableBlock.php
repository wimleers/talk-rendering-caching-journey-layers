<?php

namespace Drupal\journey_talk\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\user\Entity\User;

/**
 * @Block(
 *   id = "journey_talk_cacheable_block",
 *   admin_label = @Translation("Cacheable block"),
 * )
 */
class CacheableBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('%name runs this site!', [
        '%name' => User::load(1)->getAccountName(),
      ]),
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIf($account->id() != 1);
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags() {
    return ['user:1'];
  }

}
