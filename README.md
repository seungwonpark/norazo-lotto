# norazo-lotto
![getnumber-status](https://circleci.com/gh/seungwonpark/norazo-lotto.svg?style=shield)

노라조가 [니팔자야 MV](https://www.youtube.com/watch?v=s0UjELAUMjE)(2015.02.22)에서 추천한 복권번호 비교

[Demo](http://swpark.ddns.net/norazo-lotto)

## How to setup
```bash
mkdir data # make 'data' folder.
python3 initialize.py
sudo crontab -e # configure crontab to execute `update.sh` every Saturday 21:00. 
00 21 * * 6 /var/www/html/norazo-lotto/update.sh
```
