<?php
class Encryption
{
    static function crypt($message)
    {
        $key = "GeeksforGeeks";
        // Store a string into the variable which
        // need to be Encrypted
        // $message = "Welcome to GeeksforGeeks\n";

        // Display the original string
        // echo "Original String: " . $message;

        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Store the encryption key
        // $encryption_key = "GeeksforGeeks";
        $encryption_key = $key;

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt(
            $message,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );
        return $encryption;
    }

    static function decrypt($crypted_message)
    {
        $key = "GeeksforGeeks";
        // Display the encrypted string
        // echo "Encrypted String: " . $crypted_message . "\n";

        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';

        // Store the decryption key
        // $decryption_key = "GeeksforGeeks";
        $decryption_key = $key;

        // Use openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt(
            $crypted_message,
            $ciphering,
            $decryption_key,
            $options,
            $decryption_iv
        );

        // Display the decrypted string
        // echo "Decrypted String: " . $decryption;
        return $decryption;
    }
}
