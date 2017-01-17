<?php
/**
 * @author Rafal Martinez-Marjanski
 * @date 2017-01-08
 * @copyright www.archangel-design.com
 */

namespace ADRenderer\HtmlRenderer;

/**
 * Class Renderer
 * @package HtmlRenderer
 */
class Renderer
{
    const HTML_VERSION_0 = 1;

    const HTML_VERSION_20 = 2;

    const HTML_VERSION_32 = 3;

    const HTML_VERSION_401 = 4;

    const HTML_VERSION_XHTML = 5;

    const HTML_VERSION_5 = 6;

    private $elements = [];

    private $terminal;

    public function __construct($terminal = false)
    {
        $this->terminal = $terminal;
    }

    public function addElement(HtmlElementInterface $element)
    {
        $this->elements[] = $element;
    }

    /**
     * @param $version Renderer::HTML_VERSION_ ...
     */
    public function setHtmlVersion($version)
    {

    }

    public function getRendered()
    {

    }

}