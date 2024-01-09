<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\BrowserKit\HttpBrowser;

class ScraperController extends Controller
{
    private $client;
    public function __construct() 
    {
        $this->client = new HttpBrowser();
    }

    public function index()
    {
        $crawler = $this->client->request('GET', 'https://www.filgoal.com/articles');

        $crawler->filter('#list-box ul li')->each(function ($node) {
            print $node->text()."\n";
        });

    }
}
