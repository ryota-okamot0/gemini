<?php

namespace app\Models;

require_once '../'. DIR_MODELS. SYMBOL_SLASH. 'Model.class.php';

use PDO;

/**
 * ユーザモデルクラス
 * User
 *
 * ユーザのモデル操作クラス
 */
class User extends Model
{
    /**
     * @var string テーブル名
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
            $this->log->logging($e->getMessage());
        }

        return $result;
    }

    /**
     * 登録処理
     * insert
     *
     * ユーザ情報を登録する
     *
     * @param array $params
     *   登録情報配列
     * @return bool
     *    正常終了時：true
     *    異常終了時：false
     */
    public function insert(array $params)
    {
        // SQL生成
        $sql  = "INSERT INTO {$this->table} (name, age) VALUES (:name, :age)";

        try {
            // ===============================
            // 登録処理
            // ===============================
            $this->log->logging('insert start.');
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
            $stmt->bindParam(':age', $params['age'], PDO::PARAM_INT);
            // SQL実行
            if (!$stmt->execute()) {
                // 実行エラーの場合はログ出力して終了
                $this->log->logging('insert error.');
                return false;
            }
        } catch (Exception $e) {
            $this->log->logging($e->getMessage());
        }
        // 正常終了ログ出力
        $this->log->logging('insert complete.');

        return true;
    }

    /**
     * 削除処理
     * delete
     *
     * ユーザ情報を削除する
     *
     * @param array $params
     *   削除情報配列
     * @return bool
     *    正常終了時：true
     *    異常終了時：false
     */
    public function delete(array $params)
    {
        // SQL生成
        $sql  = "DELETE FROM {$this->table} WHERE id = :id";

        try {
            // ===============================
            // 削除処理
            // ===============================
            $this->log->logging('delete start.');
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
            // SQL実行
            if (!$stmt->execute()) {
                // 実行エラーの場合はログ出力して終了
                $this->log->logging('delete error.');
                return false;
            }
        } catch (Exception $e) {
            $this->log->logging($e->getMessage());
        }
        // 正常終了ログ出力
        $this->log->logging('delete complete.');

        return true;
    }
}
