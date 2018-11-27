<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

<section class="wrap">
    <div class="bg-detail clearfix">
        <div class="photo-product">
            <div class="det-photo-main-slider">

                <? foreach ($arResult['MORE_PHOTO'] as $photo): ?>
                    <div>
                        <a data-fancybox="det-photo-group" href="<?= $photo["SRC"]; ?>">
                            <img src="<?= $photo["SRC"]; ?>" alt="">
                        </a>
                    </div>
                <? endforeach; ?>

            </div>
            <div class="det-photo-thumb-slider">
                <? foreach ($arResult['MORE_PHOTO'] as $photo): ?>
                    <div>
                        <a data-fancybox="det-photo-thumb" href="<?= $photo["SRC"]; ?>">
                            <img src="<?= $photo["SRC"]; ?>" alt="">
                        </a>
                    </div>
                <? endforeach; ?>
            </div>
        </div>

        <div class="desc-product">
            <h3><?= $arResult['NAME']; ?></h3>
            <p>
                <?= $arResult['PREVIEW_TEXT']; ?>
            </p>
            <div class="available clearfix">
                <h4>Доступные варианты:</h4>
                <ul>
                <?
                    $emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
                    if (!$emptyProductProperties)
                    {
                        foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
                        {
                            ?>
                                <li><?=$arResult['PROPERTIES'][$propId]['NAME']?>:

                                    <select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
                                        <?
                                        foreach ($propInfo['VALUES'] as $valueId => $value)
                                        {
                                            ?>
                                            <option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
                                                <?=$value?>
                                            </option>
                                            <?
                                        }
                                        ?>
                                    </select>
                                </li>
                            <?
                        }
                    } else {
                        ?>
                            <li><?=$arResult['DISPLAY_PROPERTIES']['COLOR']['NAME']?>:

                                <select name="<?=$arResult['DISPLAY_PROPERTIES']['COLOR']['CODE']?>">
                                    <option value="<?=$arResult['DISPLAY_PROPERTIES']['COLOR']['VALUE_XML_ID']?>" selected>
                                        <?=$arResult['DISPLAY_PROPERTIES']['COLOR']['VALUE']?>
                                    </option>
                                </select>
                            </li>
                        <li><?=$arResult['DISPLAY_PROPERTIES']['SIZE']['NAME']?>:

                            <select name="<?=$arResult['DISPLAY_PROPERTIES']['SIZE']['CODE']?>">
                                <option value="<?=$arResult['DISPLAY_PROPERTIES']['SIZE']['VALUE_XML_ID']?>" selected>
                                    <?=$arResult['DISPLAY_PROPERTIES']['SIZE']['VALUE']?>
                                </option>
                            </select>
                        </li>
                        <?
                    }
                ?>
                </ul>
                <div class="btn-form-add-cart">
                    <a href="<?= $arResult['ADD_URL']; ?>">Добавить в корзину</a>
                </div>
            </div>
            <div class="share-desc">
                <div class="share">
                    <h4>Поделиться продуктом:</h4>
                    <ul class="share-nav">
                        <li>
                            <a href="#">
                                <img src="<?= $templateFolder; ?>/images/facebook.png" title="Facebook">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?= $templateFolder; ?>/images/twitter.png" title="Twiiter">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?= $templateFolder; ?>/images/gpluse.png" title="Google+">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tabs-desc">
            <div class="tabs clearfix">
                <input id="tab1" type="radio" name="tabs" checked>
                <label for="tab1" title="Описание">Описание</label>
                <input id="tab2" type="radio" name="tabs">
                <label for="tab2" title="О бренде">О бренде</label>
                <input id="tab3" type="radio" name="tabs">
                <label for="tab3" title="Доставка">Доставка</label>
                <section id="content-tab1">
                    <p>
                        <?= $arResult['DETAIL_TEXT']; ?>
                    </p>
                </section>
                <section id="content-tab2">
                    <p>
                        <?= $arResult['PROPERTIES']['ABOUT_BRAND']['VALUE']; ?>
                    </p>
                </section>
                <section id="content-tab3">
                    <p>
                        <?= $arResult['PROPERTIES']['DELIVERY']['VALUE']; ?>
                    </p>
                </section>
            </div>
        </div>

    </div>
</section>
