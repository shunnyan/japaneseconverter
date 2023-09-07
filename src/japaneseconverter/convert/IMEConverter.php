<?php

namespace japaneseconverter\convert;

class IMEConverter
{
	public static $GOOGLE_IME_URL = "https://www.google.com/transliterate?langpair=ja-Hira|ja&text=";
	public static function GIME_Convert(String $text): String{
		$convert = file_get_contents(self::$GOOGLE_IME_URL . $text);
		foreach (json_decode($convert,true) as $key => $value){
			$text = str_replace($value[0],$value[1][0],$text);
		}
		return $text;
	}
}