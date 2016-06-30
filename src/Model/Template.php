<?php

namespace Tagliatelle\Model;

use Tagliatelle\Model\Block\BlockInterface;

class Template
{
    protected $name;
    protected $blocks = [];
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function addBlock(BlockInterface $block)
    {
        $this->blocks[] = $block;
    }
    
    public function getBlocks()
    {
        return $this->blocks;
    }
}
