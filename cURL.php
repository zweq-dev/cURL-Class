<?php

namespace curl;

class Request
{
    // Define variables
    public static $ch;
    public static $header = array();
    public static $postData = array();
    public static $curlURL;
    public static $timeout;
    public static $encoding;
    public static $UserAgent;

    // Set URL Function
    public static function URL($url)
    {
        self::$ch = curl_init();
        self::$curlURL = $url;
        self::$header = array();
        self::$postData = array();
        self::$timeout = null;
        self::$encoding = null;
        self::$UserAgent = null;
        curl_setopt(self::$ch, CURLOPT_URL, $url);
        return new self;
    }

    // Set ENCODING
    public static function encoding($encode)
    {
        self::$encoding = $encode;
        curl_setopt(self::$ch, CURLOPT_ENCODING, self::$encoding);
        return new self;
    }

    // Set USER AGENT
    public static function userAgent($useragent)
    {
        self::$UserAgent = $useragent;
        curl_setopt(self::$ch, CURLOPT_USERAGENT, self::$UserAgent);
        return new self;
    }

    // Set timeout
    public static function timeout($second = 120)
    {
        curl_setopt(self::$ch, CURLOPT_TIMEOUT, $second);
        return new self;
    }

    // Set COOKIE
    // Example: ->cookie("Cookie: ASP.NET_12312413")
    public static function cookie($cookie = "")
    {
        curl_setopt(self::$ch, CURLOPT_COOKIE, $cookie);
        return new self;
    }

    // Set COOKIEFILE
    // Example: ->cookieFile("/Applications/XAMPP/xamppfiles/htdocs/cookie.txt")
    public static function cookieFile($cookieFile = "")
    {
        curl_setopt(self::$ch, CURLOPT_COOKIEFILE, $cookieFile);
        return new self;
    }

    // Save cookie into file
    public static function cookieJAR($jarFile = "")
    {
        curl_setopt(self::$ch, CURLOPT_COOKIEJAR, $jarFile);
        return new self;
    }

    // Set Header
    // Example: ->header(["Authorization: 1231241235135", "Cookie: ASP.NET_123123123"])
    public static function header($header = array())
    {
        curl_setopt(self::$ch, CURLOPT_HTTPHEADER, $header);
        return new self;
    }

    // GET Request
    public static function get()
    {
        curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt(self::$ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(self::$ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt(self::$ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec(self::$ch);
        curl_close(self::$ch);
        return $response;
    }

    // POST Request
    // Example: ->post(["key1" => "value1", "key2" => "value2"])
    public static function post($data = array())
    {
        curl_setopt(self::$ch, CURLOPT_POST, 1);
        curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec(self::$ch);
        curl_close(self::$ch);
        return $response;
    }

    public static function filter($val, $tf = false)
    {
        // Clear HTML Tags
        if ($tf == false) {
            $val = strip_tags($val);
        }
        // Prevent SQL Injection
        $val = addslashes(trim($val));
        return $val;
    }
}
?>
