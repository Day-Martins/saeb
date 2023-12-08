<?php

namespace Drupal\bagov_base_blocks\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BagovBaseBlocksSettingsForm that allows the config of BagovBase blocks.
 *
 * @package Drupal\bagov_base_blocks\Form
 */
class BagovBaseBlocksSettingsForm extends ConfigFormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId(): string
    {
        return 'bagov_base_blocks_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames(): array
    {
        return ['bagov_base_blocks.settings'];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        $config = $this->config('bagov_base_blocks.settings');
        $form['constrast_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Enable Contrast'),
            '#default_value' => $config->get('constrast_enable'),
            '#description' => $this->t('Enable contrast block?'),
        ];
        $form['information_access_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Enable Information Access'),
            '#default_value' => $config->get('information_access_enable'),
            '#description' => $this->t('Enable Information Access block?'),
        ];
        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        parent::submitForm($form, $form_state);
        $this->config('bagov_base_blocks.settings')
            ->set('constrast_enable', $form_state->getValue('constrast_enable'))
            ->save();
        $this->config('bagov_base_blocks.settings')
            ->set('information_access_enable', $form_state->getValue('information_access_enable'))
            ->save();
    }
}
