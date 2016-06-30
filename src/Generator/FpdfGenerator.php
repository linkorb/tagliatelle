<?php

namespace Tagliatelle\Generator;

use Tagliatelle\Model\Page;
use Tagliatelle\Model\Template;
use Tagliatelle\Generator\TagliatelleFpdf;


class FpdfGenerator
{
    public function generate(Page $page, Template $template, $rows)
    {
        $pdf = new TagliatelleFpdf('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        
        foreach ($rows as $row) {
            foreach ($template->getBlocks() as $block) {
                $x = $block->getX();
                $y = $block->getY();
                $pdf->Cell($x, $y, 'Hello World!');
            }
            print_r($row);
        }
        
        $data = $pdf->Output('/tmp/doc.pdf');
        //echo "DATA:" . $data . ":END\n";
        //file_put_contents('/tmp/doc.pdf', $data);
    }
}
