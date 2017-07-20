from getnumber import getnumber
getnumber() # get most recent one
with open('data/mostrecent.txt', 'r') as f:
	mostrecent = f.read()

for num in range(639, int(mostrecent)):
	# 639 : First lottery after MV was released
	getnumber(num)
