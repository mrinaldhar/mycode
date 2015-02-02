#include<stdio.h>
#include<stdlib.h>

int cmpint(const void *p1, const void *p2)
{
	if ((int)p1 > (int)p2) {
		return 1;
	}
	else {
		return -1;
	}
}

int main() {

	int T, n;
	int * holes;
	int * mice;
	int i,j,k;
	scanf("%d", &T);
	while(T>0) {
	scanf("%d", &n);
	while(n>0)
	{
		mice = (int *)calloc(n, sizeof(int));
		holes = (int *)calloc(n, sizeof(int));
		for (i=0; i<n; i++) {
			scanf("%d", &mice[i]);
		}
		for (i=0; i<n; i++)
		{
			scanf("%d", &holes[i]);
		}
		qsort(&mice[1], n-1, sizeof(int *), cmpint);
		qsort(&holes[1], n-1, sizeof(int *), cmpint);
		for (i=0; i<n; i++)
		{
			printf("%d-%d\n", mice[i],holes[i]);
		}
		n=n-1;
	}
	
	T=T-1;
	}

	return 0;
}
