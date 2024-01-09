<?php

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

// Altere o caminho abaixo para o local correto do autoload.php no seu projeto
$autoloader = require_once '/home/dayane/saeb/vendor/autoload.php';

$kernel = DrupalKernel::createFromRequest(Request::createFromGlobals(), $autoloader, 'prod');
$kernel->boot();

// Conectar-se ao banco de dados do Drupal
$database = \Drupal::database();

// Substitua 'site_saeb_conteudo' pelo nome correto da sua tabela de origem
$query = $database->select('site_saeb_conteudo', 's')
    ->fields('s', ['titulo', 'conteudo'])
    ->execute();

foreach ($query as $row) {
    try {
        $node = \Drupal\node\Entity\Node::create([
            'type' => 'page', // Tipo de conteúdo 'page' para Página Básica
            'title' => $row->titulo,
            'body' => [
                'value' => $row->conteudo,
                'format' => 'full_html', // Ou outro formato de texto conforme necessário
            ],
        ]);
        $node->save();
    } catch (\Exception $e) {
        error_log('Erro ao migrar registro: ' . $e->getMessage());
    }
}

echo "Migração concluída.\n";
