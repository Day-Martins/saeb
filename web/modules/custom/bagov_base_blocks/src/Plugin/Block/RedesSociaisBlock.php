<?php
namespace Drupal\bagov_base_blocks\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "block_socialnetwork_bagov",
 *   admin_label = @Translation("Redes Sociais - Ba.Gov"),
 * )
 */
class RedesSociaisBlock extends BlockBase
{
    private function getSocialNetwork()
    {
        $social_network = [
            'instagram' => [
                'fa-brands fa-instagram' => 'fa-instagram',
                'fa-brands fa-square-instagram' => 'fa-square-instagram',
            ],
            'youtube' => [
                'fa-brands fa-youtube' => 'fa-youtube',
                'fa-brands fa-square-youtube' => 'fa-square-youtube',
            ],
            'facebook' => [
                'fa-brands fa-facebook-f' => 'fa-facebook-f',
                'fa-brands fa-facebook' => 'fa-facebook',
                'fa-brands fa-square-facebook' => 'fa-square-facebook',
            ],
            'flickr' => [
                'fa-brands fa-flickr' => 'fa-flickr',
            ],
            'twitter' => [
                'fa-brands fa-twitter' => 'fa-twitter',
                'fa-brands fa-square-twitter' => 'fa-square-twitter',
                'fa-brands fa-x-twitter' => 'fa-x-twitter',
                'fa-brands fa-square-x-twitter' => 'fa-square-x-twitter',
            ],
            'whatsapp' => [
                'fa-brands fa-whatsapp' => 'fa-whatsapp',
                'fa-brands fa-square-whatsapp' => 'fa-square-whatsapp',
            ],
            'linkedin' => [
                'fa-brands fa-linkedin-in' => 'fa-linkedin-in',
                'fa-brands fa-linkedin' => 'fa-linkedin',
            ],
        ];

        return $social_network;
    }

