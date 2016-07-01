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
    
    protected $rows;
    protected $columns;
    
    protected $labelWidth;
    protected $labelHeight;
    
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
    
    public function getRows()
    {
        return $this->rows;
    }
    
    public function setRows($rows)
    {
        $this->rows = $rows;
        return $this;
    }
    
    public function getColumns()
    {
        return $this->columns;
    }
    
    public function setColumns($columns)
    {
        $this->columns = $columns;
        return $this;
    }
    
    public function getLabelWidth()
    {
        return $this->labelWidth;
    }
    
    public function setLabelWidth($labelWidth)
    {
        $this->labelWidth = $labelWidth;
        return $this;
    }
    
    
    public function getLabelHeight()
    {
        return $this->labelHeight;
    }
    
    public function setLabelHeight($labelHeight)
    {
        $this->labelHeight = $labelHeight;
        return $this;
    }
    
    public function getRowY($row)
    {
        return $this->getMarginTop() + ($this->getLabelHeight() * $row);
    }
    

    public function getColumnX($column)
    {
        return $this->getMarginLeft() + ($this->getLabelWidth() * $column);
    }
    
    public function getLabels()
    {
        return $this->getRows() * $this->getColumns();
    }
    
    public function getLabelColumn($label)
    {
        return $label % $this->getColumns();
    }
    public function getLabelRow($label)
    {
        return floor($label / $this->getColumns());
    }
    
    public function getLabelX($label)
    {
        return $this->getColumnX($this->getLabelColumn($label));
    }

    public function getLabelY($label)
    {
        return $this->getRowY($this->getLabelRow($label));
    }
}
