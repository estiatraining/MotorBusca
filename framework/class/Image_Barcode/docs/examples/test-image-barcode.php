<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>Image_Barcode Class Test</title>
  <style type="text/css">
    body {
        font-family: Verdana;
        font-size: 10pt;
    }
    h1 {
            font-size: 14pt;
    }
    h2 {
            font-size: 12pt;
    }
    .box {
        border: 1px solid rgb(15, 169, 229) ! important; 
        margin: 10px ! important; 
        padding: 10px ! important; 
        font-size: 0.9em ! important;
        font-weight: normal ! important;
        text-decoration: none !  important;
        line-height: 1.5em ! important;
        color: rgb(0, 0, 0) ! important;
        background-color: rgb(231, 244, 252) ! important;
        white-space: normal !  important;
        cursor: pointer ! important;
    }
    .test {
        border: 1px solid;
        margin: 10px ! important;
        padding: 10px ! important; 
    }
  </style>
</head>
<body style="background-image: url(#FFFFFF);">
<?php

$num = "R1P7A2EE11";

$num = isset($_REQUEST) && is_array($_REQUEST) && isset($_REQUEST['num']) ? $_REQUEST['num'] : $num;

?>
<div class="box">
<h1>Image_Barcode Class test</h1>
Test number: <b><?php echo($num) ?></b>
</div>

<div class="test">
<h2>Interleave 2 of 5 (JPG):</h2>
<img src="barcode_img.php?num=<?php echo($num) ?>&type=int25&imgtype=jpg"
 alt="JPG: <?php echo($num) ?>" title="JPG: <?php echo($num) ?>">
</div>

<div class="test">
<h2>Ean13 (JPG):</h2>
<img
 src="barcode_img.php?num=<?php echo($num) ?>&type=ean13&imgtype=jpg"
 alt="JPG: <?php echo($num) ?>" title="JPG: <?php echo($num) ?>">
</div>

<div class="test">
<h2>Code39 (JPG):</h2>
<img
 src="barcode_img.php?num=<?php echo($num) ?>&type=Code39&imgtype=jpg"
 alt="JPG: <?php echo($num) ?>" title="JPG: <?php echo($num) ?>">
</div>

<div class="test">
<h2>UPC-A (JPG):</h2>
<img
 src="barcode_img.php?num=<?php echo($num) ?>&type=upca&imgtype=jpg"
 alt="JPG: <?php echo($num) ?>" title="JPG: <?php echo($num) ?>">
</div>

<div class="test">
<h2>Code128 (JPG):</h2>
<img
 src="barcode_img.php?num=<?php echo($num) ?>&type=code128&imgtype=jpg"
 alt="JPG: <?php echo($num) ?>" title="JPG: <?php echo($num) ?>">
</div>

<div class="test">
<h2>PostNet (JPG):</h2>
<img
 src="barcode_img.php?num=<?php echo($num) ?>&type=postnet&imgtype=jpg"
 alt="JPG: <?php echo($num) ?>" title="JPG: <?php echo($num) ?>">
</div>

</body>
</html>
