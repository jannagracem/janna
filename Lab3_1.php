<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prime Number</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #454545;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #FA8072;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
        }

        .prime {
            color: green;
        }

        .not-prime {
            color: red;
        }

        .invalid {
            color: #ff9800;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Prime Number</h2>
        <form method="post">
            <label for="numbers">Enter numbers (separated by commas):</label><br>
            <input type="text" name="numbers" id="numbers" required><br>
            <input type="submit" value="Submit">
        </form>

        <?php
        function isPrime($number) {
            if ($number <= 1) {
                return false;
            }

            for ($i = 2; $i <= sqrt($number); $i++) {
                if ($number % $i == 0) {
                    return false;
                }
            }

            return true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numbers = $_POST['numbers'];
            $numberArr = explode(',', $numbers);

            echo '<h2>Result:</h2>';

            foreach ($numberArr as $number) {
                $trimmedNumber = trim($number);

                if (is_numeric($trimmedNumber)) {
                    $isPrime = isPrime($trimmedNumber);
                    echo $trimmedNumber . ' is <span class="' . ($isPrime ? 'prime' : 'not-prime') . '">' . ($isPrime ? 'PRIME' : 'NOT PRIME') . '</span><br>';
                } else {
                    echo $trimmedNumber . ' is <span class="invalid">not a valid number</span><br>';
                }
            }
        }
        ?>
    </div>
</body>
</html>
