<?php

namespace Drupal\bagov_base_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a contrast block.
 *
 * @Block(
 *   id = "contrast_block",
 *   admin_label = @Translation("Botão de Constraste - Ba.Gov"),
 * )
 */
class ContrastBlock extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function access(AccountInterface $account, $return_as_object = false)
    {
        $access = $this->blockAccess($account);
        return $return_as_object ? $access : $access->isAllowed('access content');
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $config = \Drupal::config('bagov_base_blocks.settings');
        if ($config->get('contrast_enable')) {
            return [
                '#theme' => 'contrast_block',
                '#attached' => [
                    'library' => ['bagov_base_blocks/bagov_base_contrast_block'],
                ],
            ];
        }
    }
}
