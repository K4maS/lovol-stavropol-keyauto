<?php


header('Content-type: text/html; charset=utf-8');



//===================================
//=== WAF
include("waf.php");
//=== END_ WAF
//===================================


if ( WAF::isDuplicateUser() )
{
	echo "user duplicat";
	exit;
}

if ( WAF::isDuplicatePhone($_REQUEST["phone"]) )
{
	echo "phone duplicat";
	exit;
}

if ( !WAF::isPhoneCurrect($_REQUEST["phone"],$phone_result) )
{
	echo "phone not found";
	exit;
}



if ( !function_exists("defvar") )
{
	function defvar( $e_var_cur_value, $e_var_def_value )
	{
	
		if ( ($e_var_cur_value=="")||($e_var_cur_value==null) )
		{
			return $e_var_def_value;
		}//end_ if
		else
		{
			return $e_var_cur_value;
		}
	}//end_ function _def_ var
}//end_ func


class sinobyMail
{
	public static $mailConfig = array(

		// "send_type"=>"smtp",	//"smtp" or "mail"
		"send_type"=>"mail",	//"smtp" or "mail"
		
		"smtp"=>array(
			"login" => "",
			"password" => "",
			"server" => "",
			"port" => "465"
		),
		"from" 	=> "robot@[hostWithoutWWW]",
		"to"	=> "form@sinoby.ru, sinobyprog@yandex.ru, p.klimov@sinoby.ru",//admin
		"subj"	=> "[title] - [hostWithoutWWW]",
		"body"	=> "[body_html]",
		"form_undefined"=>"Нет формы",

		"unsubscribe_url" => "http://[host]/unsubscribe.html?address=[to_onemail]",
		"clientFields" => array(
			array("name"=>"center",		"desc"=>"Центр"),
			array("name"=>"name",		"desc"=>"Имя"),
			array("name"=>"phone",		"desc"=>"Телефон",	"func"=>"checkPhone",  "nacc"=>1 ),
			array("name"=>"email",		"desc"=>"E-mail",	"func"=>"checkEmail"),
			array("name"=>"group",		"desc"=>"Отдел"),
			array("name"=>"price",		"desc"=>"Желаемая цена"),
			array("name"=>"car_vznos",	"desc"=>"Перв.взнос"),
			array("name"=>"car_srok",	"desc"=>"Срок кредитования"),
			array("name"=>"year",		"desc"=>"Год"),
			array("name"=>"probeg",		"desc"=>"Пробег"),
			array("name"=>"model",		"desc"=>"Модель"),
			array("name"=>"comment",	"desc"=>"Описание"),
			array("name"=>"files",		"desc"=>"Фото",		"func"=>"checkPhotos"),
		),

		"body_html" => <<<EOF
			<html>
			<span style="display:block;background:#f4f5f5;padding-top:30px;padding-bottom:30px;">
			<span style="display:block;width:600px;margin:0 auto;">
				<span style="display:block; background-color: black; color: #ffffff; font-family: 'arial' , sans-serif; font-size: 18px; font-weight: bold; padding-left: 20px; padding-top:13px; padding-bottom:13px; ">Заявка с сайта</span>
				<span style="display:block; color: black; font-family: 'arial' , sans-serif; font-size: 14px; font-weight: normal; line-height: 20px; padding-left: 20px; padding-right: 20px; padding-top: 10px; vertical-align: bottom; background:white;">
					<p style="color: black; font-size: 18px; font-weight: bold;">Информация о клиенте:</p>
					[client_info]
					<p style="color: black; font-size: 18px; font-weight: bold;">Информация о заявке:</p>
					<p style="font-size: 14px; color: black; word-wrap: break-word;">
						<span style="font-weight: bold;">Форма: </span>
						<span>[title]</span>
					</p>
					<p style="font-size: 14px; color: black; word-wrap: break-word;">
						<span style="font-weight: bold;">Адрес сайта: </span>
						<span>[url]</span>
					</p>
					<p style="font-size: 14px; color: black; word-wrap: break-word;">
						<span style="font-weight: bold;">Дата: </span>
						<span>[date]</span>
					</p>
					<p style="font-size: 14px; color: black; word-wrap: break-word;">
						<span style="font-weight: bold;">Браузер: </span>
						<span>[browser]</span>
					</p>			
					<p style="font-size: 14px; color: black; word-wrap: break-word;">
						<span style="font-weight: bold;">IP: </span>
						<span>[ip]</span>
					</p>			
					<p style="text-align:center;">
						<span style="display:block; text-align:center; color:#82bc00; font-size: 14px; font-weight: normal;">Sinoby LP</span>
					</p>			
					<p class="sinoby-podpis">
						Сообщение сгенерировано автоматически.<br>
						Ваш адрес находится в базе рассылки.<br>
						Для того, чтобы не получать рассылку напишите администратору сайта или нажмите <a href='[unsubscribe_url]'>здесь</a>
					</p>			
					<br>
				</span>
			</span>
			</span>
			</html>
EOF
,
		//изображения внутри письма(не аттачи)
		/*<!--img src="cid:sinoby.png"-->
		"body_images" => array(
			array(
				"filename"=>"sinoby.png",
				"base64"=>"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",
			)
		),*/

		"client_info_item" => <<<EOF
			<p style="font-size: 14px; color: black; word-wrap: break-word;">
				<span style="font-weight: bold;">[client_desc]: </span>
				<span>[client_value]</span>
			</p>
EOF

	);//end_ mailConfig


