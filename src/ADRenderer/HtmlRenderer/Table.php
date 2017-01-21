<?php
/**
 * @author Rafal Martinez-Marjanski
 * @date 2017-01-08
 * @copyright www.archangel-design.com
 */

namespace ADRenderer\HtmlRenderer;

use ADRenderer\IllegalUsageException;
use ADRenderer\IncorrectDataException;

/**
 * Class Table
 * @package HtmlRenderer
 */
class Table implements HtmlElementInterface
{
    private $id = null;

    private $class = null;

    private $inline = null;

    private $rows = [];

    private $header = [];

    private $columnCount = 0;

    /**
     * Table constructor.
     * @param null|string $id
     * @param null|string $class
     * @param null|string $inline
     */
    public function __construct($id = null, $class = null, $inline = null)
    {
        $this->id = $id;
        $this->class = $class;
        $this->inline = $inline;
    }

    /**
     * @param array $labels
     * @throws IllegalUsageException
     */
    public function addHeader(array $labels)
    {
        if (!empty($this->header)) {
            throw new IllegalUsageException("Table header should not be overwritten.");
        }
        $this->header = $labels;
        $this->columnCount = count($labels);
    }

    public function addRow(array $values)
    {
        if (count($values) != $this->columnCount) {
            throw new IncorrectDataException('Value count does not match column count.');
        }
        $this->rows[] = $values;
    }

    public function addRowExtended(TableRow $row)
    {
        $this->rows[] = $row;
    }

    public function getRendered()
    {
        if (!empty($this->class)) {
            $class = "class=\"$this->class\"";
        } else {
            $class = "";
        }

        if (!empty($this->id)) {
            $id = "id=\"$this->id\"";
        } else {
            $id = "";
        }

        if (!empty($this->inline)) {
            $inline = "style=\"$this->inline\"";
        } else {
            $inline = "";
        }

        $result = "<table $id $class $inline>";

        $result .= "<tr>";
        foreach ($this->header as $headerRow) {
            if (is_array($headerRow)) {
                $result .= "<td><label href='$headerRow[link]'><b>$headerRow[label]</b></label>";
            } else {
                $result .= "<td><b>$headerRow</b></td>";
            }
        }
        $result .= "</tr>";

        foreach ($this->rows as $row) {
            $result .= "<tr>";
            foreach ($row as $column) {
                $result .= "<td>$column</td>";
            }
            $result .= "</tr>";
        }

        $result .= "</table>";

        return $result;
    }


}