    public function build()
    {
        $config = $this->getConfiguration();
        $icons = $this->getSocialNetwork();

        $list_social_network = [];
        foreach ($config as $key => $value) {
            if (substr($key, 0, 3) == 'sn_') {
                if (!empty($value)) {
                    $social_network = str_replace('sn_', '', $key);

                    //--- Caso de não ter selecionado, extrai primeiro ícone da rede social por padrão
                    $icon = $icons[$social_network];
                    $icon = array_shift(array_keys($icon));

                    $name_icon = 'si_' . $social_network;
                    if (!empty($config[$name_icon])) {
                        $icon = $config[$name_icon];
                    }

                    $link_text = [
                        '#type' => 'html_tag',
                        '#tag' => 'i',
                        '#attributes' => ['class' => ['icon-social-network', $icon]],
                    ];

                    $url = Url::fromUri($value, ['attributes' => ['target' => '_blank']]);
                    $link = Link::fromTextAndUrl($link_text, $url);

                    $list_social_network[] = $link;
                }
            }
        }

        $block_attributes[] = 'block-social-network';
        if (count($config['block_attributes'])) {
            $block_attributes = array_merge($block_attributes, $config['block_attributes']);
        }

        $output['content'] = [
            '#theme' => 'item_list',
            '#list_type' => 'ul',
            '#items' => $list_social_network,
            '#wrapper_attributes' => ['class' => $block_attributes],
            '#attributes' => ['class' => 'list-unstyled'],
        ];

        $config = \Drupal::config('bagov_base_blocks.settings');
        if ($config->get('redes_sociais_enable')) {
            return $output;
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function blockAccess(AccountInterface $account)
    {
        return AccessResult::allowedIfHasPermission($account, 'access content');
    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state)
    {
        $config = $this->getConfiguration();

        $social_network = $this->getSocialNetwork();

        foreach ($social_network as $key => $value) {
            $name = 'sn_' . $key;
            $key = ucfirst($key);
            $form['social_network'][$name] = [
                '#id' => $name,
                '#type' => 'textfield',
                '#title' => $key . ' :',
                '#default_value' => isset($config[$name]) ? $config[$name] : '',
                '#description' => 'Digite a URL do <b>' . $key . '</b>.',
                '#group' => 'social_networks',
            ];

            $name = 'si_' . strtolower($key);
            $imagem = '<i class="fa-4x ' . $config[$name] . '" style="width: 300px"></i>';
            $form['social_network'][$name] = [
                '#title' => t('Icone do ' . $key . ' :'),
                '#id' => $name,
                '#type' => 'select',
                '#default_value' => isset($config[$name]) ? $config[$name] : '',
                '#options' => $value,
                '#size' => 4,
                '#description' => 'Selecione ícone que será visualizado para o <b>' . $key . '</b>.',
                '#prefix' => '<p id="wrapper-result-' . strtolower($key) . '">' . $imagem . '</p>',
                /*'#ajax' => [
                'wrapper' => 'wrapper-result-' . strtolower($key),
                'callback' => 'Drupal\rules_prodeb\Controller\ValidaRulesController::validaHabilitarSubsistema',
                'event' => 'change',
                ],*/
                '#group' => 'social_networks',
            ];
        }

        $options = [
            'Utility' => [
                'clearfix' => 'Clear Fix',
                'row' => 'Row',
            ],
            'Columns' => [
                'col-xs-1' => 'Extra Small: 1',
                'col-xs-2' => 'Extra Small: 2',
                'col-xs-3' => 'Extra Small: 3',
                'col-xs-4' => 'Extra Small: 4',
                'col-xs-5' => 'Extra Small: 5',
                'col-xs-6' => 'Extra Small: 6',
                'col-xs-7' => 'Extra Small: 7',
                'col-xs-8' => 'Extra Small: 8',
                'col-xs-9' => 'Extra Small: 9',
                'col-xs-10' => 'Extra Small: 10',
                'col-xs-11' => 'Extra Small: 11',
                'col-xs-12' => 'Extra Small: 12',
                'col-sm-1' => 'Small: 1',
                'col-sm-2' => 'Small: 2',
                'col-sm-3' => 'Small: 3',
                'col-sm-4' => 'Small: 4',
                'col-sm-5' => 'Small: 5',
                'col-sm-6' => 'Small: 6',
                'col-sm-7' => 'Small: 7',
                'col-sm-8' => 'Small: 8',
                'col-sm-9' => 'Small: 9',
                'col-sm-10' => 'Small: 10',
                'col-sm-11' => 'Small: 11',
                'col-sm-12' => 'Small: 12',
                'col-md-1' => 'Medium: 1',
                'col-md-2' => 'Medium: 2',
                'col-md-3' => 'Medium: 3',
                'col-md-4' => 'Medium: 4',
                'col-md-5' => 'Medium: 5',
                'col-md-6' => 'Medium: 6',
                'col-md-7' => 'Medium: 7',
                'col-md-8' => 'Medium: 8',
                'col-md-9' => 'Medium: 9',
                'col-md-10' => 'Medium: 10',
                'col-md-11' => 'Medium: 11',
                'col-md-12' => 'Medium: 12',
                'col-lg-1' => 'Large: 1',
                'col-lg-2' => 'Large: 2',
                'col-lg-3' => 'Large: 3',
                'col-lg-4' => 'Large: 4',
                'col-lg-5' => 'Large: 5',
                'col-lg-6' => 'Large: 6',
                'col-lg-7' => 'Large: 7',
                'col-lg-8' => 'Large: 8',
                'col-lg-9' => 'Large: 9',
                'col-lg-10' => 'Large: 10',
                'col-lg-11' => 'Large: 11',
                'col-lg-12' => 'Large: 12',
            ],
            'Hidden' => [
                'hidden-xs' => 'Extra Small',
                'hidden-sm' => 'Small',
                'hidden-md' => 'Medium',
                'hidden-lg' => 'Large',
            ],
            'Visible' => [
                'visible-xs' => 'Extra Small',
                'visible-sm' => 'Small',
                'visible-md' => 'Medium',
                'visible-lg' => 'Large',
            ],
            'Text alignment' => [
                'float-start' => 'Left',
                'float-end' => 'Right',
                'float-none' => 'No Wrap',
            ],
            'Position' => [
                'position-h' => 'Horizontal',
                'position-v' => 'Vertical',
            ],
        ];

        $form['block_attributes'] = [
            '#title' => t('Atributos do Bloco'),
            '#type' => 'select',
            '#multiple' => true,
            '#size' => 20,
            '#default_value' => isset($config['block_attributes']) ? $config['block_attributes'] : '',
            '#options' => $options,
            '#description' => t('Selecione os atributos utilizados para exibir o bloco.'),
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state)
    {
        parent::blockSubmit($form, $form_state);

        $values = $form_state->getValues();
        $social_network = $this->getSocialNetwork();

        foreach ($social_network as $key => $value) {
            $this->configuration['sn_' . $key] = $values['social_network']['sn_' . $key];
            $this->configuration['si_' . $key] = $values['social_network']['si_' . $key];
        }

        $this->configuration['block_attributes'] = $values['block_attributes'];
    }
}
