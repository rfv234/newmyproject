<?php


namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ParserController extends Controller
{
    public $siteName = 'https://eltex-co.ru/catalog/';
    public $sitemapUrl = 'https://eltex-co.ru/sitemap_000.xml';

    public function index()
    {
        $items = $this->scanSitemap();
        $parsedItem = [];
        foreach ($items as $item) {
            $parsedItem[] = $this->parseItem($item);
        }
    }

    public function scanSitemap()
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
        $techs = $crawler->filter('div.content-text-block')->html();
        $documents = $crawler->filter('div.b-item-doc >div.b-item-doc-column')->each(
            function (Crawler $document) {
                $document_name = $document->filter('div.column_title')->text();
                $document_link = $document->filter('div.download-file >a')->first()->link()->getUri();
                return [
                    $document_name => $document_link
                ];
            }
        );
        $certificates = $crawler->filter('div.download-file >a')->each(
            function (Crawler $certificate) {
                $certificate_name = $certificate->text();
                $certificate_link = $certificate->link()->getUri();
                return [
                    $certificate_name => $certificate_link
                ];
            }
        );
        dd($certificates);
    }
}