<?php
// http://localhost:8080/
// https://uidev.jp/entry-71.html
// https://www.blog.danishi.net/2019/05/29/post-1292/
// https://qiita.com/kahirokunn/items/175b82295ab683ffb624
require_once '../config/constants.php';

if (empty($_SERVER['REQUEST_URI'])) {
    exit;
}

// URLを取得
$arrayParseUri = explode(SYMBOL_SLASH, $_SERVER['REQUEST_URI']);
$lastUri = end($arrayParseUri);
$call = substr($lastUri, 0, strcspn($lastUri, SYMBOL_QUESTION));

// URLからアクションが取得できない場合はIndexを参照する
if ($call === "") {
    $call = "Index";
}

// URLと同名のControllerクラスを探しに行く
if (file_exists('../'. DIR_CONTROLLERS. SYMBOL_SLASH. $call. 'Controller.class.php')) {
    // 見つかったファイルをインクルードしてコントローラーをインスタンス化
    include('../'. DIR_CONTROLLERS. SYMBOL_SLASH. $call. 'Controller.class.php');
    $class = 'app\Controllers\\'. $call. 'Controller';
    $obj   = new $class();

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        // GETならindexメソッドを呼び出す
        $response = $obj->index();
    } else {
        // POSTならpostメソッドを呼び出す
        $response = $obj->post();
    }
    // コントローラーから戻された内容をレスポンスとして戻す
    echo $response;
    exit;
} else {
    // ファイルがなければ404エラー
    header("https/1.0 404 Not Found");
}
