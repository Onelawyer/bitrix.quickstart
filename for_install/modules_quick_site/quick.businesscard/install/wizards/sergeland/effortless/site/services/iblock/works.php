<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();if(!CModule::IncludeModule("iblock"))return;@copy(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/works_tpl.xml",WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/works.xml");CWizardUtil::ReplaceMacros(WIZARD_ABSOLUTE_PATH."/site/services/iblock/xml/".LANGUAGE_ID."/works.xml",Array("WORKS_XML_ID"=>htmlspecialchars("works-effortless-".ToLower(WIZARD_SITE_ID)),"DOCUMENTS_XML_ID"=>htmlspecialchars("documents-effortless-".ToLower(WIZARD_SITE_ID)),"REVIEWS_XML_ID"=>htmlspecialchars("reviews-effortless-".ToLower(WIZARD_SITE_ID)),"STAFF_XML_ID"=>htmlspecialchars("staff-effortless-".ToLower(WIZARD_SITE_ID)),"CATALOG_XML_ID"=>htmlspecialchars("catalog-effortless-".ToLower(WIZARD_SITE_ID)),"LICENSES_XML_ID"=>htmlspecialchars("licenses-effortless-".ToLower(WIZARD_SITE_ID)),));$iblockXMLFile=WIZARD_SERVICE_RELATIVE_PATH."/xml/".LANGUAGE_ID."/works.xml";$iblockType="effortless";$iblockID=$wizard->GetVar("iblockWorksID");$permissions=Array("1"=>"X","2"=>"R");$dbGroup=CGroup::GetList($by="",$order="",Array("STRING_ID"=>"content_editor"));if($arGroup=$dbGroup->Fetch())
$permissions[$arGroup["ID"]]="W";$iblockID=WizardServices_QUICK::ImportIBlockFromXML($iblockXMLFile,$iblockType,$iblockID,WIZARD_SITE_ID,$permissions,WIZARD_INSTALL_DEMO_DATA);if($iblockID<1)
return;$dbSite=CSite::GetByID(WIZARD_SITE_ID);if($arSite=$dbSite->Fetch())
$lang=$arSite["LANGUAGE_ID"];if(strlen($lang)<=0)
$lang="ru";WizardServices::IncludeServiceLang("works.php",$lang);$res=CIBlock::GetByID($iblockID);$ar_res=$res->GetNext();$iblockType=$ar_res[IBLOCK_TYPE_ID];$iblock=new CIBlock;$arFields=Array("ACTIVE"=>"Y","FIELDS"=>array('IBLOCK_SECTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'ACTIVE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'Y',),'ACTIVE_FROM'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'=today',),'ACTIVE_TO'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SORT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'PREVIEW_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'PREVIEW_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'PREVIEW_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'1200','HEIGHT'=>'1200','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'DETAIL_TEXT_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'DETAIL_TEXT'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),'TAGS'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_NAME'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'',),'SECTION_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('FROM_DETAIL'=>'N','DELETE_WITH_DETAIL'=>'N','UPDATE_WITH_DETAIL'=>'N','SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_DESCRIPTION_TYPE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>'html',),'SECTION_DESCRIPTION'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_DETAIL_PICTURE'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>array('SCALE'=>'N','WIDTH'=>'800','HEIGHT'=>'800','IGNORE_ERRORS'=>'Y','METHOD'=>'resample','COMPRESSION'=>95,),),'SECTION_XML_ID'=>array('IS_REQUIRED'=>'N','DEFAULT_VALUE'=>'',),'SECTION_CODE'=>array('IS_REQUIRED'=>'Y','DEFAULT_VALUE'=>array('UNIQUE'=>'Y','TRANSLITERATION'=>'Y','TRANS_LEN'=>100,'TRANS_CASE'=>'L','TRANS_SPACE'=>'-','TRANS_OTHER'=>'-','TRANS_EAT'=>'Y','USE_GOOGLE'=>'Y',),),),);$iblock->Update($iblockID,$arFields);$arProperty=Array();$dbProperty=CIBlockProperty::GetList(Array(),Array("IBLOCK_ID"=>$iblockID));while($arProp=$dbProperty->Fetch())
$arProperty[$arProp["CODE"]]=$arProp["ID"];CUserOptions::SetOption("form","form_element_".$iblockID,array('tabs'=>'edit1--#--'.GetMessage("WZD_OPTION_WORKS_1").'--,'.'--ACTIVE--#--'.GetMessage("WZD_OPTION_WORKS_2").'--,'.'--PROPERTY_'.$arProperty["TOP"].'--#--'.GetMessage("WZD_OPTION_WORKS_3").'--,'.'--SORT--#--'.GetMessage("WZD_OPTION_WORKS_4").'--,'.'--PROPERTY_'.$arProperty["TOP_SORT"].'--#--'.GetMessage("WZD_OPTION_WORKS_5").'--,'.'--NAME--#--'.GetMessage("WZD_OPTION_WORKS_6").'--,'.'--CODE--#--'.GetMessage("WZD_OPTION_WORKS_7").'--;'.'--edit5--#--'.GetMessage("WZD_OPTION_WORKS_8").'--,'.'--PREVIEW_PICTURE--#--'.GetMessage("WZD_OPTION_WORKS_9").'--,'.'--PREVIEW_TEXT--#--'.GetMessage("WZD_OPTION_WORKS_10").'--;'.'--edit6--#--'.GetMessage("WZD_OPTION_WORKS_11").'--,'.'--DETAIL_TEXT--#--'.GetMessage("WZD_OPTION_WORKS_12").'--;'.'--cedit4--#--'.GetMessage("WZD_OPTION_WORKS_13").'--,'.'--PROPERTY_'.$arProperty["SPECIFICATION_NAME"].'--#--'.GetMessage("WZD_OPTION_WORKS_14").'--,'.'--PROPERTY_'.$arProperty["SPECIFICATION_VALUE"].'--#--'.GetMessage("WZD_OPTION_WORKS_15").'--;'.'--cedit8--#--'.GetMessage("WZD_OPTION_WORKS_16").'--,'.'--cedit8_csection1--#----'.GetMessage("WZD_OPTION_WORKS_17").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP_AUTOPLAY"].'--#--'.GetMessage("WZD_OPTION_WORKS_18").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP"].'--#--'.GetMessage("WZD_OPTION_WORKS_19").'--,'.'--PROPERTY_'.$arProperty["PHOTO_TOP_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_WORKS_20").'--,'.'--cedit8_csection2--#----'.GetMessage("WZD_OPTION_WORKS_21").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_AUTOPLAY"].'--#--'.GetMessage("WZD_OPTION_WORKS_22").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM"].'--#--'.GetMessage("WZD_OPTION_WORKS_23").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_DESCRIPTION"].'--#--'.GetMessage("WZD_OPTION_WORKS_24").'--,'.'--PROPERTY_'.$arProperty["PHOTO_BOTTOM_HREF"].'--#--'.GetMessage("WZD_OPTION_WORKS_25").'--;'.'--cedit7--#--'.GetMessage("WZD_OPTION_WORKS_26").'--,'.'--PROPERTY_'.$arProperty["DOCUMENTS"].'--#--'.GetMessage("WZD_OPTION_WORKS_27").'--;'.'--cedit6--#--'.GetMessage("WZD_OPTION_WORKS_28").'--,'.'--PROPERTY_'.$arProperty["REVIEWS"].'--#--'.GetMessage("WZD_OPTION_WORKS_29").'--;'.'--cedit1--#--'.GetMessage("WZD_OPTION_WORKS_30").'--,'.'--PROPERTY_'.$arProperty["PREVIEW_VIDEO"].'--#--'.GetMessage("WZD_OPTION_WORKS_31").'--,'.'--PROPERTY_'.$arProperty["HREF_VIDEO"].'--#--'.GetMessage("WZD_OPTION_WORKS_32").'--;'.'--cedit3--#--'.GetMessage("WZD_OPTION_WORKS_33").'--,'.'--PROPERTY_'.$arProperty["USE_SHARE"].'--#--'.GetMessage("WZD_OPTION_WORKS_34").'--;'.'--cedit2--#--'.GetMessage("WZD_OPTION_WORKS_35").'--,'.'--PROPERTY_'.$arProperty["SHOW_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_WORKS_36").'--,'.'--PROPERTY_'.$arProperty["TEXT_CALLBACK_FORM"].'--#--'.GetMessage("WZD_OPTION_WORKS_37").'--;'.'--cedit11--#--'.GetMessage("WZD_OPTION_WORKS_38").'--,'.'--PROPERTY_'.$arProperty["MORE_LICENSE_HEADER"].'--#--'.GetMessage("WZD_OPTION_WORKS_39").'--,'.'--PROPERTY_'.$arProperty["MORE_LICENSE"].'--#--'.GetMessage("WZD_OPTION_WORKS_40").'--;'.'--cedit9--#--'.GetMessage("WZD_OPTION_WORKS_41").'--,'.'--PROPERTY_'.$arProperty["MORE_STAFF_HEADER"].'--#--'.GetMessage("WZD_OPTION_WORKS_42").'--,'.'--PROPERTY_'.$arProperty["MORE_STAFF"].'--#--'.GetMessage("WZD_OPTION_WORKS_43").'--;'.'--cedit5--#--'.GetMessage("WZD_OPTION_WORKS_44").'--,'.'--PROPERTY_'.$arProperty["MORE_WORKS_HEADER"].'--#--'.GetMessage("WZD_OPTION_WORKS_45").'--,'.'--PROPERTY_'.$arProperty["MORE_WORKS"].'--#--'.GetMessage("WZD_OPTION_WORKS_46").'--;'.'--cedit10--#--'.GetMessage("WZD_OPTION_WORKS_47").'--,'.'--PROPERTY_'.$arProperty["MORE_PRODUCTS_HEADER"].'--#--'.GetMessage("WZD_OPTION_WORKS_48").'--,'.'--PROPERTY_'.$arProperty["MORE_PRODUCTS"].'--#--'.GetMessage("WZD_OPTION_WORKS_49").'--;'.'--edit14--#--'.GetMessage("WZD_OPTION_WORKS_201").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_TITLE--#--'.GetMessage("WZD_OPTION_WORKS_202").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_KEYWORDS--#--'.GetMessage("WZD_OPTION_WORKS_203").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_META_DESCRIPTION--#--'.GetMessage("WZD_OPTION_WORKS_204").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PAGE_TITLE--#--'.GetMessage("WZD_OPTION_WORKS_205").'--,'.'--IPROPERTY_TEMPLATES_ELEMENTS_PREVIEW_PICTURE--#----'.GetMessage("WZD_OPTION_WORKS_206").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_ALT--#--'.GetMessage("WZD_OPTION_WORKS_207").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_TITLE--#--'.GetMessage("WZD_OPTION_WORKS_208").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_PREVIEW_PICTURE_FILE_NAME--#--'.GetMessage("WZD_OPTION_WORKS_209").'--,'.'--IPROPERTY_TEMPLATES_ELEMENTS_DETAIL_PICTURE--#----'.GetMessage("WZD_OPTION_WORKS_210").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_ALT--#--'.GetMessage("WZD_OPTION_WORKS_211").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_TITLE--#--'.GetMessage("WZD_OPTION_WORKS_212").'--,'.'--IPROPERTY_TEMPLATES_ELEMENT_DETAIL_PICTURE_FILE_NAME--#--'.GetMessage("WZD_OPTION_WORKS_213").'--,'.'--SEO_ADDITIONAL--#----'.GetMessage("WZD_OPTION_WORKS_214").'--,'.'--TAGS--#--'.GetMessage("WZD_OPTION_WORKS_215").'--;'.'--edit2--#--'.GetMessage("WZD_OPTION_WORKS_301").'--,'.'--XML_ID--#--'.GetMessage("WZD_OPTION_WORKS_302").'--;'.'--'));CUserOptions::SetOption("list","tbl_iblock_list_".md5($iblockType.".".$iblockID),array("columns"=>"NAME, PREVIEW_PICTURE, PROPERTY_".$arProperty["TOP"].", SORT, ACTIVE","by"=>"date_active_from","order"=>"desc","page_size"=>"20",));COption::SetOptionInt("effortless","iblockWorksID",$iblockID,false,WIZARD_SITE_ID);$arLanguages=Array();$arProperty=Array();$arUserFields=array("UF_SEO_DESCRIPTION");$rsLanguage=CLanguage::GetList($by,$order,array());while($arLanguage=$rsLanguage->Fetch())
$arLanguages[]=$arLanguage["LID"];foreach($arUserFields as $userField)
{$arLabelNames=Array();foreach($arLanguages as $languageID)
{WizardServices::IncludeServiceLang("property_names.php",$languageID);$arLabelNames[$languageID]=GetMessage($userField);}
$arProperty["EDIT_FORM_LABEL"]=$arLabelNames;$arProperty["LIST_COLUMN_LABEL"]=$arLabelNames;$arProperty["LIST_FILTER_LABEL"]=$arLabelNames;$dbRes=CUserTypeEntity::GetList(Array(),Array("ENTITY_ID"=>'IBLOCK_'.$iblockID.'_SECTION',"FIELD_NAME"=>$userField));if($arRes=$dbRes->Fetch())
{$userType=new CUserTypeEntity();$userType->Update($arRes["ID"],$arProperty);}}
$property=CIBlockProperty::GetList(Array("SORT"=>"ASC"),Array("IBLOCK_ID"=>COption::GetOptionInt("effortless","iblockStaffID",0,WIZARD_SITE_ID),"CODE"=>"MORE_WORKS"));if($property_fields=$property->GetNext())
{$ibp=new CIBlockProperty;$ibp->Update($property_fields["ID"],array("LINK_IBLOCK_TYPE_ID"=>"effortless","LINK_IBLOCK_ID"=>$iblockID));}
WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."include/",array("IBLOCK_TYPE_WORKS"=>$iblockType,"IBLOCK_ID_WORKS"=>$iblockID,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/works/",array("SITE_DIR"=>WIZARD_SITE_DIR,"IBLOCK_TYPE_WORKS"=>$iblockType,"IBLOCK_ID_WORKS"=>$iblockID,));?>