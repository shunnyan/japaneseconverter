<?php

namespace japaneseconverter\convert;

class KanaConverter
{
	private static $cachedList = null;
	public static $kigou_list = [
		"-"=>"ー",
		","=>"、",
		"."=>"。",
		"?"=>"？",
		"!"=>"！",
		"["=>"「",
		"]"=>"」",
		"<"=>"＜",
		">"=>"＞",
		"&"=>"＆",
		"\""=>"”",
		"("=>"（",
		")"=>"）",
	];
	public static $default_romaji_list = [
		"wha"=>"うぁ",
		"whi"=>"うぃ",
		"wi"=>"うぃ",
		"whe"=>"うぇ",
		"we"=>"うぇ",
		"who"=>"うぉ",
		"wyi"=>"ゐ",
		"wye"=>"ゑ",
		"la"=>"ぁ",
		"xa"=>"ぁ",
		"li"=>"ぃ",
		"xi"=>"ぃ",
		"lyi"=>"ぃ",
		"xyi"=>"ぃ",
		"lu"=>"ぅ",
		"xu"=>"ぅ",
		"le"=>"ぇ",
		"xe"=>"ぇ",
		"lye"=>"ぇ",
		"xye"=>"ぇ",
		"lo"=>"ぉ",
		"xo"=>"ぉ",
		"ye"=>"いぇ",
		"ka"=>"か",
		"ca"=>"か",
		"ki"=>"き",
		"ku"=>"く",
		"cu"=>"く",
		"qu"=>"く",
		"ke"=>"け",
		"ko"=>"こ",
		"co"=>"こ",
		"kya"=>"きゃ",
		"kyi"=>"きぃ",
		"kyu"=>"きゅ",
		"kye"=>"きぇ",
		"kyo"=>"きょ",
		"qya"=>"くゃ",
		"qyu"=>"くゅ",
		"qyo"=>"くょ",
		"qwa"=>"くぁ",
		"qa"=>"くぁ",
		"kwa"=>"くぁ",
		"qwi"=>"くぃ",
		"qi"=>"くぃ",
		"qyi"=>"くぃ",
		"qwu"=>"くぅ",
		"qwe"=>"くぇ",
		"qe"=>"くぇ",
		"qye"=>"くぇ",
		"qwo"=>"くぉ",
		"qo"=>"くぉ",
		"kwo"=>"くぉ",
		"ga"=>"が",
		"gi"=>"ぎ",
		"gu"=>"ぐ",
		"ge"=>"げ",
		"go"=>"ご",
		"gya"=>"ぎゃ",
		"gyi"=>"ぎぃ",
		"gyu"=>"ぎゅ",
		"gye"=>"ぎぇ",
		"gyo"=>"ぎょ",
		"gwa"=>"ぐぁ",
		"gwi"=>"ぐぃ",
		"gwu"=>"ぐぅ",
		"gwe"=>"ぐぇ",
		"gwo"=>"ぐぉ",
		"lka"=>"ヵ",
		"xka"=>"ヵ",
		"lke"=>"ヶ",
		"xke"=>"ヶ",
		"sa"=>"さ",
		"si"=>"し",
		"ci"=>"し",
		"shi"=>"し",
		"su"=>"す",
		"se"=>"せ",
		"ce"=>"せ",
		"so"=>"そ",
		"sya"=>"しゃ",
		"sha"=>"しゃ",
		"syi"=>"しぃ",
		"syu"=>"しゅ",
		"shu"=>"しゅ",
		"sye"=>"しぇ",
		"she"=>"しぇ",
		"syo"=>"しょ",
		"sho"=>"しょ",
		"swa"=>"すぁ",
		"swi"=>"すぃ",
		"swu"=>"すぅ",
		"swe"=>"すぇ",
		"swo"=>"すぉ",
		"za"=>"ざ",
		"zi"=>"じ",
		"ji"=>"じ",
		"zu"=>"ず",
		"ze"=>"ぜ",
		"zo"=>"ぞ",
		"zya"=>"じゃ",
		"ja"=>"じゃ",
		"jya"=>"じゃ",
		"zyi"=>"じぃ",
		"jyi"=>"じぃ",
		"zyu"=>"じゅ",
		"ju"=>"じゅ",
		"jyu"=>"じゅ",
		"zye"=>"じぇ",
		"je"=>"じぇ",
		"jye"=>"じぇ",
		"zyo"=>"じょ",
		"jo"=>"じょ",
		"jyo"=>"じょ",
		"ta"=>"た",
		"ti"=>"ち",
		"chi"=>"ち",
		"tu"=>"つ",
		"tsu"=>"つ",
		"te"=>"て",
		"to"=>"と",
		"tya"=>"ちゃ",
		"cha"=>"ちゃ",
		"cya"=>"ちゃ",
		"tyi"=>"ちぃ",
		"cyi"=>"ちぃ",
		"tyu"=>"ちゅ",
		"chu"=>"ちゅ",
		"cyu"=>"ちゅ",
		"tye"=>"ちぇ",
		"che"=>"ちぇ",
		"cye"=>"ちぇ",
		"tyo"=>"ちょ",
		"cho"=>"ちょ",
		"cyo"=>"ちょ",
		"tsa"=>"つぁ",
		"tsi"=>"つぃ",
		"tse"=>"つぇ",
		"tso"=>"つぉ",
		"tha"=>"てゃ",
		"thi"=>"てぃ",
		"thu"=>"てゅ",
		"the"=>"てぇ",
		"tho"=>"てょ",
		"twa"=>"とぁ",
		"twi"=>"とぃ",
		"twu"=>"とぅ",
		"twe"=>"とぇ",
		"two"=>"とぉ",
		"da"=>"だ",
		"di"=>"ぢ",
		"du"=>"づ",
		"de"=>"で",
		"do"=>"ど",
		"dya"=>"ぢゃ",
		"dyi"=>"ぢぃ",
		"dyu"=>"ぢゅ",
		"dye"=>"ぢぇ",
		"dyo"=>"ぢょ",
		"dha"=>"でゃ",
		"dhi"=>"でぃ",
		"dhu"=>"でゅ",
		"dhe"=>"でぇ",
		"dho"=>"でょ",
		"dwa"=>"どぁ",
		"dwi"=>"どぃ",
		"dwu"=>"どぅ",
		"dwe"=>"どぇ",
		"dwo"=>"どぉ",
		"ltu"=>"っ",
		"xtu"=>"っ",
		"ltsu"=>"っ",
		"xtsu"=>"っ",
		"na"=>"な",
		"ni"=>"に",
		"nu"=>"ぬ",
		"ne"=>"ね",
		"no"=>"の",
		"nya"=>"にゃ",
		"nyi"=>"にぃ",
		"nyu"=>"にゅ",
		"nye"=>"にぇ",
		"nyo"=>"にょ",
		"ha"=>"は",
		"hi"=>"ひ",
		"hu"=>"ふ",
		"fu"=>"ふ",
		"he"=>"へ",
		"ho"=>"ほ",
		"hya"=>"ひゃ",
		"hyi"=>"ひぃ",
		"hyu"=>"ひゅ",
		"hye"=>"ひぇ",
		"hyo"=>"ひょ",
		"fwa"=>"ふぁ",
		"fa"=>"ふぁ",
		"fwi"=>"ふぃ",
		"fi"=>"ふぃ",
		"fyi"=>"ふぃ",
		"fwu"=>"ふぅ",
		"fwe"=>"ふぇ",
		"fe"=>"ふぇ",
		"fye"=>"ふぇ",
		"fwo"=>"ふぉ",
		"fo"=>"ふぉ",
		"fya"=>"ふゃ",
		"fyu"=>"ふゅ",
		"fyo"=>"ふょ",
		"ba"=>"ば",
		"bi"=>"び",
		"bu"=>"ぶ",
		"be"=>"べ",
		"bo"=>"ぼ",
		"bya"=>"びゃ",
		"byi"=>"びぃ",
		"byu"=>"びゅ",
		"bye"=>"びぇ",
		"byo"=>"びょ",
		"va"=>"ヴぁ",
		"vi"=>"ヴぃ",
		"vu"=>"ヴ",
		"ve"=>"ヴぇ",
		"vo"=>"ヴぉ",
		"vya"=>"ヴゃ",
		"vyi"=>"ヴぃ",
		"vyu"=>"ヴゅ",
		"vye"=>"ヴぇ",
		"vyo"=>"ヴょ",
		"pa"=>"ぱ",
		"pi"=>"ぴ",
		"pu"=>"ぷ",
		"pe"=>"ぺ",
		"po"=>"ぽ",
		"pya"=>"ぴゃ",
		"pyi"=>"ぴぃ",
		"pyu"=>"ぴゅ",
		"pye"=>"ぴぇ",
		"pyo"=>"ぴょ",
		"ma"=>"ま",
		"mi"=>"み",
		"mu"=>"む",
		"me"=>"め",
		"mo"=>"も",
		"mya"=>"みゃ",
		"myi"=>"みぃ",
		"myu"=>"みゅ",
		"mye"=>"みぇ",
		"myo"=>"みょ",
		"ya"=>"や",
		"yu"=>"ゆ",
		"yo"=>"よ",
		"lya"=>"ゃ",
		"xya"=>"ゃ",
		"lyu"=>"ゅ",
		"xyu"=>"ゅ",
		"lyo"=>"ょ",
		"xyo"=>"ょ",
		"ra"=>"ら",
		"ri"=>"り",
		"ru"=>"る",
		"re"=>"れ",
		"ro"=>"ろ",
		"rya"=>"りゃ",
		"ryi"=>"りぃ",
		"ryu"=>"りゅ",
		"rye"=>"りぇ",
		"ryo"=>"りょ",
		"wa"=>"わ",
		"wo"=>"を",
		"lwa"=>"ゎ",
		"xwa"=>"ゎ",
		"n"=>"ん",
		"nn"=>"ん",
		"n'"=>"ん",
		"xn"=>"ん",
		"a"=>"あ",
		"i"=>"い",
		"yi"=>"い",
		"u"=>"う",
		"wu"=>"う",
		"whu"=>"う",
		"e"=>"え",
		"o"=>"お"
	];
	public static function canStartSokuon(String $romaji){
		return !in_array($romaji[0],["a", "i", "u", "e", "o", "n"]);
	}

	public static function getList() :array{
		$list = [];
		foreach (self::$default_romaji_list as $key => $value){
			if(self::canStartSokuon($key)){
				$list[$key[0] . $key] = "っ" . $value;
			}
		}
		$list = array_merge($list,self::$default_romaji_list);
		foreach (self::$kigou_list as $key => $value){
			$list[$key] = $value;
		}
		return $list;
	}

	public static function convert(String $romajiText): String{
		if (self::$cachedList === null) {
			self::$cachedList = self::getList();
		}

		foreach (self::$cachedList as $key => $value){
			$romajiText = str_replace($key, $value, $romajiText);
		}
		return $romajiText;
	}
}