#include<stdio.h>
#include<string.h>
#include<math.h>
#include<stdlib.h>

int main() {

	int t, n=0, i;
	double average;
	int * marks;
	int count;
	scanf("%d", &t);
	while(t>0)
	{	i=0;
		count = 0;
		average=0;
		scanf("%d", &n);
		marks = (int *)malloc(n*sizeof(int));
		for (i=0; i<n; i++) {
			scanf("%d", &marks[i]);
			average = average + marks[i];
		}
		average = average/n;
		for (i=0; i<n; i++)
		{
		if (marks[i]>average)
		{
			count++;
		}

		}
		printf ("%d\n", count);

		t=t-1;
	}


return 0;
}
