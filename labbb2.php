<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Updated Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laboratory Activity</title>

    <style>
        .number {
            width: 24%;
            height: 35px;
            padding: 5px;
            border: 1px solid black;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 15px;
        }

        .btn {
            position: relative;
            left: 44%;
            color: black;
            margin: 6px 0;
            border-radius: 4px;
            border: 1px solid black;
            cursor: pointer;
            width: 24%;
            height: 35px;
            background-color: white;
        }

        .mon {
            width: 24%;
            height: 35px;
            padding: 5px;
            border: 1px solid black;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <form action="labAct_currency.php" method="POST">
        <center><br>
            <h4>Enter Amount: <input class="number" type="text" name="amount" maxlength="3999" value="<?php if (isset($_POST['amount'])) echo htmlspecialchars($_POST['amount']); ?>"></h4></center>
            <button type="submit" class="btn" name="submit">Generate</button><br><br>
    </form>
    <center>

        <?php
        error_reporting(0);
        $display_amount = 0;
        $oneThousand = 0;
        $fiveHundred = 0;
        $oneHundred = 0;
        $fifty = 0;
        $twenty = 0;
        $ten = 0;
        $five = 0;
        $one = 0;

        $Amount = $_POST['amount'];
        $disAmount = $Amount;
        if ($Amount > 3999 || $Amount < 0) {
            die("Enter a number between 0 to 3999.");
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
        $ten = $Amount / 10; // Calculate the $ten value
        $Amount %= 10; // Update $Amount after calculating $ten
        $five = $Amount / 5;
        $Amount %= 5;
        $one = $Amount / 1;
        $Amount %= 1;

        echo '1000 bill - <input  class="mon" type=text value="' . intval($oneThousand) . '" readonly><br><br>';
        echo '500 bill - <input  class="mon" type=text value="' . intval($fiveHundred) . '" readonly><br><br>';
        echo '100 bill - <input  class="mon" type=text value="' . intval($oneHundred) . '" readonly><br><br>';
        echo '50 bill - <input  class="mon" type=text value="' . intval($fifty) . '" readonly><br><br>';
        echo '20 bill - <input  class="mon" type=text value="' . intval($twenty) . '" readonly><br><br>';
        echo '10 peso - <input  class="mon" type=text value="' . intval($ten) . '" readonly><br><br>';
        echo '5 peso - <input  class="mon" type=text value="' . intval($five) . '" readonly><br><br>';
        echo '1 peso - <input  class="mon" type=text value="' . intval($one) . '" readonly><br>';

        function numToWord($disAmount)
        {
            // The rest of your code remains unchanged
            // ...
        }

        extract($_POST);
        if (isset($submit)) {
            echo "<br><p><b>Amount in Words: </b>" . numToWord("$disAmount") . "</p>";
        }

        ?>
    </center>
</body>

</html>
