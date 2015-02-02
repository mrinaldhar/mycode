def process(A, B, C, N, M):
	for i in xrange(0, M):
		for j in xrange(0, N):
			if j%B[i] == 0:
				A[j] = (A[j] * C[i])%(1000000007)

def init():
	inpi = raw_input()
	N,M = inpi.split(' ')
	N = int(N)
	M = int(M)
	A = raw_input()
	A = map(int, A.split(' '))
	B = raw_input()
	B = map(int, B.split(' '))
	C = raw_input()
	C = map(int, C.split(' '))
	process(A, B, C, N, M)
	for each in A:
		print each,
	print
init()
