<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$assets = \Bitrix\Main\Page\Asset::getInstance();
$assets->addCss(SITE_TEMPLATE_PATH . "/js/slick/slick.css");
$assets->addCss(SITE_TEMPLATE_PATH . "/js/slick/slick-theme.css");
$assets->addJs(SITE_TEMPLATE_PATH . "/js/slick/slick.min.js");
$assets->addCss(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.min.css");
$assets->addJs(SITE_TEMPLATE_PATH . "/js/fancybox/jquery.fancybox.min.js");
$assets->addJs(SITE_TEMPLATE_PATH . "/js/gallery-details.js");

?>

<section class="wrap">
    <div class="bg-detail clearfix">
        <div class="photo-product">
            <div class="det-photo-main-slider">
                <div>
                    <a data-fancybox="det-photo-group" href="./images/large/0001-1.jpg">
                        <img src="./images/middle/0001-1.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-group" href="./images/large/0001-2.jpg">
                        <img src="./images/middle/0001-2.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-group" href="./images/large/0001-3.jpg">
                        <img src="./images/middle/0001-3.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-group" href="./images/large/0001-4.jpg">
                        <img src="./images/middle/0001-4.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-group" href="./images/large/0001-5.jpg">
                        <img src="./images/middle/0001-5.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="det-photo-thumb-slider">
                <div>
                    <a data-fancybox="det-photo-thumb" href="./images/large/0001-1.jpg">
                        <img src="./images/small/0001-1.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-thumb" href="./images/large/0001-2.jpg">
                        <img src="./images/small/0001-2.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-thumb" href="./images/large/0001-3.jpg">
                        <img src="./images/small/0001-3.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-thumb" href="./images/large/0001-4.jpg">
                        <img src="./images/small/0001-4.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a data-fancybox="det-photo-thumb" href="./images/large/0001-5.jpg">
                        <img src="./images/small/0001-5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="desc-product">
            <h3>Разнообразный и богатый опыт</h3>
            <p>
                С другой стороны реализация намеченных плановых заданий обеспечивает
                широкому кругу (специалистов) участие в формировании форм развития.
                Не следует, однако забывать, что дальнейшее развитие различных
                форм деятельности требуют от нас анализа новых предложений.
            </p>
            <div class="available clearfix">
                <h4>Доступные варианты:</h4>
                <ul>
                    <li>
                        Цвет:
                        <select>
                            <option>Черный</option>
                            <option>Синий</option>
                            <option>Зеленый</option>
                            <option>Красный</option>
                        </select>
                    </li>
                    <li>
                        Размер:
                        <select>
                            <option>L</option>
                            <option>XL</option>
                            <option>S</option>
                            <option>M</option>
                        </select>
                    </li>
                    <li>
                        Количество:
                        <select>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </li>
                </ul>
                <div class="btn-form-add-cart">
                    <form>
                        <input type="submit" value="Добавить в корзину">
                    </form>
                </div>
            </div>
            <div class="share-desc">
                <div class="share">
                    <h4>Поделиться продуктом:</h4>
                    <ul class="share-nav">
                        <li>
                            <a href="#">
                                <img src="./images/facebook.png" title="Facebook">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./images/twitter.png" title="Twiiter">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="./images/gpluse.png" title="Google+">
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
                        1. Задача организации, в особенности же укрепление и развитие
                        структуры требуют от нас анализа дальнейших направлений развития.
                        Задача организации, в особенности же укрепление и развитие
                        структуры требуют от нас анализа дальнейших направлений развития.
                    </p>
                </section>
                <section id="content-tab2">
                    <p>
                        2. Задача организации, в особенности же укрепление и развитие
                        структуры требуют от нас анализа дальнейших направлений развития.
                        Задача организации, в особенности же укрепление и развитие
                        структуры требуют от нас анализа дальнейших направлений развития.
                    </p>
                </section>
                <section id="content-tab3">
                    <p>
                        3. Задача организации, в особенности же укрепление и развитие
                        структуры требуют от нас анализа дальнейших направлений развития.
                        Задача организации, в особенности же укрепление и развитие
                        структуры требуют от нас анализа дальнейших направлений развития.
                    </p>
                </section>
            </div>
        </div>

    </div>
</section>