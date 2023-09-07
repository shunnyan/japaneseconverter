<?php

declare(strict_types=1);

namespace japaneseconverter;

use japaneseconverter\config\MessageConfig;
use japaneseconverter\convert\IMEConverter;
use japaneseconverter\convert\japanizer;
use japaneseconverter\convert\KanaConverter;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

	public static $config_datafolder;

	public function onEnable(): void
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		date_default_timezone_set('Asia/Tokyo');
		self::$config_datafolder = $this->getDataFolder();
		MessageConfig::init();
	}

	public function ChatEvent(PlayerChatEvent $event){
		$chat = $event->getMessage();
		$text = japanizer::mask($chat);
		$event->setMessage(japanizer::convert($text));
	}
}
