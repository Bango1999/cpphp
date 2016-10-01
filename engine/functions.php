<?php
//GET IP ADDRESS
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


//run the code
function codeRunner($code, $params, $file, $bash) {
    $output = false;
    $fo = fopen('bin/'.$file, "w");
    fwrite($fo, $code);
    fclose($fo);
    //---------------------------------------
    $params = str_replace ('<' , '\<', $params);
    $str = $bash . ' ' . $file . ' "' . $params . '"';
    $output = nl2br(shell_exec($str));
	echo "output = <br/>";
	echo $output;
    return $output;
}

function checkCompilation($file) {
	return filesize($file) == 0;
}


?>
