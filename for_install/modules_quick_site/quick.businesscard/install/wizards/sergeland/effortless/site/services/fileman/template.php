<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();$path=str_replace("//","/",WIZARD_ABSOLUTE_PATH."/site/templates/.default/");$path2=$_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/.default/";$handle=@opendir($path);if($handle)
{while($file=readdir($handle))
{if(in_array($file,array(".","..")))
continue;CopyDirFiles($path.$file,$path2.$file,$rewrite=true,$recursive=true,$delete_after_copy=false);}}
$arTemplates=Array();$templatePrefix="effortless_quick";$templateID=array(100=>"main",200=>"detail");$templateCondition=array("main"=>"CSite::InDir('".WIZARD_SITE_DIR."index.php')",);foreach($templateID as $key=>$wizard_template_id)
{$wizTemplateDir=$_SERVER["DOCUMENT_ROOT"].WizardServices::GetTemplatesPath(WIZARD_RELATIVE_PATH."/site")."/".$wizard_template_id;$bitrixTemplateDir=$_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_SITE_ID."_".$wizard_template_id."_".$templatePrefix;CopyDirFiles($wizTemplateDir,$bitrixTemplateDir,$rewrite=true,$recursive=true,$delete_after_copy=false,$exclude="");WizardServices_QUICK::ReplaceMacrosRecursive($bitrixTemplateDir,Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices_QUICK::ReplaceMacrosRecursive($bitrixTemplateDir."/css/",Array("SITE_DIR"=>WIZARD_SITE_DIR));WizardServices_QUICK::ReplaceMacrosRecursive($bitrixTemplateDir."/css/theme/background/",Array("SITE_DIR"=>WIZARD_SITE_DIR));WizardServices_QUICK::ReplaceMacrosRecursive($bitrixTemplateDir."/css/theme/color/",Array("SITE_DIR"=>WIZARD_SITE_DIR));WizardServices_QUICK::ReplaceMacrosRecursive($bitrixTemplateDir."/switcher/",Array("SITE_DIR"=>WIZARD_SITE_DIR));$arTemplates[]=Array("CONDITION"=>$templateCondition[$wizard_template_id],"SORT"=>$key,"TEMPLATE"=>WIZARD_SITE_ID."_".$wizard_template_id."_".$templatePrefix);}
$obSite=CSite::GetList($by="def",$order="desc",Array("LID"=>WIZARD_SITE_ID));if($arSite=$obSite->Fetch())
{$obSite=new CSite();$obSite->Update($arSite["LID"],Array("NAME"=>$arSite["NAME"],"TEMPLATE"=>$arTemplates));if(strlen($obSite->LAST_ERROR)>0)
die($obSite->LAST_ERROR);}?>