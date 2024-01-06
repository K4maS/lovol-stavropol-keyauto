//=======================================
//== WAF ===============================
function getYandexId(ymCounterNum, callback, interval) {
	if (!callback) return;
	if (!ymCounterNum) {
		let metrikaObj = (window.Ya && (window.Ya.Metrika || window.Ya.Metrika2)) || null;
		ymCounterNum = (metrikaObj && metrikaObj.counters && (metrikaObj.counters() || [0])[0].id) || 0;
	}
	let ymCounterObj = window['yaCounter' + ymCounterNum] || null;
	if (ymCounterObj) return (callback(ymCounterObj, ymCounterNum), undefined);
	setTimeout(function () { getYandexId(ymCounterNum, callback, interval); }, interval || 250);
}

function getYandexClientId(counterId, callback) {
	ym(counterId, 'getClientID', function (clientID) {
		callback(clientID);
	});
}

function getYandexData() {
	let metrikaObj = (window.Ya && (window.Ya.Metrika || window.Ya.Metrika2)) || null;
	if (typeof (metrikaObj) != "function" && typeof (metrikaObj) != "object") {
		let url = "data/waf.php?ycid=" + 9999999999;
		$.get(url, function () {
			//console.log("yandexClient",yandexClientId);
		});
		return;
	}

	getYandexId(null, function (counter, yandexCounterId) {
		getYandexClientId(yandexCounterId, function (yandexClientId) {
			let url = "data/waf.php?ycid=" + yandexClientId;
			$.get(url, function () {
				//console.log("yandexClient",yandexClientId);
			});
		});
	})
}

function isYandexSend(callback) {
	$.get("data/waf.php?issend", function (resp) {
		let jsonResult = JSON.parse(resp);
		callback((jsonResult["action"] == "success") ? true : false);
	});
}

$(function () {
	getYandexData();
});
//== WAF ===============================
//=======================================

function initYandexMap() {
	if ($("#map1").length > 0)
	{
		ymaps.ready(function () {
			var _ball_bg = './img/map.baloon.svg';
			var _ball_Offset = [-67, -82];
			var _ball_Size = [67, 82];

			let centerCoord = [45.057110, 41.917080];
			// if ($(window).width() < 768) {
			// 	centerCoord = [45.057110, 41.917080];
			// }

			var myMap = new ymaps.Map('map1', {
				center: centerCoord,
				zoom: 16,
				controls: ["zoomControl"]
			}, {
				searchControlProvider: 'yandex#search'
			});		
			
			var myPlacemark = {};


			myPlacemark[0] = new ymaps.Placemark([45.057110, 41.917080], {
					balloonContent: "г. Ставрополь, пр-т Кулакова, 16А",
					hintContent: "г. Ставрополь, пр-т Кулакова, 16А"
				}, {
					iconLayout: 'default#image',
					// Своё изображение иконки метки.
					iconImageHref: _ball_bg,
					// Размеры метки.
					iconImageSize: _ball_Size,
					// Смещение левого верхнего угла иконки относительно
					// её "ножки" (точки привязки).
					iconImageOffset: _ball_Offset
				});
			myMap.geoObjects.add(myPlacemark[0]);
			
		})
	}
}

function initYandexMapWaitOnHover()
{
function loadScript(url, callback){
  var script = document.createElement("script");
 
  if (script.readyState){  // IE
    script.onreadystatechange = function(){
      if (script.readyState == "loaded" ||
              script.readyState == "complete"){
        script.onreadystatechange = null;
        callback();
      }
    };
  } else {  // Р”СЂСѓРіРёРµ Р±СЂР°СѓР·РµСЂС‹
    script.onload = function(){
      callback();
    };
  }
 
  script.src = url;
  document.getElementsByTagName("head")[0].appendChild(script);
}

	var check_if_load = 0;
	function __load_yandex()
	{
		if (check_if_load == 0) 
		{
			/*var instance = $.fancybox.open(
			{
				animationDuration:0,
				afterShow: function( instance, current )
				{
					//console.info( instance );
					$(".fancybox-content").remove();
					instance.showLoading();
				}

			});*/
			check_if_load = 1;
			//animationDuration
		        loadScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;loadByRequire=1", function()
			{
				/*instance.hideLoading();
				instance.close();*/
				ymaps.load(initYandexMap);
	        	});
		}
	}//end_ func


	$('#map1').on("touchstart",function()
	{
		__load_yandex();
	});
	$('#map1').mouseenter(function()
	{
		__load_yandex();
	});  
	$('#map1').click(function()
	{
		__load_yandex();
	});  
}//end_ func


