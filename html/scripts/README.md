## Other actions required
Add to sudoers in `# Allow member of group sudo to execute any command` section
%www-data ALL=(ALL:ALL) NOPASSWD: /var/www/html/scripts/reboot.sh
%www-data ALL=(ALL:ALL) NOPASSWD: /var/www/html/scripts/poweroff.sh
%www-data ALL=(ALL:ALL) NOPASSWD: /var/www/html/scripts/set_date.py