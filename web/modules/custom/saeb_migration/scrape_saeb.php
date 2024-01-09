<?php

require_once __DIR__ . '/../../../../vendor/autoload.php';

use simplehtmldom\HtmlWeb;

function getNoticias(string $url): array {
    $client = new HtmlWeb();
    $mainPage = $client->load($url);
    $noticias = [];

    if (!$mainPage) {
        return $noticias; // Retornar array vazio se a página principal não carregar.
    }

    $newsItems = $mainPage->find('ul.lista li');

    foreach ($newsItems as $item) {
        $title = $item->find('a', 0)->plaintext;
        $link = $item->find('a', 0)->href;
        $newsPage = $client->load($link);

        if ($newsPage) {
            $body = $newsPage->find('div#story_text', 0)->innertext;
            $noticias[] = [
                'title' => trim($title),
                'link'  => trim($link),
                'body'  => trim($body)
            ];
        }
    }

    return $noticias;
}

$csvFilePath = __DIR__ . '/../../../../scripts/saeb.csv';
$fp = fopen($csvFilePath, 'w');
fputcsv($fp, ['title', 'link', 'body']);

$noticias = getNoticias('https://www.saeb.ba.gov.br/modules/noticias/arquivo.php');

foreach ($noticias as $noticia) {
    fputcsv($fp, [$noticia['title'], $noticia['link'], strip_tags($noticia['body'])]);
}

fclose($fp);
