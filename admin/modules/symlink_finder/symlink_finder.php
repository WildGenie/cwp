<?php
/* Symlinks Finder for Centos-WebPanel by Gogo */
if(!isset($include_path) OR preg_match("/".basename(__FILE__)."/i",$_SERVER['REQUEST_URI'])){exit('Direct access not permitted!');}

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

function _findSymLinks(){
    exec('cd / ;'.PHP_EOL.' find /* -type l -ls;'.PHP_EOL, $lines);
    echo 'Found Symlinks: '.count($lines);
    echo '<pre>'.doLines($lines).'</pre>';
}

echo '<h3>All Symlinks available:</h3><br><br>';
_findSymLinks();

/* be fair and don't remove next line, thank you */
echo '<br><br><small>Donate <a href="https://paypal.me/gogo1207"><i aria-hidden="true" class="icomoon-icon-paypal"></i></a> | &copy;2017 <a style="color: #353535;" href="https://goran-margetic.iz.hr">GM</a></small>';

?>
