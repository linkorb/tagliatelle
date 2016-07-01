<?php

namespace Tagliatelle\Loader;

use SimpleXMLElement;
use Tagliatelle\Model\Template;
use RuntimeException;

class XmlTemplateLoader
{
    public function loadFile($filename)
    {
        $xml = file_get_contents($filename);
        return $this->loadXmlString($xml);
    }
    
    public function loadXmlString($xml)
    {
        $e = simplexml_load_string($xml);
        return $this->loadXml($e);
    }
    
    public function loadXml(SimpleXMLElement $e)
    {
        $template = new Template();
        foreach ($e->blocks->children() as $type => $blockNode) {
            $blockClassName = "\\Tagliatelle\\Model\\Block\\" . ucfirst($type) . "Block";
            if (!class_exists($blockClassName)) {
                throw new RuntimeException("Unsupported block-type: " . $type);
            }
            $block = new $blockClassName();
            foreach ($blockNode->attributes() as $name => $value) {
                $setter = 'set' . ucfirst($name);
                $block->$setter($value);
            }
            $template->addBlock($block);
        }
        return $template;
    }
}
