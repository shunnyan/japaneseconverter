<?php

namespace japaneseconverter\config;

use japaneseconverter\Main;
use pocketmine\utils\Config;

class MessageConfig
{
	public static Config $MainConfig;
	public static Config $MaskConfig;
	public static function init(){
		self::$MainConfig = new Config(Main::$config_datafolder . "Config.yml",Config::YAML,[
			"enable" => true,
			"kana_only" => false,
			"all_replace" => false
		]);
		self::$MaskConfig = new Config(Main::$config_datafolder . "MaskConfig.json",Config::JSON,[
			"enable" => false,
			"list" => ["bougen1","bougen2"]
		]);
	}
}
