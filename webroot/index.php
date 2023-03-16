<?php

// https://uidev.jp/entry-71.html
echo 'hello';

$arrayParseUri = explode('/', $_SERVER['REQUEST_URI']);
$lastUri = end($arrayParseUri);
$call = substr($lastUri, 0, strcspn($lastUri,'?'));


if ($call === "") {
    // $call = strtoupper()
}
var_dump($call);
exit;
