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
        $user = new User();
        var_dump($user);exit;
        // テンプレートにパラメータを渡し、HTMLを生成し返却
        return $this->view($this->name, [
            'title'     => $this->name,
            'message'   => 'Hello',
            'list'      => $mytable->getAll()
        ]);
    }

    public function post(){ // POSTで呼ばれた
        if(isset($_POST['add'])){ // registerボタンを押された
            $param = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->logging($param);
            $mytable = new mytable();
            $mytable->insert([ // レコード挿入
                'name'  => $param
            ]);
        }
        if(isset($_POST['delete'])){ // deleteボタンを押された
            $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
            $this->logging(implode(',', $item));
            $mytable = new mytable();
            foreach($item as $id => $val){
                $mytable->delete([ // レコード削除
                    'id'  => $id
                ]);
            }
        }
        // テンプレートにパラメータを渡し、HTMLを生成し返却
        return $this->view($this->name, [
            'title'     => $this->name,
            'message'   => 'Hello',
            'list'      => $mytable->getAll()
        ]);
    }
}