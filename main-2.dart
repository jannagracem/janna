import 'dart:io';
void main(){
  String cel='c';
  String fah='f';
  var fahrenheit;
  var celcius;
  stdout.write('Input choice: ');
  String? choice = stdin.readLineSync();
  if (choice==cel){
    stdout.write('Please input celcius');
    celcius=double.parse(stdin.readLineSync()!);
    fahrenheit = (celcius * 9.0)/5.0+32;
    print('Farenheit is : $fahrenheit');
  }
  else if (choice==fah){
    stdout.write('Please Input Farenheit');
    fahrenheit=double.parse(stdin.readLineSync()!);
    celcius=5*(fahrenheit-32)/9;
    print('Celcius is : $celcius');
  }
  else {
    print('invalid input');
  }
}