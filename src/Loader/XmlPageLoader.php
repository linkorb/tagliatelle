<?php

namespace Tagliatelle\Loader;

use SimpleXMLElement;
use Tagliatelle\Model\Page;

class XmlPageLoader
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
    
    public function loadXml(SimpleXMLElement $pageNode)
    {
        $page = new Page();
        foreach ($pageNode->attributes() as $name => $value) {
            $setter = 'set' . ucfirst($name);
            $page->$setter($value);
        }
        return $page;
    }
}
