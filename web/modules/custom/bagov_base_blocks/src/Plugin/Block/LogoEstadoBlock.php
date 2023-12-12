<?php

namespace Drupal\bagov_base_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a logo_estado block.
 *
 * @Block(
 *   id = "logo_estado_block",
 *   admin_label = @Translation("Logo do Estado - Ba.Gov"),
 * )
 */
class LogoEstadoBlock extends BlockBase
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
        if ($config->get('logo_estado_enable')) {
            return [
                '#theme' => 'logo_estado_block',
                '#attached' => [
                    'library' => ['bagov_base_blocks/bagov_base_logo_estado_block'],
                ],
            ];
        }
    }
}
