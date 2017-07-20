import urllib.request
import re

def writenum(lottoNo, html_date, num):
	with open('data/' + str(lottoNo) + '.csv', 'w') as f:
		f.write(html_date)
		for i in range(0,7):
			f.write(',' + num[i])

def getnumber(lottoNo=0):
	url = 'http://nlotto.co.kr/gameResult.do?method=byWin'
	if(lottoNo != 0):
		url = url + '&drwNo=' + str(lottoNo)

	with urllib.request.urlopen(url) as response:
		html = str(response.read(), "euc-kr")

	html_date = re.findall(r'\((.*)일 추첨\)\</span\>\</h3\>', html)[0]
	html_date = html_date.replace('년 ','-')
	html_date = html_date.replace('월 ','-')
	html_win = re.findall(r'\<meta id\="desc" name\="description" content\="나눔로또 (.*). 1등 총', html)[0]

	num = html_win.split('당첨번호 ')[1].replace('+',',').split(',')
	if(lottoNo == 0):
		lottoNo = int(html_win.split('회')[0])
		f_mostrecent = open('data/mostrecent.txt', 'w')
		f_mostrecent.write(str(lottoNo))

	writenum(lottoNo, html_date, num)
	print('Parsed %d : %s %s' % (lottoNo, html_date, ','.join([str(x).rjust(3) for x in num])))
