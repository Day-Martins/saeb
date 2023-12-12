<?php

namespace Drupal\bagov_base_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a acesso_informacao block.
 *
 * @Block(
 *   id = "acesso_informacao_block",
 *   admin_label = @Translation("Acesso a Informação - Ba.Gov"),
 * )
 */
class AcessoInformacaoBlock extends BlockBase
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
        if ($config->get('acesso_informacao_enable')) {
            return [
                '#theme' => 'acesso_informacao_block',
                '#attached' => [
                    'library' => ['bagov_base_blocks/bagov_base_acesso_informacao_block'],
                ],
            ];
        }
    }
}
