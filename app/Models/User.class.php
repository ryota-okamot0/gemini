<?php

namespace app\Models;

require_once '../'. DIR_MODELS. SYMBOL_SLASH. 'Model.class.php';

use PDO;
use app\Models\Model;

class User extends Model
{
    private $name   = 'User';

    public function __construct()
    {
        echo "ok";
        $dbms = 'mysql';
        parent::__construct(); // 基底クラスのコンストラクタを呼び出しDBMSに接続
    }

    public function getAll():array { // レコードの取得
        $sql  = <<< EOF
SELECT *
FROM {$this->name}
EOF;
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $rs = $stmt->fetchAll();
        }catch(Exception $e){
            $this->logging($e->getMessage());
        }
        return $rs;
    }

    public function insert(array $param) { // レコードの挿入
        $sql  = <<< EOF
INSERT INTO {$this->name}(
    name
)VALUES(
    :name
)
EOF;
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $param['name'], PDO::PARAM_STR);
            $stmt->execute();
        }catch(Exception $e){
            $this->logging($e->getMessage());
        }
    }

    public function delete(array $param) { // レコードの削除
        $sql  = <<< EOF
DELETE FROM {$this->name}
WHERE id = :id
EOF;
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $param['id'], PDO::PARAM_INT);
            $stmt->execute();
        }catch(Exception $e){
            $this->logging($e->getMessage());
        }
    }
}