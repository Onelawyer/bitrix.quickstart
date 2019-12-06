<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();if(!CModule::IncludeModule("iblock"))return;@copy(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/news_tpl.xml",WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/news.xml");CWizardUtil::ReplaceMacros(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/news.xml",Array("DOCUMENTS_XML_ID"=>htmlspecialchars("documents-effortless-".ToLower(WIZARD_SITE_ID)),"SITE_DIR_IMG"=>WIZARD_SITE_DIR,));$iblockXMLFile=WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/news.xml";$iblockType="effortless";$iblockID=$wizard->GetVar("iblockNewsID");$permissions=Array("1"=>"X","2"=>"R");$dbGroup=CGroup::GetList($by="",$order="",Array("STRING_ID"=>"content_editor"));if($arGroup=$dbGroup->Fetch())
$permissions[$arGroup["ID"]]="W";$iblockID=WizardServices_QUICK::ImportIBlockFromXML($iblockXMLFile,$iblockType,$iblockID,WIZARD_SITE_ID,$permissions,WIZARD_INSTALL_DEMO_DATA);if($iblockID<1)
return;$dbSite=CSite::GetByID(WIZARD_SITE_ID);if($arSite=$dbSite->Fetch())
$lang=$arSite["LANGUAGE_ID"];if(strlen($lang)<=0)
$lang="ru";WizardServices::IncludeServiceLang("news.php",$lang);$res=CIBlock::GetByID($iblockID);$ar_res=$res->GetNext();$iblockType=$ar_res[IBLOCK_TYPE_ID];$iblock=new CIBlock;$arFields=Array("ACTIVE"=>"Y","FIELDS"=>array('IBLOCK_SECTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'Y',),'ACTIVE_FROM'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'=today',),'ACTIVE_TO'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SORT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'PREVIEW_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'PREVIEW_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'PREVIEW_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'1200','HEIGHT'=>'1200','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'DETAIL_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'DETAIL_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),'TAGS'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'SECTION_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_DESCRIPTION_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'SECTION_DESCRIPTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),),);$iblock->Update($iblockID,$arFields);$arProperty=Array();$dbProperty=CIBlockProperty::GetList(Array(),Array("IBLOCK_ID"=>$iblockID));while($arProp=$dbProperty->Fetch())
$arProperty[$arProp["CODE"]]=$arProp["ID"];CUserOptions::SetOption("form","form_element_".$iblockID,array('tabs'=>'edit1--#--'.GetMessage("WZD_OPTION_NEWS_1").'--,'.'--ACTIVE--#--'.GetMessage("WZD_OPTION_NEWS_2").'--,'.'--PROPERTY_'.$arProperty["TOP"].'--#--'.GetMessage("WZD_OPTION_NEWS_3").'--,'.'--ACTIVE_FROM--#--'.GetMessage("WZD_OPTION_NEWS_4").'--,'.'--NAME--#--'.GetMessage("WZD_OPTION_NEWS_5").'--,'.'--CODE--#--'.GetMessage("WZD_OPTION_NEWS_6").'--;'.'--edit5--#--'.GetMessage("WZD_OPTION_NEWS_7").'--,'.'--PREVIEW_PICTURE--#--'.GetMessage("WZD_OPTION_NEWS_8").'--,'.'--PREVIEW_TEXT--#--'.GetMessage("WZD_OPTION_NEWS_9").'--;'.'--edit6--#--'.GetMessage("WZD_OPTION_NEWS_10").'--,'.'--DETAIL_TEXT--#--'.GetMessage("WZD_OPTION_NEWS_11").'--;'.'--cedit1--#--'.GetMessage("WZD_OPTION_NEWS_12").'--,'.'--cedit1_csection1--#----'.GetMessage("WZD_OPTION_NEWS_13").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP_AUTOPLAY"].'--#--'.GetMessage("WZD_OPTION_NEWS_14").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP"].'--#--'.GetMessage("WZD_OPTION_NEWS_15").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_NEWS_16").'--,'.'--cedit1_csection2--#----'.GetMessage("WZD_OPTION_NEWS_17").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_AUTOPLAY"].'--#--'.GetMessage("WZD_OPTION_NEWS_18").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM"].'--#--'.GetMessage("WZD_OPTION_NEWS_19").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_NEWS_20").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_HREF"].'--#--'.GetMessage("WZD_OPTION_NEWS_21").'--;'.'--cedit2--#--'.GetMessage("WZD_OPTION_NEWS_22").'--,'.'--PROPERTY_'.$arProperty["DOCUMENTS_HEADER"].'--#--'.GetMessage("WZD_OPTION_NEWS_23").'--,'.'--PROPERTY_'.$arProperty["DOCUMENTS"].'--#--'.GetMessage("WZD_OPTION_NEWS_24").'--;'.'--cedit3--#--'.GetMessage("WZD_OPTION_NEWS_25").'--,'.'--PROPERTY_'.$arProperty["PREVIEW_VIDEO"].'--#--'.GetMessage("WZD_OPTION_NEWS_26").'--,'.'--PROPERTY_'.$arProperty["HREF_VIDEO"].'--#--'.GetMessage("WZD_OPTION_NEWS_27").'--;'.'--cedit4--#--'.GetMessage("WZD_OPTION_NEWS_28").'--,'.'--PROPERTY_'.$arProperty["SHOW_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_NEWS_29").'--,'.'--PROPERTY_'.$arProperty["TEXT_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_NEWS_30").'--;'.'--edit14--#--'.GetMessage("WZD_OPTION_NEWS_201").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_TITLE--#--'.GetMessage("WZD_OPTION_NEWS_202").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS--#--'.GetMessage("WZD_OPTION_NEWS_203").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION--#--'.GetMessage("WZD_OPTION_NEWS_204").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PAGE_TITLE--#--'.GetMessage("WZD_OPTION_NEWS_205").'--,'.'--IPROPERTY_TEMPLATES_ELEMENTS_PREVIEW_PICTURE--#----'.GetMessage("WZD_OPTION_NEWS_206").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_ALT--#--'.GetMessage("WZD_OPTION_NEWS_207").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_TITLE--#--'.GetMessage("WZD_OPTION_NEWS_208").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_NAME--#--'.GetMessage("WZD_OPTION_NEWS_209").'--,'.'--IPROPERTY_TEMPLATES_ELEMENTS_DETAIL_PICTURE--#----'.GetMessage("WZD_OPTION_NEWS_210").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_ALT--#--'.GetMessage("WZD_OPTION_NEWS_211").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_TITLE--#--'.GetMessage("WZD_OPTION_NEWS_212").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_NAME--#--'.GetMessage("WZD_OPTION_NEWS_213").'--,'.'--SEO_ADDITIONAL--#----'.GetMessage("WZD_OPTION_NEWS_214").'--,'.'--TAGS--#--'.GetMessage("WZD_OPTION_NEWS_215").'--;'.'--edit2--#--'.GetMessage("WZD_OPTION_NEWS_301").'--,'.'--XML_ID--#--'.GetMessage("WZD_OPTION_NEWS_302").'--;'.'--'));CUserOptions::SetOption("list","tbl_iblock_list_".md5($iblockType.".".$iblockID),array("columns"=>"DATE_ACTIVE_FROM, PREVIEW_PICTURE, NAME, PROPERTY_".$arProperty["TOP"].", PREVIEW_TEXT, ACTIVE","by"=>"date_active_from","order"=>"desc","page_size"=>"20",));COption::SetOptionInt("effortless","iblockNewsID",$iblockID,false,WIZARD_SITE_ID);WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."include/",array("IBLOCK_TYPE_NEWS"=>$iblockType,"IBLOCK_ID_NEWS"=>$iblockID,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/news/",array("SITE_DIR"=>WIZARD_SITE_DIR,"IBLOCK_TYPE_NEWS"=>$iblockType,"IBLOCK_ID_NEWS"=>$iblockID,));?>