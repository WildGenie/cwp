<?php
/* Symlinks Finder for Centos-WebPanel by Gogo */
if(!isset($include_path) OR preg_match("/".basename(__FILE__)."/i",$_SERVER['REQUEST_URI'])){exit('Direct access not permitted!');}

function _findSymLinks(){
    set_time_limit(180);
    exec('cd / ;'.PHP_EOL.' find /* -type l -ls;'.PHP_EOL, $lines);
    echo '<script>var symlinks = '.((!empty($lines)) ? json_encode($lines) : '').';</script>';
}

if(!empty($_POST['symlinkfinder_search']) AND $_POST['symlinkfinder_search'] == "search") {
    _findSymLinks();
} else {
    echo '<p style="color:red;font-weight:600;">Searching for all Symlinks can take a while. Please be patient while searching!</p>';
    echo '<script>var symlinks = \'\';</script>';
}

echo '<form method="post">
    <input type="hidden" class="form-control" name="symlinkfinder_search" value="search">
    <button type="submit" class="btn btn-success">'.((!empty($_POST['symlinkfinder_search'])) ? 'Search again?' : 'Search').'</button>
</form><br>';
?>

<link rel="stylesheet" href="design/3rdparty/datatables/css/jquery.dataTables.min.css">
<style>
  .col-id{width: 30px !important;}
</style>
<div class="content noPad clearfix">
    <table id="symlinks" cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
        <thead>
            <tr class='evenrowcolor'></tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<script type="text/javascript" src="design/3rdparty/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  var jq = $.noConflict();
  jq(document).ready(function($){
    if(symlinks != ''){
        i = 1;
        var table = $('#symlinks').DataTable({
            "aaSorting": [],
            "rowReorder": false,
            "sPaginationType": "full_numbers",
            "bPaginate": true,
            "bJQueryUI": false,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "bProcessing": true,
            "iDisplayLength": 25,
            "deferRender": true,
            columns: [
              { title: '#', class: 'col-id'},
              { title: 'Symlink'}
            ]
          });
          jq(symlinks).each(function( index ) {
            table.row.add([i++, symlinks[index]]);
          });
          table.draw();
      }
});
</script>

<!-- be fair and don't remove next line, thank you -->
<br><br><small>Donate <a href="https://paypal.me/gogo1207"><i aria-hidden="true" class="icomoon-icon-paypal"></i></a> | &copy;2017-<?php echo date('Y');?> <a style="color: #353535;" href="https://goran-margetic.iz.hr">GM</a></small>
