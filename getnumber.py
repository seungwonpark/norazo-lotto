import urllib.request

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

	html_date = html.split('<img src="/img/contents/result/wininfo/txt_lotto_num02.gif"  alt="제" />')[1]
	html_date = html_date.split(' 추첨)')[0]
	html_date = html_date.split('<span>(')[1]
	html_date = html_date.replace('년 ','-')
	html_date = html_date.replace('월 ','-')
	html_date = html_date.replace('일','')

	html_win = html.split('<meta id="desc" name="description" content="나눔로또 ')[1]
	html_win = html_win.split('.')[0] # "735회 당첨번호 5,10,13,27,37,41+4"
	html_win_core = html_win.split('당첨번호 ')[1]
	html_win_core = html_win_core.replace('+',',')
	num = html_win_core.split(',')

	if(lottoNo == 0):
		lottoNo = int(html_win.split('회')[0])
		f_mostrecent = open('data/mostrecent.txt', 'w')
		f_mostrecent.write(str(lottoNo))

	writenum(lottoNo, html_date, num)
	print('Parsed %d' % lottoNo)