	public static $mail = "";

	//=====================================================================
	// == INIT ===========================================================
	//Вызывается 1 раз после инициализации класса для добавления данных в массив self::$mailConfig 
	//( все его переменные являются шаблоном, если являются не массивом )
	public static function init()
	{
		
		//Значение прилетающие через реквест
		self::templateSet( "clientValues", $_REQUEST );
		//Title страницы переданый через переменные _POST Или Request(Может быть пустым)
		self::templateSet( "title", defvar(@self::$mailConfig["clientValues"]["form_title"].@self::$mailConfig["clientValues"]["title"],"[form_undefined]") );
		//Чистый хост
		self::templateSet( "host", $_SERVER["HTTP_HOST"] );
		//Хост без WWW
		self::templateSet( "hostWithoutWWW", self::getHostWithoutWWW() );
		//Адрес сайта
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$address = $protocol.$_SERVER["HTTP_HOST"]."/";
		self::templateSet( "address", $address );
		//Дата
		self::templateSet( "date", date("d.m.Y G:i") );
		//Браузер
		self::templateSet( "browser", $_SERVER["HTTP_USER_AGENT"] );
		//IP
		self::templateSet( "ip", $_SERVER["REMOTE_ADDR"] );
		//referer
		self::templateSet( "referer", $_SERVER["HTTP_REFERER"] );
		//url - с которого был сделан запрос
		self::templateSet( "url", defvar($_SERVER["HTTP_REFERER"],$address) );
	}//end_ func



