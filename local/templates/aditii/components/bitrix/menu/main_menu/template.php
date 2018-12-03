<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <nav class="top clearfix">
        <ul class="js-main-menu clearfix">
            <? foreach ($arResult as $arItem): ?>
                <? if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                ?>
                <? if ($arItem["PERMISSION"] > "D"): ?>
                    <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                <? endif ?>
            <? endforeach ?>
        </ul>
        <a href="#" id="pull">Меню</a>
    </nav>
<? endif ?>
