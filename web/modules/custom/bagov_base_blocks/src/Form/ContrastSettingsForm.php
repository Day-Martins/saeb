<?php

namespace Drupal\bagov_base_blocks\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ContrastSettingsForm that allows the config of BagovBase blocks.
 *
 * @package Drupal\bagov_base_blocks\Form
 */
class ContrastSettingsForm extends ConfigFormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId(): string
    {
        return 'contrast_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames(): array
    {
        return ['contrast.settings'];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state): array
    {
        $config = $this->config('contrast.settings');
        $form['constrast_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Enable Contrast'),
            '#default_value' => $config->get('constrast_enable'),
            '#description' => $this->t('Enable contrast block?'),
        ];
        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        parent::submitForm($form, $form_state);
        $this->config('contrast.settings')
            ->set('constrast_enable', $form_state->getValue('constrast_enable'))
            ->save();
    }
}
