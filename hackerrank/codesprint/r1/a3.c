#include<stdio.h>

void cleartable(int broken[26][2])
{
	int i=0;
	for (i=0; i<26; i++)
	{
		broken[i][0]=0;
		broken[i][1]=0;
	}
}
int main() {
	int T;
	char c;
	int count;
	int broken[26][2];
	scanf("%d", &T);
	getchar();
	while (T>0) {
		cleartable(broken);
		count=0;
		while ((c=getchar())!='\n')
		{
			broken[c-97][0]=1;
		}
		while ((c=getchar())!='\n')
		{
			if (broken[c-97][0]==1)
			{
				if (broken[c-97][1]==0)
				{
					count++;
					broken[c-97][1]=1;
				}
			}
		}
		printf("%d\n", count);
		T=T-1;
	}

	return 0;
}
