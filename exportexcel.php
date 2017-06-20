<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=reporteparafiscal.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $_POST['senddata'];

/**
 * @author Gianni Narracci
 * gnarracci@gmail.com
 * @copyright 2012
 */
?>