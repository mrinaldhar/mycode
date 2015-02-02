#include<stdio.h>
#include<stdlib.h>

long long int * ar;

long long int fib(long long int n) {
	if (n==0 || n==1) {
		return n;
	}
	else {
		if (ar[n]!=0)
		{
			return ar[n];
		}
		else {
			ar[n]=fib(n-1)+fib(n-2);
			return ar[n];	
		}

}
}
int main() {
	long long int x;
	ar = calloc(10000000, sizeof(int));

	while(1)
	{
		scanf("%lld", &x);
		printf("%lld\n", fib(x));
	}
	return 0;
}
