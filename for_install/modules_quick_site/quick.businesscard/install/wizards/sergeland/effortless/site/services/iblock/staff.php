<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();if(!CModule::IncludeModule("iblock"))return;@copy(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/staff_tpl.xml",WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/staff.xml");CWizardUtil::ReplaceMacros(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/staff.xml",Array("STAFF_XML_ID"=>htmlspecialchars("staff-effortless-".ToLower(WIZARD_SITE_ID)),"REVIEWS_XML_ID"=>htmlspecialchars("reviews-effortless-".ToLower(WIZARD_SITE_ID)),"LICENSES_XML_ID"=>htmlspecialchars("licenses-effortless-".ToLower(WIZARD_SITE_ID)),"ARTICLES_XML_ID"=>htmlspecialchars("articles-effortless-".ToLower(WIZARD_SITE_ID)),"WORKS_XML_ID"=>htmlspecialchars("works-effortless-".ToLower(WIZARD_SITE_ID)),"SERVICES_XML_ID"=>htmlspecialchars("services-effortless-".ToLower(WIZARD_SITE_ID)),));$iblockXMLFile=WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/staff.xml";$iblockType="effortless";$iblockID=$wizard->GetVar("iblockStaffID");$permissions=Array("1"=>"X","2"=>"R");$dbGroup=CGroup::GetList($by="",$order="",Array("STRING_ID"=>"content_editor"));if($arGroup=$dbGroup->Fetch())
$permissions[$arGroup["ID"]]="W";$iblockID=WizardServices_QUICK::ImportIBlockFromXML($iblockXMLFile,$iblockType,$iblockID,WIZARD_SITE_ID,$permissions,WIZARD_INSTALL_DEMO_DATA);if($iblockID<1)
return;$dbSite=CSite::GetByID(WIZARD_SITE_ID);if($arSite=$dbSite->Fetch())
$lang=$arSite["LANGUAGE_ID"];if(strlen($lang)<=0)
$lang="ru";WizardServices::IncludeServiceLang("staff.php",$lang);$res=CIBlock::GetByID($iblockID);$ar_res=$res->GetNext();$iblockType=$ar_res[IBLOCK_TYPE_ID];$iblock=new CIBlock;$arFields=Array("ACTIVE"=>"Y","FIELDS"=>array('IBLOCK_SECTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'Y',),'ACTIVE_FROM'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE_TO'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SORT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'PREVIEW_PICTURE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'PREVIEW_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'PREVIEW_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'1200','HEIGHT'=>'1200','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'DETAIL_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'DETAIL_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),'TAGS'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'SECTION_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_DESCRIPTION_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'SECTION_DESCRIPTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_CODE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'N','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),),);$iblock->Update($iblockID,$arFields);$arProperty=Array();$dbProperty=CIBlockProperty::GetList(Array(),Array("IBLOCK_ID"=>$iblockID));while($arProp=$dbProperty->Fetch())
$arProperty[$arProp["CODE"]]=$arProp["ID"];CUserOptions::SetOption("form","form_element_".$iblockID,array('tabs'=>'edit1--#--'.GetMessage("WZD_OPTION_STAFF_1").'--,'.'--ACTIVE--#--'.GetMessage("WZD_OPTION_STAFF_2").'--,'.'--SORT--#--'.GetMessage("WZD_OPTION_STAFF_3").'--,'.'--PREVIEW_PICTURE--#--'.GetMessage("WZD_OPTION_STAFF_4").'--,'.'--NAME--#--'.GetMessage("WZD_OPTION_STAFF_5").'--,'.'--CODE--#--'.GetMessage("WZD_OPTION_STAFF_6").'--,'.'--PROPERTY_'.$arProperty["POSITION"].'--#--'.GetMessage("WZD_OPTION_STAFF_7").'--,'.'--PROPERTY_'.$arProperty["EMAIL"].'--#--'.GetMessage("WZD_OPTION_STAFF_8").'--,'.'--PROPERTY_'.$arProperty["PHONE"].'--#--'.GetMessage("WZD_OPTION_STAFF_9").'--,'.'--PROPERTY_'.$arProperty["SKYPE"].'--#--'.GetMessage("WZD_OPTION_STAFF_10").'--,'.'--PREVIEW_TEXT--#--'.GetMessage("WZD_OPTION_STAFF_11").'--;'.'--cedit1--#--'.GetMessage("WZD_OPTION_STAFF_12").'--,'.'--PROPERTY_'.$arProperty["REVIEWS_CIRCLE_IMG"].'--#--'.GetMessage("WZD_OPTION_STAFF_13").'--,'.'--PROPERTY_'.$arProperty["REVIEWS_COLOR_BG"].'--#--'.GetMessage("WZD_OPTION_STAFF_14").'--,'.'--PROPERTY_'.$arProperty["REVIEWS_VER"].'--#--'.GetMessage("WZD_OPTION_STAFF_15").'--,'.'--PROPERTY_'.$arProperty["REVIEWS"].'--#--'.GetMessage("WZD_OPTION_STAFF_16").'--;'.'--cedit7--#--'.GetMessage("WZD_OPTION_STAFF_17").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_AUTOPLAY"].'--#--'.GetMessage("WZD_OPTION_STAFF_18").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM"].'--#--'.GetMessage("WZD_OPTION_STAFF_19").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_STAFF_20").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_HREF"].'--#--'.GetMessage("WZD_OPTION_STAFF_21").'--;'.'--cedit6--#--'.GetMessage("WZD_OPTION_STAFF_22").'--,'.'--PROPERTY_'.$arProperty["SHOW_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_STAFF_23").'--,'.'--PROPERTY_'.$arProperty["TEXT_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_STAFF_24").'--;'.'--cedit2--#--'.GetMessage("WZD_OPTION_STAFF_25").'--,'.'--PROPERTY_'.$arProperty["MORE_LICENSE_HEADER"].'--#--'.GetMessage("WZD_OPTION_STAFF_26").'--,'.'--PROPERTY_'.$arProperty["MORE_LICENSE"].'--#--'.GetMessage("WZD_OPTION_STAFF_27").'--;'.'--cedit5--#--'.GetMessage("WZD_OPTION_STAFF_28").'--,'.'--PROPERTY_'.$arProperty["MORE_SERVICES_HEADER"].'--#--'.GetMessage("WZD_OPTION_STAFF_29").'--,'.'--PROPERTY_'.$arProperty["MORE_SERVICES"].'--#--'.GetMessage("WZD_OPTION_STAFF_30").'--;'.'--cedit3--#--'.GetMessage("WZD_OPTION_STAFF_31").'--,'.'--PROPERTY_'.$arProperty["MORE_ARTICLES_HEADER"].'--#--'.GetMessage("WZD_OPTION_STAFF_32").'--,'.'--PROPERTY_'.$arProperty["MORE_ARTICLES"].'--#--'.GetMessage("WZD_OPTION_STAFF_33").'--;'.'--cedit4--#--'.GetMessage("WZD_OPTION_STAFF_34").'--,'.'--PROPERTY_'.$arProperty["MORE_WORKS_HEADER"].'--#--'.GetMessage("WZD_OPTION_STAFF_35").'--,'.'--PROPERTY_'.$arProperty["MORE_WORKS"].'--#--'.GetMessage("WZD_OPTION_STAFF_36").'--;'.'--edit2--#--'.GetMessage("WZD_OPTION_STAFF_301").'--,'.'--XML_ID--#--'.GetMessage("WZD_OPTION_STAFF_302").'--;'.'--'));CUserOptions::SetOption("list","tbl_iblock_list_".md5($iblockType.".".$iblockID),array("columns"=>"PREVIEW_PICTURE, NAME, PROPERTY_".$arProperty["POSITION"].", SORT, ACTIVE","by"=>"sort","order"=>"asc","page_size"=>"20",));COption::SetOptionInt("effortless","iblockStaffID",$iblockID,false,WIZARD_SITE_ID);WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."about/staff/",array("SITE_DIR"=>WIZARD_SITE_DIR,"IBLOCK_TYPE_STAFF"=>$iblockType,"IBLOCK_ID_STAFF"=>$iblockID,));?>