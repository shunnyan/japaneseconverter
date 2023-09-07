<?php

namespace japaneseconverter\convert;

class Converter
{
	public static function isNeedJapanize(String $text): bool{
		if (mb_strlen($text, 'UTF-8') == strlen($text)) {
			// 正規表現を使用して全角カタカナ文字を検出
			if (preg_match('/[Ａ-Ｚａ-ｚ０-９ａ-ｚ]/u', $text)) {
				return false;
			}
			return true;
		}
		return false;
	}

}