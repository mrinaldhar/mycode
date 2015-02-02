#include<stdio.h>

long long int fib(long long int n) {
	if (n==0 || n==1) {
		return n;
	}
	else {
		return fib(n-1) + fib(n-2);
	}
}
int main() {
	long long int x;
	
	while(1)
	{
		scanf("%lld", &x);
		printf("%lld\n", fib(x));
	}
	return 0;
}
