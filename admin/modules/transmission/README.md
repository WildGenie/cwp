# Simple Transmission Module for Centos-WebPanel (CWP)
Transmission WebGui Bridge Module for Transmission to Centos-WebPanel
##
Warning: This modul is created for my personal usage (also tested on CWP Centos7 x64) so there can be errors on different servers!
##
[More info about Transmission](https://transmissionbt.com/)
##
## Installation using FTP:
  1) Upload transmission.php to CWP Server
     -location: "/usr/local/cwpsrv/htdocs/resources/admin/modules"
  2) Open Url: yourdomain.tld/admin/index.php?module=transmission
  3) Click "Install" button

## Installation using Console:
  1) cd /usr/local/cwpsrv/htdocs/resources/admin/modules
  2) wget -O transmission.php https://raw.githubusercontent.com/gogo1207/cwp/master/admin/modules/transmission/transmission.php
  3) Open Url: yourdomain.tld/admin/index.php?module=transmission
  4) Click "Install" button

## Add button to Developers menu:
Add next code to file: /usr/local/cwpsrv/htdocs/resources/admin/include/3rdparty.php
 ```
 <!-- START-Transmission --><li><a href="index.php?module=transmission"><span class="icon16 icomoon-icon-arrow-right-3"></span>Transmission</a></li><!-- END-Transmission -->
 ```

## Updates:
  -

##
- Installation will download and install transmission-cli, transmission-daemon, transmission-common and epel-repo.

##
[Support Development and Learning with Small Donation](https://paypal.me/gogo1207)