function initFancy()
{

	$(".fancybox-gallery").fancybox(
	{
		theme : 'light',
		helpers : { thumbs : true },
		openEffect  : 'fade',
		closeEffect : 'fade',
		nextEffect  : 'fade',
		prevEffect  : 'fade',
		'showNavArrows' :   true
	});

//	$(".popup").click( function()
	$(document).on("click",".popup",function(){
		var _form_id = $(this).attr('href');

		var _form_title = $(this).data('title');
		var _form_comment = $(this).data('comment');
		var _form_name = $(this).data('form_name');
		var _form_type_model_name = $(this).data('form_type_model_name');
		var _form_diler = $(this).data('form_diler');
		
		var _select_val = $(this).attr('_select_val');

		$(".popup_container .form_title").html(_form_title);

		$.fancybox.open( $(_form_id).html(),
		{
			padding: 0,
			content: $(_form_id).html(),
		//	modal: true,
			scrolling: "no",
			margin: 5,
			/*closeBtn: false,*/
			afterShow: function()
			{
			
			
				$(".popup_container input[name='title']").val(_form_title);
				$(".popup_container input[name='comment']").val(_form_comment);
				$(".popup_container input[name='form_name']").val(_form_name);
				$(".popup_container input[name='form_type_model_name']").val(_form_type_model_name);
				$(".popup_container input[name='form_diler']").val(_form_diler);
				$(".popup_container").attr("data-callkeeper_name",_form_title);
				$(".popup_container").attr('data-flash-title',_form_title);

				modeInputMask();

				if ( typeof(_select_val)!="undefined" ) $('.popup_container select').val( _select_val );
				
				
				
			}
		} );
		return false;
	});
}//end_ func


function modeInputMask() {
    $("input[name=phone]").inputmask("+7(999) 999-99-99");
                
    let inputs = document.querySelectorAll("input[name=phone]");
        
    for (const input of inputs) {

        input.oninput = function(e) {
            let firstChar = this.value.substr(0, 4);
                
            switch (firstChar) {
                case "+7(0":
					this.value = "+7(___) ___-__-__";
					$("input[name=phone]").inputmask("+7(999) 999-99-99");
					this.setSelectionRange(3, 3);
                	break;
                case "+7(1":
					this.value = "+7(___) ___-__-__";
					$("input[name=phone]").inputmask("+7(999) 999-99-99");
					this.setSelectionRange(3, 3);
                	break;
				case "+7(2":
					this.value = "+7(___) ___-__-__";
					$("input[name=phone]").inputmask("+7(999) 999-99-99");
					this.setSelectionRange(3, 3);
                	break;
				case "+7(3":
					this.value = "+7(___) ___-__-__";
					$("input[name=phone]").inputmask("+7(999) 999-99-99");
					this.setSelectionRange(3, 3);
                	break;
				case "+7(5":
					this.value = "+7(___) ___-__-__";
					$("input[name=phone]").inputmask("+7(999) 999-99-99");
					this.setSelectionRange(3, 3);
                	break;
				case "+7(6":
					this.value = "+7(___) ___-__-__";
					$("input[name=phone]").inputmask("+7(999) 999-99-99");
					this.setSelectionRange(3, 3);
                	break;
				case "+7(7":
                    this.value = "+7(___) ___-__-__";
                    $("input[name=phone]").inputmask("+7(999) 999-99-99");
                    this.setSelectionRange(3, 3);
                    break;
				case "+7(8":
					this.value = "+7(___) ___-__-__";
					$("input[name=phone]").inputmask("+7(999) 999-99-99");
					this.setSelectionRange(3, 3);
                	break;
            }   
        }
    }
}

