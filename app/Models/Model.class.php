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
    private $name   = 'model';
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
            // $dsn = DB_TYPE. ':dbname='. DB_NAME. ';host='. DB_HOST;
            // var_dump($dsn);exit;
            $user = DB_USER;
            $password = DB_PASS;
            $this->pdo = new PDO($dsn, $user, $password);
            // switch(strtoupper($dbms)){ // パラメータでDBMSごとに接続を切り替え
            //     case 'MYSQL':
            //         $dsn       = 'mysql:dbname=' . Utility::getIniValue('MYSQL', 'DB_NAME') 
            //                    . ';host=' . Utility::getIniValue('MYSQL', 'HOST_NAME');
            //         $user      = Utility::getIniValue('MYSQL', 'USER');
            //         $password  = Utility::getIniValue('MYSQL', 'PASSWORD');
            //         $this->pdo = new PDO($dsn, $user, $password);
            //         break;

            //     case 'SQLITE':
            //         $db_file   = 'sample.db';
            //         $db_path   = __DIR__ . '/sqlite/' . $db_file;
            //         $this->pdo = new PDO('sqlite:' . $db_path);
            //         break;
            // }
            
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