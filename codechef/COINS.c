#include<stdio.h>
#include<stdlib.h>

long long int recurse(int n) {
	if (((n/2) + (n/3) + (n/4)) <=n) {
		return n;
	}
	else {
		return recurse(n/2) + recurse(n/3) + recurse(n/4);
	}
}

int main() {
	long long int sum, num;
	char n[100];
	char c;
	int i;
	i=0;
		while((c=getchar())!='\0')
		{
			if (c=='\n') {
				n[i]='\0';
				num = atoi(n);
				sum = recurse(num);
				printf("%lld\n", sum);
				i=0;
			}
			else {
				n[i]=c;
				i++;
			}
		}

	return 0;
}
