<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="id-cart-list">
	<div class="sort">
		<div class="sorttext"><?=GetMessage("SALE_PRD_IN_BASKET")?></div>
		<a href="javascript:void(0)" class="sortbutton current"><?=GetMessage("SALE_PRD_IN_BASKET_ACT")?></a>
		<?if ($countItemsDelay=count($arResult["ITEMS"]["DelDelCanBuy"])):?><a href="javascript:void(0)" onclick="ShowBasketItems(2);" class="sortbutton"><?=GetMessage("SALE_PRD_IN_BASKET_SHELVE")?> (<?=$countItemsDelay?>)</a><?endif?>
		<?if ($countItemsSubscribe=count($arResult["ITEMS"]["ProdSubscribe"])):?><a href="javascript:void(0)" onclick="ShowBasketItems(3);" class="sortbutton"><?=GetMessage("SALE_PRD_IN_BASKET_SUBSCRIBE")?> (<?=$countItemsSubscribe?>)</a><?endif?>
		<?if ($countItemsNotAvailable=count($arResult["ITEMS"]["nAnCanBuy"])):?><a href="javascript:void(0)" onclick="ShowBasketItems(4);" class="sortbutton"><?=GetMessage("SALE_PRD_IN_BASKET_NOTA")?> (<?=$countItemsNotAvailable?>)</a><?endif?>
	</div>
