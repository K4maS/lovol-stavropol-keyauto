<?php
//===================================
//=== WAF
include("waf.php");
//=== END_ WAF
//===================================
header('Content-Type: text/html; charset=utf-8', true);

include_once("phpThumb/phpThumb.config.php");

$v = "1";
?>

<!-- <?php for ($i = 1; $i <= 5; $i++) { ?>
	<div>
		<picture>
			<source loading="lazy" class="lazyload" data-srcset="<?php echo htmlspecialchars(phpThumbURL('src=../img/' . $i . '.jpg&f=webp&w=150&h=150&iar=1&zc=c', 'phpThumb/phpThumb.php')); ?>" alt="">
			<img loading="lazy" class="lazyload" data-src="<?php echo htmlspecialchars(phpThumbURL('src=../img/' . $i . '.jpg&w=150&h=150&iar=1&zc=c', 'phpThumb/phpThumb.php')); ?>" alt="">
		</picture>
	</div>
<?php } ?> -->

<!DOCTYPE html>
<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">
	<!-- <link rel="icon" href="./favicon.ico"> -->
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
	<title>LOVOL Ключавто</title>
	<script type="text/javascript" src="./js/jquery-3.6.0.min.js"></script>
	<link href="./css/jquery.fancybox.min.css" rel="stylesheet">
	<script type="text/javascript" src="./js/jquery.fancybox.min.js"></script>
	<!-- <link href="./css/index.css?v=<?php echo $v; ?>" rel="stylesheet"> -->
	<link href="./css/index.css?V=<?= rand(); ?>" rel="stylesheet">
</head>

