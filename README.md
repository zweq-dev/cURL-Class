
# cURL Class

cURL Requests


## Kullanım

```php
<?php
include_once("/curlClass.php");
use curl\Request;

$get = Request::URL("http://localhost/api.php")->get();
$post = Request::URL("http://localhost/api.php")->post(["key1" => "value1"]);
$header = Request::URL("http://localhost/api.php")->header(["Authorization: 135135135", "Cookie: ASP.NET_15afa323451235"])->get();
?>
```

