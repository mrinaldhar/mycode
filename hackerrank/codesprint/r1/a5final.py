def calcdist(mice,n):
	i=0
	time = 0
	while i<n-1:
		newtime = abs(mice[i]-mice[i+1])
		if newtime > time:
			time = newtime
		i=i+2
	print time

def doaction():
	n = raw_input()
	n = int(n)
	newmice = raw_input()
	mice = map(int, newmice.split())
#	mice = [int(each) for each in newmice.split()]
	newholes = raw_input()
#	holes = [int(each) for each in newholes.split()]
	holes = map(int, newholes.split())
	mice.extend(holes)
	mice.sort()
#	print mice
	calcdist(mice,2*n)
def init():
	loops=raw_input()
	loops = int(loops)
	while loops>0:
		doaction()
		loops = loops - 1
	exit()
init()
