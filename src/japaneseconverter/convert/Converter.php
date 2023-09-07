<?php

namespace japaneseconverter\convert;

class Converter
{
	public static function isNeedJapanize(String $text): bool{
		if (mb_strlen($text, 'UTF-8') == strlen($text)) {
			if (preg_match('/[Ａ-Ｚａ-ｚ０-９ａ-ｚ]/u', $text)) {
				return false;
			}
			return true;
		}
		return false;
	}

}
