<?php
/* Fail2Ban Bridge for Centos-WebPanel by Gogo */
if(!isset($include_path) OR preg_match("/".basename(__FILE__)."/i",$_SERVER['REQUEST_URI'])){exit('Direct access not permitted!');}

$lines      = null;
$installed  = true;
$running    = true;

if(!empty($_POST['action']) AND !empty($_POST['task'])){
  switch($_POST['action']){
    case 'restart':
      exec('systemctl restart fail2ban', $lines);
      if(!$newLines = doLines($lines)){
        echo '<pre>Fail2Ban successfully restarted!</pre>';
      } else {
        echo '<pre>'.$newLines.'</pre>';
      }
    break;
    case 'start':
      exec('systemctl start fail2ban', $lines);
      if(!$newLines = doLines($lines)){
        echo '<pre>Fail2Ban successfully started!</pre>';
      } else {
        echo '<pre>'.$newLines.'</pre>';
      }
    break;
    case 'stop':
      exec('systemctl stop fail2ban', $lines);
      if(!$newLines = doLines($lines)){
        echo '<pre>Fail2Ban successfully stopped!</pre>';
      } else {
        echo '<pre>'.$newLines.'</pre>';
      }
    break;
    case 'status':
      exec('systemctl status fail2ban', $lines);
      echo '<pre>'.doLines($lines).'</pre>';
    break;

    case 'install':
      set_time_limit(180);
      $cmd = "sudo yum install epel-release -y ".PHP_EOL."sudo yum --enablerepo=epel install fail2ban -y ".PHP_EOL."sudo systemctl enable fail2ban ".PHP_EOL."sudo systemctl restart fail2ban ".PHP_EOL;
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
        Please edit config (/etc/fail2ban/jail.conf) and set next values:<br>
<pre>
[DEFAULT]
bantime = 3600
[sshd]
enable = true
</pre>
      After you\'ve changed it restart Fail2Ban to take effect.
      </div>';
    break;

    default: break;
  }
}

exec('rpm -qa | grep -i fail2ban', $lines);
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

exec('systemctl status fail2ban', $lines);
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
      break;
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
  echo '<h3 style="color:red;">Fail2Ban is not installed!</h3>
      <button class="btn btn-xs btn-success" type="submit" name="action" value="install">Install</button><br><br>
      <div class="alert alert-warning">Installation process can take a minute, plese be patient while page is loading.</div>';
} else {
  if($running){
    echo '<h3 style="color:green;">Fail2Ban is installed and running!</h3>';
  } else {
    echo '<h3 style="color:red;">Fail2Ban is installed and it is stoped!</h3>';
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
echo '<br><br><small>Donate <a href="https://paypal.me/gogo1207"><i aria-hidden="true" class="icomoon-icon-paypal"></i></a> | &copy;2017-'.date('Y').' <a style="color: #353535;" href="https://goran-margetic.iz.hr">GM</a></small>';
?>
