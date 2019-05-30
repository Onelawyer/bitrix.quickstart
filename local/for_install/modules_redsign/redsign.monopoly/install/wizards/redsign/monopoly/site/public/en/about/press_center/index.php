<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Press Room");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"newslistcol", 
	array(
		"COMPONENT_TEMPLATE" => "about_us",
		"IBLOCK_TYPE" => "services",
		"IBLOCK_ID" => "#PRESS_ABOUT_US_IBLOCK_ID#",
		"NEWS_COUNT" => "12",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "PUBLISHER_NAME",
			1 => "PUBLISHER_DESCR",
			2 => "PUBLISHER_LINK",
			3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => "monopoly2",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "News",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"RSMONOPOLY_SHOW_BLOCK_NAME" => "Y",
		"RSMONOPOLY_BLOCK_NAME_IS_LINK" => "Y",
		"RSMONOPOLY_PROP_PUBLISHER_NAME" => "-",
		"RSMONOPOLY_PROP_PUBLISHER_LINK" => "-",
		"RSMONOPOLY_PROP_PUBLISHER_BLANK" => "N",
		"RSMONOPOLY_PROP_PUBLISHER_DESCR" => "-",
		"RSMONOPOLY_USE_OWL" => "Y",
		"RSMONOPOLY_COLS_IN_ROW" => "4",
		"RSMONOPOLY_SHOW_DATE" => "N",
		"RSMONOPOLY_OWL_CHANGE_SPEED" => "500",
		"RSMONOPOLY_OWL_CHANGE_DELAY" => "8000",
		"RSMONOPOLY_OWL_PHONE" => "1",
		"RSMONOPOLY_OWL_TABLET" => "2",
		"RSMONOPOLY_OWL_PC" => "3",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"newslistcol", 
	array(
		"COMPONENT_TEMPLATE" => "newslistcol",
		"IBLOCK_TYPE" => "company",
		"IBLOCK_ID" => "#NEWS_IBLOCK_ID#",
		"NEWS_COUNT" => "12",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => "monopoly2",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "News",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"RSMONOPOLY_PROP_PUBLISHER_NAME" => "-",
		"RSMONOPOLY_PROP_PUBLISHER_LINK" => "-",
		"RSMONOPOLY_PROP_PUBLISHER_BLANK" => "N",
		"RSMONOPOLY_PROP_PUBLISHER_DESCR" => "-",
		"RSMONOPOLY_SHOW_BLOCK_NAME" => "Y",
		"RSMONOPOLY_BLOCK_NAME_IS_LINK" => "Y",
		"RSMONOPOLY_USE_OWL" => "Y",
		"RSMONOPOLY_COLS_IN_ROW" => "4",
		"RSMONOPOLY_SHOW_DATE" => "N",
		"RSMONOPOLY_OWL_CHANGE_SPEED" => "500",
		"RSMONOPOLY_OWL_CHANGE_DELAY" => "8000",
		"RSMONOPOLY_OWL_PHONE" => "1",
		"RSMONOPOLY_OWL_TABLET" => "2",
		"RSMONOPOLY_OWL_PC" => "3",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>