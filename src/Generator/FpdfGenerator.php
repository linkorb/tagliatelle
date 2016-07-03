<?php

namespace Tagliatelle\Generator;

use Tagliatelle\Model\Page;
use Tagliatelle\Model\Template;
use Tagliatelle\Generator\TagliatelleFpdf;
use RuntimeException;

class FpdfGenerator
{
    public function generate(Page $page, Template $template, $records, $label = 0)
    {
        $pdf = new TagliatelleFpdf('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetMargins(0, 0, 0, 0);
        $pdf->SetAutoPageBreak(false);
        
        foreach ($records as $record) {
            //echo $page->getLabelColumn($label) . '-' . $page->getLabelRow($label) . ' ';
            //echo $page->getLabelX($label) . '-' . $page->getLabelY($label) . "\n";

            $pdf->Rect(
                $page->getLabelX($label),
                $page->getLabelY($label),
                $page->getLabelWidth(),
                $page->getLabelHeight()
            );
            
            foreach ($template->getBlocks() as $block) {
                $reflect = new \ReflectionClass($block);
                $methodName = 'render' . $reflect->getShortName();
                $this->$methodName($block, $page, $pdf, $label, $record);
            }

            $label++;
            if ($label>=$page->getLabels()) {
                $pdf->AddPage();
                $label = 0;
            }
        }
        
        return $pdf->Output(null, 'S');
    }
    
    public function renderTextBlock($block, Page $page, TagliatelleFpdf $pdf, $label, $record)
    {
        $x = $page->getLabelX($label) + $block->getX();
        $y = $page->getLabelY($label) + $block->getY();
        $pdf->SetXY($x, $y);
        
        $pdf->SetFont('Arial', 'B', 16);
        $content = $this->processContent($block->getContent(), $record);
        $pdf->Cell(0, 0, $content, 0);
    }
    
    public function renderEan13Block($block, Page $page, TagliatelleFpdf $pdf, $label, $record)
    {
        $x = $page->getLabelX($label) + $block->getX();
        $y = $page->getLabelY($label) + $block->getY();


        $content = $this->processContent($block->getContent(), $record);
        if (!$content || !is_numeric($content)) {
            throw new RuntimeException("Barcode content invalid: $content");
        }
        $pdf->Ean13($x, $y, $content, $block->getHeight(), (double)$block->getWidth());
    }
    
    public function processContent($content, $record)
    {
        foreach ($record as $key => $value) {
            $content = str_replace('{{' . $key . '}}', $value, $content);
        }
        return $content;
    }
}
