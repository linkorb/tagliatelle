<?php

namespace Tagliatelle\Model;

class Page
{
    protected $width;
    protected $height;
    protected $marginLeft;
    protected $marginRight;
    protected $marginTop;
    protected $marginBottom;
    
    public function getWidth()
    {
        return $this->width;
    }
    
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }
    
    public function getHeight()
    {
        return $this->height;
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }
    
    public function setMargin($top, $right, $bottom, $left)
    {
        $this->setMarginTop($top);
        $this->setMarginRight($right);
        $this->setMarginBottom($bottom);
        $this->setMarginLeft($left);
        return $this;
    }
    
    public function getMarginLeft()
    {
        return $this->marginLeft;
    }
    
    public function setMarginLeft($marginLeft)
    {
        $this->marginLeft = $marginLeft;
        return $this;
    }
    
    public function getMarginRight()
    {
        return $this->marginRight;
    }
    
    public function setMarginRight($marginRight)
    {
        $this->marginRight = $marginRight;
        return $this;
    }
    
    public function getMarginTop()
    {
        return $this->marginTop;
    }
    
    public function setMarginTop($marginTop)
    {
        $this->marginTop = $marginTop;
        return $this;
    }
    
    public function getMarginBottom()
    {
        return $this->marginBottom;
    }
    
    public function setMarginBottom($marginBottom)
    {
        $this->marginBottom = $marginBottom;
        return $this;
    }
}
