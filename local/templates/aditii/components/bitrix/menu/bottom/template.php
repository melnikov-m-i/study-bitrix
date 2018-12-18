<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <div class="footer-columns-of-4 clearfix">
    <? $previousLevel = 0;
    foreach ($arResult as $arItem): ?>
        <? if ($previousLevel && $arItem['DEPTH_LEVEL'] == 1 && $arItem["DEPTH_LEVEL"] <= $previousLevel): ?>
            </ul>
            </div>
        <? endif ?>
        <? if ($arItem['DEPTH_LEVEL'] == 1): ?>
            <div class="footer-column-of-1-4">
            <h3><?= $arItem['TEXT']; ?></h3>
            <ul>
        <? else: ?>
            <li><a href="<?= $arItem['LINK']; ?>"><?= $arItem['TEXT']; ?></a></li>
        <? endif; ?>
        <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
    <? endforeach; ?>
    </div>
<? endif; ?>
