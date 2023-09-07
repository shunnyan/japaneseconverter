<?php

namespace japaneseconverter\convert;

class IMEConverter
{
	public static $GOOGLE_IME_URL = "https://www.google.com/transliterate?langpair=ja-Hira|ja&text=";
	public static function GIME_Convert(String $text): String{
		$text = str_replace("　","%E3%80%80",$text);
		$text = str_replace(" ","%20",$text);
		$convert = file_get_contents(self::$GOOGLE_IME_URL . $text);
		foreach (json_decode($convert,true) as $key => $value){
			$text = str_replace($value[0],$value[1][0],$text);
		}
		return str_replace("%20"," ",$text);
	}
}
