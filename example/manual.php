<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Tagliatelle\Model\Page;
use Tagliatelle\Model\Template;
use Tagliatelle\Model\Block\TextBlock;
use Tagliatelle\Model\Block\Ean13Block;
use Tagliatelle\Generator\FpdfGenerator;

$page = new Page();
$page->setWidth(200);
$page->setHeight(300);
$page->setMargin(10, 20, 10, 5);

$block = new TextBlock();
$block->setX(10);
$block->setY(10);
$block->setContent('Hello [name]');

$template = new Template();
$template->setName('Name badge');
$template->addBlock($block);

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
        'name' => 'Carol',
        'nr' => '98989'
    ]
];

$generator = new FpdfGenerator();
$data = $generator->generate($page, $template, $rows);
file_put_contents('output.pdf', $pdf);
