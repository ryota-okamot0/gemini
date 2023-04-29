<?php

namespace app\Controllers;

require_once '../config/constants.php';
// require_once dirname ( __FILE__ ) . '/../../vendor/autoload.php';
// require_once dirname ( __FILE__ ) . '/../utility/utility.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Smarty;
use app\utility\utility;

/**
 * コントローラ基底クラス
 * Controller
 *
 * コントローラの基底クラス
 */
class Controller
{
    private $name   = 'controller';
    protected function __construct(){
        // コントローラーを直接呼ばれてもnewできないように
    }
    // ログの出力
    public function logging($message, string $file_name = 'app.log'){
        $Logger = new Logger('logger');
        $Logger->pushHandler(new StreamHandler(__DIR__ . '/../../logs/' . $file_name, Logger::INFO));
        $Logger->addInfo($message);
    }
    // ビューの生成
    public function view(string $template, array $param): string{
        $Smarty = new Smarty();
        $Smarty->template_dir = __DIR__ . '/../view/';
        $Smarty->compile_dir  = __DIR__ . '/../view/view_c/';
        $Smarty->escape_html  = true;
        $Smarty->assign([
            'cssUnCache'    => Utility::cssUnCache()
        ]);
        $Smarty->assign($param);
        return $Smarty->fetch($template . '.tpl');
    }
}
