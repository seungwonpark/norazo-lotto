# norazo-lotto
니팔자야에 나온 로또번호 비교(Currently Alpha)

[Demo](http://swpark.ddns.net/norazo-lotto)

## Settings
Make 'data' folder. `mkdir data`

Execute crontab to execute `update.sh` every Saturday. `sudo crontab -e`

Then add following `59 23 * * 6 /var/www/html/norazo-lotto/update.sh`