	static function SendMail( $input )
	{
		$from   = $input["from"];
		$to     = $input["to"];
		$subj   = $input["subj"];
		$body_html   = $input["body"];
		//body_images

		//unsubscribe
		$l_unsubscribe_url = "http://".$_SERVER['HTTP_HOST']."/unsubscribe.html?address=".$to;

		$bound="bound-sinoby-".rand(10000,1000000);
		//$e_from, $e_to, $e_subject, $e_text

		$headers = "From: ".$from."\n";
		//$headers.= "To: ".$to."\n";
		//$headers.= "Subject: $subj\n";
		//$headers.= "Mime-Version: 1.0\n";
		$headers.= "Content-Type: multipart/related; boundary=\"".$bound."\"\n";
		$headers.= "List-Unsubscribe: <mailto:unsubscribe@".$_SERVER['HTTP_HOST']."?subject=Unsubscribe>, <".$l_unsubscribe_url.">";

		$body="--$bound\n";
		$body.="Content-Type: text/html; charset=utf-8;\n";
		$body.="Content-Transfer-Encoding: 8bit\n\n";
		$body.= $body_html;

		//images in body
		if ( isset($input["body_images"]) && is_array($input["body_images"]) )
		{
			$body_images = $input["body_images"];
			foreach( $body_images as $body_image )
			{
				$filepath = $body_image["filename"];
				$filename = basename($filepath);
				$ext = pathinfo( $filename, PATHINFO_EXTENSION );
				$base64   = trim(defvar(@$body_image["base64"],""));
	        
				$mimetype = $ext;
				if ( $mimetype=="jpg" ) $mimetype = "jpeg";
	        
				//реализована поддержка только base64
				if ( $base64 )
				{
					$body.="\n\n--$bound\n";
					$body.="Content-Type: image/".$mimetype."; name=\"".$filename."\"\n";
					$body.="Content-Transfer-Encoding:base64\n";
					$body.="Content-ID: ".$filename."\n\n";
					//$f=fopen($file_name,"rb");
					$body .= $base64."\n";//base64_encode(fread($f,filesize($file_name)))."\n";
				}
			}//end_ foreach
		}//end_ if
		$body.="\n--$bound--\n\n";
		mail( $to, $subj, $body, $headers);
	}//end_ func

	
	static function SendMailSMTP( $input )
	{

		require_once( "PHPMailer2/class.phpmailer.php" );
		require_once( "PHPMailer2/PHPMailerAutoload.php" );

		$from   = $input["from"];
		$to     = $input["to"];
		$subj   = $input["subj"];
		$body_html = $input["body"];
		$smtp   = sinobyMail::templateGet("smtp");

		//unsubscribe
		$l_unsubscribe_url = "http://".$_SERVER['HTTP_HOST']."/unsubscribe.html?address=".$to;

		//if ( is_string(self::$mail) && self::$mail=="" )
		{
//echo "INIT<br>";
			self::$mail = new PHPMailer();
			self::$mail->CharSet = "UTF-8";
			//self::$mail->CharSet = "windows-1251";
			self::$mail->IsHTML(true);
			self::$mail->isMail();
			self::$mail->SMTPDebug  = 1;
			//self::$mail->SMTPSecure = true;
			self::$mail->SMTPSecure = "ssl";
			self::$mail->SMTPAutoTLS = true;

			self::$mail->isSMTP();
			self::$mail->SMTPAuth = true;
			self::$mail->Host = trim($smtp["server"]);
			self::$mail->Port = trim($smtp["port"]);
			self::$mail->Username = trim($smtp["login"]);
			self::$mail->Password = trim($smtp["password"]);
	        
			
			self::$mail->SetFrom( $from, "robot@".self::getHostWithoutWWW() );
			self::$mail->From = trim($smtp["login"]);
			self::$mail->Sender = trim($smtp["login"]);

			if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			  $clientIP=$_SERVER['HTTP_CLIENT_IP'];
			}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			  $clientIP=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
			  $clientIP=$_SERVER['REMOTE_ADDR'];
			}//end_ if
		}
