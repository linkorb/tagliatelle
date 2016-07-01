<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Tagliatelle\Generator\FpdfGenerator;
use Tagliatelle\Loader\XmlTemplateLoader;
use Tagliatelle\Loader\XmlPageLoader;

$templateLoader = new XmlTemplateLoader();
$template = $templateLoader->loadFile(__DIR__ . '/loaders.template.xml');

$pageLoader = new XmlPageLoader();
$page = $pageLoader->loadFile(__DIR__ . '/loaders.page.xml');

$rows = [
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    [
        'name' => 'Alice',
        'nr' => '67890'
    ],
    [
        'name' => 'Bob',
        'nr' => '12345'
    ],
    
];

$generator = new FpdfGenerator();
$fpdf = $generator->generate($page, $template, $rows, 0);
