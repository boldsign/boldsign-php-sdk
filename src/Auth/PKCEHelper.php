<?php

namespace BoldSign\Auth;


class PKCEHelper
{
    /**
     * Generates a PKCE code_verifier and its corresponding code_challenge.
     *
     * @return array An array containing 'code_verifier' and 'code_challenge'.
     * @throws \Exception If an error occurs during generation.
     */
    public static function generatePKCECodes(): array
    {
        try {
            // Generate a random string of 32 bytes and encode it in a URL-safe base64 format
            // This serves as the code_verifier, which is used in the OAuth PKCE flow.
            $codeVerifier = rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');

            // Generate the SHA-256 hash of the code_verifier
            // Encode the hash in base64 format and make it URL-safe
            // This serves as the code_challenge, which is sent during authorization.
            $codeChallenge = rtrim(strtr(base64_encode(hash('sha256', $codeVerifier, true)), '+/', '-_'), '=');

            // Return the generated PKCE codes as an array
            return [
                'code_verifier' => $codeVerifier,
                'code_challenge' => $codeChallenge,
            ];
        }

        catch (\Exception $e) {
            // Catch and rethrow any exception that occurs during PKCE generation

            throw new \Exception("Error generating PKCE codes: " . $e->getMessage());
        }
    }
}
