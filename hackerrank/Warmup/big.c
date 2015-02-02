#include<stdio.h>
#include<string.h>

int swap(char * string, int i, int j) {
	char c;
	c = string[i];
	string[i]=string[j];
	string[j]=c;
	return 1;
}
int main() {
	int n;
	scanf("%d", &n);
	char string[100];
	char * str;
	int len,i, j, k;
	while (n>0) {
		scanf("%s", string);
		len = strlen(string);
		str = strdup(string);
		k=0;
		for (i=len-1; i>=0; i--) {
			for (j=i-1; j>=0; j--) {
				if (string[j]<string[i]) {
					k=swap(string, i, j);
					break;
				}
			}
			if (k==1) {
				break;
			}
		}
		if (strcmp(string, str)==0) {
			printf("no answer\n");
		}
		else {
			printf("%s\n", string);
		}

		n=n-1;
	}
	return 0;
}
