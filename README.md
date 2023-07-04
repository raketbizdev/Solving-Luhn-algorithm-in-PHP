# PHP Credit Card Validator Using luhn Algorithm

This is a simple PHP script that validates a credit card number using the Luhn algorithm and identifies the card's provider.

## How to Use

  1. Set the variable $ccd to the credit card number you want to validate.
  2. Run the script. The script will output a JSON object with the validation status and card provider.

## Implementation Details

The script consists of two main functions: `checkCard()` and `cardProvider()`.


 ### **checkCard()**

The `checkCard()` function checks whether the provided credit card number is valid using the Luhn algorithm. The Luhn algorithm works as follows:

  1. Double the value of every second digit from the right.
  2. If the result of this doubling operation is greater than 9 (e.g., 8 * 2 = 16), then subtract 9 from that result (e.g., 16 - 9 = 7).
  3. Sum all the digits.
  4. If the total modulo 10 is equal to 0 (if the total ends in zero) then the number is valid according to the Luhn formula; otherwise, it is not valid.
  The `checkCard()` function implements these steps and returns true if the number is valid, and false otherwise.

 ### **cardProvider()**

 The `cardProvider()` function determines the credit card provider based on the starting digits of the card number. The function uses regular expressions to match these starting digits. The current implementation can identify Visa, MasterCard, American Express, Diners Club, and Discover cards.

## Output
The script outputs a JSON object with the following fields:

- **`creditCardNumber`:** The input credit card number.
- **`isValid`:** A boolean value indicating whether the card number is valid.
- **`provider`:** The card provider.

The Content-Type header is set to application/json for proper handling of the output.

## Example

For the credit card number '5105 1051 0510 5100', the script will output:

  ```json
  {
      "creditCardNumber": "5105 1051 0510 5100",
      "isValid": true,
      "provider": "MasterCard"
  }
  ```


 
