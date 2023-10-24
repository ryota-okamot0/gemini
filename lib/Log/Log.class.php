<?php

namespace lib\Log;

require_once '../config/constants.php';
require_once DIR_VENDOR. 'autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * ログクラス
 * Log
 *
 * ログ出力に関する処理クラス
 */
class Log
{
    private $fileName;

    /**
     * コンストラクタ
     * __construct
     *
     * Logコンストラクタ
     *
     * @param string $classType
     *    クラス種別
     * @return なし
     */
    public function __construct()
    {
        $this->fileName = 'app.log';
    }

    /**
     * ログ出力
     * logging
     *
     * ログを出力する
     *
     * @param string $message
     *    ログメッセージ
     * @param string $fileName
     *    ファイル名
     */
    public function logging(string $message)
    {
        // Loggerクラスインスタンス生成
        $logger = new Logger('logger');
        // メッセージ書き込み用のハンドラを追加
        $logger->pushHandler(new StreamHandler(DIR_LOGS. $this->fileName, Logger::INFO));
        // INFOレベルのログメッセージを記録
        $logger->info($message);
    }
}
