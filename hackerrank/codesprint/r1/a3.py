def doaction():
	broken = raw_input()
	word = raw_input()
	count = 0
	done = []
	for each in word:
		if each in broken and each not in done:
			count = count + 1
			done.append(each)
	print count

def init():
	loops=raw_input()
	loops = int(loops)
	while loops>0:
		doaction()
		loops = loops - 1
	exit()
init()
