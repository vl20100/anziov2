<?php

namespace App\Utils;

class StringHelper
{
    private static StringHelper $instance;
    private const METHOD = "AES-256-CBC";
    private const KEY = "JeanLainPasswordKey";
    private const IV = "JeanLainPasswordIV";

    private function __construct()
    {
    }

    /**
     * Singleton
     *
     * @return StringHelper
     */
    public static function getInstance(): StringHelper
    {
        if (!isset(self::$instance) || is_null(self::$instance)) {
            self::$instance = new StringHelper();
        }

        return self::$instance;
    }

    /**
     * Encrypts the string
     *
     * @param string $string
     * @return string
     */
    public function encrypt(string $string): string
    {
        $key = hash('sha256', self::KEY);
        $iv = substr(hash('sha256', self::IV), 0, 16);

        $output = openssl_encrypt($string, self::METHOD, $key, 0, $iv);
        $output = base64_encode($output);

        return $output;
    }

    /**
     * Decrypts the string
     *
     * @param string $string
     * @return string
     */
    public function decrypt(string $string): string
    {
        $key = hash('sha256', self::KEY);
        $iv = substr(hash('sha256', self::IV), 0, 16);

        $output = openssl_decrypt(base64_decode($string), self::METHOD, $key, 0, $iv);

        return $output;
    }
}
