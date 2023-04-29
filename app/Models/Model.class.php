<?php

namespace app\Models;

require_once '../config/config.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PDO;
use app\utility\utility;

/**
 * モデル基底クラス
 * Model
 *
 * モデルの基底クラス
 */
class Model
{
    /**
     * 
     */
    public $pdo;

    /**
     * コンストラクタ
     * __construct
     *
     * Modelコンストラクタ
     *
     * @param なし
     * @return なし
     */
    public function __construct()
    {
        // PDOを使いDBMSに接続
        try {
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8;', DB_HOST, DB_NAME);
            $user = DB_USER;
            $password = DB_PASS;
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->logging($e->getMessage());
        }
    }

    public function logging(string $message, string $file_name = 'pdo.log'){
        $Logger = new Logger('logger');
        $Logger->pushHandler(new StreamHandler(__DIR__ . '/../../logs/' . $file_name, Logger::INFO));
        $Logger->addInfo($message);
    }
}