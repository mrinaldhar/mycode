#include<stdio.h>
void looper(int * count) {
	printf("%d\n", *count);
	*count = *count + 1;
}
int main() {
	int c;
	c=0;
	while(1)
	looper(&c);
return 0;
}
