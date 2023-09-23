<!DOCTYPE html>
<html>
<head>
    <title>Numbers 1 to 100</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <center>
    <h3>Numbers from 1 to 100 in 10 columns:</h3><br>
    <table>
        <tr>
            <?php
            $sum = 0;
            $count = 0;
            for ($i = 1; $i <= 100; $i++) {
                if ($count % 10 === 0) {
                    if ($count > 0) {
                        echo "</tr>";
                    }
                    echo "<tr>";
                }
                echo "<td";
                if ($i % 5 == 0 || $i % 6 == 0) {
                    echo " class='highlight'";
                    $sum += $i;
                }
                echo ">$i</td>";
                $count++;
            }
            ?>
        </tr>
    </table><br>
    <p>Sum of highlighted numbers: <?php echo $sum; ?></p>
    <p>Count of the highlighted numbers: <?php echo $count; ?></p>
    </center>
   
</body>
</html>
