<?php

namespace japaneseconverter\convert;

use japaneseconverter\config\MessageConfig;

class japanizer
{
	public static function convert(String $text){
		$base = $text;
		if(!(MessageConfig::$MainConfig->get("enable") ?? false) || !Converter::isNeedJapanize($text)){
			return $text;
		}
		$text = KanaConverter::convert($text);
		$replace = MessageConfig::$MainConfig->get("all_replace") ?? false;
		if(MessageConfig::$MainConfig->get("kana_only") ?? false){
			return $replace ? $text : $base . " §r§6( " . $text . " §r§6)";
		}else{
			$con = IMEConverter::GIME_Convert($text);
			return $replace ? $con : $base . " §r§6( " . $con . " §r§6)";
		}
	}

	public static function mask(String $text): String{
		if(!MessageConfig::$MaskConfig->get("enable") ?? false){
			return $text;
		}
		foreach (MessageConfig::$MaskConfig->get("list") ?? [] as $value){
			$text = str_replace($value,str_repeat("*",mb_strlen($value)),$text);
		}
		return $text;
	}
}