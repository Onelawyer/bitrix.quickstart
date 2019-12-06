<div class="section <?=(!empty($_SESSION["QUICK_THEME"][SITE_ID]["PRODUCTS_POPULAR_BG"]) ? $_SESSION["QUICK_THEME"][SITE_ID]["PRODUCTS_POPULAR_BG"] : COption::GetOptionString("effortless", "QUICK_THEME_PRODUCTS_POPULAR_BG", "white-bg", SITE_ID))?> clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="underline">Popular products</h2>
				<p>Sed ut Perspiciatis Unde Omnis Iste Sed ut sit  voluptatem accusan tium </p>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "products-popular", Array(
						"IBLOCK_TYPE" => "#IBLOCK_TYPE_CATALOG#",
						"IBLOCK_ID" => "#IBLOCK_ID_CATALOG#",
						"SECTION_ID" => $_REQUEST["SECTION_ID"],
						"SECTION_CODE" => "",
						"SECTION_USER_FIELDS" => "",
						"ELEMENT_SORT_FIELD" => "property_TOP_SORT",
						"ELEMENT_SORT_ORDER" => "asc",
						"ELEMENT_SORT_FIELD2" => "name",
						"ELEMENT_SORT_ORDER2" => "asc",
						"FILTER_NAME" => "arrFilter",
						"INCLUDE_SUBSECTIONS" => "Y",
						"SHOW_ALL_WO_SECTION" => "Y",
						"PAGE_ELEMENT_COUNT" => "1000000",
						"LINE_ELEMENT_COUNT" => "1",
						"PROPERTY_CODE" => array(
							0 => "NEW",
							1 => "ACTION",
							2 => "PRESENCE",
							3 => "EXPECTED",
							4 => "UNDER",
							5 => "UNAVAILABLE",
							6 => "CURRENCY",
							7 => "PRICE",
							8 => "PRICE_OLD",
							9 => "MORE_PRODUCTS",
							10 => "MORE_PRODUCTS_HEADER",
							11 => "DOCUMENTS",
							12 => "URL_VIDEO",
							13 => "SPECIFICATION_NAME",
							14 => "SPECIFICATION_VALUE",
							15 => "USE_SHARE",
							16 => "SHOW_ORDER_FORM",
							17 => "SHOW_NAME",
							18 => "REQ_NAME",
							19 => "SHOW_PHONE",
							20 => "REQ_PHONE",
							21 => "SHOW_EMAIL",
							22 => "REQ_EMAIL",
							23 => "SHOW_COMMENT",
							24 => "REQ_COMMENT",
							25 => "TEXT_BUTTON",
							26 => "POPULAR",
							27 => "TOP",
							28 => "TOP_SORT",
						),
						"OFFERS_LIMIT" => "5",
						"ADD_PICT_PROP" => "-",
						"LABEL_PROP" => "-",
						"SECTION_URL" => "",
						"DETAIL_URL" => "",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"META_KEYWORDS" => "-",
						"SET_META_DESCRIPTION" => "Y",
						"META_DESCRIPTION" => "-",
						"BROWSER_TITLE" => "-",
						"ADD_SECTIONS_CHAIN" => "N",
						"DISPLAY_COMPARE" => "N",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"CACHE_FILTER" => "Y",
						"PRICE_CODE" => "",
						"USE_PRICE_COUNT" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"PRICE_VAT_INCLUDE" => "Y",
						"ACTION_VARIABLE" => "action",
						"PRODUCT_ID_VARIABLE" => "id",
						"USE_PRODUCT_QUANTITY" => "N",
						"ADD_PROPERTIES_TO_BASKET" => "Y",
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRODUCT_PROPERTIES" => "",
						"PAGER_TEMPLATE" => "",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"TEMPLATE_THEME" => "blue",
						"MESS_BTN_BUY" => "",
						"MESS_BTN_ADD_TO_BASKET" => "",
						"MESS_BTN_SUBSCRIBE" => "",
						"MESS_BTN_DETAIL" => "",
						"MESS_NOT_AVAILABLE" => "",
						"SET_BROWSER_TITLE" => "Y",
						"BASKET_URL" => "/personal/basket.php",
						"PAGER_TITLE" => "",
						"AUTOPLAY" => (!empty($_SESSION["QUICK_THEME"][SITE_ID]["PRODUCTS_POPULAR_AUTOPLAY"]) ? $_SESSION["QUICK_THEME"][SITE_ID]["PRODUCTS_POPULAR_AUTOPLAY"] : COption::GetOptionString("effortless", "QUICK_THEME_PRODUCTS_POPULAR_AUTOPLAY", "carousel", SITE_ID)),
					),
					false
				);?>
			</div>
		</div>
	</div>
</div>