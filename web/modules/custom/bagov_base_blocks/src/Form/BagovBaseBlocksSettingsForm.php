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
        $form['acesso_informacao_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Acesso a informação'),
            '#default_value' => $config->get('acesso_informacao_enable'),
            '#description' => $this->t('Habilitar botão de acesso a informaçao?'),
        ];
        $form['constrast_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Contraste'),
            '#default_value' => $config->get('constrast_enable'),
            '#description' => $this->t('Habilitar botão de contraste?'),
        ];
        $form['creative_commons_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Creative Commons'),
            '#default_value' => $config->get('creative_commons_enable'),
            '#description' => $this->t('Habilitar informações de licença?'),
        ];
        $form['logo_estado_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Logo Estado'),
            '#default_value' => $config->get('logo_estado_enable'),
            '#description' => $this->t('Habilitar logomarca do Governo do Estado?'),
        ];
        $form['redes_sociais_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Redes Sociais'),
            '#default_value' => $config->get('redes_sociais_enable'),
            '#description' => $this->t('Habilitar Redes Sociais?'),
        ];
        $form['select_secretaria_enable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('Secretarias'),
            '#default_value' => $config->get('select_secretaria_enable'),
            '#description' => $this->t('Habilitar select de secretarias?'),
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
            ->set('acesso_informacao_enable', $form_state->getValue('acesso_informacao_enable'))
            ->save();
        $this->config('bagov_base_blocks.settings')
            ->set('creative_commons_enable', $form_state->getValue('creative_commons_enable'))
            ->save();
        $this->config('bagov_base_blocks.settings')
            ->set('logo_estado_enable', $form_state->getValue('logo_estado_enable'))
            ->save();
        $this->config('bagov_base_blocks.settings')
            ->set('redes_sociais_enable', $form_state->getValue('redes_sociais_enable'))
            ->save();
        $this->config('bagov_base_blocks.settings')
            ->set('select_secretaria_enable', $form_state->getValue('select_secretaria_enable'))
            ->save();
    }
}
