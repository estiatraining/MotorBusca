<?php

require_once($_SERVER[ 'DOCUMENT_ROOT' ]."/framework/class/Image_Barcode/"."Barcode.php");

$num = isset($_REQUEST['num']) ? $_REQUEST['num'] : 'R1P7A2EE11';
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 'int25';
$imgtype = isset($_REQUEST['imgtype']) ? $_REQUEST['imgtype'] : 'jpg';

Image_Barcode::draw($num, $type, $imgtype);

?>
