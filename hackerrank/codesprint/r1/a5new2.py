def calcpath(mice, holes):
	time = 0
	pickedhole = 0
	index =0
	for miceloc in mice:
		if miceloc in holes:
			index = holes.index(miceloc)
			del holes[index]
		else:
			arb = [abs(x-miceloc) for x in holes]
			least = min(arb)
			index = holes.index(least+miceloc)
			del holes[index]
			if time < least:
				time = least
	print time
holes = []
def getmin(x):
	global holes
	x=int(x)
	arb = map(abs, holes)
	return min(arb)

def doaction():
	global holes
	n = raw_input()
	n = int(n)
	newmice = raw_input()
#	mice = map(int, newmice.split())
#	mice = [int(each) for each in newmice.split()]
	newholes = raw_input()
#	holes = [int(each) for each in newholes.split()]
	holes = map(getmin, newholes.split())
	mice = map(getmin, newmice.split())
#	calcpath(mice, holes)
	print max(mice)
def init():
	loops=raw_input()
	loops = int(loops)
	while loops>0:
		doaction()
		loops = loops - 1
	exit()
init()
