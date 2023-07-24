<?php

namespace curl;

class Request
{
    // Değişkenleri tanımlama
    public static $ch;
    public static $header = array();
    public static $postData = array();
    public static $curlURL;
    public static $timeout;

    // URL belirleme fonksiyonu
    public static function URL($url) {
        self::$ch = curl_init();
        self::$curlURL = $url;
        curl_setopt(self::$ch, CURLOPT_URL, $url);
        return new self;
    }

    // Timeout: cURL fonksiyonu çalıştırmak için belirlenen maximum bekleme süresini ayarlar
    // Örnek: ->timeout(10) [10 saniye bekler]
    public static function timeout($second = 120) {
        curl_setopt(self::$ch, CURLOPT_TIMEOUT, $second);
        return new self;
    }

    // Cookie Belirler
    // Örnek: ->cookie("Cookie: ASP.NET_12312413")
    public static function cookie($cookie = "") {
        curl_setopt(self::$ch, CURLOPT_COOKIE, $cookie);
        return new self;
    }

    // Cookie Belirler
    // Örnek: ->cookieFile("/Applications/XAMPP/xamppfiles/htdocs/cookie.txt")
    public static function cookieFile($cookieFile = "") {
        curl_setopt(self::$ch, CURLOPT_COOKIEFILE, $cookieFile);
        return new self;
    }

    // Header belirleme fonksiyonu
    // Örnek: ->header(["Authorization: 1231241235135", "Cookie: ASP.NET_123123123"])
    public static function header($header = array()) {
        curl_setopt(self::$ch, CURLOPT_HTTPHEADER, $header);
        return new self;
    }

    // GET Request çalıştırır
    public static function get() {
        curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec(self::$ch);
        return $response;
    }

    // POST Request çalıştırır
    // Örnek: ->post(["key1" => "value1", "key2" => "value2"])
    public static function post($data = array()) {
        curl_setopt(self::$ch, CURLOPT_POST, 1);
        curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec(self::$ch);
        return $response;
    }
}
?>
