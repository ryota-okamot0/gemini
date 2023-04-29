<?php

namespace app\Models;

require_once '../'. DIR_MODELS. SYMBOL_SLASH. 'Model.class.php';

/**
 * ユーザモデルクラス
 * User
 *
 * ユーザのモデル操作クラス
 */
class User extends Model
{
    /**
     * テーブル名
     */
    private $table = 'user_tbl';

    /**
     * コンストラクタ
     * __construct
     *
     * Userコンストラクタ
     *
     * @param なし
     * @return なし
     */
    public function __construct()
    {
        // 基底クラスのコンストラクタを呼び出しDBMSに接続
        parent::__construct();
    }

    /**
     * ユーザ情報全件取得
     * getAll
     *
     * ユーザ情報を全件取得する
     *
     * @param なし
     * @return array
     *    ユーザ情報配列
     */
    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            $this->logging($e->getMessage());
        }

        return $result;
    }
}
