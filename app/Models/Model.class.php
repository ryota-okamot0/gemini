<?php

namespace app\Models;

require_once '../config/config.php';
require_once DIR_LIB_LOG. 'Log.class.php';

use PDO;
use lib\Log\Log;

/**
 * モデル基底クラス
 * Model
 *
 * モデルの基底クラス
 */
class Model
{
    /**
     * @var PDO $pdo
     */
    public $pdo;

    /**
     * @var Log $log
     */
    public $log;
    

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
        // Logクラスインスタンス生成
        $this->log = new Log();

        // PDOを使いDBMSに接続
        try {
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8;', DB_HOST, DB_NAME);
            $user = DB_USER;
            $password = DB_PASS;
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->log->logging($e->getMessage());
        }
    }
}
