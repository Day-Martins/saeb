<?php

namespace Drupal\bagov_base_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a select_creative_commons block.
 *
 * @Block(
 *   id = "select_creative_commons_block",
 *   admin_label = @Translation("Creative Commons Info"),
 * )
 */
class CreativeCommonsBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function access(AccountInterface $account, $return_as_object = FALSE) {
    $access = $this->blockAccess($account);
    return $return_as_object ? $access : $access->isAllowed('access content');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'creative_commons_block',
      '#attached' => [
        'library' => ['bagov_base_blocks/bagov_base_select_creative_commons_block'],
      ],
    ];
  }

}
