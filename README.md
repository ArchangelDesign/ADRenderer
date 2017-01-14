# Archangel Design Renderer module for PHP 5.5 application
## copyright (c) www.archangel-design.com
### Rafal Martinez-Marjanski

** One way to render every output **


Supportet formats
--------------
* HTML
* XML
* JSON
* YML


============================================================================
```
<?php

// simple usage
$table = new ADRenderer\HtmlRenderer\Table("table-id", "table-class", "width:100%; display:block");
$table->addHeader(["Column 1", "Column 2"]);
$table->addRow(["value 1", "value 2"]);

echo $table->getRendered();

// advanced usage

?>
```
============================================================================
