<?

session_start();
$output=$_SESSION['filename'];
$txt_file=$output;

$fsize = filesize($txt_file);
header("Content-type: application/text");
header("Content-Disposition: attachment; filename=$txt_file");
header("Content-length: $fsize");

if ($fd = fopen($txt_file, "r")) {
	$buffer = fread($fd, $fsize);
	echo $buffer;
}
fclose($fd);
?>
