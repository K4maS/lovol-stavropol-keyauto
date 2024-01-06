<?php

// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

//Версия 0.1 от 09.07.2021
//Добавлены логи
//Версия 0.2 от 09.09.2021
//Добавлены проверка по айпи и дубликат телефона

$waf = array();
$waf["debug"] = 0;
$waf["islog"] = 1;

//========================================================================================================================
//=======================================================================================================================
//=== METHODS ===========================================================================================================
function ip()
{
	if (getenv('REMOTE_ADDR')) $ip = getenv('REMOTE_ADDR'); 
	elseif(getenv('HTTP_X_FORWARDED_FOR')) $ip = getenv('HTTP_X_FORWARDED_FOR'); 
	else $ip = getenv('HTTP_CLIENT_IP');

	$error='';$not_detect='0.0.0.0'; 
	$ipnum=explode('.', $ip);
	if (sizeof($ipnum) == '4')
	{
		for($i=0;$i<4;$i++)
		{
			if ($ipnum[$i] != intval($ipnum[$i]) || $ipnum[$i] > 255 || $ipnum[$i] < 0) $error='1';
		}
	}
	else $error='1';
	$real_ip = ($error) ? $not_detect : $ip;
	return $real_ip;
} 
//=== END_ METHODS ======================================================================================================
//=======================================================================================================================
//========================================================================================================================


//========================================================================================================================
//=======================================================================================================================
//=== WEB APPLICATION FIREWALL ==========================================================================================
class WAF
{

	//============================================================
	//== VARS
	private static $c_stopWords = '
union
alert
script
mailto:
/**/
php
document
location
indexOf
@@version
';

	private static $c_stopWordsMulti = '
select from
';

	private static $c_stopWordsURL = '
http
https
ftp
www
';

	//============================================================
	//== METHODS
	//найти вхождение переменной $e_text в многострочке $e_words
	private static function __foundWords( $e_text, $e_words )
	{
		global $waf;
        
		$uuid = md5($e_words);
		//parse cache
		if ( !isset($waf["stop_words"][$uuid]) )
		{
			//stop words
			$waf["stop_words"][$uuid] = explode("\n",trim($e_words));
			foreach( $waf["stop_words"][$uuid] as &$word )
				$word = trim($word);
		}//end_ if
        
		//если замена прошла успешно(исходный текст не равен текущему), то текст найден
		$match = (str_ireplace($waf["stop_words"][$uuid], '',$e_text) != $e_text);
		if ( $match==true )
		{
			$e_result = array("action"=>"success");
			return true;
		}
		//текст не найден
		$e_result = array("action"=>"error","error"=>"__foundWords.text [".$e_text."] not found");
		return false;
	}//end_ func

	//найти вхождение переменной $e_text в многострочке $e_words
	//отличие от предыдущей функции в том что в тексте($e_text) необходимо вхождение сразу нескольких слов
	//например в строке "aaaa select ddd from bbb" мы ищем вхождение сразу select и from. Если находим оба, true
	private static function __foundWordsMulti( $e_text, $e_multi_words )
	{
		global $waf;
        
		$uuid = md5($e_multi_words);
		//parse cache
		if ( !isset($waf["stop_words_multi"][$uuid]) )
		{
			//stop words multi
			$temp_rows = explode("\n",trim($e_multi_words));
			$rows_all = array();
			foreach( $temp_rows as $temp_row )
			{
				$temp_row = trim($temp_row);
				$item_arr = explode(" ",$temp_row);
				foreach( $item_arr as &$item_arr_item )
					$item_arr_item = trim($item_arr_item);
				$rows_all[] = $item_arr;
			}//end_ foreach
			//stop words
			$waf["stop_words_multi"][$uuid] = $rows_all;
		}//end_ if

		$multi_words_arr = $waf["stop_words_multi"][$uuid];
		foreach( $multi_words_arr as $stop_words_multi )
		{
			//words(по умолчанию фраза неверная)
			$good_word = false;
			foreach( $stop_words_multi as $word )
			{
				//если хотя бы одно слово не нашёл, то фраза нормальная
				if ( stripos($e_text,$word)===false ) 
				{ $good_word = true; break; }
			}
			if ( $good_word==false )
			{
				$e_result = array("action"=>"success","log"=>"multiwords. [".implode(" ",$stop_words_multi)."]");
				return true;
			}
		}
		$e_result = array("action"=>"error","error"=>"multiwords not found");
		return false;        
	}//end_ func

	public static function isDebug()
	{
		global $waf;
		return $waf["debug"];
	}

