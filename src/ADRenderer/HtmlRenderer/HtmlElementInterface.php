<?php

/**
 * @author Rafal Martinez-Marjanski
 * @date 2017-01-08
 */

namespace ADRenderer\HtmlRenderer;

/**
 * Interface HtmlElementInterface
 * @package HtmlRenderer
 */
interface HtmlElementInterface
{
    /**
     * @return string
     */
    public function getRendered();
}