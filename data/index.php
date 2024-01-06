<?php
header('Content-Type: text/html; charset=utf-8', true);

$l_version = rand();

$l_num = strtotime('next sunday');

$l_sunday = date("d.m", $l_num);

?>
<!DOCTYPE html>
<html>

<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Форсаж - Официальный дилер JAC в Санкт-Петербурге</title>
    <meta name="description" content="">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">

    <link href="css/fonts.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
    <link href="css/index.css?v=<?= $l_version; ?>" rel="stylesheet">

    <link href="slick/slick.css?v=<?= $l_version; ?>" rel="stylesheet">
    <link href="slick/slick-theme.css?v=<?= $l_version; ?>" rel="stylesheet">

    <script type="text/javascript" src="slick/slick.min.js"></script>


</head>

<body>

    <header>
        <div class="container">
            <div class="logos">
                <div class="logo1"><img src="img/logo1.png" /></div>
                <div class="logo2"><img src="img/logo2.png" /></div>
            </div>
            <div class="addr_container">
                <a href="tel:+78124948881" class="phone">8(812) 494-88-81</a>
                <div class="addr">Санкт-Петербург, ул.Камчатская, д.9</div>
            </div>
            <a class="popup btn" href="#form_popup" data-title="Заказать звонок" data-comment=""
                data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                <span>Заказать звонок</span>
            </a>
        </div>
        <div class="menu_container">
            <div class="container">
                <div class="menu">
                    <a class="anchor" href="#js6" _shift="0">JAC JS6</a>
                    <a class="anchor" href="#j7" _shift="0">JAC J7</a>
                    <a class="anchor" href="#t6" _shift="0">JAC T6</a>
                    <a class="anchor" href="#t8_pro" _shift="0">JAC T8 PRO</a>
                    <span class="sep"></span>
                    <a class="anchor" href="#complects" _shift="0">Комплектации</a>
                    <a class="anchor" href="#tradein" _shift="0">Trade-In</a>
                    <a class="anchor" href="#credit" _shift="0">Кредит</a>
                    <a class="anchor" href="#leasing" _shift="0">Лизинг</a>
                    <a class="anchor" href="#corp" _shift="0">Корпоративным клиентам</a>
                    <a class="anchor" href="#test_drive" _shift="0">Тест-драйв</a>
                    <a class="anchor" href="#service" _shift="0">Сервис</a>
                </div>
            </div>
        </div>
        <div class="burger"><span></span></div>
    </header>
    <section class="big_banner">
        <div class="item">
            <picture>
                <source srcset="img/slider/mbanner1.jpg" media="(max-width: 768px)">
                <img src="img/slider/banner1.jpg">
            </picture>
            <div class="title_contianer">
                <div class="container">
                    <div class="pre_title">Только до
                        <?= $l_sunday; ?>
                    </div>
                    <div class="title">Тройные выгоды на новый JAC JS6</div>
                    <div class="comment">Выгода <strong>до 830 000 ₽*</strong></div>
                    <a class="popup btn" href="#form_popup" data-title="Получить предложение" data-comment=""
                        data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                        <span>Получить предложение</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="item">
            <picture>
                <source srcset="img/slider/mbanner2.jpg" media="(max-width: 768px)">
                <img src="img/slider/banner2.jpg">
            </picture>
            <div class="title_contianer">
                <div class="container">
                    <div class="title">Рекордные условия на новый JAC J7</div>
                    <div class="comment">Выгода <strong>до 410 000 ₽*</strong></div>
                    <a class="popup btn" href="#form_popup" data-title="Получить предложение" data-comment=""
                        data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                        <span>Получить предложение</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="item">
            <picture>
                <source srcset="img/slider/mbanner3.jpg" media="(max-width: 768px)">
                <img src="img/slider/banner3.jpg">
            </picture>
            <div class="title_contianer">
                <div class="container">
                    <div class="title">Рекордные условия на новый JAC T6</div>
                    <div class="comment">Выгода <strong>до 540 000 ₽*</strong></div>
                    <a class="popup btn" href="#form_popup" data-title="Получить предложение" data-comment=""
                        data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                        <span>Получить предложение</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function () {
            $('.big_banner').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: true,
                autoplay: false,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            arrows: false,
                            adaptiveHeight: true,
                            dots: true,
                            centerMode: false,
                            centerPadding: '0px',
                        }
                    }]

            });
        });
    </script>


    <section class="timer_container">
        <div class="container">
            <div class="cont">
                <div class="title">Успейте получить <font>спец.предложение</font>
                </div>
                <script src="//megatimer.ru/get/ae292e7fa5e0e6b32eb078b2c9b74809.js"></script>
                <a class="popup btn" href="#form_popup" data-title="Получить предложение" data-comment=""
                    data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                    <span>Получить предложение</span>
                </a>
            </div>
        </div>
    </section>


    <section id="cars">
        <div class="container">

            <div class="item" id="js6">
                <div class="images_container">
                    <div class="shadow">JS6</div>
                    <picture>
                        <img src="img/colors/js6/1.png" />
                    </picture>
                    <div class="colors">
                        <div class="current" data-img="img/colors/js6/1.png" style="background:#c62122;"></div>
                        <div class="border" data-img="img/colors/js6/2.png" style="background:white;"></div>
                        <div data-img="img/colors/js6/3.png" style="background:#d0d0d0;"></div>
                        <div data-img="img/colors/js6/4.png" style="background:#262626;"></div>
                        <div data-img="img/colors/js6/5.png" style="background:#653808;"></div>
                    </div>
                </div>
                <div class="text_container">
                    <div class="title">JAC JS6</div>
                    <div class="comment">Выгода до <span>830 000 ₽*</span><br> <span>ПОДАРКИ</span> за покупку!</div>
                    <div class="add">Лидер<br>продаж!</div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Подобрать комплектацию"
                            data-comment="" data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Получить предложение</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Подобрать комплектацию" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Получить предложение</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="item" id="j7">
                <div class="images_container">
                    <div class="shadow">J7</div>
                    <picture>
                        <img src="img/colors/j7/1.png" />
                    </picture>
                    <div class="colors">
                        <div class="current" data-img="img/colors/j7/1.png" style="background:#d0d0d0;"></div>
                        <div class="border" data-img="img/colors/j7/2.png" style="background:white;"></div>
                        <div data-img="img/colors/j7/3.png" style="background:#c62122;"></div>
                        <div data-img="img/colors/j7/4.png" style="background:#262626;"></div>
                        <div data-img="img/colors/j7/5.png" style="background:#1c64a7;"></div>
                    </div>
                </div>
                <div class="text_container">
                    <div class="title">JAC J7</div>
                    <div class="comment">Выгода до <span>410 000 ₽*</span></div>
                    <div class="add">Лидер<br>продаж!</div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Подобрать комплектацию"
                            data-comment="" data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Получить предложение</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Подобрать комплектацию" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Получить предложение</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="item" id="t6">
                <div class="images_container">
                    <div class="shadow">T6</div>
                    <picture>
                        <img src="img/colors/t6/1.png" />
                    </picture>
                    <div class="colors">
                        <div class="current" data-img="img/colors/t6/4.png" style="background:#262626;"></div>
                        <div class="border" data-img="img/colors/t6/2.png" style="background:white;"></div>
                        <div data-img="img/colors/t6/3.png" style="background:#c62122;"></div>
                        <div data-img="img/colors/t6/1.png" style="background:#d0d0d0;"></div>
                        <div data-img="img/colors/t6/5.png" style="background:#1c64a7;"></div>
                    </div>
                </div>
                <div class="text_container">
                    <div class="title">JAC T6</div>
                    <div class="comment">Выгода до <span>540 000 ₽*</span></div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Подобрать комплектацию"
                            data-comment="" data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Получить предложение</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Подобрать комплектацию" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Получить предложение</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="item" id="t8_pro">
                <div class="images_container">
                    <div class="shadow">T8 <span>PRO</span></div>
                    <picture>
                        <img src="img/colors/t8_pro/1.png" />
                    </picture>
                </div>
                <div class="text_container">
                    <div class="title">JAC T8 PRO</div>
                    <!-- <div class="comment"><span>НОВИНКА!</span></div> -->
                    <div class="comment">Выгода до <span>400 000 ₽*</span></div>
                    <div class="btns">
                        <a class="anchor btn glass" href="#instock">
                            Подобрать комплектацию
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Подобрать комплектацию" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Получить предложение</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function () {
            $(".colors > div").click(function () {
                _parent = $(this).closest(".item");
                $(".colors > div", _parent).removeClass("current");
                $(this).addClass("current");
                $("picture img", _parent).attr("src", $(this).attr("data-img"));
            });
        });
    </script>


    <section id="complects">
        <div class="container">
            <div class="title">Подобрать комплектацию</div>
            <div class="tabs_container">
                <div class="current" data-model="js6">JAC JS6</div>
                <div data-model="j7">JAC J7</div>
                <div data-model="t6">JAC T6</div>
                <div data-model="t8_pro">JAC T8 PRO</div>
            </div>
            <div class="items">
                <div data-model="js6" class="item">
                    <div class="image"><img src="img/colors/js6/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC JS6</div>
                        <div class="comment">Comfort (DCT)</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>1,5 л.</strong></div>
                        <div>КП: <strong>DCT 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="js6" class="item">
                    <div class="image"><img src="img/colors/js6/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC JS6</div>
                        <div class="comment">Luxury</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>1,5 л.</strong></div>
                        <div>КП: <strong>DCT 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="j7" class="item">
                    <div class="image"><img src="img/colors/j7/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC J7</div>
                        <div class="comment">Basic</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>1,5 л.</strong></div>
                        <div>КП: <strong>МКПП 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="j7" class="item">
                    <div class="image"><img src="img/colors/j7/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC J7</div>
                        <div class="comment">Comfort</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>1,5 л.</strong></div>
                        <div>КП: <strong>МКПП 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="j7" class="item">
                    <div class="image"><img src="img/colors/j7/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC J7</div>
                        <div class="comment">Luxury</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>1,5 л.</strong></div>
                        <div>КП: <strong>CVT</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="t6" class="item">
                    <div class="image"><img src="img/colors/t6/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC T6</div>
                        <div class="comment">Full Extra</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>2,0 л.</strong></div>
                        <div>КП: <strong>МКПП 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="t6" class="item">
                    <div class="image"><img src="img/colors/t6/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC T6</div>
                        <div class="comment">Intermediate</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>2,0 л.</strong></div>
                        <div>КП: <strong>МКПП 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="t8_pro" class="item">
                    <div class="image"><img src="img/colors/t8_pro/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC T8 PRO</div>
                        <div class="comment">Full Extra</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>2.4T</strong></div>
                        <div>КП: <strong>МКПП 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
                <div data-model="t8_pro" class="item">
                    <div class="image"><img src="img/colors/t8_pro/compl.png" /></div>
                    <div class="title_container">
                        <div class="title">JAC T8 PRO</div>
                        <div class="comment">Full Extra</div>
                    </div>
                    <div class="props">
                        <div>Двигатель: <strong>2.0CTI</strong></div>
                        <div>КП: <strong>МКПП 6</strong></div>
                    </div>
                    <div class="btns">
                        <a class="popup btn glass" href="#form_popup" data-title="Рассчитать кредит" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Рассчитать кредит</span>
                        </a>
                        <a class="popup btn" href="#form_popup" data-title="Узнать цену" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Узнать цену</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function _set_complects() {
            _model = $("#complects .tabs_container .current").attr("data-model");
            $("#complects .items .item").hide();
            $("#complects .items .item[data-model='" + _model + "']").show();
        }

        $(function () {
            _set_complects();
            $("#complects .tabs_container > div").click(function () {
                $("#complects .tabs_container > div").removeClass("current");
                $(this).addClass("current");
                _set_complects();
            });
        });
    </script>

    <section id="tradein">
        <div class="container">
            <div class="image_container">
                <div class="dop">дополнительная выгода</div>
                <picture><img src="img/img_tradein.png" /></picture>
            </div>
            <form action="mail.php" method="POST" id="form1">
                <input name="title" type="hidden" value="Получить предложение">
                <input name="comment" type="hidden" value="">
                <input name="form_name" type="hidden" value="">
                <input name="form_type_model_name" type="hidden" value="">
                <input name="form_diler" type="hidden" value="">
                <div class="form_title">Выгодный Trade-In</div>
                <div class="form_comment">Оцените свой старый автомобиль и получите выгоду на новый JAC</div>
                <div class="fields">
                    <div class="form-group">
                        <input type="text" name="name" class="nacc form-control" placeholder="Ваше имя"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="nacc form-control" placeholder="Номер телефона"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn"><span>Получить предложение</span></button>
                    </div>
                    <label class="agree_field">
                        <span class="check_ex"><input type="checkbox" name="agree" value="1"
                                checked="checked"><i></i></span>
                        Я согласен с <a data-fancybox data-type="ajax" target="_blank" href="./policy.php">условиями
                            обработки персональных данных</a>
                    </label>
                </div>
            </form>
        </div>
    </section>

    <section id="credit">
        <div class="container">
            <div class="image_container">
                <picture><img src="img/img_credit.png" /></picture>
            </div>
            <form action="mail.php" method="POST" id="form1">
                <input name="title" type="hidden" value="Получить предложение">
                <input name="comment" type="hidden" value="">
                <input name="form_name" type="hidden" value="">
                <input name="form_type_model_name" type="hidden" value="">
                <input name="form_diler" type="hidden" value="">
                <div class="form_title">Выгодный кредит</div>
                <div class="form_comment">Оставьте заявку и получите лучшие условия по кредиту</div>
                <div class="fields">
                    <div class="form-group">
                        <input type="text" name="name" class="nacc form-control" placeholder="Ваше имя"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="nacc form-control" placeholder="Номер телефона"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn"><span>Получить предложение</span></button>
                    </div>
                    <label class="agree_field">
                        <span class="check_ex"><input type="checkbox" name="agree" value="1"
                                checked="checked"><i></i></span>
                        Я согласен с <a data-fancybox data-type="ajax" target="_blank" href="./policy.php">условиями
                            обработки персональных данных</a>
                    </label>
                </div>
            </form>
        </div>
    </section>

    <section id="leasing">
        <div class="container">
            <div class="image_container">
                <div class="dop">Выгода до 250.000 руб*</div>
                <picture><img src="img/img_leasing.png" /></picture>
            </div>
            <form action="mail.php" method="POST" id="form1">
                <input name="title" type="hidden" value="Рассчитать лизинг">
                <input name="comment" type="hidden" value="">
                <input name="form_name" type="hidden" value="">
                <input name="form_type_model_name" type="hidden" value="">
                <input name="form_diler" type="hidden" value="">
                <div class="form_title">Лизинг</div>
                <div class="form_comment">Любая комплектация JAC J7 и T6 в лизинг <br> с <span
                        class="big-red-text">выгодой до 250.000&nbsp;руб.*</span></div>
                <div class="fields">
                    <div class="form-group">
                        <input type="text" name="name" class="nacc form-control" placeholder="Ваше имя"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="nacc form-control" placeholder="Номер телефона"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn"><span>Рассчитать</span></button>
                    </div>
                    <label class="agree_field">
                        <span class="check_ex"><input type="checkbox" name="agree" value="1"
                                checked="checked"><i></i></span>
                        Согласие на обработку <a data-fancybox data-type="ajax" target="_blank"
                            href="./policy.php">персональных данных</a>
                    </label>
                </div>
            </form>
        </div>
    </section>

    <section id="corp">
        <img src="img/corp_bg_mob.jpg">
        <div class="container">
            <div class="corp_wrap">
                <div class="corp_title">Корпоративным клиентам</div>
                <div class="corp_comment">
                    Выгодные условия для таксопарков.<br> JAC J7 от 1 860 000 руб.*
                </div>
                <a class="popup btn" href="#form_popup" data-title="Получить предложение" data-comment=""
                    data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                    <span>Получить предложение</span>
                </a>
            </div>
        </div>
    </section>

    <section id="block1">
        <div class="container">
            <div class="column" id="test_drive">
                <div class="item">
                    <picture><img src="img/block1_img1.png" /></picture>
                    <div class="text">
                        <div class="title">Тест-драйв</div>
                        <div class="comment">Оставьте заявку и запишитесь на тест-драйв, чтобы попробовать автомобиль
                            перед
                            покупкой
                        </div>
                        <a class="popup btn glass_white" href="#form_popup" data-title="Оставить заявку" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Оставить заявку</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="item">
                    <picture><img src="img/block1_img2.png" /></picture>
                </div>
                <div class="item ico last">
                    <div class="text">
                        <div class="title">Задать вопрос дилеру</div>
                        <div class="comment">Есть вопросы или нужна консультация? Оставьте заявку, и мы вам перезвоним
                        </div>
                        <a class="popup btn glass_white" href="#form_popup" data-title="Заказать звонок" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Заказать звонок</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service block2" id="service">
        <div class="container">
            <h2 class="title">Сервис</h2>
        </div>
        <div class="container">

            <div class="column">
                <div class="item ico last">
                    <div class="text">
                        <div class="title">Скидка</div>
                        <div class="comment">Техническое обслуживание <span class="red-text">50%</span> на работы
                            и <span class="red-text">40%</span> на запчасти. Распространяется на физические и юр. лица.
                        </div>
                        <a class="popup btn glass_white" href="#form_popup" data-title="Записаться" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Записаться</span>
                        </a>
                    </div>
                </div>
                <div class="item ico last">
                    <div class="text">
                        <div class="title">Антикорозийная обработка</div>
                        <div class="comment">Специальная цена на антикоррозийную обработку днища
                            <span class="red-text">17000 руб.</span> (себес
                            6650
                            руб.)
                        </div>
                        <a class="popup btn glass_white" href="#form_popup" data-title="Записаться" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Записаться</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="item">
                    <picture><img src="img/block2_img3.png" /></picture>
                    <div class="text">
                        <div class="title"><b>Специальное предложение</b><br> на ТО для автомобилей такси (JAC J7)
                        </div>
                        <div class="comment">Дополнительая скидка 20-30% от акционной цены на ТО в п.1. Необходимое
                            условие принятия участия в акции, предъявление скрина дейсвующего аккаунта Яндекс такси,
                            на
                            скрине должен быть виден г/авто и данные водитея
                        </div>
                        <a class="popup btn glass_white" href="#form_popup" data-title="Записаться" data-comment=""
                            data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                            <span>Записаться</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="contacts">
        <div class="container">
            <div class="contacts_container">
                <div class="_cont">
                    <div class="_title1">Наши контакты</div>
                    <a href="tel:+78124948881" class="phone">8(812) 494-88-81</a>
                    <div class="addr">Санкт-Петербург, ул.Камчатская, д.9</div>
                </div>
                <div class="_cont">
                    <div class="_title2">Остались вопросы?</div>
                    <div class="comment">Оставьте заявку, мы перезвоним</div>
                    <a class="popup btn" href="#form_popup" data-title="Оставить заявку" data-comment=""
                        data-form_name="callback" data-form_type_model_name="" data-form_diler="">
                        <span>Оставить заявку</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div id="map1"></div>

    <footer>
        <div class="container">
            <div class="info">ООО «Форсаж»; ИНН: 7810368525; ОГРН: 1157847241474</div>
            <div class="copyright">© JAC | Форсаж | 2023</div>
            <center><a class="disclamer_switch" href="#">Условия акции</a></center>

        </div>
        <div class=" container">
            <div class="disclamer ">
                <p>
                    *Сайт не является офертой. Все цены, выгоды, подробности акций узнавайте в отделе продаж по
                    телефону. <br>
                    Условия программы: Скидка по программе « Лизинг» предоставляется клиенту при покупке автомобиля JAC
                    J7 или JAC T6 d лизинг в любой аффилированной лизинговой компании . Программа действует с 14.08.2023
                    г. по 31.08.2023 г. ООО «ФОРСАЖ» вправе изменить сроки и условия Программы. Подробные условия
                    уточняйте в корпоративном отделе JAC. Не является офертой.
                    <br>
                    <br>
                    Вся представленная на сайте информация, касающаяся автомобилей и сервисного обслуживания, носит
                    информационный характер и не является публичной офертой, определяемой положениями ст. 437 (2) ГК РФ.
                    Подробности в дилерском центре.
                </p>
                <!-- <p>
                    *Информация о технических характеристиках, составе комплектаций, цветовой гамме и рекомендованных
                    розничных ценах, выгодах опубликованных на сайте официального дилера JAC, носит справочный характер
                    и ни
                    при каких обстоятельствах не является публичной офертой, определяемой положениями Статьи 437 ч.2
                    Гражданского кодекса Российской Федерации. Для получения подробной информации обращайтесь к
                    консультантам нашего автосалона.
                </p> -->
            </div>
        </div>
    </footer>

    <script>
        $(function () {
            $('.disclamer_switch').click(function () {
                $('.disclamer').slideToggle({
                    start: function () {
                        $("html, body").animate({ scrollTop: $("html, body").height() }, "slow");
                    }
                });
                return false;
            });
        });
    </script>


    <div id="form_popup">
        <form action="mail.php" method="POST" class="popup_container">
            <input name="title" type="hidden" value="">
            <input name="comment" type="hidden" value="">
            <input name="form_name" type="hidden" value="">
            <input name="form_type_model_name" type="hidden" value="">
            <input name="form_diler" type="hidden" value="">

            <h2 class="form_title">Заголовок</h2>
            <div class="form-group">
                <input type="tel" name="phone" class="nacc form-control" placeholder="Ваш телефон" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="form-control  btn"><span>Получить предложение</span></button>
            </div>
            <label class="agree_field">
                <span class="check_ex"><input type="checkbox" name="agree" value="1" checked="checked"><i></i></span>
                Я согласен с <a data-fancybox data-type="ajax" target="_blank" href="./policy.php">условиями обработки
                    персональных данных</a>
            </label>
        </form>
    </div>


    <script src="js/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="js/jquery.inputmask.bundle.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/index.js?v=<?= $l_version; ?>"></script>


    <script>


        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.src = img.dataset.src;
            });
        } else {
            // Dynamically import the LazySizes library
            const script = document.createElement('script');
            script.src =
                'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
            document.body.appendChild(script);
        }

    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(93948172, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/93948172" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- calltouch -->
    <script>
        (function (w, d, n, c) { w.CalltouchDataObject = n; w[n] = function () { w[n]["callbacks"].push(arguments) }; if (!w[n]["callbacks"]) { w[n]["callbacks"] = [] } w[n]["loaded"] = false; if (typeof c !== "object") { c = [c] } w[n]["counters"] = c; for (var i = 0; i < c.length; i += 1) { p(c[i]) } function p(cId) { var a = d.getElementsByTagName("script")[0], s = d.createElement("script"), i = function () { a.parentNode.insertBefore(s, a) }, m = typeof Array.prototype.find === 'function', n = m ? "init-min.js" : "init.js"; s.async = true; s.src = "https://mod.calltouch.ru/" + n + "?id=" + cId; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", i, false) } else { i() } } })(window, document, "ct", "q5fmr6cn");
    </script>
    <!-- calltouch -->

    <script type="text/javascript" src="//pixel.smr8.ru/metric/DF7FB0BF-8560-402E-8D12-AF4D3FB428E4" charset="UTF-8"
        async></script>

</body>

</html>