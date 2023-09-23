import 'dart:io';

double? value;

celsiusToFahrenheit(){
  value = (value! * (9/5)) + 32;
  return value;
}

fahrenheitToCelsius(){
  value = (value! - 32) * (5/9);
  return value;
}

void main(){
  String? temperature;

  do{
    stdout.write('Please choose a temperature for conversion\n["c" for Celsius / "f" for Fahrenheit]: ');
    temperature = stdin.readLineSync();
  }while((temperature != 'c' && temperature != 'f' ) || (temperature != 'f' && temperature != 'c' ));

  stdout.write('Enter the value you want to convert: ');
  value = double.parse(stdin.readLineSync()!);

  if(temperature == 'c'){
    celsiusToFahrenheit();
    print('Celsius to Fahrenheit: ${value!.toStringAsFixed(2)}');
  }

  else if(temperature == 'f'){
    fahrenheitToCelsius();
    print('Fahrenheit to Celsius: ${value!.toStringAsFixed(2)}');
  }
}