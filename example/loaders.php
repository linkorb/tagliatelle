<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Tagliatelle\Generator\FpdfGenerator;
use Tagliatelle\Loader\XmlTemplateLoader;
use Tagliatelle\Loader\XmlPageLoader;
use Tagliatelle\Loader\CsvDataLoader;

$templateLoader = new XmlTemplateLoader();
$template = $templateLoader->loadFile(__DIR__ . '/template.xml');

$pageLoader = new XmlPageLoader();
$page = $pageLoader->loadFile(__DIR__ . '/page.xml');

$dataLoader = new CsvDataLoader();
$rows = $dataLoader->loadFile(__DIR__ . '/data.csv');

$generator = new FpdfGenerator();

$pdf = $generator->generate($page, $template, $rows, 0);

file_put_contents('output.pdf', $pdf);
