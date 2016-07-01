<?php

namespace Tagliatelle\Generator;

use Tagliatelle\Model\Page;
use Tagliatelle\Model\Template;
use Tagliatelle\Generator\TagliatelleFpdf;


class FpdfGenerator
{
    public function generate(Page $page, Template $template, $records, $label = 0)
    {
        $pdf = new TagliatelleFpdf('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
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
        
        $data = $pdf->Output('/tmp/doc.pdf');
        //echo "DATA:" . $data . ":END\n";
        //file_put_contents('/tmp/doc.pdf', $data);
    }
    
    public function renderTextBlock($block, Page $page, TagliatelleFpdf $pdf, $label, $record)
    {
        $x = $page->getLabelX($label) + $block->getX();
        $y = $page->getLabelY($label) + $block->getY();
        $pdf->SetXY($x, $y);
        
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 0, $block->getContent(), 0);
    }
    
    public function renderEan13Block($block, Page $page, TagliatelleFpdf $pdf, $label, $record)
    {
        $x = $page->getLabelX($label) + $block->getX();
        $y = $page->getLabelY($label) + $block->getY();
        $code = $block->getContent();
        $code = '123456';
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Ean13($x, $y, $code, $block->getHeight(), (double)$block->getWidth());
    }
}
