import 'dart:io';
import 'dart:collection';

Map<String, int> namesWithScores = {};

void main(){
  String? name;
  int score = 0;

  do{
    stdout.write("Enter student's name: ");
    name = stdin.readLineSync();
    if (name == 'stop'){
      break;
    }
    else {
      stdout.write("Enter score: ");
      String? scoreInput = stdin.readLineSync();
      score = int.parse(scoreInput!);

      namesWithScores[name!] = score;
    }
  }while(true);

  final sortedValuesDesc = SplayTreeMap<String, dynamic>.from(
      namesWithScores, (keys1, keys2) => namesWithScores[keys2]!.compareTo(namesWithScores[keys1]!));
  print('${sortedValuesDesc.keys.first} got the highest score!');
  print('${sortedValuesDesc.keys.last} got the lowest score!');
}