<?$numCells = 0;?>
<section class="equipment" rules="rows">
	<div class="head-cart">
			<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
				<div class="name-item"><?= GetMessage("SALE_NAME")?></div>
				<?$numCells += 2;?>
			<?endif;?>
			<?if (in_array("VAT", $arParams["COLUMNS_LIST"])):?>
                <div class="vat-item"><?= GetMessage("SALE_VAT")?></div>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("TYPE", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-type"><?= GetMessage("SALE_PRICE_TYPE")?></div>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("DISCOUNT", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-discount"><?= GetMessage("SALE_DISCOUNT")?></div>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-weight"><?= GetMessage("SALE_WEIGHT")?></div>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-quantity"><?= GetMessage("SALE_QUANTITY")?></div>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-price"><?= GetMessage("SALE_PRICE")?></div>
				<?$numCells++;?>
			<?endif;?>
			<?if (in_array("DELAY", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-delay"></div>
				<?$numCells++;?>
			<?endif;?>
	</div>
<?if(count($arResult["ITEMS"]["AnDelCanBuy"]) > 0):?>
	<div class="body-cart">
	<?
	$i=0;
	foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems)
	{
		?>
		<section class="item-position">
			<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
				<div>
					<?if (in_array("DELETE", $arParams["COLUMNS_LIST"])):?>
						<a class="deleteitem" href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>" onclick="//return DeleteFromCart(this);" title="<?=GetMessage("SALE_DELETE_PRD")?>"></a>
					<?endif;?>
					<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
						<a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
					<?endif;?>
					<?if (!empty($arResult["ITEMS_IMG"][$arBasketItems["ID"]]["SRC"])) :?>
						<img src="<?=$arResult["ITEMS_IMG"][$arBasketItems["ID"]]["SRC"]?>" alt="<?=$arBasketItems["NAME"] ?>"/>
					<?else:?>
						<img src="/bitrix/components/bitrix/eshop.sale.basket.basket/templates/.default/images/no-photo.png" alt="<?=$arBasketItems["NAME"] ?>"/>
					<?endif?>
					<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
						</a>
					<?endif;?>
				</div>
				<div class="cart-item-name">
					<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
						<a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
					<?endif;?>
						<?=$arBasketItems["NAME"] ?>
					<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
						</a>
					<?endif;?>
					<?if (in_array("PROPS", $arParams["COLUMNS_LIST"]))
					{
						foreach($arBasketItems["PROPS"] as $val)
						{
							echo "<br />".$val["NAME"].": ".$val["VALUE"];
						}
					}?>
				</div>
			<?endif;?>
			<?if (in_array("VAT", $arParams["COLUMNS_LIST"])):?>
				<div class="vat-item"><?=$arBasketItems["VAT_RATE_FORMATED"]?></div>
			<?endif;?>
			<?if (in_array("TYPE", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-type"><?=$arBasketItems["NOTES"]?></div>
			<?endif;?>
			<?if (in_array("DISCOUNT", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-discount"><?=$arBasketItems["DISCOUNT_PRICE_PERCENT_FORMATED"]?></div>
			<?endif;?>
			<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-weight"><?=$arBasketItems["WEIGHT_FORMATED"]?></div>
			<?endif;?>
			<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-quantity">
					<input maxlength="18" type="text" name="QUANTITY_<?=$arBasketItems["ID"]?>" value="<?=$arBasketItems["QUANTITY"]?>" size="3" id="QUANTITY_<?=$arBasketItems["ID"]?>">
					<div class="count_nav">
						<a href="javascript:void(0)" class="plus" onclick="BX('QUANTITY_<?=$arBasketItems["ID"]?>').value++;">+</a>
						<a href="javascript:void(0)" class="minus" onclick="if (BX('QUANTITY_<?=$arBasketItems["ID"]?>').value > 1) BX('QUANTITY_<?=$arBasketItems["ID"]?>').value--;">-</a>
					</div>
				</div>
			<?endif;?>
			<?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
				<div class="cart-item-price">
					<?if(doubleval($arBasketItems["FULL_PRICE"]) > 0):?>
						<div class="discount-price"><?=$arBasketItems["PRICE_FORMATED"]?></div>
						<div class="old-price"><?=$arBasketItems["FULL_PRICE_FORMATED"]?></div>
					<?else:?>
						<div class="price"><?=$arBasketItems["PRICE_FORMATED"];?></div>
					<?endif?>
				</div>
			<?endif;?>
			<?if (in_array("DELAY", $arParams["COLUMNS_LIST"])):?>
				<div><a class="setaside" href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["shelve"])?>"><?=GetMessage("SALE_OTLOG")?></a></div>
			<?endif;?>
		</section>
		<?
		$i++;
	}
	?>
	</div>
</section>
<section class="myorders_itog">
	<div class="wrap">
		<?if ($arParams["HIDE_COUPON"] != "Y"):?>
		<div class="tal">
				<input class="input_text_style"
					<?if(empty($arResult["COUPON"])):?>
						onclick="if (this.value=='<?=GetMessage("SALE_COUPON_VAL")?>')this.value=''; this.style.color='black'"
						onblur="if (this.value=='') {this.value='<?=GetMessage("SALE_COUPON_VAL")?>'; this.style.color='#a9a9a9'}"
						style="color:#a9a9a9"
					<?endif;?>
						value="<?if(!empty($arResult["COUPON"])):?><?=$arResult["COUPON"]?><?else:?><?=GetMessage("SALE_COUPON_VAL")?><?endif;?>"
						name="COUPON">
		</div>
		<?endif;?>
		<?if (in_array("WEIGHT", $arParams["COLUMNS_LIST"])):?>
			<div class="total-weight">
				<span><?echo GetMessage("SALE_ALL_WEIGHT")?>:</span>
				<span><?=$arResult["allWeight_FORMATED"]?></span>
			</div>
		<?endif;?>
		<?if (doubleval($arResult["DISCOUNT_PRICE"]) > 0):?>
			<div class="total-discount">
				<span><?echo GetMessage("SALE_CONTENT_DISCOUNT")?><?
					if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0)
						echo " (".$arResult["DISCOUNT_PERCENT_FORMATED"].")";?>:
				</span>
				<span><?=$arResult["DISCOUNT_PRICE_FORMATED"]?></span>
			</div>
		<?endif;?>
		<?if ($arParams['PRICE_VAT_SHOW_VALUE'] == 'Y'):?>
			<div class="price-vat">
				<span><?echo GetMessage('SALE_VAT_EXCLUDED')?></span>
				<span><?=$arResult["allNOVATSum_FORMATED"]?></span>
			</div>
			<div class="all-sum">
				<span><?echo GetMessage('SALE_VAT_INCLUDED')?></span>
				<span><?=$arResult["allVATSum_FORMATED"]?></span>
			</div>
		<?endif;?>
		<div class="total">
			<span><?= GetMessage("SALE_ITOGO")?>:</span>
			<span><?=$arResult["allSum_FORMATED"]?></span>
		</div>
	</div>
</section>
<br/>
<table class="w100p" style="border-top:1px solid #d9d9d9;margin-bottom:40px;">
	<tr>
		<td style="padding:30px 2px;" class="tal"><input type="submit" value="<?echo GetMessage("SALE_UPDATE")?>" name="BasketRefresh" class="bt2"></td>
		<td align="right" width="40%"  style="padding:30px 2px;"><?if(strlen($arResult["PREPAY_BUTTON"]) > 0) echo $arResult["PREPAY_BUTTON"];?></td>
		<td style="padding:30px 2px;" class="tar"><input type="submit" value="<?echo GetMessage("SALE_ORDER")?>" name="BasketOrder"  id="basketOrderButton2" class="bt3"></td>
	</tr>
</table>
<?else:?>
	<tbody>
		<tr>
			<td colspan="<?=$numCells?>" style="text-align:center">
				<div class="cart-notetext"><?=GetMessage("SALE_NO_ACTIVE_PRD");?></div>
				<a href="<?=SITE_DIR?>" class="bt3"><?=GetMessage("SALE_NO_ACTIVE_PRD_START")?></a><br><br>
			</td>
		</tr>
	</tbody>
</table>
<?endif;?>
</div>
<?