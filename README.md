# norazo-lotto
노라조가 [니팔자야 MV](https://www.youtube.com/watch?v=s0UjELAUMjE)(2015.02.22)에서 추천한 복권번호 비교

[Demo](http://swpark.ddns.net/norazo-lotto)

## Settings
Make 'data' folder. `mkdir data`

Configure crontab to execute `update.sh` every Saturday 21:00. 

`sudo crontab -e`

Then add following 

`00 21 * * 6 /var/www/html/norazo-lotto/update.sh`
