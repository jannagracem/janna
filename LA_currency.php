<?php
$text = "";
if (isset($_POST['generate'])) {
    $amount = $_POST['num'];

    //Total Calculation of 1000 peso bill
    $total = $amount / 1000;
    $totalAmount1 = intval($total); // highest peso bill 1000

    // total caluclation of 500 peso bill
    $amount = $amount - ((int) $total * 1000); //what is the highest? 1000
    $total = $amount / 500;
    $totalAmount2 = intval($total);

    // total caluclation of 100 peso bill
    $amount = $amount - ((int) $total * 500);
    $total = $amount / 100;
    $totalAmount3 = intval($total);

    // total caluclation of 100 peso bill
    $amount = $amount - ((int) $total * 100);
    $total = $amount / 50;
    $totalAmount4 = intval($total);

    // total caluclation of 100 peso bill
    $amount = $amount - ((int) $total * 50);
    $total = $amount / 20;
    $totalAmount5 = intval($total);

    // total caluclation of 100 peso bill
    $amount = $amount - ((int) $total * 20);
    $total = $amount / 10;
    $totalAmount6 = intval($total);

    // total caluclation of 100 peso bill
    $amount = $amount - ((int) $total * 10);
    $total = $amount / 5;
    $totalAmount7 = intval($total);

    // total caluclation of 100 peso bill
    $amount = $amount - ((int) $total * 5);
    $total = $amount / 1;
    $totalAmount8 = intval($total);
}

function numberTowords($num)
{

    $ones = array(
        0 => "ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN",
        "014" => "FOURTEEN"
    );
    $tens = array(
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY",
        3 => "THIRTY",
        4 => "FORTY",
        5 => "FIFTY",
        6 => "SIXTY",
        7 => "SEVENTY",
        8 => "EIGHTY",
        9 => "NINETY"
    );
    $hundreds = array(
        "HUNDRED",
        "THOUSAND",
        "MILLION",
        "BILLION",
        "TRILLION",
        "QUARDRILLION"
    ); /*limit t quadrillion */
    $num = number_format($num, 2, ".", ",");
    $num_arr = explode(".", $num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",", $wholenum));
    krsort($whole_arr, 1);
    $rettxt = "";
    foreach ($whole_arr as $key => $i) {

        while (substr($i, 0, 1) == "0")
            $i = substr($i, 1, 5);
        if ($i < 20) {
            /* echo "getting:".$i; */
            @$rettxt .= $ones[$i];
        } elseif ($i < 100) {
            if (substr($i, 0, 1) != "0")  $rettxt .= $tens[substr($i, 0, 1)];
            if (substr($i, 1, 1) != "0") $rettxt .= " " . $ones[substr($i, 1, 1)];
        } else {
            if (substr($i, 0, 1) != "0") $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
            if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
            if (substr($i, 2, 1) != "0") $rettxt .= " " . $ones[substr($i, 2, 1)];
        }
        if ($key > 0) {
            $rettxt .= " " . $hundreds[$key] . " ";
        }
    }
    if ($decnum > 0) {
        $rettxt .= " and ";
        if ($decnum < 20) {
            $rettxt .= $ones[$decnum];
        } elseif ($decnum < 100) {
            $rettxt .= $tens[substr($decnum, 0, 1)];
            $rettxt .= " " . $ones[substr($decnum, 1, 1)];
        }
    }
    return $rettxt;
}
extract($_POST);
if (isset($generate)) {
    $text = numberTowords("$num");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity1</title>
        <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"
/>
    <style>
       .gradient-custom {
  /* fallback for old browsers */
  background: #84fab0;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
    </style>
</head>
<div class="fw-bold text-danger text-center mt-3 mb-3">
                            <?= $text ?>
                        </div>
<body class="gradient-custom">
<div class="container">
       <div class="d-flex justify-content-center vh-110">
       <div class="card" style="width:350px;">
                <form method="POST" action="">
                    <div class="card-body">
                        <label for="amount" class="form-label fw-bold">Enter Amount:</label>
                        <input class="form-control" type="number" name="num" value="<?php if (isset($num)) {
                                                                                        echo $num;
                                                                                    } ?>" required>
                        <div class=" gap-2">
                        <button type="submit" name="generate" class="btn btn-success btn-block mt-2">Generate</button>
                        </div>

                        <div class="h6 mt-3">
                        <div class="me-3">
                                    1000 coins
                            </div>
                            </div>
                            <div>
                                <input name="oneThousand" class="form-control" type="number" value="<?= $totalAmount1; ?>" readonly>
                            </div>

                            <div class="h6 mt-3">
                        <div class="me-3">
                                    500 coins
                            </div>
                            </div>
                            <div>
                                <input name="fiveHundred" class="form-control" type="number" value="<?= $totalAmount2; ?>" readonly>
                            </div>

                            <div class="h6 mt-3">
                        <div class="me-3">
                                    100 coins
                            </div>
                            </div>
                            <div>
                                <input name="oneHundred" class="form-control" type="number" value="<?= $totalAmount3; ?>" readonly>
                            </div>

                            <div class="h6 mt-3">
                        <div class="me-3">
                                    50 coins
                            </div>
                            </div>
                            <div>
                                <input name="fifty" class="form-control" type="number" value="<?= $totalAmount4; ?>" readonly>
                            </div>

                            <div class="h6 mt-3">
                        <div class="me-3">
                                    20 coins
                            </div>
                            </div>
                            <div>
                                <input name="twenty" class="form-control" type="number" value="<?= $totalAmount5; ?>" readonly>
                            </div>

                            <div class="h6 mt-3">
                        <div class="me-3">
                                    10 coins
                            </div>
                            </div>
                            <div>
                                <input name="ten" class="form-control" type="number" value="<?= $totalAmount6; ?>" readonly>
                            </div>

                            <div class="h6 mt-3">
                        <div class="me-3">
                                    5 coins
                            </div>
                            </div>
                            <div>
                                <input name="five" class="form-control" type="number" value="<?= $totalAmount7; ?>" readonly>
                            </div>

                            <div class="h6 mt-3">
                        <div class="me-3">
                                    1 coins
                            </div>
                            </div>
                            <div>
                                <input name="one" class="form-control" type="number" value="<?= $totalAmount8; ?>" readonly>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>