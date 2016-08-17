# -*- coding: utf-8 -*-
# Based on python2

num = [0]
import urllib2
from sys import argv
script, lottoNo = argv

response = urllib2.urlopen('http://nlotto.co.kr/lotto645Confirm.do?method=byWin&drwNo=' + str(lottoNo))

html = unicode(response.read(), "euc-kr").encode("utf-8")
html_win = html.split('<div class="lotto_win_number mt12">')[1]
html_win = html_win.split('</div>')[0]
html_win_core = html_win.split('ball_')

html_date = html.split(')</span></h3>')[0]
html_date = html_date.split('/> <span>(')[1]
html_date = html_date.split(' 추첨')[0]

f = open('data/' + str(lottoNo) + '.csv', 'w')

f.write(html_date)
#print (html_date)

for i in range(1,8):
    num.append(html_win_core[i].split('.png')[0])
    f.write(',' + num[i])
