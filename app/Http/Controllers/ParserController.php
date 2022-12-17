<?php


namespace App\Http\Controllers;


use App\Eltex;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ParserController extends Controller
{
    public $siteName = 'https://eltex-co.ru/catalog/';
    public $sitemapUrl = 'https://eltex-co.ru/sitemap_000.xml';

    /**
     * Запускает парсер
     */
    public function index()
    {
        $items = $this->scanSitemap();
        foreach ($items as $item) {
            $parsedItem = $this->parseItem($item);
            $this->saveItem($parsedItem);
        }
    }

    /**
     * Метод сохраняет полученный эдемент в базу данных
     * @param $parsedItem
     */
    private function saveItem($parsedItem)
    {
        $tovar = new Eltex();
        $tovar->name = $parsedItem['name'];
        $tovar->description = $parsedItem['description'];
        $tovar->category = $parsedItem['category'];
        $tovar->seoTitle = $parsedItem['seoTitle'];
        $tovar->seoDescription = $parsedItem['seoDescription'];
        $tovar->techs = $parsedItem['techs'];
        $tovar->documents = $parsedItem['documents'];
        $tovar->certificates = $parsedItem['certificates'];
        $tovar->garanties = $parsedItem['garanties'];
        $tovar->save();
    }

    /**
     * Считывает sitemap и отдает массив всех страниц
     * @return array
     */
    private function scanSitemap()
    {
        $sitemap_xml = simplexml_load_file($this->sitemapUrl);
        $sitemap = json_decode(json_encode($sitemap_xml), true);
        $items = [];
        foreach ($sitemap['url'] as $page) {
            if (Str::startsWith($page['loc'], $this->siteName)) {
                $items[] = $page;
            }
        }
        return $items;
    }

    /**
     * Парсит данные об отдельном товаре
     * @param $item
     * @return array
     */
    private function parseItem($item)
    {
        $htmlCode = file_get_contents($item['loc']);
        $crawler = new Crawler($htmlCode, $item['loc']);
        $name = $crawler->filter('h1')->text();
        try {
            $description = $crawler->filter('div.item-description')->html();
        } catch (\Exception $e) {
            $description = '';
        }
        $category = $crawler->filter('ul.breadcrumbs >li >a')->last()->attr('title');
        try {
            $seoTitle = $crawler->filter('title')->text();
        } catch (\Exception $e) {
            $seoTitle = '';
        }
        try {
            $seoDescription = $crawler->filter('meta[name=description]')->attr('content');
        } catch (\Exception $e) {
            $seoDescription = '';
        }
        try {
            $techs = $crawler->filter('div.content-text-block')->html();
        } catch (\Exception $e) {
            $techs = '';
        }
        try {
            $documents = $crawler->filter('div.b-item-doc >div.b-item-doc-column')->each(
                function (Crawler $document) {
                    $document_name = $document->filter('div.column_title')->text();
                    $document_link = $document->filter('div.download-file >a')->first()->link()->getUri();
                    return [
                        $document_name => $document_link
                    ];
                }
            );
        } catch (\Exception $e) {
            $documents = [];
        }
        try {
            $certificates = $crawler->filter('div.download-file >a')->each(
                function (Crawler $certificate) {
                    $certificate_name = $certificate->text();
                    $certificate_link = $certificate->link()->getUri();
                    return [
                        $certificate_name => $certificate_link
                    ];
                }
            );
        } catch (\Exception $e) {
            $certificates = [];
        }
        try {
            $garanties = $crawler->filter('span.item-garanty-info-number')->html();
        } catch (\Exception $e) {
            $garanties = '';
        }
        return [
            'name' => $name,
            'description' => $description,
            'category' => $category,
            'seoTitle' => $seoTitle,
            'seoDescription' => $seoDescription,
            'techs' => $techs,
            'documents' => json_encode($documents),
            'certificates' => json_encode($certificates),
            'garanties' => $garanties
        ];
    }
}