	//Поиск стоп слов
	public static function isFoundStopWords( $e_var_value, &$e_result )
	{
		if ( WAF::__foundWords( $e_var_value, WAF::$c_stopWords) )
		{
			$e_result = array("action"=>"success","log"=>"WAF::__foundWords=true");
			return true;
		}
		if ( WAF::__foundWordsMulti( $e_var_value, WAF::$c_stopWordsMulti) )
		{
			$e_result = array("action"=>"success","log"=>"WAF::__foundWordsMulti=true");
			return true;
		}
		$e_result = array("action"=>"not_found");
		return false;
	}//end_ func

	//Поиск ссылок
	public static function isFoundHttpHttpsWWW( $e_var_value, &$e_result )
	{
		if ( WAF::__foundWords( $e_var_value, WAF::$c_stopWordsURL) )
		{
			$e_result = array("action"=>"success","log"=>"isFoundHttpHttpsWWW. found url");
			return true;
		}
		$e_result = array("action"=>"not_found");
		return false;
	}//end_ func

	public static function isFoundEmail( $e_var_value, &$e_result )
	{
		$pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
		preg_match_all($pattern, $e_var_value, $matches);

		$email_arr = $matches[0];
		$result = "";
		if ( trim($email_arr[0])!="" )
		{
			foreach( $email_arr as &$email_arr_item )
				$email_arr_item = trim($email_arr_item);
			$result = implode(",",$email_arr);
		}
		if ( $result )
		{
			$e_result = array("action"=>"success","email"=>trim($email_arr[0]),"emails"=>$result);
			return true;
		}
		$e_result = array("action"=>"error","error"=>"email not found");
		return false;
	}//end_ func

	public static function isFoundTag( $e_var_value, &$e_result )
	{
		if ( stripos($e_var_value,"<")!==false || stripos($e_var_value,">")!==false )
		{
			$e_result = array("action"=>"success");
			return true;
		}
		$e_result = array("action"=>"not_found");
		return false;
	} // end func


	public static function isPhoneCurrect( $e_phone, &$e_result )
	{
		$e_phone = preg_replace("/[^0-9]/", '', $e_phone);
		if ( strlen($e_phone)!=11 )
		{
			$e_result = array("action"=>"error","error"=>"phone.length!=11");
			return false;
		}
	
		$e_result = array("action"=>"success","phone"=>$e_phone);
		
		return true;
	}//end_ func
	

	public static function isVarNormal( $e_var_name, $e_var_value, &$e_result )
	{
		//если есть стоп слова во всех переменных
		if ( WAF::isFoundStopWords( $e_var_value, $e_result ) )
		{
			$e_result = array( "action"=>"error", "error"=>"WAF::isFoundStopWords=true; ".$e_result["log"] );
			return false;  
		}

		$type = "";
		if ( $e_var_name=="title" || stripos($e_var_name,"title")!==false )
			$type = "title";
		if ( $e_var_name=="phone" || stripos($e_var_name,"phone")!==false )
			$type = "phone";
		if ( $e_var_name=="comment" || $e_var_name=="desc" )
			$type = "text";
		if ( $e_var_name=="mail" || $e_var_name=="email" || stripos($e_var_name,"mail")!==false )
			$type = "mail";
		if ( $e_var_name=="url" || stripos($e_var_name,"url")!==false )
			$type = "url";


		$result_value = $e_var_value;
		switch( $type ) 
		{				
			case "title":
				if ( WAF::isFoundHttpHttpsWWW( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"http or https in title");
					return false;
				}
				if ( WAF::isFoundEmail( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"email in title");
					return false;
				}
				if ( WAF::isFoundTag( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"tag in title");
					return false;
				}
				$result_value = strip_tags( $e_var_value );
				break;

			case "phone":
				if ( WAF::isFoundHttpHttpsWWW( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"http or https in phone");
					return false;
				}
				if ( WAF::isFoundTag( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"tag in phone");
					return false;
				}
				if ( !WAF::isPhoneCurrect( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"phone is incorrect");
					return false;
				}
				$result_value = strip_tags($e_result["phone"]);
				break;

			case "text":
				if ( WAF::isFoundHttpHttpsWWW( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"http or https in text");
					return false;
				}
				break;

			case "mail":
				if ( !WAF::isFoundEmail( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"email not found");
					return false;
				}
				$result_value = strip_tags($e_result["emails"]);
				break;
			case "url":
				break;

			default:
				if ( WAF::isFoundHttpHttpsWWW( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"http or https in var(default type)");
					return false;
				}
				if ( WAF::isFoundTag( $e_var_value, $e_result ) )
				{
					$e_result = array("action"=>"error","error"=>"tag in var(default type)");
					return false;
				}				
				break;
		}//end_ swicth

		$e_result = array("action"=>"success","value"=>$result_value);
		return true;
	}//end_ func