<body>

	<header class="header">
		<div class="container header__container">
			<div class="header__content">
				<div class="header__logo-block">
					<div class="header__logo header__logo1">
						<picture>
							<source loading="lazy" class="lazyload" data-srcset="./img/logo.webp" type="image/webp">
							<img loading="lazy" class="lazyload" data-src="./img/logo.png" alt="logo">
						</picture>
					</div>
					<div class="header__logo header__logo2">
						<picture>
							<source loading="lazy" class="lazyload" data-srcset="./img/logo2.webp" type="image/webp">
							<img loading="lazy" class="lazyload" data-src="./img/logo2.png" alt="logo2">
						</picture>
					</div>
				</div>
				<div class="header__addr herder__addr-city">
					<span class="header__addr-circle"><img src="./img/ico-addr.svg" alt=""></span> г. Ставрополь
				</div>
				<div class="header__menu menu">
					<button class="burger header__burger">
						<span class="burger-stick"> </span>
						<span class="burger-stick"> </span>
						<span class="burger-stick"> </span>
					</button>
					<div class="menu__list-block">
						<ul class="menu__list list mobile-menu">
							<li class="menu__links-item">
								<a href="#model-row" class="menu__link">Модельный ряд</a>
							</li>
							<li class="menu__links-item">
								<a href="#credit" class="menu__link">Кредит</a>
							</li>
							<li class="menu__links-item">
								<a href="#guarantee" class="menu__link">Сервис и гарантия</a>
							</li>
							<li class="menu__links-item">
								<a href="#questions" class="menu__link">Остались вопросы</a>
							</li>
							<li class="menu__links-item">
								<a href="#contacts" class="menu__link">Контакты</a>
							</li>
						</ul>
					</div>
				</div>
				<a class="header__addr header__phone" href="tel:+78652554478"><span class="header__addr-circle"><img src="./img/ico-phone.svg" alt=""></span> +7 (8652) 55-44-78</a>

				<a class="popup btn header__btn" href="#form_popup" data-title="Заказать звонок">
					<span>Заказать звонок</span>
				</a>

			</div>
		</div>
		<!-- <div class="container header__container">
			<div class="header__menu">
				<a class="anchor btn" href="#asd"><span>asd</span></a>
			</div>
		</div> -->
	</header>

	<script>
		(() => {
			$('.burger').click(function() {
				$('.burger').toggleClass('active');
				$('.menu__list-block').toggle();
			});
			$(".menu__link").click(function() {
				$('.burger').toggleClass('active');
				$('.menu__list-block').toggle();
			});

		})();
	</script>

	<section class="banner">
		<div class="container banner__container">
			<div class="banner__content">
				<div class="banner__title-block">
					<div class="banner__title">
						Старт продаж LOVOL <br>
						в КЛЮЧАВТО!
					</div>
					<a class="popup btn banner__btn" href="#form_popup" data-title="Заказать звонок">
						<span>Заказать звонок</span>
					</a>
				</div>
				<ul class="banner__links-list">
					<li class="banner__links-item">
						<a href="#model-row" class="banner__link">Модельный ряд</a>
					</li>
					<li class="banner__links-item">
						<a href="#credit" class="banner__link">Кредит</a>
					</li>
					<li class="banner__links-item">
						<a href="#guarantee" class="banner__link">Сервис и гарантия</a>
					</li>
					<li class="banner__links-item">
						<a href="#questions" class="banner__link">Остались вопросы</a>
					</li>
					<li class="banner__links-item">
						<a href="#contacts" class="banner__link">Контакты</a>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<!-- <script>
		$(function() {
			$(".car_slider").each(function(i, e) {
				$(e).slick({
					infinite: true,
					dots: true,
					arrows: true
				});
			});
		});
	</script> -->

	<section class="model-row" id="model-row">
		<div class="container model-row__container">
			<div class="model-row__content">
				<h2 class="model-row__title title">
					Модельный ряд
				</h2>
				<div class="model-row__btns">
					<button class="model-row__btn te active">Серия TE</button>
					<button class="model-row__btn tb">Серия TB</button>
					<button class="model-row__btn th">Серия TH</button>
				</div>
				<div class="model-row__models">
					<div class="model-row__model te active">
						<div class="model-row__card card card1">
							<img src="./img/models/te/TE244_HT.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TE244 HT</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>24</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1059-1460</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>3225х1475х1900</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
						<div class="model-row__card card card2">
							<img src="./img/models/te/TE244.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TE244</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>24</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1059-1460</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>3225х1475х2350</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
						<div class="model-row__card card card3">
							<img src="./img/models/te/TE354_HT.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TE354 HT</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>35</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1243-1440</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>3480х1515х2400</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
						<div class="model-row__card card card4">
							<img src="./img/models/te/TE354.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TE354</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>35</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1243-1440</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>3480x1520x2350 </b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
						<div class="model-row__card card card5">
							<img src="./img/models/te/TE404_GII.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TE404 GII</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>40</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1400</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>4136x1930x2657</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
						<div class="model-row__card card card6">
							<img src="./img/models/te/TE404_GIII.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TE404 GIII</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>40</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1250-1550</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>4136x1930x2657</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
					</div>
					<div class="model-row__model tb">
						<div class="model-row__card card card1">
							<img src="./img/models/tb/TB504_GIII.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TB504 GIII</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>50</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1250-1500</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>4030x1650x2520</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
						<div class="model-row__card card card2">
							<img src="./img/models/tb/TB604_GIII.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TB604 GIII</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>60</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1250-1496</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>4186x1930x2654</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
						<div class="model-row__card card card3">
							<img src="./img/models/tb/TB754_GIII.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TB754 GIII</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>75</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1350-1500</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>4256х1786х2628</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
					</div>
					<div class="model-row__model th">
						<div class="model-row__card card card1">
							<img src="./img/models/th/Th804_GIII.png" alt="" class="card__img">
							<h3 class="card__title">
								Трактор <b class="card__title-bold">LOVOL TH804 GIII</b>
							</h3>
							<ul class="card__characteristics-list">
								<li class="card__characteristics-item power"> <span class="card__characteristics-descr">Мощность, л.с.</span> <span class="card__characteristic"><b>82.5</b></span></li>
								<li class="card__characteristics-item wheels-formula"> <span class="card__characteristics-descr">Колесная формула </span> <span class="card__characteristic"><b>4x4</b></span></li>
								<li class="card__characteristics-item wheel-track"> <span class="card__characteristics-descr">Колея колес, мм </span> <span class="card__characteristic"><b>1475-1760</b></span></li>
								<li class="card__characteristics-item dimensions"> <span class="card__characteristics-descr">ДхШхВ,мм</span> <span class="card__characteristic"><b>4795x2180x2835</b></span></li>
							</ul>
							<div class="card__btn-block">
								<a class="popup btn banner__btn" href="#form_popup" data-title="Узнать спеццену">
									<span>Узнать спеццену</span>
								</a> <a class="popup btn banner__btn transporent" href="#form_popup" data-title="Рассчитать кредит">
									<span>Рассчитать кредит</span>
								</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

	<script>
		(() => {
			$('.model-row__btn').each(function(i, e) {
				$(e).click(() => {
					$('.model-row__btn').removeClass('active');
					$(e).addClass('active');
					$('.model-row__model').removeClass('active');
					$('.model-row__model').each(function(index, elem) {
						if (index == i) {
							$(elem).addClass('active');
						}
					})
				})
			})
		})()
	</script>



	<? include_once('attachment.php') ?>




	<section class="credit" id="credit">
		<div class="container credit__container">

			<div class="credit__content">
				<div class="credit__form-block">
					<h2 class="title credit__title">
						Кредит
					</h2>

					<form action="mail.php" method="POST" class="all_forms credit__form">
						<input name="title" type="hidden" value="Рассчитать кредит">
						<input name="comment" type="hidden" value="">
						<input name="form_name" type="hidden" value="">
						<input name="form_type_model_name" type="hidden" value="">
						<input name="form_diler" type="hidden" value="">
						<div class="form-group credit__form-group">
							<select name="срок кредита" class="nacc input select form-control" placeholder="Срок кредита">
								<option value="" selected disabled>Срок кредита</option>
								<option value="6 мес">6 мес</option>
								<option value="1 год">1 год</option>
								<option value="2 года">2 года</option>
								<option value="3 года">3 года</option>
								<option value="4 года">4 года</option>
								<option value="5 лет">5 лет</option>
							</select>
							<input type="number" name="Первоначальный взнос" class="nacc input form-control" placeholder="Первоначальный взнос">
							<input type="tel" name="phone" class="nacc input form-control" placeholder="Ваш телефон">
							<button type="submit" class="form-control btn"><span>Узнать цену</span></button>
							<label class="agree_field"><input type="checkbox" name="agree" value="1" checked="checked">Я согласен с <a target="_blank" href="./policy.php">условиями обработки персональных данных</a></label>

						</div>
					</form>
				</div>
			</div>

		</div>
	</section>



	<section class="guarantee" id="guarantee">
		<div class="container guarantee__container">
			<div class="guarantee__content">
				<h2 class="title guarantee__title">Гарантийное обслуживание</h2>
				<div class="guarantee__link-block">
					<span class="guarantee__text">
						<b>Мы к Вашим услугам 24/7</b>

					</span>
					<a class="popup btn  guarantee__btn" href="#form_popup" data-title="Оставить заявку">
						<span>Оставить заявку</span>
					</a>
				</div>
				<ul class="guarantee__list">
					<a href="#form_popup" data-title="Оставить заявку" class="garantee__item popup goal">
						<p class="item__text">Главная цель нашего сервиса — решить все Ваши вопросы.</p>
						<img src="./img/ico_goal.png" alt="" class="item__img">
					</a>
					<a href="#form_popup" data-title="Оставить заявку" class="garantee__item popup term">
						<p class="item__text">На протяжении двух лет именно такую гарантию дает компания LOVOL.</p>
						<img src="./img/ico_term.png" alt="" class="item__img">
					</a>
					<a href="#form_popup" data-title="Оставить заявку" class="garantee__item popup postgarantee">
						<p class="item__text">По окончании гарантии, Вы можете заключить договор постгарантийного обслуживания.</p>
						<img src="./img/ico_postguarantee.png" alt="" class="item__img">
					</a>
				</ul>

			</div>
		</div>
	</section>
	<section class="questions" id="questions">
		<div class="container questions__container">
			<div class="questions__content">
				<h2 class="title questions__title">
					Остались вопросы?
				</h2>
				<form action="mail.php" method="POST" class="all_forms questions__form">
					<input type="text" name="checkpass" value="" style="position: absolute; left: -9999px; display: none;">
					<input name="title" type="hidden" value="">
					<input name="comment" type="hidden" value="">
					<input name="form_name" type="hidden" value="">
					<input name="form_type_model_name" type="hidden" value="">
					<input name="form_diler" type="hidden" value="">
					<div class="form-group questions__form-group">
						<input type="tel" name="phone" inputmode="numeric" class="nacc form-control input" placeholder="Введите телефон" autocomplete="off">
						<button type="submit" class="form-control btn"><span>Получить предложение</span></button>
					</div>
					<label class="agree_field"><input type="checkbox" name="agree" value="1" checked="checked">Я согласен c <a target="_blank" href="./policy.php">условиями обработки персональных данных</a></label>
				</form>
			</div>
		</div>
	</section>
	<section class="contacts" id="contacts">
		<div class="container contacts__container">
			<div class="contacts__content">
				<div class="contacts__logo-block">
					<div class="contacts__logo contacts__logo1">
						<picture>
							<source loading="lazy" class="lazyload" data-srcset="./img/logo.webp" type="image/webp">
							<img loading="lazy" class="lazyload" data-src="./img/logo.png" alt="logo">
						</picture>
					</div>
					<div class="contacts__logo contacts__logo2">
						<picture>
							<source loading="lazy" class="lazyload" data-srcset="./img/logo2.webp" type="image/webp">
							<img loading="lazy" class="lazyload" data-src="./img/logo2.png" alt="logo2">
						</picture>
					</div>
				</div>
				<div class="contacts__addr">
					<span class="contacts__addr-circle"><img src="./img/ico-addr.svg" alt=""></span> г. Ставрополь
				</div>
				<a class="contacts__addr contacts__phone" href="tel:+78652554478"><span class="contacts__addr-circle"><img src="./img/ico-phone.svg" alt=""></span> +7 (8652) 55-44-78</a>
				<a class="popup btn contacts__btn" href="#form_popup" data-title="Заказать звонок">
					<span>Заказать звонок</span>
				</a>
				<!-- <div class="mob-menu-btn">
					<span></span>
					<span></span>
					<span></span>
				</div> -->
			</div>

		</div>
		<div id="map1"></div>
	</section>


	<section class="block">
		<div class="container block__container">
			<div class="block__content">

			</div>
		</div>
	</section>

	<section class="block">
		<div class="container block__container">
			<div class="block__content">

			</div>
		</div>
	</section>

	<section class="block">
		<div class="container block__container">
			<div class="block__content">

			</div>
		</div>
	</section>

	<section class="block">
		<div class="container block__container">
			<div class="block__content">

			</div>
		</div>
	</section>

	<footer class="footer">
		<div class="container footer__container">
			<script>
				$(function() {
					$('.disclamer_switch').click(function() {
						$('.disclamer').slideToggle({
							start: function() {
								$("html, body").animate({
									scrollTop: $("html, body").height()
								}, "slow");
							}
						});
						return false;
					});
				});
			</script>
			<!-- <div class="copyright">© 2022 Все права защищены</div> -->

			<div class="footer__content">
				<div class="footer__left">
					<a class="footer__politics" href="./policy.php">Политика конфиденциальности</a>
				</div>
				<div class="footer__center">
					<a class="disclamer_switch" href="#">Условия акции</a>
				</div>
				<div class="footer__right">
					<p class="footer__rights">
						©2005-2023 SINOBY – DIGITAL AGENCY
					</p>
				</div>
			</div>
			<div class="disclamer footer__disclamer">
				<p>text</p>
			</div>
		</div>
	</footer>


	<div id="form_popup">
		<form action="mail.php" method="POST" class="all_forms popup_container">
			<input type="text" name="checkpass" value="" style="position: absolute; left: -9999px; display: none;">
			<input name="title" type="hidden" value="">
			<input name="comment" type="hidden" value="">
			<input name="form_name" type="hidden" value="">
			<input name="form_type_model_name" type="hidden" value="">
			<input name="form_diler" type="hidden" value="">

			<h2 class="form_title">Заголовок</h2>
			<div class="form-group">
				<input type="tel" name="phone" inputmode="numeric" class="nacc form-control input" placeholder="Введите телефон" autocomplete="off">
			</div>
			<div class="form-group">
				<button type="submit" class="form-control btn" autofocus><span>Получить предложение</span></button>
			</div>
			<label class="agree_field"><input type="checkbox" name="agree" value="1" checked="checked">Я согласен c <a target="_blank" href="./policy.php">условиями обработки персональных данных</a></label>
		</form>
	</div>


	<link href="./css/fonts.css" rel="stylesheet">

	<!-- fancy -->
	<script type="text/javascript" src="./js/jquery.inputmask.bundle.min.js"></script>

	<!-- slick -->
	<link rel="stylesheet" type="text/css" href="./slick/slick.css" />
	<script type="text/javascript" src="./slick/slick.min.js"></script>

	<script type="text/javascript" src="./js/index.js?v=<?php echo $v; ?>"></script>

	<script>
		$(function() {
			if ('loading' in HTMLImageElement.prototype) {

				const images = document.querySelectorAll('img[loading="lazy"]');
				images.forEach(img => {
					img.src = img.dataset.src;
				});

				const sources = document.querySelectorAll('source[loading="lazy"]');
				sources.forEach(source => {
					source.srcset = source.dataset.srcset;
				});

			} else {
				// Dynamically import the LazySizes library
				const script = document.createElement('script');
				script.src =
					'./js/lazysizes.min.js';
				document.body.appendChild(script);
			}
		});
	</script>

</body>

</html>