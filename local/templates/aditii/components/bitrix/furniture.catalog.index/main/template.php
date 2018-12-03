<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="bg-slider-box">
    <div class="wrap">
        <div class="slider-box">
            <div class="prev-arrow-slider">
                <img src="<?= $templateFolder; ?>/images/category-arrow-left.png" alt="Prev">
            </div>
            <? if (is_array($arResult['ITEMS']) && !empty($arResult['ITEMS'])): ?>
                <div class="slider clearfix">
                    <? foreach ($arResult['ITEMS'] as $arItem): ?>
                        <div class="item-slider clearfix">
                            <div class="sub-item-slider">
                                <img src="<?= $arItem['PICTURE']['SRC'] ?>">
                            </div>
                            <div class="sub-item-slider">
                                <h4><a href="<?= $arItem['DETAIL_URL'] ?>"><?= $arItem['NAME'] ?></a></h4>
                                <a href="<?= $arItem['DETAIL_URL'] ?>" class="btn">shop</a>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            <? endif; ?>
            <div class="next-arrow-slider">
                <img src="<?= $templateFolder; ?>/images/category-arrow-right.png" alt="Next">
            </div>
        </div>
    </div>
</div>