	public static function isVarsNormal( $e_array, &$e_result )
	{
		if ( !is_array($e_array) )
		{  
			$e_result = array("action"=>"error","error"=>"checkVars. vars is not array");
			return false;
		}

		// echo check_ip_and_browser();

		$result_arr = array();
		foreach( $e_array as $var_name=>$var_value )
		{
			if ( !WAF::isVarNormal( $var_name, $var_value, $e_result ) )
			{
				return false;
			}
			$result_arr[$var_name] = $e_result["value"];
		}		
		$e_result = array("action"=>"success","vars"=>$result_arr);
		return true;
	}//end_ func


	public static function isWriteLog()
	{
		global $waf;
		return $waf["isWriteLog"];
	} // end func


	public static function whiteLog()
	{
		$current_m = time();
		$prev_m = strtotime('-1 month', time());

		$log_filename_curr = "waf-log-".date("Y.m",$current_m).".php";
		$log_filename_prev = "waf-log-".date("Y.m",$prev_m).".php";
		$current_time_str  = date( "d.m.Y G:i" );

		//remove old file
		if ( file_exists($log_filename_prev) )
		{
			unlink($log_filename_prev);
		}

		//if new file
		$data_to_write = "";
		if ( !file_exists($log_filename_curr) )
		{
			$data_to_write = "<?php\n";
		}

		$data_to_write .= "====================================================================================\n";
		$data_to_write .= "====================================================================================\n";
		$data_to_write .= "date: ".$current_time_str."\n";
		$data_to_write .= "ip: ".ip()."\n";
		$data_to_write .= print_r($_GET,true).print_r($_POST,true).print_r($_SERVER,true)."\n\n\n";
		
		file_put_contents( $log_filename_curr, $data_to_write, FILE_APPEND | LOCK_EX );
	} // end func

	public static function isDuplicateUser() {

		$current_ip = ip();
		$time = time();
		$current_minute = date("i");

		// echo $current_ip;
		// print_r(glob(dirname(__FILE__).'/*.time'));

		if (($current_minute % 2) !== 0) {
			$time -= 60;
		}

		$ip_file_name = "waf_".date("dmY_Hi", $time).".time";

		if (!file_exists($ip_file_name)) {
			array_map('unlink', glob(dirname(__FILE__).'/*.time'));
		}
	
		$ip_file = @file_get_contents($ip_file_name);
	
		if (strpos($ip_file, $current_ip ) !== false) {
			return true;
		}		
	
		file_put_contents($ip_file_name, $current_ip."\n", FILE_APPEND);

		return false;	
	
	}//end_ func
	
	public static function isDuplicatePhone( $e_phone ) {

		$e_phone = md5(preg_replace("/[^0-9]/", '', $e_phone));

		$time = time();
		$current_minute = date("i");

		if (($current_minute % 2) !== 0) {
			$time -= 60;
		}

		$ip_file_name = "waf_".date("dmY_Hi", $time).".dupltel";

		if (!file_exists($ip_file_name)) {
			array_map('unlink', glob(dirname(__FILE__).'/*.dupltel'));
		}
	
		$ip_file = @file_get_contents($ip_file_name);
	
		if (strpos($ip_file, $e_phone ) !== false) {
			return true;
		}		
	
		file_put_contents($ip_file_name, $e_phone."\n", FILE_APPEND);

		return false;	
	
	}//end_ func

}//end_ class
//=== END_ WEB APPLICATION FIREWALL =====================================================================================
//=======================================================================================================================
//========================================================================================================================



//=== Write log
if ( WAF::isWriteLog() )
{
	WAF::writeLog();
}//end_ if_ islog

//=== Check vars
if ( !WAF::isVarsNormal($_GET,$checkvars_result) )
{
	if ( WAF::isDebug() )
	{
		echo "GET: HACK MODE<br>\n\n";
		print_r($checkvars_result);
	}
	exit;
}
$_GET = $checkvars_result["vars"];

if ( !WAF::isVarsNormal($_POST,$checkvars_result) )
{
	if ( WAF::isDebug() )
	{
		echo "POST: HACK MODE<br>\n\n";
		print_r($checkvars_result);
	}
	exit;
}

$_POST = $checkvars_result["vars"];

if ( WAF::isDebug() )
{
	echo "NORMAL MODE\n\n";
	print_r($_GET);
	print_r($_POST);
	print_r($_REQUEST);
}



?>