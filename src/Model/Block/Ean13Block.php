<?php

namespace Tagliatelle\Model\Block;

class Ean13Block extends AbstractBlock implements BlockInterface
{
    protected $width = .35;
    
    public function getWidth()
    {
        return $this->width;
    }
    
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }
    
    protected $height = 16;
    
    public function getHeight()
    {
        return $this->height;
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }
}
