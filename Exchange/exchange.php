<?php
$value = strtolower(readline("Enter (amount) (currency) "));
$convert = strtolower(readline("Enter (currency) to convert "));
$split = explode(" ", $value);
$amount = $split[0];
$currency = $split[1];
$link = "https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/$currency.json";
$file = file_get_contents($link);
if ($file === false) {
    die("Failed to fetch data from the API.");
}
$data = json_decode($file, true);
$rate = $data[$currency][$convert];
$result = number_format($amount * $rate, 2);
echo "$amount $currency is $result $convert";