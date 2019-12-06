<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();if(!CModule::IncludeModule("iblock"))return;@copy(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/history_tpl.xml",WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/history.xml");CWizardUtil::ReplaceMacros(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/history.xml",Array("SITE_DIR_IMG"=>WIZARD_SITE_DIR));$iblockXMLFile=WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/history.xml";$iblockType="effortless";$iblockID=$wizard->GetVar("iblockHistoryID");$permissions=Array("1"=>"X","2"=>"R");$dbGroup=CGroup::GetList($by="",$order="",Array("STRING_ID"=>"content_editor"));if($arGroup=$dbGroup->Fetch())
$permissions[$arGroup["ID"]]="W";$iblockID=WizardServices_QUICK::ImportIBlockFromXML($iblockXMLFile,$iblockType,$iblockID,WIZARD_SITE_ID,$permissions,WIZARD_INSTALL_DEMO_DATA);if($iblockID<1)
return;$dbSite=CSite::GetByID(WIZARD_SITE_ID);if($arSite=$dbSite->Fetch())
$lang=$arSite["LANGUAGE_ID"];if(strlen($lang)<=0)
$lang="ru";WizardServices::IncludeServiceLang("history.php",$lang);$res=CIBlock::GetByID($iblockID);$ar_res=$res->GetNext();$iblockType=$ar_res[IBLOCK_TYPE_ID];$iblock=new CIBlock;$arFields=Array("ACTIVE"=>"Y","FIELDS"=>array('IBLOCK_SECTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'Y',),'ACTIVE_FROM'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE_TO'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SORT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'PREVIEW_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'PREVIEW_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'PREVIEW_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'1200','HEIGHT'=>'1200','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'DETAIL_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'DETAIL_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'CODE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'N','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),'TAGS'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'SECTION_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_DESCRIPTION_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'SECTION_DESCRIPTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_CODE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'N','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'_','TRANS_OTHER'=>'_','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),),);$iblock->Update($iblockID,$arFields);$arProperty=Array();$dbProperty=CIBlockProperty::GetList(Array(),Array("IBLOCK_ID"=>$iblockID));while($arProp=$dbProperty->Fetch())
$arProperty[$arProp["CODE"]]=$arProp["ID"];CUserOptions::SetOption("form","form_element_".$iblockID,array('tabs'=>'edit1--#--'.GetMessage("WZD_OPTION_HISTORY_1").'--,'.'--ACTIVE--#--'.GetMessage("WZD_OPTION_HISTORY_2").'--,'.'--PROPERTY_'.$arProperty["COLOR"].'--#--'.GetMessage("WZD_OPTION_HISTORY_3").'--,'.'--SORT--#--'.GetMessage("WZD_OPTION_HISTORY_4").'--,'.'--NAME--#--'.GetMessage("WZD_OPTION_HISTORY_5").'--,'.'--PROPERTY_'.$arProperty["ICON"].'--#--'.GetMessage("WZD_OPTION_HISTORY_6").'--,'.'--PREVIEW_TEXT--#--'.GetMessage("WZD_OPTION_HISTORY_7").'--;'.'--edit2--#--'.GetMessage("WZD_OPTION_HISTORY_301").'--,'.'--XML_ID--#--'.GetMessage("WZD_OPTION_HISTORY_302").'--;'.'--'));CUserOptions::SetOption("list","tbl_iblock_list_".md5($iblockType.".".$iblockID),array("columns"=>"NAME, ACTIVE, SORT","by"=>"sort","order"=>"desc","page_size"=>"20",));COption::SetOptionInt("effortless","iblockHistoryID",$iblockID,false,WIZARD_SITE_ID);WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."about/history/",array("IBLOCK_TYPE_HISTORY"=>$iblockType,"IBLOCK_ID_HISTORY"=>$iblockID,));?>