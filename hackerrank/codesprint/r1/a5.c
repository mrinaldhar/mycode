#include<stdio.h>
#include<stdlib.h>

int abs(int a)
{
	if (a<0)
	{
		return -1*a;
	}
	else {
		return a;
	}
}
int calctime(int mouse, int * holes,int n) {
	int time, i;
	time=abs(holes[0]-mouse);
	int newtime;
	int index;
	for (i=0; i<n;i++)
	{
		if (holes[i]!=979762)
		{
			newtime = abs(holes[i]-mouse);
			if (newtime < time) {
				time = newtime;
				index = i;
			}
		}
	}
holes[i]=979762;
return time;
}
int main() {
	int i, n, T;
	int * holes;
	int mouse;
	int timenow, time;
	scanf("%d", &T);
	while (T>0)
	{
	time = -1;
	scanf("%d", &n);
	holes = (int *)calloc(n, sizeof(int));
	for (i=0; i<n; i++)
	{
		scanf("%d", &holes[i]);
	}
	for (i=0; i<n; i++)
	{
		scanf("%d", &mouse);
		timenow = calctime(mouse, holes,n);
		if (time < timenow) {
			time = timenow;
		}
	}
	printf("%d\n", time);

	T=T-1;
	}
return 0;
}
