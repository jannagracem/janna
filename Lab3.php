<!DOCTYPE html>
<html>
<head>
    <title>Binary, Octal, Hexadecimal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F08080;
            text-align: center;
        }

        .container {
            background-color: #FA8072;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 500px;
            margin: 0 auto;
            margin-top: 40px;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #FA8072;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Binary, Octal, Hexadecimal</h1>
    <form method="POST">
        <label for="numbers">Enter Decimal Numbers (space-separated):</label>
        <input type="text" name="numbers" id="numbers" required>
        <button type="submit">Convert</button>
    </form>

    <?php
    function convertNumbers($input) {
        $decimalNumbers = explode(" ", $input);
        $conversionResults = array();

        foreach ($decimalNumbers as $number) {
            $number = trim($number);
            if (is_numeric($number)) {
                $decimal = intval($number);
                $binary = decbin($decimal);
                $octal = decoct($decimal);
                $hexadecimal = dechex($decimal);

                $conversionResults[] = array(
                    'decimal' => $decimal,
                    'binary' => $binary,
                    'octal' => $octal,
                    'hexadecimal' => $hexadecimal
                );
            }
        }

        return $conversionResults;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $input = $_POST["numbers"];
        $results = convertNumbers($input);

        if (!empty($results)) {
            echo "<h2>Conversion Results:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Binary</th><th>Octal</th><th>Hexadecimal</th></tr>";

            foreach ($results as $result) {
                echo "<tr>";
                echo "<td>{$result['binary']}</td>";
                echo "<td>{$result['octal']}</td>";
                echo "<td>{$result['hexadecimal']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    }
    ?>
</div>
</body>
</html>