//echo "SEND<br>";
		//to
		self::$mail->AddAddress( $to, "" );
		//subj
		self::$mail->Subject = $subj;        
		//body
		self::$mail->MsgHTML( $body_html );        
		self::$mail->AddCustomHeader("List-Unsubscribe: <mailto:unsubscribe@".$_SERVER['HTTP_HOST']."?subject=Unsubscribe>, <".$l_unsubscribe_url.">");
       		if (!self::$mail->send())
		{
			echo "<pre>";
			echo "SMTP ERROR".self::$mail->ErrorInfo;exit;
		}//end_ func
		return 1;
	}//end_ func

	public static function getHostWithoutWWW()
	{
		return str_ireplace( "www.", "", $_SERVER["HTTP_HOST"] );
	}//end_ func

	//=====================================================================
	//== Template ================================================
	public static function templateSet( $e_name, $e_value )
	{
		self::$mailConfig[$e_name] = $e_value;
	}//end_ func

	public static function templateGet( $e_name )
	{
		return defvar(@self::$mailConfig[$e_name],"");
	}//end_ func

	public static function templateGetAll()
	{
		return self::$mailConfig;
	}//end_ func

	public static function templateCompile( $e_value )
	{
		$templateArr = self::templateGetAll();
		$templateArr2 = array();
		$templateArr3 = array();

		//формируем массив     [название_шаблона]=>Значение    для замены через str_replace
		$temp = array_merge($templateArr["clientValues"],$templateArr);
		foreach( $temp as $templateKey=>&$templateValue )
		{
			if ( is_array($templateValue) ) continue;
			$templateKey = "[".$templateKey."]";
			$templateArr2[] = $templateKey;
			$templateArr3[] = $templateValue;
			//echo $templateKey."==".$templateValue."\n";
		}//end_ foreach

		//заменяем максимум в 10 вложеностей
		$old_value = "----OLD_VALUE----";
		for( $i=0; $i<10; $i++ )
		{
			$old_value = $e_value;
			//заменяем шаблоны на значения
			$e_value = str_replace($templateArr2,$templateArr3,$e_value);
			//если вложености кончились, брякаем цикл
			if ( $old_value==$e_value ) break;
		}
		return $e_value;
	}//end_ func



	//=====================================================================
	// == checkClientInfo ================================================
	public static function checkClientInfo()
	{
		//Поля с описание phone, email .....
		$clientFields = self::templateGet("clientFields");
		//Значения из POST или REQUEST
		$clientValues = self::templateGet("clientValues");

		$err = array();


		$clientValue2 = array();
		//проверяем все поля
		foreach( $clientFields as $clientField )
		{
			$name = trim(defvar(@$clientField["name"],""));
			$desc = trim(defvar(@$clientField["desc"],""));
			$func = trim(defvar(@$clientField["func"],""));
			$val  = trim(defvar(@$clientValues[$name],""));

			//если функция проверки определена
			if ( $func )
			{
				//и если значение проверяем
				if ( $val )
				{
					$checkResult = forward_static_call(array(sinobyMail,$func), $val);
					/*$func = "sinobyMail::".$func;
					$checkResult = $func( $val );*/
					if ( $checkResult["action"]=="success" )
					{
						$val = $checkResult["value"];
					}else
					{
						$clientValue2[$name] = "";
						$err[] = array( "field"=>$clientField, "val"=>$val, "error"=>$checkResult["error"] );
						continue;
					}
				}
			}//end_if 

			$clientValue2[$name] = $val;

			//если поле обязательное
			if ( isset($clientField["nacc"]) && $clientField["nacc"] && !$val )
			{
				$err[] = array( "field"=>$clientField, "val"=>$val, "error"=>$checkResult["error"] );
			}//end_ if
		}//end_ foreach

		//isError?
		if ( count($err) )
		{
			return array("action"=>"error","error"=>"one or more field is incorrect","error-fields"=>$err);
		}//end_ if


		//============================================================
		//==== Сборка клиентского шаблона
		//Шаблон Client_info
		$clientInfoTemplate  = self::templateGet("client_info_item");

		$clientInfoHtmlArr = array();
		foreach( $clientFields as $clientField )
		{
			$name = trim(defvar(@$clientField["name"],""));
			$desc = trim(defvar(@$clientField["desc"],""));
			$val  = trim(defvar(@$clientValue2[$name],""));

			if ( $val )
			{
				self::templateSet("client_name",$name);
				self::templateSet("client_desc",$desc);
				self::templateSet("client_value",$val);
				$clientInfoHtmlArr[] = self::templateCompile( $clientInfoTemplate );
			}
		}//end_ foreach
		return array("action"=>"success","client_info_html"=>implode("\n",$clientInfoHtmlArr));
	}//end_ func

	//=====================================================================
	// == checkFields ( user function ) ==================================
	static function checkPhone( $e_phone )
	{
		$e_phone = preg_replace("/[^0-9]/", '', $e_phone );
		if ( strlen($e_phone)!=11 ) 
		{
			return array("action"=>"error","error"=>"phone less 11 number");
		}
		return array("action"=>"success","value"=>$e_phone);
	}//end_ func
	static function checkEmail( $e_mail )
	{
		if (filter_var($e_mail, FILTER_VALIDATE_EMAIL))
		{
			return array("action"=>"success","value"=>trim($e_mail));
		}else
		{
			return array("action"=>"error","email is invalid");
		}//end_ if
	}//end_ func
	static function checkPhotos( $e_phone )
	{
		$l_path = explode("/",$_SERVER["REQUEST_URI"]);
		unset($l_path[0]);
		unset($l_path[count($l_path)]);
		$l_path = implode("/",$l_path);

		$imagesSource = explode("|+|+|",$_POST["files"]);
		$imagesResult = array();
		foreach($imagesSource as $l_image)
		{
			$imagesResult[] = "<a href='http://[host]/".$l_path."/".$l_image."'>[host]/".$l_path."/".$l_image."</a>";
		}//end_ foreach

		return array(
			"action"=>"success",
				"value"=>implode("<br>",$imagesResult),
				"valueArr"=>array("photos"=>$imagesResult,"photoCount"=>count($imagesResult))
			);
	}//end_ func


}//end_ class

