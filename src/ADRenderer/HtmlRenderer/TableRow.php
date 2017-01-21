<?php
/**
 * @author Rafal Martinez-Marjanski
 * @date 2017-01-08
 * @copyright www.archangel-design.com
 */

namespace ADRenderer\HtmlRenderer;


class TableRow
{
    private $columns = [];

    public function addColumn($value, $colSpan, $inline)
    {
        $this->columns[] = [
            'value' => $value,
            'colspan' => $colSpan,
            'inline' => $inline,
        ];
    }

    public function getColumnCount()
    {
        return count($this->columns);
    }
}