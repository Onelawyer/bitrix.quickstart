<? $GLOBALS['_351823224_']=Array('c' .'lass_e' .'xi' .'st' .'s','dir' .'name','is_dir','mkdir','ex' .'ception'); ?><? function _1110402440($i){$a=Array('lessc','/lessc.inc.php','/../../themes/sites/','/../../themes/sites/','/../../themes/theme.less','/../../themes/sites/','.css',"Less Error: ","DOCUMENT_ROOT",'/modules/intec.startshop/web/include.php','/themes/css/controls.css','/themes/plugins/fancybox/jquery.fancybox.css','/themes/js/controls.js','/themes/js/functions.js','/themes/plugins/fancybox/jquery.fancybox.pack.js','/themes/sites/','.css');return $a[$i];} ?><? class CStartShopTheme{public static function SetColors($_0,$_1=SITE_ID){if(!empty($_1)){$_2=CSite::GetList($_3="sort",$_4="asc",array("ID"=> $_1));if($_2->Fetch()){if(!$GLOBALS['_351823224_'][0](_1110402440(0)))include_once($GLOBALS['_351823224_'][1](__FILE__) ._1110402440(1));$_5=new lessc;try{$_5->setVariables($_0);if(!$GLOBALS['_351823224_'][2](__DIR__ ._1110402440(2)))$GLOBALS['_351823224_'][3](__DIR__ ._1110402440(3),round(0+511),true);$_5->compileFile(__DIR__ ._1110402440(4),__DIR__ ._1110402440(5) .$_1 ._1110402440(6));}catch(exception $e){echo _1110402440(7) .$e->getMessage();}}}}public static function ApplyTheme($_1=SITE_ID){global $APPLICATION;require_once($_SERVER[_1110402440(8)] .BX_PERSONAL_ROOT ._1110402440(9));$APPLICATION->SetAdditionalCSS(CStartShopVariables::$MODULE_PATH_RELATIVE ._1110402440(10));$APPLICATION->SetAdditionalCSS(CStartShopVariables::$MODULE_PATH_RELATIVE ._1110402440(11));$APPLICATION->AddHeadScript(CStartShopVariables::$MODULE_PATH_RELATIVE ._1110402440(12));$APPLICATION->AddHeadScript(CStartShopVariables::$MODULE_PATH_RELATIVE ._1110402440(13));$APPLICATION->AddHeadScript(CStartShopVariables::$MODULE_PATH_RELATIVE ._1110402440(14));if(!empty($_1)){$_2=CSite::GetList($_3="sort",$_4="asc",array("ID"=> $_1));if($_2->Fetch())$APPLICATION->SetAdditionalCSS(CStartShopVariables::$MODULE_PATH_RELATIVE ._1110402440(15) .$_1 ._1110402440(16));}}} ?>