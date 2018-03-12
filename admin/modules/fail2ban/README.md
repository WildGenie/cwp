
## CWP - Centos-WebPanel - Fail3Ban Bridge

###Installation:
1) Open url as root inside CWP web interface: HOSTNAME/admin/index.php?module=fail2ban
2) Click Install button and wait while page is loading
2) Edit file: /etc/fail2ban/jail.conf
   Set next values:
```
[DEFAULT]
bantime = 3600
[sshd]
enable = true
```
4) Restart Fail2Ban to take effect

##### Copyright (c) 2018 Goran Margetić
##### License: BSD 3-Clause License
