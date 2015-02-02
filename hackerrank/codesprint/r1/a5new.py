def getppath(mouse, holes):
	dist = mouse
	time = 0
	while mouse not in holes:
		mouse = mouse + 1
		time = time + 1
	return time

def getnpath(mouse, holes):
	dist = mouse
	time = 0
	while mouse not in holes:
		mouse = mouse + 1
		time = time + 1
	return time

def calcpath(mice, holes):
	time = 0
	pickedhole = 0
	index =0
	for miceloc in mice:
		if miceloc in holes:
			index = holes.index(miceloc)
			del holes[index]
		else:
			least = min(getppath(miceloc, holes), getnpath(miceloc, holes))
			index = holes.index(miceloc+least)
			del holes[index]
			if time < least:
				time = least
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
#	holes.sort()
#	mice.sort()
	calcpath(mice, holes)

def init():
	loops=raw_input()
	loops = int(loops)
	while loops>0:
		doaction()
		loops = loops - 1
	exit()
init()
