<!DOCTYPE html>
	<html>
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Laboratory Activity</title>

    <style>
.number{
	width: 24%;
    height: 35px;
	padding: 5px;
	border: 1px solid black;
	border-radius: 4px;
	box-sizing: border-box;
    font-size:15px;
  }
.btn{
    position: relative;
    left:44%;
	color: black;
	margin: 6px 0;
    border-radius: 4px;
    border: 1px solid black;
	cursor: pointer;
    width: 24%;
    height: 35px;
    background-color: white;
  }

 </style>
</head>

	<body>
       <form action="labAct_currency.php" method="POST">
        <center><br>
        <h4>Enter Amount:  <input class="number" type="text" name="amount" maxlength="3999" value="<?php if (isset($_POST['amount'])) echo htmlspecialchars($_POST['amount']); ?>" ></h4></center>
        <button type="submit" class="btn" name="submit" >Generate</button><br><br>
        </form>
        <center>

        <?php
            error_reporting(0);
            $display_amount=0;
            $oneThousand=0;
            $fiveHundred=0;
            $oneHundred=0; 
            $fifty=0;
            $twenty=0; 
            $ten=0;  
            $five=0; 
            $one=0;
          
            $Amount = $_POST['amount'];
            $disAmount = $Amount;	
            if($Amount > 3999 || $Amount < 0){
                die("Enter number between 0 to 3999.");
            }
            $oneThousand = $Amount / 1000;
            $Amount %= 1000;
            $fiveHundred = $Amount / 500;
            $Amount %= 500;
            $oneHundred = $Amount / 100;
            $Amount %= 100;
            $fifty = $Amount / 50;
            $Amount %= 50;
            $twenty = $Amount / 20;
            $Amount %= 20;
            $five = $Amount / 5;
            $Amount %= 5;
            $one = $Amount / 1;
            $Amount %= 1;
        
            echo '1000 bill - <input  class="mon" type=text value="'.intval($oneThousand).'" readonly><br><br>';	
            echo '500 bill - <input  class="mon" type=text value="'.intval($fiveHundred).'" readonly><br><br>';
            echo '100 bill - <input  class="mon" type=text value="'.intval($oneHundred).'" readonly><br><br>';
            echo '50 bill - <input  class="mon" type=text value="'.intval($fifty).'" readonly><br><br>';
            echo '20 bill - <input  class="mon" type=text value="'.intval($twenty).'" readonly><br><br>';
            echo '10 peso - <input  class="mon" type=text value="'.intval($ten).'" readonly><br><br>';
            echo '5 peso - <input  class="mon" type=text value="'.intval($five).'" readonly><br><br>';
            echo '1 peso - <input  class="mon" type=text value="'.intval($one).'" readonly><br>';
            
            function numToWord($disAmount)
            {
                $ones = array(
                0 =>"Zer0",
                1 => "One",
                2 => "Two",
                3 => "Three",
                4 => "Four",
                5 => "Five",
                6 => "Six",
                7 => "Seven",
                8 => "Eight",
                9 => "Nine",
                10 => "Ten",
                11 => "Eleven",
                12 => "Twelve",
                13 => "Thirteen",
                14 => "Fourteen",
                15 => "Fifteen",
                16 => "Sixteen",
                17 => "Seventeen",
                18 => "Eighteen",
                19 => "Nineteen",
                );
                $tens = array( 
                0 => "Zero",
                1 => "Ten",
                2 => "Twenty",
                3 => "Thirty", 
                4 => "Forty", 
                5 => "Fifty", 
                6 => "Sixty", 
                7 => "Seventy", 
                8 => "Eighty", 
                9 => "Ninety" 
                ); 
                $hundreds = array( 
                "Hundred", 
                "thousand",  
                );
                $disAmount = number_format($disAmount,2,".",","); 
                $ammountArr = explode(".",$disAmount); 
                $wholeNumber = $ammountArr[0]; 
                $decimalNumber = $ammountArr[1]; 
                $wholeArr = array_reverse(explode(",",$wholeNumber)); 
                krsort($wholeArr,1); 
                $txt = ""; 
                foreach($wholeArr as $key => $i){
                while(substr($i,0,1)=="0")
                    $i=substr($i,1,5);
    
                if($i < 20){ 
                    $txt .= $ones[$i]; 
                    }elseif($i < 100){
    
                    if(substr($i,0,1)!="0")
                        $txt .= $tens[substr($i,0,1)]; 
                    if(substr($i,1,1)!="0")
                        $txt .= " ".$ones[substr($i,1,1)]; 
                    }else{ 
                        if(substr($i,0,1)!="0") $txt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
                        if(substr($i,1,1)!="0")$txt .= " ".$tens[substr($i,1,1)]; 
                        if(substr($i,2,1)!="0")$txt .= " ".$ones[substr($i,2,1)]; 
                    } 
                    if($key > 0){ 
                        $txt .= " ".$hundreds[$key]." "; 
                    }
                } 
                if($decimalNumber > 0){
                $txt .= " and ";
                if($decimalNumber < 20){
                $txt .= $ones[$decimalNumber];
                }elseif($decimalNumber < 100){
                $txt .= $tens[substr($decimalNumber,0,1)];
                $txt .= " ".$ones[substr($decimalNumber,1,1)];
                }
                }
                return $txt;
                }
                extract($_POST);
                if(isset($submit))
                {
                echo "<br><p><b>Amount in Words: </b>".numToWord("$disAmount")."</p>";
            }
       
		?>
     </center>
	</body>
</html>
