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
        dd($name);
    }
}