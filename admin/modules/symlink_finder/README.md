# Simple Symlink Finder Module for Centos-WebPanel (CWP)
Symlink Finder - List all symbolic links on your CWP server
##
Warning: This modul is created for my personal usage (also tested on CWP Centos7 x64) so there can be errors on different servers!
##
## Installation using FTP:
  1) Upload symlink_finder.php to CWP Server
     -location: "/usr/local/cwpsrv/htdocs/resources/admin/modules"
  2) Open Url: yourdomain.tld/admin/index.php?module=symlink_finder

## Installation using Console:
  1) cd /usr/local/cwpsrv/htdocs/resources/admin/modules
  2) wget -O symlink_finder.php https://raw.githubusercontent.com/gogo1207/cwp/master/admin/modules/symlink_finder/symlink_finder.php
  3) Open Url: yourdomain.tld/admin/index.php?module=symlink_finder

## Add button to Developers menu:
Add next code to file: /usr/local/cwpsrv/htdocs/resources/admin/include/3rdparty.php
 ```
 <!-- START-Symlink Finder --><li><a href="index.php?module=symlink_finder"><span class="icon16 icomoon-icon-arrow-right-3"></span>Symlink Finder</a></li><!-- END-Symlink Finder -->
 ```

## Updates:
  -

##
[Support Development and Learning with Small Donation](https://paypal.me/gogo1207)
