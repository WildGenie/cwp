<?php
/* Transmission Bridge for Centos-WebPanel by Gogo */
if(!isset($include_path) OR preg_match("/".basename(__FILE__)."/i",$_SERVER['REQUEST_URI'])){exit('Direct access not permitted!');}

$lines      = null;
$installed  = true;
$running    = true;

function _start(){
    exec('systemctl start transmission-daemon.service', $lines);
    if(!$newLines = doLines($lines)){
      echo '<pre>Transmission successfully started!</pre>';
    } else {
      echo '<pre>'.$newLines.'</pre>';
    }
}

function _stop(){
    exec('systemctl stop transmission-daemon.service', $lines);
    if(!$newLines = doLines($lines)){
      echo '<pre>Transmission successfully stopped!</pre>';
    } else {
      echo '<pre>'.$newLines.'</pre>';
    }
}
function _status(){
    exec('systemctl status transmission-daemon.service', $lines);
    echo '<pre>'.doLines($lines).'</pre>';
}


function _install(){
    set_time_limit(180);
    $cmd = "sudo yum install epel-release -y ".PHP_EOL."sudo yum --enablerepo=epel install transmission-cli transmission-common transmission-daemon -y ".PHP_EOL."sudo systemctl start transmission-daemon.service ".PHP_EOL."sudo systemctl stop transmission-daemon.service ".PHP_EOL;
    while (@ob_end_flush());
    $proc = popen($cmd, 'r');
    echo '<pre style="z-index:999999999;position:relative;">';
    while (!feof($proc)) {
        echo fread($proc, 1024);
        flushGarbage();
        @flush();
        @ob_flush();
    }
    pclose($proc);
    echo '</pre>';
    echo '<div class="alert alert-success">
      Please edit config file and set next values:<br>
      File: /var/lib/transmission/.config/transmission-daemon/settings.json
<pre>
"rpc-authentication-required": true,
"rpc-enabled": true,
"rpc-password": "mypassword",
"rpc-username": "mysuperlogin",
"rpc-whitelist-enabled": false,
"rpc-whitelist": "0.0.0.0",
</pre>
    After you\'ve changed it restart Transmission to take effect.
    </div>';
}
if(!empty($_POST['action']) AND !empty($_POST['task'])){
  switch($_POST['action']){
    case 'restart':
        _stop();
        _start();
    break;
    case 'stop':
      _stop();
    break;
    case 'start':
      _start();
    break;

    case 'status':
      _status();
    break;

    case 'install':
      _install();
    break;

    default: break;
  }
}

exec('rpm -qa | grep -i transmission-daemon', $lines);
if($lines == null){
  $installed = false;
} else {
  foreach($lines as $line){
    if (preg_match('/(no such file or directory)/', mb_strtolower($line))) {
      $installed = false;
    }
  }
}
$lines      = null;

exec('systemctl status transmission-daemon.service', $lines);
if($lines == null){
  $installed = false;
} else {
  foreach($lines as $line){
    if(preg_match('/(service could not be found)/', mb_strtolower($line))){
      $installed = false;
      break;
    }
    if (preg_match('/(active: inactive \(dead\))/', mb_strtolower($line))) {
      $running = false;
    }
  }
}
$lines      = null;

function doLines($lines){
  $out = null;
  foreach($lines as $line){
    $out .= $line.PHP_EOL;
  }
  return $out;
}
function flushGarbage(){
  for ($i=0; $i < 100; $i++) {
    echo '<!-- This is just garbage content for flusher... -->';
  }
}

echo '<form method="post">
  <input type="hidden" name="task" value="true">';
if(!$installed){
  echo '<h3 style="color:red;">Transmission is not installed!</h3>
      <button class="btn btn-xs btn-success" type="submit" name="action" value="install">Install</button><br><br>
      <div class="alert alert-warning">Installation process can take a minute, plese be patient while page is loading.</div>';
} else {
  if($running){
    echo '<h3 style="color:green;">Transmission is installed and running!</h3>
    <p>You can access web gui on <a id="access-uri" href="#" target="_blank"></a></p>';
  } else {
    echo '<h3 style="color:red;">Transmission is installed and it is stoped!</h3>';
  }
  echo '<form method="post">
    <input type="hidden" name="task" value="true">';
    if($running) {
      echo '<button class="btn btn-xs btn-warning" type="submit" name="action" value="restart">Restart</button>&nbsp;';
      echo '<button class="btn btn-xs btn-danger" type="submit" name="action" value="stop">Stop</button>&nbsp;';
    } else {
      echo '<button class="btn btn-xs btn-success" type="submit" name="action" value="start">Start</button>&nbsp;';
    }
    echo '<button class="btn btn-xs btn-info" type="submit" name="action" value="status">Status</button>';
}
echo '</form>';
/* be fair and don't remove next line, thank you */
echo '<br><br><small>Donate <a href="https://paypal.me/gogo1207"><i aria-hidden="true" class="icomoon-icon-paypal"></i></a> | &copy;2017 <a style="color: #353535;" href="https://goran-margetic.iz.hr">GM</a></small>

<script>
var _domain = window.location.hostname;
$(document).ready(function(){
    $("a#access-uri").text("http://"+_domain+":9091");
    $("a#access-uri").attr("href", "http://"+_domain+":9091");
});
</script>

';

?>
