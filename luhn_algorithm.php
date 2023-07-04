<?php

$ccd = '5105 1051 0510 5100';  // Credit card number
$strip_str =  str_replace(' ', '', $ccd);  // Remove spaces from the card number

// Function to check if the card number is valid using the Luhn algorithm
function checkCard($strip_str) {
    $sum = 0;  // Initialize sum
    $numdigits = strlen($strip_str);  // Number of digits in the card number
    $parity = $numdigits % 2;  // Used to determine which digits to double

    // Iterate over each digit in the card number
    for ($i=0; $i<$numdigits; $i++) {
        $digit = $strip_str[$i];  // Current digit

        // Double every second digit starting from the right
        if ($i%2 == $parity) {
            $digit *= 2;
            // If the result is greater than 9, subtract 9
            if ($digit > 9) {
                $digit -= 9;
            }
        }

        // Add the current digit to the sum
        $sum += $digit;
    }

    // The card number is valid if the sum is a multiple of 10
    return ($sum % 10) == 0;
}

// Function to determine the card provider based on the card number
function cardProvider($strip_str) {
    // If the card number starts with 4, it's a Visa card
    if (preg_match("/^4/", $strip_str)) {
        return "Visa";
    } 
    // If the card number starts with 51 through 55, it's a MasterCard
    else if (preg_match("/^5[1-5]/", $strip_str)) {
        return "MasterCard";
    } 
    // If the card number starts with 34 or 37, it's an American Express card
    else if (preg_match("/^3[47]/", $strip_str)) {
        return "American Express";
    } 
    // If the card number starts with 300 through 305 or 36 or 38, it's a Diners Club card
    else if (preg_match("/^3(?:0[0-5]|[68])/", $strip_str)) {
        return "Diners Club";
    } 
    // If the card number starts with 6, it's a Discover card
    else if (preg_match("/^6/", $strip_str)) {
        return "Discover";
    } 
    // If the card number doesn't match any of the above patterns, the provider is unknown
    else {
        return "Unknown";
    }
}

$valid = checkCard($strip_str);  // Check if the card number is valid
$provider = cardProvider($strip_str);  // Determine the card provider

// Create a response array with the card number, validation result, and provider
$response = array(
    "creditCardNumber" => $ccd,
    "isValid" => $valid,
    "provider" => $provider
);

// Set the Content-Type header to application/json
header('Content-Type: application/json');
// Print the response array as a JSON string
echo json_encode($response);
