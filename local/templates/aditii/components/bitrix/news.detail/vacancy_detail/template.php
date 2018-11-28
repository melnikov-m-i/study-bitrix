<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="vacancy-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div class="vacancy-detail-picture">
			<img
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			>
		</div>
	<?endif?>
	<div class="det-vacancy-header">
		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="vacancy-date-time"><i class="fa fa-calendar-o">&nbsp;<?=$arResult["DISPLAY_ACTIVE_FROM"]?></i></span>
		<?endif;?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<h3><?=$arResult["NAME"]?></h3>
		<?endif;?>
	</div>
	<div class="det-vacancy-body">
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
			<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
		<?endif;?>
		<?if($arResult["NAV_RESULT"]):?>
			<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br><?endif;?>
			<?echo $arResult["NAV_TEXT"];?>
			<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br><?=$arResult["NAV_STRING"]?><?endif;?>
		<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
			<?echo $arResult["DETAIL_TEXT"];?>
		<?else:?>
			<?echo $arResult["PREVIEW_TEXT"];?>
		<?endif?>
	</div>
	<div class="det-vacancy-footer">
		<?foreach($arResult["FIELDS"] as $code=>$value):
			if ('PREVIEW_PICTURE' != $code || 'DETAIL_PICTURE' != $code)
			{
				?>
				<p><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?></p>
				<?
			}
			?>
		<?endforeach;?>
		<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
		<p><?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?></p>
		<?endif?>
		<?endforeach;?>
		<?
			if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
			{
				?>
				<div class="vacancy-detail-share">
					<noindex>
						<?
						$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
							"HANDLERS" => $arParams["SHARE_HANDLERS"],
							"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
							"PAGE_TITLE" => $arResult["~NAME"],
							"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
							"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
							"HIDE" => $arParams["SHARE_HIDE"],
						),
							$component,
							array("HIDE_ICONS" => "Y")
						);
						?>
					</noindex>
				</div>
				<?
			}
		?>
	</div>
</div>