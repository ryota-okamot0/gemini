<?php

namespace app\Controllers;

require_once '../config/constants.php';
require_once DIR_VENDOR. 'smarty/smarty/libs/Smarty.class.php';
require_once DIR_VENDOR. 'autoload.php';
require_once '../'. DIR_UTILS. 'Util.class.php';

use app\Utils\Util;
use Smarty;

/**
 * コントローラ基底クラス
 * Controller
 *
 * コントローラの基底クラス
 */
class Controller
{
    protected $name = "";

    /**
     * コンストラクタ
     * __construct
     *
     * コントローラーを直接呼ばれてもnewできないようにコンストラクタを明示的に記述
     *
     * @param なし
     * @return なし
     */
    protected function __construct()
    {
    }



    /**
     * view画面生成
     * view
     *
     * viewの画面を生成する
     *
     * @param string $tplName
     *    テンプレートファイル名
     * @param array $params
     *    リクエストパラメータ
     * @return string
     *    テンプレート処理結果内容
     */
    public function view(string $tplName, array $params): string
    {
        // Smartyクラスインスタンス生成
        $smarty = new Smarty();
        // テンプレート格納フォルダをセット
        $smarty->template_dir = '../'. DIR_VIEWS;
        // Smartyコンパイルフォルダをセット
        $smarty->compile_dir  = '../'. DIR_VIEWS_C;
        $smarty->escape_html  = true;
        $smarty->assign([
            'cssUnCache'    => Util::cssUnCache()
        ]);
        $smarty->assign($params);

        return $smarty->fetch($tplName . '.tpl');
    }
}
