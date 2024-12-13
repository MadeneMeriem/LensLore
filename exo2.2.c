#include<stdio.h>
#include<stdlib.h>
#include<sys/types.h>
#include<unistd.h>
#include<signal.h>

void alarm_handler(int sig){

printf("Le temps est écoulé ! \n");
exit(0);


}

int main(){

signal(SIGALRM,alarm_handler);
printf("L'alarm sera déclanché pendant 10 seconds \n");
alarm(10);

pause();




}
