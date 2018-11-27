<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */

$templateFolder = $this->GetFolder();
?>
	<div class="header-cart">
		<? if (!$arResult["DISABLE_USE_BASKET"]) { ?>

		<img src="<?=$templateFolder; ?>/images/shopping_basket.png" alt="pic_shopping_basket">
		<span>
			<? if ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'):?>
				<a href="<?= $arParams['PATH_TO_BASKET']; ?>"><?= $arResult['TOTAL_PRICE']; ?></a>
			<?endif ?>
		</span>
		<? } ?>
	</div>
