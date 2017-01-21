<?php

$table = new \ADRenderer\HtmlRenderer\Table('theId', 'theClass', 'theStyle');

$rendered = $table->getRendered();

if ($rendered != '<table id="theId" class="theClass" style="theStyle"><tr></tr></table>') {
    throw new Exception("Invalid table rendered.");
}

$table->addHeader(['head1', 'head2']);
$table->addRow(['firstRow', 'secondRow']);

$row = new \ADRenderer\HtmlRenderer\TableRow();
$row->addColumn('firstRow', '2', 'theStyle');
$table->addRowExtended($row);

$rendered = $table->getRendered();

if ($rendered != '<table id="theId" class="theClass" style="theStyle"><tr><td><b>head1</b></td><td><b>head2</b></td></tr><tr><td>firstRow</td><td>secondRow</td></tr><tr><td colspan=\'2\' style=\'theStyle\'>firstRow</td></tr></table>') {
    throw new Exception("Invalid table rendered.");
}

return true;