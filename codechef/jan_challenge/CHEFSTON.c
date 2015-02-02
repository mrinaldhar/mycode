#include<stdio.h>
#include<stdlib.h>
int main() {
	long long int N, K;
	long long int * ar;
	long long int i, num, T, max;
	scanf("%lld", &T);
	while(T>0) {
		max = 0;
		scanf("%lld %lld", &N, &K);
		ar = (long long int *)calloc(N, sizeof(int));
		for(i=0; i<N; i++) {
			scanf("%lld", &ar[i]);
			ar[i] = K / ar[i];
		}
		for(i=0; i<N; i++) {
			scanf("%lld", &num);
			if (num * ar[i] > max) {
				max = num * ar[i];
			}
		}
		free(ar);
		printf("%lld\n", max);
		T=T-1;
	}

	return 0;
}
