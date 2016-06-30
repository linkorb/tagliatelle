<?php

namespace Tagliatelle\Model\Block;

abstract class AbstractBlock
{
    protected $x;
    protected $y;
    
    public function getX()
    {
        return $this->x;
    }
    
    public function setX($x)
    {
        $this->x = $x;
        return $this;
    }
    
    public function getY()
    {
        return $this->y;
    }
    
    public function setY($y)
    {
        $this->y = $y;
        return $this;
    }
    
    protected $content;
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    
}
