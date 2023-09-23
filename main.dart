import 'dart:io';
void main() {
  int lowestscore = 0;
  int highestscore= 0;
  while (true) {
    stdout.write('Enter Score:');
    String ? input = stdin.readLineSync();
    if (input=='stop') {
      break;
    }else {
      int number = int.parse (input!);
      if (highestscore==0 && lowestscore==0){
        highestscore = number;
        lowestscore = number;
      }else{
        if(number > highestscore ){
          highestscore=number;
        } else if (number < lowestscore) {
          lowestscore=number;
        }
      }
    }
  }
  print('Highest Score : $highestscore');
  print('Lowest Score: $lowestscore');

}