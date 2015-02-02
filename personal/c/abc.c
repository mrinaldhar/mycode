#include<stdio.h>
#include<stdlib.h>

void a(char * point) {
	printf("%p\n", point);
}
int main() {
	char * p;
	a(p);
	p = malloc(sizeof(char));
	a(p);
	p = malloc(sizeof(char));
	a(p);
	free(p);
	(*p)='c';
	a(p);
	printf("This character is stored in memory that officially, has been unallocated: %c\n", (*p)); 
	p = malloc(sizeof(char));
	a(p);
	return 0;
}