function initForm()
{
	
	modeInputMask();

	$( "body" ).on( "submit", ".all_forms", function()
	{
		if ($(this).hasClass("not_agree")) return false;

		var l_form_object = $(this);
		$("input,textarea,select",this).closest(".form-group").removeClass("has-danger");
		var l_err = false;
		$(".nacc",this).each( function()
		{
			if ( $(this)[0].tagName=="SELECT" || $(this)[0].tagName=="INPUT" )
			{
				if ( $.trim($(this).val())=="" )
				{
					l_err = true;
					$(this).closest(".form-group").addClass("has-danger");
				}//end_ if
			}//end_ if
		} );

		if ( l_err==true )
		{
			alert("В одном или нескольких полях введены неверные данные");
			return false;
		}//end_ if

		var _form = this;
		var l_phone = $(this).find("input[name=phone]").val();

		var l_phone = $(this).find("input[name=phone]").val();

		var l_phone_mod = "+"+l_phone.replace(/[\D]+/g,"");
		if ( l_phone_mod.length==13 )
		{
			l_phone_mod = l_phone_mod.replace("+77","+7");
		}
		if ( l_phone_mod.length==13 )
		{
			l_phone_mod = l_phone_mod.replace("+78","+7");
		}

		// if(l_phone_mod.substr(0, 3) != "+79") {
		// 	alert("В одном или нескольких полях введены неверные данные");
		// 	return false;
		//   }

		var l_phone_mod2 = l_phone_mod.substr(0, 2) +
			"(" + l_phone_mod.substr(2, 3) +
			")" +
			" " +
			l_phone_mod.substr(5, 3) +
			"-" +
			l_phone_mod.substr(8, 2) +
			"-" +
			l_phone_mod.substr(10, 2);

		l_phone_mod2 = l_phone_mod2.replace("_","");

		l_phone = l_phone_mod2;

		$(this).find("input[name=phone]").val(l_phone);

		console.log(l_phone_mod);

		$("input,textarea,select", this).closest(".form-group").removeClass("has-danger");
		var l_err = false;
		$(".nacc", this).each(function () {
			if ($(this)[0].tagName == "SELECT" || $(this)[0].tagName == "INPUT") {
				if (($.trim($(this).val())) == "" || (l_phone_mod.length < 12) || (l_phone_mod.substr(0, 3) != "+79")) {
					l_err = true;
					$(this).closest(".form-group").addClass("has-danger");
				} //end_ if
			} //end_ if
		});

		if (l_err == true) {
			// alert("В одном или нескольких полях введены неверные данные");
			// $('.form_alert').css('display', 'block');
			$('form').trigger('reset');
			return false;
		} else {
			// $('.form_alert').css('display', 'none');
		}
		
		_form_title = $("input[name='title']",this).val();
		_form_comment = $("input[name='comment']",this).val();
		_form_name = $("input[name='form_name']",this).val();
		_form_type_model_name = $("input[name='form_type_model_name']",this).val();
		_form_diler = $("input[name='form_diler']",this).val();

		var _form = this;

		isYandexSend(function (res) {
			if (res != false) {

			// if ( typeof(window.yaCounterXXXXXXXX)!="undefined" ) {			
			// 	if ( typeof(window.ym)!="undefined" ) {
			// 		ym(XXXXXXXX,'reachGoal','lead');
			// 		console.log( "[ym ok]" );
			// 	} else {
			// 		yaCounterXXXXXXXX.reachGoal('lead');
			// 		console.log( "[yaCounter ok]" );
			// 	}
			// }

			sendCallTouchData({
				"title": _form_title,
				"name": $("input[name=name]", _form).val(),
				"phone": $("input[name=phone]", _form).val()
			});

			} else {
				console.log("!ERR!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
			}
		});

		$.post( "data/mail.php", $(this).serialize(), function( data )
		{
		console.log(data);
			
			$(_form).trigger('reset');
			$('input[name=files]',_form).val('');
			$('.uploader_text',_form).css('display','inline-block');
			$('.uploader_images_count',_form).hide();
			
		});

		alert("Сообщение успешно отправлено");
			// $.fancybox.close();

		return false;
	} );
}//end_ func


//==========================================================================================
//== CallTouch
function sendCallTouchData(e_vars) {
	if (typeof (e_vars) == "undefined") e_vars = [];

	if (typeof (e_vars["name"]) == "undefined") e_vars["name"] = "";
	if (typeof (e_vars["phone"]) == "undefined") e_vars["phone"] = "";
	if (typeof (e_vars["title"]) == "undefined") e_vars["title"] = "";
	if (typeof (e_vars["calltouch_route_key"]) == "undefined") e_vars["calltouch_route_key"] = "";

	var l_result = {};

	var l_phone = "";
	var l_name = "";
	var l_title = "";
	l_calltouch_route_key = "undefined";

	try {
		l_phone = e_vars["phone"];
		l_name = e_vars["name"];
		l_title = e_vars["title"];
		l_calltouch_route_key = e_vars["calltouch_route_key"];

		l_result.name = l_name;
		l_result.phone = l_phone;
		l_result.title = l_title;
		l_result.calltouch_route_key = l_calltouch_route_key;

		l_result.url = document.location.href;
		l_result.referrer = document.referrer;
		l_result.user_agent = window.navigator.userAgent;

		console.log("sendCallTouchData", l_result);

		l_result.ya = [];
		l_result.ga = [];
		clientId = "";
		trackingId = "";


		//Google
		if (typeof (ga) != "undefined" && typeof (ga) == "function") {
			try {
				ga(function (tracker) {
					if (typeof (ga.getAll) == "function") {
						//Ga list
						l_ga_list = ga.getAll();

						if (typeof (l_ga_list) == "object" && l_ga_list.length > 0) {
							for (l_key in l_ga_list) {
								l_ga = l_ga_list[l_key];
								clientId = l_ga.get('clientId');
								trackingId = l_ga.get('trackingId');

								//new ga push
								l_ga_find = 0;
								for (l_temp_ga_key in l_result.ga) {
									l_temp_ga_value = l_result.ga[l_temp_ga_key];
									if (l_temp_ga_value["trackingId"] == trackingId) l_ga_find = 1;
								}//end_ for
								if (l_ga_find != 1) {
									l_result.ga.push({ "type": "list", "trackingId": trackingId, "clientId": clientId });
								}//end_ if
							}//end_ for
							//!!OLD!!
							if (l_ga_list.length > 0) {
								clientId = l_ga_list[0].get('clientId');
								trackingId = l_ga_list[0].get('trackingId');
							}//end_ if
						}//end_ if
					}//end_ if
					//!!OLD!!
					//l_result.push( {"trackingId":trackingId, "clientId":clientId} );
				});
			} catch (err) {

				try {
					clientId = tracker.get('clientId');
					trackingId = tracker.get('trackingId');

					//new ga push
					l_result.ga.push({ "type": "single", "trackingId": trackingId, "clientId": clientId });
				} catch (err) {
				}
			}//end_ try_ catch
		}//end_ if


		//Yandex
		if (typeof (Ya) != "undefined" && typeof (Ya) == "object" && typeof (Ya.Metrika) == "function" && typeof (Ya.Metrika.counters) == "function") {
			l_ya_counters = Ya.Metrika.counters();
			if (typeof (l_ya_counters) == "object" && typeof (l_ya_counters.length) != "undefined" && l_ya_counters.length > 0) {
				for (var i = 0; i < l_ya_counters.length; i++) {
					l_ya_counter = l_ya_counters[i];
					l_ya_counter_type = l_ya_counter.type;
					l_ya_counter_id = l_ya_counter.id;
					l_ya_client_id = window["yaCounter" + l_ya_counter_id].getClientID();
					l_result.ya.push({ "type": l_ya_counter_type, "trackingId": l_ya_counter_id, "clientId": l_ya_client_id });
				}//end_ for_ i
			}//end_ if
		}//end_ if
	} catch (err) {
	}

	//calltouch SessionId
	l_result.calltouchSessionId = "";
	try {
		l_result.calltouchSessionId = window.ct('calltracking_params')[0].sessionId;
	}
	catch (e) {
	}


	//console.log( "[[[",l_result );
	console.log("[[[==", JSON.stringify(l_result));

	$.post("data/calltouch.php", { "data": JSON.stringify(l_result) }, function (data) {
		console.log("CallTouch result:", data);
	});

}//end_ func
//== CallTouch
//==========================================================================================


function _scroll(_this)
{
	var _shift = 0;
	if ($(_this).attr('_shift') != undefined) _shift = $(_this).attr('_shift');
	
	var _m_shift = 0;
	if ($(_this).attr('_m_shift') != undefined) _m_shift = $(_this).attr('_m_shift');

	
	var curWidth = $(window).width();
	if (curWidth <= 991) _shift = _m_shift;

	
	var el = $(_this).attr('href');
	// var carTop = parseInt($(el).css("top"));
	var _pos = $(el).offset().top - $("body").offset().top - _shift;
	// var _pos = $(el).offset().top - carTop - _shift;
	
	$("html,body").animate({ scrollTop: _pos }, 500);	
}



function anchor_click()
{
	$('.anchor[href^="#"]').click(function(){
		_scroll(this);	

		return false; 
	});
}

function init_resp_table()
{
	var i = 1;
	$('.resp_table').each(function(){
		$(this).addClass('resp_table'+i);
		var _add_style = "";
		var j = 1;
		$('th',this).each(function(){
			var _text = $(this).html();
			_text = _text.replace("<br>"," ");
			_text = _text.replace("<br/>"," ");
			_text = _text.replace("</br>"," ");
			_text = _text.replace("/r","");
			_text = _text.replace(/\r|\n/g, '')
			_text = _text.replace(/<\/?[^>]+>/g,'');
			_text = _text.replace(/\s{2,}/g, ' ');
			if (_text != "") _add_style += ".resp_table"+i+ " tr td:nth-child("+j+"):before {content:'"+_text+"'}";
			j++;
		});
		$(this).after("<style>"+_add_style+"</style>");
		
		i++;
	});
}

function init_agree()
{
	$(document).on("change","input[name='agree']",function(){
		var _form = $(this).closest('form');
		if ($("input[name='agree']:not(:checked)",_form).length == 0)
			$(_form).removeClass("not_agree");
		else
			$(_form).addClass("not_agree");
		
	});
	$(document).on( "click","form.not_agree input[type='submit'],form.not_agree button[type='submit'],form.not_agree a.submit",function(){
		var _form = $(this).closest('form');
		if ($(_form).hasClass('not_agree')) return false;
	});

	$(document).on( "submit","form",function(){
		if ($(this).hasClass('not_agree')) return false;
	});

	
	
	$( "body" ).on('change','.agree',function()
	{
		var _form = $(this).closest('form');
		if ($('.agree:not(:checked)',_form).length == 0)
			$(_form).removeClass("not_agree");
		else
			$(_form).addClass("not_agree");
		
	});

	$( "body" ).on( "submit", "form", function(){
		if ($(this).hasClass("not_agree")) return false;
	});

}




function check_ymaps()
{
	if (typeof(ymaps) == "undefined")
	{
		setTimeout(check_ymaps, 300);
		//	console.log('1');
	}
	else
	initYandexMap();
	
}


function initAlert()
{
	window.alert = function( e_msg, e_time )
	{
		$("body").append("<style>.alert{ font-size: 20px; }</style>");
		
		if ( typeof(e_time)!="undefined" )
		{
			setTimeout( function(){ $.fancybox.close(); }, e_time );
		}
		
		e_msg = '<div class="alert">'+e_msg+'</div>';
		
		var instance = $.fancybox.getInstance();
		if ( typeof(instance)=="undefined" || instance==false )
		{
			$.fancybox.open(e_msg);
			return;
		}
		instance.current.$slide.trigger("onReset");
		instance.setContent( instance.current, e_msg );
	}//end_ func
}

function initMenu() {
	$(".mob-menu-btn").click(function() {
		$(this).toggleClass("active");
		$(".header__menu").toggleClass("active");
	});

	$(".menu a").click(function() {
		if ($(".mob-menu-btn").hasClass("active")) {
			$(".mob-menu-btn").removeClass("active");
			$(".header__menu").removeClass("active");
		}
	})
}


function carAnimate() {
	
	function initCarAnim() {
		let scrollTop = $(document).scrollTop();

		$(".cars_items > li").each(function() {
			let carTop = parseInt($(this).css("top"));
			let carPos = $(this).offset().top - carTop;
			let windowH = $(window).height();
			
			if ((carPos - windowH) < scrollTop) {
				$(this).addClass("anim");
			} else	$(this).removeClass("anim");
		});
	}

	$(window).scroll(function() {
		initCarAnim();
	});

	let carsPos = $(".cars_items").offset().top;
	if ($(window).height() > carsPos) initCarAnim();
}

$( function()
{
	initAlert();
	init_agree();
	anchor_click();
	initFancy();
	initForm();
	init_resp_table();
	initYandexMapWaitOnHover();
	// initMenu();
	// carAnimate();

	// test WEBP

	function testWebP() {
		return new Promise(res => {
			const webP = new Image();
			webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
			webP.onload = webP.onerror = () => {
				res(webP.height === 2);
			};        
		})
	};

	testWebP().then(hasWebP => document.querySelector('body').classList.add('webp'));

	// test WEBP END;

	// $('.popup').click(function () {
    //     if ( typeof(window.yaCounterXXXXXXXX)!="undefined" ) {
    //         if ( typeof(window.ym)!="undefined" ) {
    //             ym(XXXXXXXX,'reachGoal','openform');
    //             console.log( "[ym ok]" );
    //         } else {
    //             yaCounterXXXXXXXX.reachGoal('openform');
    //             console.log( "[yaCounter ok]" );
    //         }
    //     }
    // });

    // $("a[href^='tel']").click(function() {
    //     if ( typeof(window.yaCounterXXXXXXXX)!="undefined" ) {			
    //         if ( typeof(window.ym)!="undefined" ) {
    //             ym(XXXXXXXX,'reachGoal','clickphone');
    //             console.log( "[ym ok]" );
    //         } else {
    //             yaCounterXXXXXXXX.reachGoal('clickphone');
    //             console.log( "[yaCounter ok]" );
    //         }
    //     }
	// });
	
});