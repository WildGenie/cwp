
## CWP - Centos-WebPanel - Fail3Ban Bridge

###Installation:
1) Download and save file fail2ban.php into: ```/usr/local/cwpsrv/htdocs/resources/admin/modules/fail2ban.php```
2) Login to CWP web interface as root and open url: ```HOSTNAME/admin/index.php?module=fail2ban```
3) Click Install button and wait while page is loading
4) Edit file: ```/etc/fail2ban/jail.conf```
   Set next values:
```
[DEFAULT]
bantime = 3600
[sshd]
enable = true
```
5) Restart Fail2Ban to take effect

##### Copyright (c) 2018 Goran Margetić
##### License: BSD 3-Clause License
