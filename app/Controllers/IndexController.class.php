<?php

namespace app\Controllers;

require_once '../config/constants.php';
require_once '../'. DIR_CONTROLLERS. SYMBOL_SLASH. 'Controller.class.php';
require_once '../'. DIR_MODELS. SYMBOL_SLASH. 'User.class.php';

use app\Models\User;

/**
 * 初期表示クラス
 * IndexController
 *
 * 初期画面を表示するためのクラス
 */
class IndexController extends Controller
{
    /**
     * コンストラクタ
     * __construct
     *
     * IndexControllerコンストラクタ
     *
     * @param なし
     * @return なし
     */
    public function __construct()
    {
        $this->name = 'index';
    }

    /**
     * 初期画面表示
     * index
     *
     * 初期画面を表示する
     *
     * @param なし
     * @return view
     */
    public function index()
    {
        // Model Userのインスタンス生成
        $userTbl = new User();

        // テンプレートにパラメータを渡してHTMLを生成して返す
        return $this->view($this->name, [
            'title'     => $this->name,
            'message'   => 'Hello',
            'list'      => $userTbl->getAll()
        ]);
    }

    /**
     * フォームアクション
     * post
     *
     * POST送信された際のアクション実行処理
     *
     * @param なし
     * @return なし
     */
    public function post()
    {
        // アクション名を取得
        $add = filter_input(INPUT_POST, 'register', FILTER_SANITIZE_STRING);
        $delete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);

        // インスタンス生成
        $userTbl = new User();

        // ===========================
        // 登録処理
        // ===========================
        if ($add === 'register') {
            $params = array(
                'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'age'  => filter_input(INPUT_POST, 'age', FILTER_SANITIZE_FULL_SPECIAL_CHARS)
            );
            if (!$userTbl->insert($params)) {
                $this->log->logging('ユーザー情報の登録に失敗しました。');
            }
        }

        // ===========================
        // 削除処理
        // ===========================
        if ($delete === 'delete') {
            $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
            foreach ($item as $id => $val) {
                if (!$userTbl->delete(['id'  => $id])) {
                    $this->log->logging("ユーザー情報の登録に失敗しました。 ID：$id");
                }
            }
        }

        // テンプレートにパラメータを渡し、HTMLを生成し返却
        return $this->view($this->name, [
            'title'     => $this->name,
            'message'   => 'Hello',
            'list'      => $userTbl->getAll()
        ]);
    }
}