sinobyMail::init();

$clientInfo = sinobyMail::checkClientInfo();
if ( $clientInfo["action"]!="success" )
{
	//print_r($clientInfo);
	echo "ERR!";exit;
}//end_ if
sinobyMail::templateSet( "client_info", $clientInfo["client_info_html"] );



//==================================================================================
//==================================================================================
//== ГЕНЕРАЦИЯ ПОЛЕЙ ПИСЬМА
$emailArr = array();

//From
$emailArr["from"] = sinobyMail::templateGet("from");
$emailArr["fromCompiled"] = sinobyMail::templateCompile($emailArr["from"]);
//TO
$emailArr["to"] = sinobyMail::templateGet("to");
$emailArr["toCompiled"] = sinobyMail::templateCompile($emailArr["to"]);
//Разбить несколько почв на массивы и пробежатся по ним. Отправить письма отдельно
$toArr = explode(",",$emailArr["toCompiled"]);
foreach( $toArr as $to )
{
	$to = trim($to);
	if (!$to) continue;

	//Забить в шаблон одну почту
	sinobyMail::templateSet("to_onemail",$to);
	$emailArr["to_onemail"] = $to;

	//Subj
	$emailArr["subj"] = sinobyMail::templateGet("subj");
	$emailArr["subjCompiled"] = sinobyMail::templateCompile($emailArr["subj"]);
	//Body
	$emailArr["body"] = sinobyMail::templateGet("body");
	$emailArr["bodyCompiled"] = sinobyMail::templateCompile($emailArr["body"]);
	//Body base64 images
	$emailArr["body_images"] = sinobyMail::templateGet("body_images");

	//Send Type
	$sendType = sinobyMail::templateGet("send_type");

	//== ОТПРАВКА ПОЧТЫ
	if ( $sendType=="smtp" )
	{
		sinobyMail::SendMailSMTP( 
			array( 
				"from"=>$emailArr["fromCompiled"],
				"to"=>$emailArr["to_onemail"],
				"subj"=>$emailArr["subjCompiled"],
				"body"=>$emailArr["bodyCompiled"],
				"body_images"=>$emailArr["body_images"]
			)
		);
	}else
	{
		sinobyMail::SendMail( 
			array( 
				"from"=>$emailArr["fromCompiled"],
				"to"=>$emailArr["to_onemail"],
				"subj"=>$emailArr["subjCompiled"],
				"body"=>$emailArr["bodyCompiled"],
				"body_images"=>$emailArr["body_images"]
			)
		);
	}//end_ if
}//end_ foreach










?>