<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="bg-main">
	<div class="wrap">
		<div class="main">
			<?
				if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS'])) {
					foreach ($arResult['ITEM_ROWS'] as $rowData) {
			?>
						<div class="main-columns-of-3 clearfix">
					<?
						$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
						foreach ($rowItems as $item) {
					?>
							<div class="main-column-of-1-3">
								<a href="<?= $item['DETAIL_PAGE_URL']; ?>">
									<img src="<?= $item['PREVIEW_PICTURE']['SRC']; ?>" alt="">
									<h3><?= $item['NAME']; ?></h3>
									<div class="price">
										<h4><?= intval($item['CATALOG_PURCHASING_PRICE']) ." ". $item['CATALOG_PURCHASING_CURRENCY']; ?><span>Купить</span></h4>
									</div>
									<span class="btm-line"></span>
								</a>
							</div>
			<?
						}
					}
				}
			?>
			</div>
		</div>
	</div>
</div>
